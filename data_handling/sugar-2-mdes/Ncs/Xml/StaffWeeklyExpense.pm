package Ncs::Xml::StaffWeeklyExpense;

use strict;
use warnings;
use Ncs::Op;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_weekly_exp_id				=> undef,
		_staff_id					=> undef,
		_week_start_date			=> undef,		
		_staff_pay					=> undef,
		_staff_hours				=> undef,
		_staff_expenses				=> undef,
		_staff_miles				=> undef,
		_weekly_expenses_comment	=> undef,
		_create_date				=> undef,
		_table_spec_version			=> Ncs::Op::STAFF_WEEKLY_EXPENSE_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap					=> $soap,
		_table						=> Ncs::Db::DbDefs::STAFF_WEEKLY_EXPENSE_TABLE,
		_sql						=> 'select ID, WEEKLY_EXP_ID, DATE_FORMAT(week_start_date, ' .
										'\'%Y-%m-%d\') AS WEEK_START_DATE, STAFF_PAY, STAFF_HOURS, ' .
										'STAFF_EXPENSES, STAFF_MILES, WEEKLY_EXPENSES_COMMENT, ' .
										'DATE_FORMAT(create_date, \'%Y-%m-%d\') AS CREATE_DATE ' .
										'from ' . Ncs::Db::DbDefs::STAFF_WEEKLY_EXPENSE_TABLE
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve sugar weekly expense record id
	my $staff_week_exp_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::STAFF_WEEKLY_EXPENSE_SUGAR_MODULE, 
									id => $staff_week_exp_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve staff_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::STAFF_WEEKLY_EXPENSE_SUGAR_MODULE, 
									id => $staff_week_exp_sugar_id, 
									module2 => Ncs::Db::DbDefs::STAFF_SUGAR_MODULE});
	# retrieve field (staff_id) value
	my $staff_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::STAFF_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'staff_id'});

	$self->{_psu_id}					= $psu_id_field_value;
	$self->{_weekly_exp_id}				= $values->{WEEKLY_EXP_ID} || Ncs::Op::UNKNOWN;
	$self->{_staff_id}					= $staff_id_field_value;
	$self->{_week_start_date}			= $values->{WEEK_START_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_staff_pay}					= $values->{STAFF_PAY} || Ncs::Op::UNKNOWN;
	$self->{_staff_hours}				= $values->{STAFF_HOURS} || Ncs::Op::UNKNOWN;
	$self->{_staff_expenses}			= $values->{STAFF_EXPENSES} || Ncs::Op::UNKNOWN;
	$self->{_staff_miles}				= $values->{STAFF_MILES} || Ncs::Op::UNKNOWN;
	$self->{_weekly_expenses_comment}	= $values->{WEEKLY_EXPENSES_COMMENT} || '';
	$self->{_create_date}				= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "WEEKLY_EXP_ID column exceeds allowed character length" unless ( length($self->{_weekly_exp_id}) <= 36 );
	return "STAFF_ID column exceeds allowed character length" unless ( length($self->{_staff_id}) <= 36 );
	return "WEEK_START_DATE column contains an invalid date format" unless ( $self->{_week_start_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "WEEKLY_EXPENSES_COMMENT column exceeds allowed character length" unless ( length($self->{_weekly_expenses_comment}) <= 8000 );	
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<staff_weekly_expense>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<weekly_exp_id>%s</weekly_exp_id>\n", $self->{_weekly_exp_id});
	$out .= sprintf("\t\t\t<staff_id>%s</staff_id>\n", $self->{_staff_id});
	$out .= sprintf("\t\t\t<week_start_date>%s</week_start_date>\n", $self->{_week_start_date});
	$out .= sprintf("\t\t\t<staff_pay>%.2f</staff_pay>\n", $self->{_staff_pay});
	$out .= sprintf("\t\t\t<staff_hours>%.2f</staff_hours>\n", $self->{_staff_hours});
	$out .= sprintf("\t\t\t<staff_expenses>%.2f</staff_expenses>\n", $self->{_staff_expenses});
	$out .= sprintf("\t\t\t<staff_miles>%.2f</staff_miles>\n", $self->{_staff_miles});
	$out .= sprintf("\t\t\t<weekly_expenses_comment>%s</weekly_expenses_comment>\n", $self->{_weekly_expenses_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</staff_weekly_expense>");

	return $out;
}

sub getPsuId					{ my $self = shift; return $self->{_psu_id} || ''; }
sub getWeeklyExpId				{ my $self = shift; return $self->{_weekly_exp_id} || ''; }
sub getStaffId					{ my $self = shift; return $self->{_staff_id} || ''; }
sub getWeekStartDate			{ my $self = shift; return $self->{_week_start_date} || ''; }
sub getStaffPay					{ my $self = shift; return $self->{_staff_pay} || ''; }
sub getStaffHours				{ my $self = shift; return $self->{_staff_hours} || ''; }
sub getStaffExpenses			{ my $self = shift; return $self->{_staff_expenses} || ''; }
sub getStaffMiles				{ my $self = shift; return $self->{_staff_miles} || ''; }
sub getWeeklyExpensesCommnet	{ my $self = shift; return $self->{_weekly_expenses_comment} || ''; }
sub getCreateDate				{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion			{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType			{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql						{ my $self = shift; return $self->{_sql} || ''; }
sub getTable					{ my $self = shift; return $self->{_table} || ''; }

1;
