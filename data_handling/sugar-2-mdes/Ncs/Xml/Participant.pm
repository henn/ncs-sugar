package Ncs::Xml::Participant;

use strict;
use warnings;
use Ncs::Op;

use constant P_TYPE_MIN					=> 1;
use constant P_TYPE_MAX					=> 9;
use constant STATUS_INFO_SOURCE_MIN		=> 1;
use constant STATUS_INFO_SOURCE_MAX		=> 8;
use constant STATUS_INFO_MODE_MIN		=> 1;
use constant STATUS_INFO_MODE_MAX		=> 6;
use constant PID_ENTRY_MIN				=> 1;
use constant PID_ENTRY_MAX				=> 20;
use constant P_AGE_ELIG_MIN				=> 1;
use constant P_AGE_ELIG_MAX				=> 3;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_p_id						=> undef,
		_p_type						=> undef,
		_p_type_oth					=> undef,
		_status_info_source			=> undef,
		_status_info_source_oth		=> undef,
		_status_info_mode			=> undef,
		_status_info_mode_oth		=> undef,
		_status_info_date			=> undef,
		_enroll_status				=> undef,
		_enroll_date				=> undef,
		_pid_entry					=> undef,
		_pid_entry_other			=> undef,
		_p_age_elig					=> undef,
		_pid_comment				=> undef,
		_create_date				=> undef,
		_table_spec_version			=> Ncs::Op::PARTICIPANT_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap					=> $soap,
		_table						=> Ncs::Db::DbDefs::PARTICIPANT_TABLE,
		_sql						=> 'select ID, P_ID, P_TYPE, P_TYPE_OTH, STATUS_INFO_SOURCE, ' .
										'STATUS_INFO_SOURCE_OTH, STATUS_INFO_MODE, STATUS_INFO_MODE_OTH, ' .
										'DATE_FORMAT(status_info_date, \'%Y-%m-%d\') AS STATUS_INFO_DATE, ' .
										'ENROLL_STATUS, DATE_FORMAT(enroll_date, \'%Y-%m-%d\') AS ' .
										'ENROLL_DATE, PID_ENTRY, PID_ENTRY_OTHER, PID_AGE_ELIG, ' .
										'PID_COMMENT, DATE_FORMAT(date_entered, \'%Y-%m-%d\') AS ' .
										'CREATE_DATE from ' . Ncs::Db::DbDefs::PARTICIPANT_TABLE . 
										' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve participant id
	my $participant_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PARTICIPANT_SUGAR_MODULE, 
									id => $participant_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	$self->{_psu_id}					= $psu_id_field_value;
	$self->{_p_id}						= $values->{P_ID} || Ncs::Op::UNKNOWN;
	$self->{_p_type}					= Ncs::Op::atoi($values->{P_TYPE}) || Ncs::Op::UNKNOWN;
	$self->{_p_type_oth}				= $values->{P_TYPE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_status_info_source}		= Ncs::Op::atoi($values->{STATUS_INFO_SOURCE}) || Ncs::Op::UNKNOWN;
	$self->{_status_info_source_oth}	= $values->{STATUS_INFO_SOURCE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_status_info_mode}			= Ncs::Op::atoi($values->{STATUS_INFO_MODE}) || Ncs::Op::UNKNOWN;
	$self->{_status_info_mode_oth}		= $values->{STATUS_INFO_MODE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_status_info_date}			= $values->{STATUS_INFO_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_enroll_status}				= $values->{ENROLL_STATUS} || Ncs::Op::UNKNOWN;
	$self->{_enroll_date}				= $values->{ENROLL_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_pid_entry}					= Ncs::Op::atoi($values->{PID_ENTRY}) || Ncs::Op::UNKNOWN;
	$self->{_pid_entry_other}			= $values->{PID_ENTRY_OTHER} || Ncs::Op::UNKNOWN;
	$self->{_p_age_elig}				= Ncs::Op::atoi($values->{PID_AGE_ELIG}) || Ncs::Op::UNKNOWN;
	$self->{_pid_comment}				= $values->{PID_COMMENT} || '';
	$self->{_create_date}				= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "P_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "P_TYPE column contains an invalid numeric value" unless ( ($self->{_p_type} >= P_TYPE_MIN && 
																		$self->{_p_type} <= P_TYPE_MAX) ||
																		$self->{_p_type} == Ncs::Op::OTHER ||
																		$self->{_p_type} == Ncs::Op::UNKNOWN );
	if ($self->{_p_type} != Ncs::Op::OTHER) { $self->{_p_type_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "P_TYPE_OTH column exceeds allowed character length" unless ( length($self->{_p_type_oth}) <= 255 );
	return "STATUS_INFO_SOURCE column contains an invalid numeric value" unless ( ($self->{_status_info_source} >= STATUS_INFO_SOURCE_MIN && 
																		$self->{_status_info_source} <= STATUS_INFO_SOURCE_MAX) ||
																		$self->{_status_info_source} == Ncs::Op::OTHER ||
																		$self->{_status_info_source} == Ncs::Op::UNKNOWN );
	if ($self->{_status_info_source} != Ncs::Op::OTHER) { $self->{_status_info_source_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "STATUS_INFO_SOURCE_OTH column exceeds allowed character length" unless ( length($self->{_status_info_source_oth}) <= 255 );
	return "STATUS_INFO_MODE column contains an invalid numeric value" unless ( ($self->{_status_info_mode} >= STATUS_INFO_MODE_MIN && 
																		$self->{_status_info_mode} <= STATUS_INFO_MODE_MAX) ||
																		$self->{_status_info_mode} == Ncs::Op::OTHER ||
																		$self->{_status_info_mode} == Ncs::Op::UNKNOWN );
	if ($self->{_status_info_mode} != Ncs::Op::OTHER) { $self->{_status_info_mode_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "STATUS_INFO_MODE_OTH column exceeds allowed character length" unless ( length($self->{_status_info_mode_oth}) <= 255 );
	return "STATUS_INFO_DATE column contains an invalid date format" unless ( $self->{_status_info_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "ENROLL_STATUS column contains an invalid numeric value" unless ( $self->{_enroll_status} >= Ncs::Op::YES || 
																				$self->{_enroll_status} <= Ncs::Op::NO ||
																				$self->{_enroll_status} <= Ncs::Op::UNKNOWN );
	return "ENROLL_DATE column contains an invalid date format" unless ( $self->{_enroll_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "PID_ENTRY column contains an invalid numeric value" unless ( ($self->{_pid_entry} >= PID_ENTRY_MIN && 
																			$self->{_pid_entry} <= PID_ENTRY_MAX) ||
																			$self->{_pid_entry} == Ncs::Op::OTHER ||
																			$self->{_pid_entry} == Ncs::Op::UNKNOWN );
	if ($self->{_pid_entry} != Ncs::Op::OTHER) { $self->{_pid_entry_other} = "". Ncs::Op::NOT_APPLICABLE; }
	return "PID_ENTRY_OTHER column exceeds allowed character length" unless ( length($self->{_pid_entry_other}) <= 255 );
	return "P_AGE_ELIG column contains an invalid numeric value" unless ( ($self->{_p_age_elig} >= P_AGE_ELIG_MIN && 
																			$self->{_p_age_elig} <= P_AGE_ELIG_MAX) ||
																			$self->{_p_age_elig} == Ncs::Op::UNKNOWN );
	return "PID_COMMENT column exceeds allowed character length" unless ( length($self->{_pid_comment}) <= 8000 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<participant>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<p_id>%s</p_id>\n", $self->{_p_id});
	$out .= sprintf("\t\t\t<p_type>%d</p_type>\n", $self->{_p_type});
	$out .= sprintf("\t\t\t<p_type_oth>%s</p_type_oth>\n", $self->{_p_type_oth});
	$out .= sprintf("\t\t\t<status_info_source>%d</status_info_source>\n", $self->{_status_info_source});
	$out .= sprintf("\t\t\t<status_info_source_oth>%s</status_info_source_oth>\n", $self->{_status_info_source_oth});
	$out .= sprintf("\t\t\t<status_info_mode>%d</status_info_mode>\n", $self->{_status_info_mode});
	$out .= sprintf("\t\t\t<status_info_mode_oth>%s</status_info_mode_oth>\n", $self->{_status_info_mode_oth});
	$out .= sprintf("\t\t\t<status_info_date>%s</status_info_date>\n", $self->{_status_info_date});
	$out .= sprintf("\t\t\t<enroll_status>%d</enroll_status>\n", $self->{_enroll_status});
	$out .= sprintf("\t\t\t<enroll_date>%s</enroll_date>\n", $self->{_enroll_date});
	$out .= sprintf("\t\t\t<pid_entry>%d</pid_entry>\n", $self->{_pid_entry});
	$out .= sprintf("\t\t\t<pid_entry_other>%s</pid_entry_other>\n", $self->{_pid_entry_other});
	$out .= sprintf("\t\t\t<p_age_elig>%d</p_age_elig>\n", $self->{_p_age_elig});
	$out .= sprintf("\t\t\t<pid_comment>%s</pid_comment>\n", $self->{_pid_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</participant>");

	return $out;
}

sub getPsuId					{ my $self = shift; return $self->{_psu_id} || ''; }
sub getPId						{ my $self = shift; return $self->{_p_id} || ''; }
sub getPType					{ my $self = shift; return $self->{_p_type} || ''; }
sub getPTypeOth					{ my $self = shift; return $self->{_p_type_oth} || ''; }
sub getStatusInfoSource			{ my $self = shift; return $self->{_status_info_source} || ''; }
sub getStatusInfoSourceOth		{ my $self = shift; return $self->{_status_info_source_oth} || ''; }
sub getStatusInfoMode			{ my $self = shift; return $self->{_status_info_mode} || ''; }
sub getStatusInfoModeOth		{ my $self = shift; return $self->{_status_info_mode_oth} || ''; }
sub getStatusInfoDate			{ my $self = shift; return $self->{_status_info_date} || ''; }
sub getEnrollStatus				{ my $self = shift; return $self->{_enroll_status} || ''; }
sub getEnrollDate				{ my $self = shift; return $self->{_enroll_date} || ''; }
sub getPidEntry					{ my $self = shift; return $self->{_pid_entry} || ''; }
sub getPidEntryOther			{ my $self = shift; return $self->{_pid_entry_other} || ''; }
sub getPAgeElig					{ my $self = shift; return $self->{_p_age_elig} || ''; }
sub getPidComment				{ my $self = shift; return $self->{_pid_comment} || ''; }
sub getCreateDate				{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion			{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType			{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql						{ my $self = shift; return $self->{_sql} || ''; }
sub getTable					{ my $self = shift; return $self->{_table} || ''; }

1;
