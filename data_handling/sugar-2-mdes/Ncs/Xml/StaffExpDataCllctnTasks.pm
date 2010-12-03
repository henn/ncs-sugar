package Ncs::Xml::StaffExpDataCllctnTasks;

use strict;
use warnings;
use Ncs::Op;

use constant DATA_COLL_TASK_TYPE_MIN	=> 1;
use constant DATA_COLL_TASK_TYPE_MAX	=> 12;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id							=> undef,
		_staff_exp_data_coll_task_id	=> undef,
		_staff_weekly_expense_id		=> undef,
		_data_coll_task_type			=> undef,		
		_data_coll_task_type_oth		=> undef,		
		_data_coll_task_hrs				=> undef,
		_data_coll_task_cases			=> undef,
		_data_coll_transmit				=> undef,
		_data_coll_task_comment			=> undef,
		_create_date					=> undef,
		_table_spec_version				=> Ncs::Op::STAFF_EXP_DATA_CLLCTN_TASKS_VERSION,
		_transaction_type				=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap						=> $soap,
		_table							=> Ncs::Db::DbDefs::STAFF_EXP_DATA_CLLCTN_TASKS_TABLE,
		_sql							=> 'select ID, STAFF_EXP_DATA_COLL_TASK_ID, DATA_COLL_TASK_TYPE, ' .
											'DATA_COLL_TASK_TYPE_OTH, DATA_COLL_TASK_HRS, ' .
											'DATA_COLL_TASK_CASES, DATA_COLL_TRANSMIT, DATA_COLL_TASK_COMMENT, ' .
											'DATE_FORMAT(create_date, \'%Y-%m-%d\') AS CREATE_DATE from ' .
											Ncs::Db::DbDefs::STAFF_EXP_DATA_CLLCTN_TASKS_TABLE
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve sugar staff exp data coll record id
	my $staff_exp_data_coll_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::STAFF_EXP_DATA_CLLCTN_TASKS_SUGAR_MODULE, 
									id => $staff_exp_data_coll_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve staff weekly expense id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::STAFF_EXP_DATA_CLLCTN_TASKS_SUGAR_MODULE, 
									id => $staff_exp_data_coll_sugar_id, 
									module2 => Ncs::Db::DbDefs::STAFF_WEEKLY_EXPENSE_SUGAR_MODULE});
	# retrieve field (weekly_exp_id) value
	my $weekly_exp_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::STAFF_WEEKLY_EXPENSE_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'weekly_exp_id'});

	$self->{_psu_id}						= $psu_id_field_value;
	$self->{_staff_exp_data_coll_task_id}	= $values->{STAFF_EXP_DATA_COLL_TASK_ID} || Ncs::Op::UNKNOWN;
	$self->{_staff_weekly_expense_id}		= $weekly_exp_id_field_value;
	$self->{_data_coll_task_type}			= Ncs::Op::atoi($values->{DATA_COLL_TASK_TYPE}) || Ncs::Op::UNKNOWN;
	$self->{_data_coll_task_type_oth}		= $values->{DATA_COLL_TASK_TYPE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_data_coll_task_hrs}			= $values->{DATA_COLL_TASK_HRS} || Ncs::Op::UNKNOWN;
	$self->{_data_coll_task_cases}			= $values->{DATA_COLL_TASK_CASES} || Ncs::Op::UNKNOWN;
	$self->{_data_coll_transmit}			= $values->{DATA_COLL_TRANSMIT} || Ncs::Op::UNKNOWN;
	$self->{_data_coll_task_comment}		= $values->{DATA_COLL_TASK_COMMENT} || '';
	$self->{_create_date}					= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "STAFF_EXP_DATA_COLL_TASK_ID column exceeds allowed character length" unless ( length($self->{_staff_exp_data_coll_task_id}) <= 36 );
	return "STAFF_WEEKLY_EXPENSE_ID column exceeds allowed character length" unless ( length($self->{_staff_weekly_expense_id}) <= 36 );
	return "DATA_COLL_TASK_TYPE column contains an invalid numeric value" unless ( ($self->{_data_coll_task_type} >= DATA_COLL_TASK_TYPE_MIN && 
																					$self->{_data_coll_task_type} <= DATA_COLL_TASK_TYPE_MAX) || 
																					$self->{_data_coll_task_type} == Ncs::Op::OTHER ||
																					$self->{_data_coll_task_type} == Ncs::Op::UNKNOWN );
	if ($self->{_data_coll_task_type} != Ncs::Op::OTHER) { $self->{_data_coll_task_type_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "DATA_COLL_TASK_TYPE_OTH column exceeds allowed character length" unless ( length($self->{_data_coll_task_type_oth}) <= 255 );
	return "DATA_COLL_TASK_COMMENT column exceeds allowed character length" unless ( length($self->{_data_coll_task_comment}) <= 8000 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<staff_exp_data_cllctn_tasks>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<staff_exp_data_coll_task_id>%s</staff_exp_data_coll_task_id>\n", $self->{_staff_exp_data_coll_task_id});
	$out .= sprintf("\t\t\t<staff_weekly_expense_id>%s</staff_weekly_expense_id>\n", $self->{_staff_weekly_expense_id});
	$out .= sprintf("\t\t\t<data_coll_task_type>%d</data_coll_task_type>\n", $self->{_data_coll_task_type});
	$out .= sprintf("\t\t\t<data_coll_task_type_oth>%s</data_coll_task_type_oth>\n", $self->{_data_coll_task_type_oth});
	$out .= sprintf("\t\t\t<data_coll_task_hrs>%.2f</data_coll_task_hrs>\n", $self->{_data_coll_task_hrs});
	$out .= sprintf("\t\t\t<data_coll_task_cases>%d</data_coll_task_cases>\n", $self->{_data_coll_task_cases});
	$out .= sprintf("\t\t\t<data_coll_transmit>%d</data_coll_transmit>\n", $self->{_data_coll_transmit});
	$out .= sprintf("\t\t\t<data_coll_task_comment>%s</data_coll_task_comment>\n", $self->{_data_coll_task_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</staff_exp_data_cllctn_tasks>");

	return $out;
}

sub getPsuId					{ my $self = shift; return $self->{_psu_id} || ''; }
sub getStaffExpDataCollTaskId	{ my $self = shift; return $self->{_staff_exp_data_coll_task_id} || ''; }
sub getStaffWeeklyExpId			{ my $self = shift; return $self->{_staff_weekly_expense_id} || ''; }
sub getDataCollTaskType			{ my $self = shift; return $self->{_data_coll_task_type} || ''; }
sub getDataCollTaskTypeOth		{ my $self = shift; return $self->{_data_coll_task_type_oth} || ''; }
sub getDataCollTaskHrs			{ my $self = shift; return $self->{_data_coll_task_hrs} || ''; }
sub getDataCollTaskCases		{ my $self = shift; return $self->{_data_coll_task_cases} || ''; }
sub getDataCollTransmit			{ my $self = shift; return $self->{_data_coll_transmit} || ''; }
sub getDataCollTaskComment		{ my $self = shift; return $self->{_data_coll_task_comment} || ''; }
sub getCreateDate				{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion			{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType			{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql						{ my $self = shift; return $self->{_sql} || ''; }
sub getTable					{ my $self = shift; return $self->{_table} || ''; }

1;
