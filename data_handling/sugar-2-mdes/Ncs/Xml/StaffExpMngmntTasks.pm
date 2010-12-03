package Ncs::Xml::StaffExpMngmntTasks;

use strict;
use warnings;
use Ncs::Op;

use constant MGMT_TASK_TYPE_MIN		=> 1;
use constant MGMT_TASK_TYPE_MAX		=> 8;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_staff_exp_mgmt_task_id		=> undef,
		_staff_weekly_expense_id	=> undef,
		_mgmt_task_type				=> undef,		
		_mgmt_task_type_oth			=> undef,
		_mgmt_task_hrs				=> undef,
		_mgmt_task_comment			=> undef,
		_create_date				=> undef,
		_table_spec_version			=> Ncs::Op::STAFF_EXP_MNGMNT_TASKS_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap					=> $soap,
		_table						=> Ncs::Db::DbDefs::STAFF_EXP_MNGMNT_TASKS_TABLE,
		_sql						=> 'select ID, STAFF_EXP_MGMT_TASK_ID, MGMT_TASK_TYPE, ' .
										'MGMT_TASK_TYPE_OTH, MGMT_TASK_HRS, MGMT_TASK_COMMENT, ' .
										'DATE_FORMAT(create_date, \'%Y-%m-%d\') AS CREATE_DATE from ' .
										Ncs::Db::DbDefs::STAFF_EXP_MNGMNT_TASKS_TABLE
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve sugar staff exp management tasks id
	my $staff_exp_mng_taks_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship 
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::OUTREACH_EVAL_SUGAR_MODULE, 
									id => $staff_exp_mng_taks_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve staff weekly expense id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::OUTREACH_EVAL_SUGAR_MODULE, 
									id => $staff_exp_mng_taks_sugar_id, 
									module2 => Ncs::Db::DbDefs::STAFF_WEEKLY_EXPENSE_SUGAR_MODULE});
	# retrieve field (weekly_exp_id) value
	my $weekly_exp_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::STAFF_WEEKLY_EXPENSE_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'weekly_exp_id'});

	$self->{_psu_id}					= $psu_id_field_value;
	$self->{_staff_exp_mgmt_task_id}	= $values->{STAFF_EXP_MGMT_TASK_ID} || Ncs::Op::UNKNOWN;
	$self->{_staff_weekly_expense_id}	= $weekly_exp_id_field_value;
	$self->{_mgmt_task_type}			= Ncs::Op::atoi($values->{MGMT_TASK_TYPE}) || Ncs::Op::UNKNOWN;
	$self->{_mgmt_task_type_oth}		= $values->{MGMT_TASK_TYPE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_mgmt_task_hrs}				= $values->{MGMT_TASK_HRS} || Ncs::Op::UNKNOWN;
	$self->{_mgmt_task_comment}			= $values->{MGMT_TASK_COMMENT} || '';
	$self->{_create_date}				= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "STAFF_EXP_MGMT_TASK_ID column exceeds allowed character length" unless ( length($self->{_staff_exp_mgmt_task_id}) <= 36 );
	return "STAFF_WEEKLY_EXPENSE_ID column exceeds allowed character length" unless ( length($self->{_staff_weekly_expense_id}) <= 36 );
	return "MGMT_TASK_TYPE column contains an invalid numeric value" unless ( ($self->{_mgmt_task_type} >= MGMT_TASK_TYPE_MIN && 
																				$self->{_mgmt_task_type} <= MGMT_TASK_TYPE_MAX) || 
																				$self->{_mgmt_task_type} == Ncs::Op::OTHER ||
																				$self->{_mgmt_task_type} == Ncs::Op::UNKNOWN );
	if ($self->{_mgmt_task_type} != Ncs::Op::OTHER) { $self->{_mgmt_task_type_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "MGMT_TASK_TYPE_OTH column exceeds allowed character length" unless ( length($self->{_mgmt_task_type_oth}) <= 255 );
	return "MGMT_TASK_COMMENT column exceeds allowed character length" unless ( length($self->{_mgmt_task_comment}) <= 8000 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<staff_exp_mngmnt_tasks>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<staff_exp_mgmt_task_id>%s</staff_exp_mgmt_task_id>\n", $self->{_staff_exp_mgmt_task_id});
	$out .= sprintf("\t\t\t<staff_weekly_expense_id>%s</staff_weekly_expense_id>\n", $self->{_staff_weekly_expense_id});
	$out .= sprintf("\t\t\t<mgmt_task_type>%d</mgmt_task_type>\n", $self->{_mgmt_task_type});
	$out .= sprintf("\t\t\t<mgmt_task_type_oth>%s</mgmt_task_type_oth>\n", $self->{_mgmt_task_type_oth});
	$out .= sprintf("\t\t\t<mgmt_task_hrs>%.2f</mgmt_task_hrs>\n", $self->{_mgmt_task_hrs});
	$out .= sprintf("\t\t\t<mgmt_task_comment>%s</mgmt_task_comment>\n", $self->{_mgmt_task_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</staff_exp_mngmnt_tasks>");

	return $out;
}

sub getPsuId				{ my $self = shift; return $self->{_psu_id} || ''; }
sub getStaffExpMgmtTaskId	{ my $self = shift; return $self->{_staff_language_id} || ''; }
sub getStaffWeeklyExpId		{ my $self = shift; return $self->{_staff_weekly_expense_id} || ''; }
sub getMgmtTaskType			{ my $self = shift; return $self->{_mgmt_task_type} || ''; }
sub getMgmtTaskTypeOth		{ my $self = shift; return $self->{_mgmt_task_type_oth} || ''; }
sub getMgmtTaskHrs			{ my $self = shift; return $self->{_mgmt_task_hrs} || ''; }
sub getMgmtTaskComment		{ my $self = shift; return $self->{_mgmt_task_comment} || ''; }
sub getCreateDate			{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion		{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType		{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql					{ my $self = shift; return $self->{_sql} || ''; }
sub getTable				{ my $self = shift; return $self->{_table} || ''; }

1;
