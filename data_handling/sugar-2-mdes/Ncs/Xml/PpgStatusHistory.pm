package Ncs::Xml::PpgStatusHistory;

use strict;
use warnings;
use Ncs::Op;

use constant PPG_STATUS_MIN			=> 1;
use constant PPG_STATUS_MAX			=> 7;
use constant PPG_INFO_SOURCE_MIN	=> 1;
use constant PPG_INFO_SOURCE_MAX	=> 4;
use constant PPG_INFO_MODE_MIN		=> 1;
use constant PPG_INFO_MODE_MAX		=> 6;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_ppg_history_id				=> undef,
		_p_id						=> undef,
		_ppg_status					=> undef,
		_ppg_status_date			=> undef,
		_ppg_info_source			=> undef,
		_ppg_info_source_oth		=> undef,
		_ppg_info_mode				=> undef,
		_ppg_info_mode_oth			=> undef,
		_ppg_comment				=> undef,
		_create_date				=> undef,
		_sugar_soap					=> $soap,
		_table_spec_version			=> Ncs::Op::PPG_STATUS_HISTORY_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_table						=> Ncs::Db::DbDefs::PPG_STATUS_HISTORY_TABLE,
		_sql						=> 'select ID, PPG_HISTORY_ID, PPG_STATUS, PPG_STATUS_DATE, ' .
										'PPG_INFO_SOURCE, PPG_INFO_SOURCE_OTH, PPG_INFO_MODE, PPG_INFO_MODE_OTH, ' .
										'PPG_COMMENT, DATE_FORMAT(date_entered, \'%Y-%m-%d\') AS CREATE_DATE ' .
										'from ' . Ncs::Db::DbDefs::PPG_STATUS_HISTORY_TABLE . 
										' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve PPG status history record id
	my $ppg_status_history_sugar_id	= $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PPG_STATUS_HISTORY_SUGAR_MODULE, 
									id => $ppg_status_history_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve p_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PPG_STATUS_HISTORY_SUGAR_MODULE, 
									id => $ppg_status_history_sugar_id, 
									module2 => Ncs::Db::DbDefs::PARTICIPANT_SUGAR_MODULE});
	# retrieve field (p_id) value
	my $p_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PARTICIPANT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'p_id'});

	$self->{_psu_id}					= $psu_id_field_value;
	$self->{_ppg_history_id}			= $values->{PPG_HISTORY_ID} || Ncs::Op::UNKNOWN;
	$self->{_p_id}						= $p_id_field_value;
	$self->{_ppg_status}				= $values->{PPG_STATUS} || Ncs::Op::UNKNOWN;
	$self->{_ppg_status_date}			= $values->{PPG_STATUS_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_ppg_info_source}			= Ncs::Op::atoi($values->{PPG_INFO_SOURCE}) || Ncs::Op::UNKNOWN;
	$self->{_ppg_info_source_oth}		= $values->{PPG_INFO_SOURCE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_ppg_info_mode}				= Ncs::Op::atoi($values->{PPG_INFO_MODE}) || Ncs::Op::UNKNOWN;
	$self->{_ppg_info_mode_oth}			= $values->{PPG_INFO_MODE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_ppg_comment}				= $values->{PPG_COMMENT} || '';
	$self->{_create_date}				= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "PPG_HISTORY_ID column exceeds allowed character length" unless ( length($self->{_ppg_history_id}) <= 36 );
	return "P_ID column exceeds allowed character length" unless ( length($self->{_p_id}) <= 36 );
	return "PPG_STATUS column contains an invalid numeric value" unless ( $self->{_ppg_status} >= PPG_STATUS_MIN && 
																			$self->{_ppg_status} <= PPG_STATUS_MAX ||
																			$self->{_ppg_status} == Ncs::Op::UNKNOWN );
	return "PPG_STATUS_DATE column contains an invalid date format" unless ( $self->{_ppg_status_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "PPG_INFO_SOURCE column contains an invalid numeric value" unless ( ($self->{_ppg_info_source} >= PPG_INFO_SOURCE_MIN && 
																				$self->{_ppg_info_source} <= PPG_INFO_SOURCE_MAX) ||
																				$self->{_ppg_info_source} == Ncs::Op::OTHER ||
																				$self->{_ppg_info_source} == Ncs::Op::UNKNOWN );
	if ($self->{_ppg_info_source} != Ncs::Op::OTHER) { $self->{_ppg_info_source_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "PPG_INFO_SOURCE_OTH column exceeds allowed character length" unless ( length($self->{_ppg_info_source_oth}) <= 255 );
	return "PPG_INFO_MODE column contains an invalid numeric value" unless ( ($self->{_ppg_info_mode} >= PPG_INFO_MODE_MIN && 
																				$self->{_ppg_info_mode} <= PPG_INFO_MODE_MAX) ||
																				$self->{_ppg_info_mode} == Ncs::Op::OTHER ||
																				$self->{_ppg_info_mode} == Ncs::Op::UNKNOWN );
	if ($self->{_ppg_info_mode} != Ncs::Op::OTHER) { $self->{_ppg_info_mode_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "PPG_INFO_MODE_OTH column exceeds allowed character length" unless ( length($self->{_ppg_info_mode_oth}) <= 255 );
	return "PPG_COMMENT column exceeds allowed character length" unless ( length($self->{_ppg_comment}) <= 8000 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<ppg_status_history>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<ppg_history_id>%s</ppg_history_id>\n", $self->{_ppg_history_id});
	$out .= sprintf("\t\t\t<p_id>%s</p_id>\n", $self->{_p_id});
	$out .= sprintf("\t\t\t<ppg_status>%d</ppg_status>\n", $self->{_ppg_status});
	$out .= sprintf("\t\t\t<ppg_status_date>%s</ppg_status_date>\n", $self->{_ppg_status_date});
	$out .= sprintf("\t\t\t<ppg_info_source>%s</ppg_info_source>\n", $self->{_ppg_info_source});
	$out .= sprintf("\t\t\t<ppg_info_source_oth>%s</ppg_info_source_oth>\n", $self->{_ppg_info_source_oth});
	$out .= sprintf("\t\t\t<ppg_info_mode>%s</ppg_info_mode>\n", $self->{_ppg_info_mode});
	$out .= sprintf("\t\t\t<ppg_info_mode_oth>%s</ppg_info_mode_oth>\n", $self->{_ppg_info_mode_oth});
	$out .= sprintf("\t\t\t<ppg_comment>%s</ppg_comment>\n", $self->{_ppg_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</ppg_status_history>");

	return $out;
}

sub getPsuId				{ my $self = shift; return $self->{_psu_id} || ''; }
sub getPpgHistoryId			{ my $self = shift; return $self->{_ppg_history_id} || ''; }
sub getPId					{ my $self = shift; return $self->{_p_id} || ''; }
sub getPpgStatus			{ my $self = shift; return $self->{_ppg_status} || ''; }
sub getPpgStatusDate		{ my $self = shift; return $self->{_ppg_status_date} || ''; }
sub getPpgInfoSource		{ my $self = shift; return $self->{_ppg_info_source} || ''; }
sub getPpgInfoSourceOth		{ my $self = shift; return $self->{_ppg_info_source_oth} || ''; }
sub getPpgInfoMode			{ my $self = shift; return $self->{_ppg_info_mode} || ''; }
sub getPpgInfoModeOth		{ my $self = shift; return $self->{_ppg_info_mode_oth} || ''; }
sub getPpgComment			{ my $self = shift; return $self->{_ppg_comment} || ''; }
sub getCreateDate			{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion		{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType		{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql					{ my $self = shift; return $self->{_sql} || ''; }
sub getTable				{ my $self = shift; return $self->{_table} || ''; }

1;
