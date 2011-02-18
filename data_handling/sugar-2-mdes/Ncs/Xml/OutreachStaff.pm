package Ncs::Xml::OutreachStaff;

use strict;
use warnings;
use Ncs::Op;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id							=> undef,
		_outreach_event_staff_id		=> undef,
		_outreach_event_id				=> undef,
		_staff_id						=> undef,
		_create_date					=> undef,
		_table_spec_version				=> Ncs::Op::OUTREACH_STAFF_VERSION,
		_transaction_type				=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap						=> $soap,
		_table							=> Ncs::Db::DbDefs::OUTREACH_STAFF_TABLE,
		_sql							=> 'select ID, OUTREACH_EVENT_STAFF_ID, ' .
											'DATE_FORMAT(date_entered, \'%Y-%m-%d\') AS ' .
											'CREATE_DATE from ' . Ncs::Db::DbDefs::OUTREACH_STAFF_TABLE . 
											' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve sugar outreach staff id
	my $outreach_staff_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::OUTREACH_STAFF_SUGAR_MODULE, 
									id => $outreach_staff_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve outreach event id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::OUTREACH_STAFF_SUGAR_MODULE, 
									id => $outreach_staff_sugar_id, 
									module2 => Ncs::Db::DbDefs::OUTREACH_SUGAR_MODULE});
	# retrieve field (outreach_event_id) value
	my $outreach_event_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::OUTREACH_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'outreach_event_id'});

	# retrieve staff id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::OUTREACH_STAFF_SUGAR_MODULE, 
									id => $outreach_staff_sugar_id, 
									module2 => Ncs::Db::DbDefs::STAFF_SUGAR_MODULE});
	# retrieve field (incident_id) value
	my $staff_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::STAFF_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'staff_id'});

	$self->{_psu_id}						= $psu_id_field_value;
	$self->{_outreach_event_staff_id}		= $values->{OUTREACH_EVENT_STAFF_ID} || Ncs::Op::UNKNOWN;
	$self->{_outreach_event_id}				= $outreach_event_id_field_value;
	$self->{_staff_id}						= $staff_id_field_value;
	$self->{_create_date}					= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "OUTREACH_EVENT_STAFF_ID column exceeds allowed character length" unless ( length($self->{_outreach_event_staff_id}) <= 36 );
	return "OUTREACH_EVENT_ID column exceeds allowed character length" unless ( length($self->{_outreach_event_id}) <= 36 );
	return "STAFF_ID column exceeds allowed character length" unless ( length($self->{_staff_id}) <= 36 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<outreach_staff>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<outreach_event_staff_id>%s</outreach_event_staff_id>\n", $self->{_outreach_event_staff_id});
	$out .= sprintf("\t\t\t<outreach_event_id>%s</outreach_event_id>\n", $self->{_outreach_event_id});
	$out .= sprintf("\t\t\t<staff_id>%s</staff_id>\n", $self->{_staff_id});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</outreach_staff>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getOutreachEventStaff			{ my $self = shift; return $self->{_outreach_event_staff_id} || ''; }
sub getOutreachEventId				{ my $self = shift; return $self->{_outreach_event_id} || ''; }
sub getStaffId						{ my $self = shift; return $self->{_staff_id} || ''; }
sub getCreateDate					{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
