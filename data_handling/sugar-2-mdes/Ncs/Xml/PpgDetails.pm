package Ncs::Xml::PpgDetails;

use strict;
use warnings;
use Ncs::Op;

use constant PPG_PID_STATUS_MIN		=> 1;
use constant PPG_PID_STATUS_MAX		=> 5;
use constant PPG_FIRST_MIN			=> 1;
use constant PPG_FIRST_MAX			=> 6;

sub new
{
	my ($class, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_ppg_details_id				=> undef,
		_p_id						=> undef,
		_ppg_pid_status				=> undef,
		_ppg_first					=> undef,
		_orig_due_date				=> undef,
		_due_date_2					=> undef,
		_due_date_3					=> undef,
		_create_date				=> undef,
		_table_spec_version			=> Ncs::Op::PPG_DETAILS_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_table						=> Ncs::Db::DbDefs::PPG_DETAILS_TABLE,
		_sql						=> 'select ID, PPG_DETAILS_ID, PPG_PID_STATUS, PPG_FIRST, ' .
										'DATE_FORMAT(orig_due_date, \'%Y-%m-%d\') AS ORIG_DUE_DATE, ' .
										'DATE_FORMAT(due_date_2, \'%Y-%m-%d\') AS DUE_DATE_2, ' .
										'DATE_FORMAT(due_date_3, \'%Y-%m-%d\') AS DUE_DATE_3, ' .
										'DATE_FORMAT(date_entered, \'%Y-%m-%d\') AS CREATE_DATE ' .
										'from ' . Ncs::Db::DbDefs::PPG_DETAILS_TABLE . 
										' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# create soap class
	my $soap = Ncs::Soap::SoapNcs->new();

	# retrieve PPG Details record id
	my $ppg_details_sugar_id			= $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $soap->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PPG_DETAILS_SUGAR_MODULE, 
									id => $ppg_details_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $soap->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve p_id relationship id
	$rel_id = $soap->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PPG_DETAILS_SUGAR_MODULE, 
									id => $ppg_details_sugar_id, 
									module2 => Ncs::Db::DbDefs::PARTICIPANT_SUGAR_MODULE});
	# retrieve field (p_id) value
	my $p_id_field_value = $soap->get_field_value({module => Ncs::Db::DbDefs::PARTICIPANT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'p_id'});

	$self->{_psu_id}					= $psu_id_field_value;
	$self->{_ppg_details_id}			= $values->{PPG_DETAILS_ID} || Ncs::Op::UNKNOWN,
	$self->{_p_id}						= $p_id_field_value,
	$self->{_ppg_pid_status}			= $values->{PPG_PID_STATUS} || Ncs::Op::UNKNOWN,
	$self->{_ppg_first}					= $values->{PPG_FIRST} || Ncs::Op::UNKNOWN,
	$self->{_orig_due_date}				= $values->{ORIG_DUE_DATE} || Ncs::Op::UNKNOWN_DATE,
	$self->{_due_date_2}				= $values->{DUE_DATE_2} || Ncs::Op::UNKNOWN_DATE,
	$self->{_due_date_3}				= $values->{DUE_DATE_3} || Ncs::Op::UNKNOWN_DATE,
	$self->{_create_date}				= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "PPG_DETAILS_ID column exceeds allowed character length" unless ( length($self->{_ppg_details_id}) <= 36 );
	return "P_ID column exceeds allowed character length" unless ( length($self->{_p_id}) <= 36 );
	return "PPG_PID_STATUS column contains an invalid numeric value" unless ( ($self->{_ppg_pid_status} >= PPG_PID_STATUS_MIN && 
																				$self->{_ppg_pid_status} <= PPG_PID_STATUS_MAX) ||
																				$self->{_ppg_pid_status} == Ncs::Op::UNKNOWN );
	return "PPG_FIRST column contains an invalid numeric value" unless ( ($self->{_ppg_first} >= PPG_FIRST_MIN && 
																			$self->{_ppg_first} <= PPG_FIRST_MAX) ||
																			$self->{_ppg_first} == Ncs::Op::UNKNOWN );
	return "ORIG_DUE_DATE column contains an invalid date format" unless ( $self->{_orig_due_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "DUE_DATE_2 column contains an invalid date format" unless ( $self->{_due_date_2} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "DUE_DATE_3 column contains an invalid date format" unless ( $self->{_due_date_3} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<ppg_details>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<ppg_details_id>%s</ppg_details_id>\n", $self->{_ppg_details_id});
	$out .= sprintf("\t\t\t<p_id>%s</p_id>\n", $self->{_p_id});
	$out .= sprintf("\t\t\t<ppg_pid_status>%d</ppg_pid_status>\n", $self->{_ppg_pid_status});
	$out .= sprintf("\t\t\t<ppg_first>%d</ppg_first>\n", $self->{_ppg_first});
	$out .= sprintf("\t\t\t<orig_due_date>%s</orig_due_date>\n", $self->{_orig_due_date});
	$out .= sprintf("\t\t\t<due_date_2>%s</due_date_2>\n", $self->{_due_date_2});
	$out .= sprintf("\t\t\t<due_date_3>%s</due_date_3>\n", $self->{_due_date_3});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</ppg_details>");

	return $out;
}

sub getPsuId					{ my $self = shift; return $self->{_psu_id} || ''; }
sub getPpgDetailsId				{ my $self = shift; return $self->{_ppg_details_id} || ''; }
sub getPId						{ my $self = shift; return $self->{_p_id} || ''; }
sub getPpgPidStatus				{ my $self = shift; return $self->{_ppg_pid_status} || ''; }
sub getPpgFirst					{ my $self = shift; return $self->{_ppg_first} || ''; }
sub getOrigDueDate				{ my $self = shift; return $self->{_orig_due_date} || ''; }
sub getDueDate2					{ my $self = shift; return $self->{_due_date_2} || ''; }
sub getDueDate3					{ my $self = shift; return $self->{_due_date_3} || ''; }
sub getCreateDate				{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion			{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType			{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql						{ my $self = shift; return $self->{_sql} || ''; }
sub getTable					{ my $self = shift; return $self->{_table} || ''; }

1;
