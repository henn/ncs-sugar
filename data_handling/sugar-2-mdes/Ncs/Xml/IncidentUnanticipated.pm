package Ncs::Xml::IncidentUnanticipated;

use strict;
use warnings;
use Ncs::Op;

use constant INC_UNANTICIPATED_MIN		=> 1;
use constant INC_UNANTICIPATED_MAX		=> 3;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_inc_unanticipated_id		=> undef,
		_incident_id				=> undef,
		_inc_unanticipated			=> undef,
		_create_date				=> undef,
		_table_spec_version			=> Ncs::Op::INCIDENT_UNANTICIPATED_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap					=> $soap,
		_table						=> Ncs::Db::DbDefs::INCIDENT_UNANTICIPATED_TABLE,
		_sql						=> 'select ID, INC_UNANTICIPATED_ID, INC_UNANTICIPATED, ' .
										'DATE_FORMAT(date_entered, \'%Y-%m-%d\') AS CREATE_DATE from ' . 
										Ncs::Db::DbDefs::INCIDENT_UNANTICIPATED_TABLE . 
										' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve incident unanticipated record id
	my $incident_unanticipated_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::INCIDENT_UNANTICIPATED_SUGAR_MODULE, 
									id => $incident_unanticipated_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve incident_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::INCIDENT_UNANTICIPATED_SUGAR_MODULE, 
									id => $incident_unanticipated_sugar_id, 
									module2 => Ncs::Db::DbDefs::INCIDENT_SUGAR_MODULE});
	# retrieve field (incident_id) value
	my $incident_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::INCIDENT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'incident_id'});

	$self->{_psu_id}					= $psu_id_field_value;
	$self->{_inc_unanticipated_id}		= $values->{INC_UNANTICIPATED_ID} || Ncs::Op::UNKNOWN;
	$self->{_incident_id}				= $incident_id_field_value;
	$self->{_inc_unanticipated}			= Ncs::Op::atoi($values->{INC_UNANTICIPATED}) || Ncs::Op::UNKNOWN;
	$self->{_create_date}				= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "INC_UNANTICIPTED_ID column exceeds allowed character length" unless ( length($self->{_inc_unanticipated_id}) <= 36 );
	return "INCIDENT_ID column exceeds allowed character length" unless ( length($self->{_incident_id}) <= 36 );
	return "INC_UNANTICIPATED column contains an invalid numeric value" unless ( ($self->{_inc_unanticipated} >= INC_UNANTICIPATED_MIN && 
																				$self->{_inc_unanticipated} <= INC_UNANTICIPATED_MAX) ||
																				$self->{_inc_unanticipated} == Ncs::Op::UNKNOWN );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<incident_unanticipated>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<inc_unanticipated_id>%s</inc_unanticipated_id>\n", $self->{_inc_unanticipated_id});
	$out .= sprintf("\t\t\t<incident_id>%s</incident_id>\n", $self->{_incident_id});
	$out .= sprintf("\t\t\t<inc_unanticipated>%d</inc_unanticipated>\n", $self->{_inc_unanticipated});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</incident_unanticipated>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getIncUnanticipatedId			{ my $self = shift; return $self->{_inc_unanticipated_id} || ''; }
sub getIncidentId					{ my $self = shift; return $self->{_incident_id} || ''; }
sub getIncUnanticipated				{ my $self = shift; return $self->{_inc_unanticipated} || ''; }
sub getCreateDate					{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
