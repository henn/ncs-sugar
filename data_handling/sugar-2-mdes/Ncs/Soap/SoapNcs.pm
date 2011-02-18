package Ncs::Soap::SoapNcs;

use strict;
use warnings;
use Log::Log4perl qw(:levels get_logger);
use SOAP::Lite;
use Data::Dumper;
use Ncs::Soap::SoapDefs;

sub new
{
	my ($class, $args) = @_;

	#
	# If soap connection details have been supplied, use them.  
	# Otherwise, use defaults.
	#
	my $self = bless
	{
		_username			=> (defined($args->{soapInfo})) ? $args->{soapInfo}->{usename} : Ncs::Soap::SoapDefs::SUGAR_SOAP_USERNAME,
		_password			=> (defined($args->{soapInfo})) ? $args->{soapInfo}->{md5Passwd} : Ncs::Soap::SoapDefs::SUGAR_SOAP_MD5PASSWD,
		_session_id			=> undef,
		_soap				=> undef
	}, $class;

	$self->init();

	return $self;
}

###############################################################################
#
# init()
#
# A method to instantiate, connect and store session id for soap communication.
#
###############################################################################
sub init
{
	my $self = shift;

	my $logger = get_logger("");

	#
	# Instantiate SOAP.
	#
	$self->{_soap} = SOAP::Lite->uri(Ncs::Soap::SoapDefs::SUGAR_SOAP_DOMAIN)->proxy(Ncs::Soap::SoapDefs::SUGAR_SOAP_URL);

	#
	# Hash with credentials.
	#
	my $user_auth = {'user_name' => $self->{_username}, 'password' => $self->{_password}};

	#
	# Execute the login.
	#
	my $result = $self->{_soap}->login(SOAP::Data->value($user_auth));

	#
	# Check for any errors.
	#
	$self->check_soap_error($result);
	
	#	
	# Get the session id.
	#
	if(defined($self->{_session_id} = $result->result->{'id'})) {
		$logger->debug("SOAP session id is:" . $result->result->{'id'});
		$self->{_session_id} = $result->result->{'id'};
	} else {
		$logger->error("SOAP connection failed.. exiting application");
		exit(1);
	}
}

###############################################################################
#
# get_sugar_relationship_id()
#
# A method to return the sugar id of a sugar relationship.
#
#	- module1 is the module from which the supplied id comes from.
#	- id is the known sugar id of one side of the relationship.
#	- module2 is the related module for which we are retriving the id for.
#	- relationship_name is optional, and refers to a specific SugarCRM 
#	relationship that is being targeted.
#
###############################################################################
sub get_sugar_relationship_id
{
	my ($self, $args) = @_;

	my $logger = get_logger("");

	#
	# Retrieve specific relationship id.
	#
	my $result = undef;
	if(defined($args->{relationship_name})) {
		$result = $self->{_soap}->get_relationships(
			SOAP::Data->value($self->{_session_id}),
			SOAP::Data->value($args->{module1}),
			SOAP::Data->value($args->{id}),
			SOAP::Data->value($args->{module2}),
			SOAP::Data->value(''),
			SOAP::Data->value(0),
			SOAP::Data->value($args->{relationship_name})
		);
	} else {
		$result = $self->{_soap}->get_relationships(
			SOAP::Data->value($self->{_session_id}),
			SOAP::Data->value($args->{module1}),
			SOAP::Data->value($args->{id}),
			SOAP::Data->value($args->{module2})
			SOAP::Data->value(''),
			SOAP::Data->value(0),
		);
	}

	#
	# Check for any errors.
	#
	$self->check_soap_error($result);

	#
	# Return sugar id of this relationship.
	#
	if($result->result->{ids}[0]->{id}) {	
		$logger->debug("Relationship id is:" . $result->result->{ids}[0]->{id} .
						" for supplied id:" . $args->{id});
		return $result->result->{ids}[0]->{id};
	} else {
		$logger->debug("No relationship id exists for supplied id:" . 
						$args->{id});
		return undef;
	}
}

###############################################################################
#
# get_field_value()
#
# A method to return the value of a field for the supplied sugar id.
#
#	- module is the module from which the field belongs to.
#	- id is the known sugar id of the record we are retrieving the field from.
#	- field is the module's field that we are retreiving the value from.
#
###############################################################################
sub get_field_value
{
	my ($self, $args) = @_;

	my $logger = get_logger("");

	#
	# Retrieve field value using supplied id.
	#
	my $result = $self->{_soap}->get_entry(
		SOAP::Data->value($self->{_session_id}),
		SOAP::Data->value($args->{module}),
		SOAP::Data->value($args->{id} ),
		SOAP::Data->value( [$args->{field}] )
	);

	#
	# Check for any errors.
	#
	$self->check_soap_error($result);

	#
	# Return the field's value.
	#
	if(defined($result->result->{entry_list}[0]->{name_value_list}[0]->{value})) {
		$logger->debug("Field '" . $args->{field} . "' value:'" . 
				$result->result->{entry_list}[0]->{name_value_list}[0]->{value} . 
				"'");
		return $result->result->{entry_list}[0]->{name_value_list}[0]->{value};
	} else {
		return undef;
	}
}

###############################################################################
#
# check_soap_error()
#
# A method to check the error section of a returned soap message.
#
###############################################################################
sub check_soap_error
{
	my ($self, $result) = @_;

	my $logger = get_logger("");

	#
	# Check soap error section for any errors
	#
	if ( $result->result->{error}->{number} != 0 ) {
		$logger->error("SOAP Error Nbr:" . $result->result->{error}->{number} . 
					", Message:" . $result->result->{error}->{description});
	}
}

sub getUserName			{ my $self = shift; return $self->{_username} || ''; }
sub getPassword			{ my $self = shift; return $self->{_password} || ''; }
sub getSessionId		{ my $self = shift; return $self->{_session_id} || ''; }
sub getSoap				{ my $self = shift; return $self->{_soap} || ''; }

1;
