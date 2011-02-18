package Ncs::Xml::Psu;

use strict;
use warnings;
use Ncs::Soap::SoapNcs;
use Ncs::Db::DbDefs;
use Ncs::Op;

use constant RECRUIT_TYPE_MIN	=> 1;
use constant RECRUIT_TYPE_MAX	=> 3;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_sc_id				=> undef,
		_psu_id				=> undef,
		_psu_name			=> undef,
		_recruit_type		=> undef,
		_create_date		=> undef,
		_table_spec_version	=> Ncs::Op::PSU_VERSION,
		_transaction_type	=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap			=> $soap,
		_table				=> Ncs::Db::DbDefs::PSU_TABLE,
		_sql				=> 'select ID, PSU_ID, PSU_NAME, RECRUIT_TYPE, ' .
								'DATE_FORMAT(date_entered, \'%Y-%m-%d\') AS CREATE_DATE from ' . 
								Ncs::Db::DbDefs::PSU_TABLE . 
								' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve sugar psu record id
	my $psu_sugar_id = $values->{ID} || '';

	# retrieve sc_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $psu_sugar_id, 
									module2 => Ncs::Db::DbDefs::STUDY_CENTER_SUGAR_MODULE});
	# retrieve field (sc_id) value
	my $sc_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::STUDY_CENTER_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'sc_id'});

	$self->{_sc_id}					= $sc_id_field_value;
	$self->{_psu_id}				= $values->{PSU_ID} || Ncs::Op::UNKNOWN;
	$self->{_psu_name}				= $values->{PSU_NAME} || Ncs::Op::UNKNOWN;
	$self->{_recruit_type}			= $values->{RECRUIT_TYPE} || Ncs::Op::UNKNOWN;
	$self->{_create_date}			= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "SC_ID column exceeds allowed character length" unless ( length($self->{_sc_id}) <= 36 );
	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "PSU_NAME column exceeds allowed character length" unless ( length($self->{_psu_name}) <= 100 );
	return "RECRUIT_TYPE column contains invalid numeric value" unless ( ($self->{_recruit_type} >= RECRUIT_TYPE_MIN && 
																			$self->{_recruit_type} <= RECRUIT_TYPE_MAX) ||
																			$self->{_recruit_type} == Ncs::Op::UNKNOWN );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<psu>\n");
	$out .= sprintf("\t\t\t<sc_id>%s</sc_id>\n", $self->{_sc_id});
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<psu_name>%s</psu_name>\n", $self->{_psu_name});
	$out .= sprintf("\t\t\t<recruit_type>%s</recruit_type>\n", $self->{_recruit_type});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</psu>");

	return $out;
}

sub getScId				{ my $self = shift; return $self->{_sc_id} || ''; }
sub getPsuId			{ my $self = shift; return $self->{_psu_id} || ''; }
sub getPsuName			{ my $self = shift; return $self->{_psu_name} || ''; }
sub getRecruitType		{ my $self = shift; return $self->{_recruit_type} || ''; }
sub getCreateDate		{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion	{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType	{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql				{ my $self = shift; return $self->{_sql} || ''; }
sub getTable			{ my $self = shift; return $self->{_table} || ''; }

1;
