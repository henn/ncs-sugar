package Ncs::Xml::StaffValidation;

use strict;
use warnings;
use Ncs::Op;

use constant STAFF_VALIDATE_MIN		=> 1;
use constant STAFF_VALIDATE_MAX		=> 2;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id				=> undef,
		_staff_val_id		=> undef,
		_staff_id			=> undef,
		_event_id			=> undef,		
		_staff_validate		=> undef,
		_staff_val_date		=> undef,
		_staff_val_comment	=> undef,
		_create_date		=> undef,
		_table_spec_version	=> Ncs::Op::STAFF_VALIDATION_VERSION,
		_transaction_type	=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap			=> $soap,
		_table				=> Ncs::Db::DbDefs::STAFF_VALIDATION_TABLE,
		_sql				=> 'select PSU_ID, STAFF_VAL_ID, STAFF_ID, EVENT_ID, STAFF_VALIDATE, ' .
								'DATE_FORMAT(staff_val_date, \'%Y-%m-%d\') AS STAFF_VAL_DATE, ' .
								'STAFF_VAL_COMMENT, DATE_FORMAT(date_entered, \'%Y-%m-%d\') AS ' .
								'CREATE_DATE from ' . Ncs::Db::DbDefs::STAFF_VALIDATION_TABLE . 
								' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve sugar staff validation record id
	my $staff_validation_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::STAFF_VALIDATION_SUGAR_MODULE, 
									id => $staff_validation_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve staff_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::STAFF_VALIDATION_SUGAR_MODULE, 
									id => $staff_validation_sugar_id, 
									module2 => Ncs::Db::DbDefs::STAFF_SUGAR_MODULE});
	# retrieve field (staff_id) value
	my $staff_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::STAFF_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'staff_id'});

	# retrieve event_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::STAFF_VALIDATION_SUGAR_MODULE, 
									id => $staff_validation_sugar_id, 
									module2 => Ncs::Db::DbDefs::EVENT_SUGAR_MODULE});
	# retrieve field (event_id) value
	my $event_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::EVENT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'event_id'});

	$self->{_psu_id}				= $psu_id_field_value;
	$self->{_staff_val_id}			= $values->{STAFF_VAL_ID} || Ncs::Op::UNKNOWN;
	$self->{_staff_id}				= $staff_id_field_value;
	$self->{_event_id}				= $event_id_field_value;
	$self->{_staff_validate}		= Ncs::Op::atoi($values->{STAFF_VALIDATE}) || Ncs::Op::UNKNOWN;
	$self->{_staff_val_date}		= $values->{STAFF_VAL_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_staff_val_comment}		= $values->{STAFF_VAL_COMMENT} || '';
	$self->{_create_date}			= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "STAFF_VAL_ID column exceeds allowed character length" unless ( length($self->{_staff_val_id}) <= 36 );
	return "STAFF_ID column exceeds allowed character length" unless ( length($self->{_staff_id}) <= 36 );
	return "EVENT_ID column exceeds allowed character length" unless ( length($self->{_event_id}) <= 36 );
	return "STAFF_VALIDATE column contains invalid numeric value" unless ( ($self->{_staff_validate} >= STAFF_VALIDATE_MIN &&
																			$self->{_staff_validate} <= STAFF_VALIDATE_MAX) ||
																			$self->{_staff_validate} == Ncs::Op::NOT_APPLICABLE ||
																			$self->{_staff_validate} == Ncs::Op::UNKNOWN );
	return "STAFF_VAL_DATE column contains an invalid date format" unless ( $self->{_staff_val_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "STAFF_VAL_COMMENT column exceeds allowed character length" unless ( length($self->{_staff_val_comment}) <= 8000 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<staff_validation>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<staff_val_id>%s</staff_val_id>\n", $self->{_staff_val_id});
	$out .= sprintf("\t\t\t<staff_id>%s</staff_id>\n", $self->{_staff_id});
	$out .= sprintf("\t\t\t<event_id>%s</event_id>\n", $self->{_event_id});
	$out .= sprintf("\t\t\t<staff_validate>%d</staff_validate>\n", $self->{_staff_validate});
	$out .= sprintf("\t\t\t<staff_val_date>%s</staff_val_date>\n", $self->{_staff_val_date});
	$out .= sprintf("\t\t\t<staff_val_comment>%s</staff_val_comment>\n", $self->{_staff_val_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</staff_validation>");

	return $out;
}

sub getPsuId			{ my $self = shift; return $self->{_psu_id} || ''; }
sub getStaffValId		{ my $self = shift; return $self->{_staff_val_id} || ''; }
sub getStaffId			{ my $self = shift; return $self->{_staff_id} || ''; }
sub getEventId			{ my $self = shift; return $self->{_event_id} || ''; }
sub getStaffValidate	{ my $self = shift; return $self->{_staff_validate} || ''; }
sub getStaffValDate		{ my $self = shift; return $self->{_staff_val_date} || ''; }
sub getStaffValComment	{ my $self = shift; return $self->{_staff_val_comment} || ''; }
sub getCreateDate		{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion	{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType	{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql				{ my $self = shift; return $self->{_sql} || ''; }
sub getTable			{ my $self = shift; return $self->{_table} || ''; }

1;
