package Ncs::Xml::Instrument;

use strict;
use warnings;
use Ncs::Op;

use constant INSTRUMENT_TYPE_MIN		=> 1;
use constant INSTRUMENT_TYPE_MAX		=> 13;
use constant INS_STATUS_MIN				=> 1;
use constant INS_STATUS_MAX				=> 4;
use constant INS_MODE_MIN				=> 1;
use constant INS_MODE_MAX				=> 5;
use constant INS_METHOD_MIN				=> 1;
use constant INS_METHOD_MAX				=> 2;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_instrument_id				=> undef,
		_event_id					=> undef,
		_instrument_type			=> undef,
		_instrument_type_oth		=> undef,
		_instrument_version			=> undef,
		_instrument_repeat_key		=> undef,
		_ins_start_time				=> undef,
		_ins_end_time				=> undef,
		_ins_date_start				=> undef,
		_ins_date_end				=> undef,
		_ins_breakof				=> undef,
		_ins_status					=> undef,
		_ins_mode					=> undef,
		_ins_mode_oth				=> undef,
		_ins_method					=> undef,
		_sup_review					=> undef,
		_data_problem				=> undef,
		_instru_comment				=> undef,
		_create_date				=> undef,
		_table_spec_version			=> Ncs::Op::INSTRUMENT_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap					=> $soap,
		_table						=> Ncs::Db::DbDefs::INSTRUMENT_TABLE,
		_sql						=> 'select ID, INSTRUMENT_ID, INSTRUMENT_TYPE, ' .
										'INSTRUMENT_TYPE_OTH, INSTRUMENT_VERSION, INSTRUMENT_REPEAT_KEY, ' .
										'DATE_FORMAT(ins_start_time, \'%H:%i\') AS INS_START_TIME, ' .
										'DATE_FORMAT(ins_end_time, \'%H:%i\') AS INS_END_TIME, ' .
										'DATE_FORMAT(ins_date_start, \'%Y-%m-%d\') AS INS_DATE_START, ' .
										'DATE_FORMAT(ins_date_end, \'%Y-%m-%d\') AS INS_DATE_END, ' .
										'INS_BREAKOFF, INS_STATUS, INS_MODE, INS_MODE_OTH, INS_METHOD, ' .
										'SUP_REVIEW, DATA_PROBLEM, INSTRU_COMMENT, DATE_FORMAT(date_entered, ' .
										'\'%Y-%m-%d\') AS CREATE_DATE from ' . 
										Ncs::Db::DbDefs::INSTRUMENT_TABLE . 
										' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve instrument record id
	my $instrument_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::INSTRUMENT_SUGAR_MODULE, 
									id => $instrument_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve event_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::INSTRUMENT_SUGAR_MODULE, 
									id => $instrument_sugar_id, 
									module2 => Ncs::Db::DbDefs::EVENT_SUGAR_MODULE});
	# retrieve field (event_id) value
	my $event_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::EVENT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'event_id'});

	$self->{_psu_id}						= $psu_id_field_value;
	$self->{_instrument_id}					= $values->{INSTRUMENT_ID} || Ncs::Op::UNKNOWN;
	$self->{_event_id}						= $event_id_field_value;
	$self->{_instrument_type}				= Ncs::Op::atoi($values->{INSTRUMENT_TYPE}) || Ncs::Op::UNKNOWN;
	$self->{_instrument_type_oth}			= $values->{INSTRUMENT_TYPE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_instrument_version}			= $values->{INSTRUMENT_VERSION} || Ncs::Op::UNKNOWN;
	$self->{_instrument_repeat_key}			= $values->{INSTRUMENT_REPEAT_KEY} || 0;
	$self->{_ins_start_time}				= $values->{INS_START_TIME} || Ncs::Op::UNKNOWN_TIME;
	$self->{_ins_end_time}					= $values->{INS_END_TIME} || Ncs::Op::UNKNOWN_TIME;
	$self->{_ins_date_start}				= $values->{INS_DATE_START} || Ncs::Op::UNKNOWN_DATE;
	$self->{_ins_date_end}					= $values->{INS_DATE_END} || Ncs::Op::UNKNOWN_DATE;
	$self->{_ins_breakof}					= $values->{INS_BREAKOFF} || Ncs::Op::UNKNOWN;
	$self->{_ins_status}					= Ncs::Op::atoi($values->{INS_STATUS}) || Ncs::Op::UNKNOWN;
	$self->{_ins_mode}						= Ncs::Op::atoi($values->{INS_MODE}) || Ncs::Op::UNKNOWN;
	$self->{_ins_mode_oth}					= $values->{INS_MODE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_ins_method}					= $values->{INS_METHOD} || Ncs::Op::UNKNOWN;
	$self->{_sup_review}					= $values->{SUP_REVIEW} || Ncs::Op::UNKNOWN;
	$self->{_data_problem}					= $values->{DATA_PROBLEM} || Ncs::Op::UNKNOWN;
	$self->{_instru_comment}				= $values->{INSTRU_COMMENT} || Ncs::Op::UNKNOWN;
	$self->{_create_date}					= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "INSTRUMENT_ID column exceeds allowed character length" unless ( length($self->{_instrument_id}) <= 36 );
	return "EVENT_ID column exceeds allowed character length" unless ( length($self->{_event_id}) <= 36 );
	return "INSTRUMENT_TYPE column contains an invalid numeric value" unless ( ($self->{_instrument_type} >= INSTRUMENT_TYPE_MIN && 
																				$self->{_instrument_type} <= INSTRUMENT_TYPE_MAX) ||
																				$self->{_instrument_type} == Ncs::Op::OTHER || 
																				$self->{_instrument_type} == Ncs::Op::UNKNOWN ); 
	if ($self->{_instrument_type} != Ncs::Op::OTHER) { $self->{_instrument_type_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "INSTRUMENT_TYPE_OTH column exceeds allowed character length" unless ( length($self->{_instrument_type_oth}) <= 255 );
	return "INSTRUMENT_VERSION column exceeds allowed character length" unless ( length($self->{_instrument_version}) <= 36 );
	return "INS_START_TIME column contains an invalid date format" unless ( $self->{_ins_start_time} =~ /^\d{2}:\d{2}$/ );
	return "INS_END_TIME column contains an invalid date format" unless ( $self->{_ins_end_time} =~ /^\d{2}:\d{2}$/ );
	return "INS_DATE_START column contains an invalid date format" unless ( $self->{_ins_date_start} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "INS_DATE_END column contains an invalid date format" unless ( $self->{_ins_date_end} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "INS_BREAKOFF column contains an invalid numeric value" unless ( $self->{_ins_breakof} == Ncs::Op::YES || 
																				$self->{_ins_breakof} == Ncs::Op::NO ||
																				$self->{_ins_breakof} == Ncs::Op::UNKNOWN );
	return "INS_STATUS column contains an invalid numeric value" unless ( ($self->{_ins_status} >= INS_STATUS_MIN && 
																			$self->{_ins_status} <= INS_STATUS_MAX) ||
																			$self->{_ins_status} == Ncs::Op::UNKNOWN );
	return "INS_MODE column contains an invalid numeric value" unless ( ($self->{_ins_mode} >= INS_MODE_MIN && 
																			$self->{_ins_mode} <= INS_MODE_MAX) ||
																			$self->{_ins_mode} == Ncs::Op::OTHER || 
																			$self->{_ins_mode} == Ncs::Op::UNKNOWN ); 
	if ($self->{_ins_mode} != Ncs::Op::OTHER) { $self->{_ins_mode_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "INS_MODE_OTH column exceeds allowed character length" unless ( length($self->{_ins_mode_oth}) <= 255 );
	return "INS_METHOD column contains an invalid numeric value" unless ( ($self->{_ins_method} >= INS_METHOD_MIN && 
																			$self->{_ins_method} <= INS_METHOD_MAX) ||
																			$self->{_ins_method} == Ncs::Op::UNKNOWN );
	return "SUP_REVIEW column contains an invalid numeric value" unless ( $self->{_sup_review} == Ncs::Op::YES || 
																			$self->{_sup_review} == Ncs::Op::NO ||
																			$self->{_sup_review} == Ncs::Op::UNKNOWN );
	return "DATA_PROBLEM column contains an invalid numeric value" unless ( $self->{_data_problem} == Ncs::Op::YES || 
																			$self->{_data_problem} == Ncs::Op::NO ||
																			$self->{_data_problem} == Ncs::Op::UNKNOWN );
	return "INSTRU_COMMENT column exceeds allowed character length" unless ( length($self->{_instru_comment}) <= 8000 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<instrument>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<instrument_id>%s</instrument_id>\n", $self->{_instrument_id});
	$out .= sprintf("\t\t\t<event_id>%s</event_id>\n", $self->{_event_id});
	$out .= sprintf("\t\t\t<instrument_type>%d</instrument_type>\n", $self->{_instrument_type});
	$out .= sprintf("\t\t\t<instrument_type_oth>%s</instrument_type_oth>\n", $self->{_instrument_type_oth});
	$out .= sprintf("\t\t\t<instrument_version>%s</instrument_version>\n", $self->{_instrument_version});
	$out .= sprintf("\t\t\t<instrument_repeat_key>%d</instrument_repeat_key>\n", $self->{_instrument_repeat_key});
	$out .= sprintf("\t\t\t<ins_start_time>%s</ins_start_time>\n", $self->{_ins_start_time});
	$out .= sprintf("\t\t\t<ins_end_time>%s</ins_end_time>\n", $self->{_ins_end_time});
	$out .= sprintf("\t\t\t<ins_date_start>%s</ins_date_start>\n", $self->{_ins_date_start});
	$out .= sprintf("\t\t\t<ins_date_end>%s</ins_date_end>\n", $self->{_ins_date_end});
	$out .= sprintf("\t\t\t<ins_breakof>%d</ins_breakof>\n", $self->{_ins_breakof});
	$out .= sprintf("\t\t\t<ins_status>%d</ins_status>\n", $self->{_ins_status});
	$out .= sprintf("\t\t\t<ins_mode>%d</ins_mode>\n", $self->{_ins_mode});
	$out .= sprintf("\t\t\t<ins_mode_oth>%s</ins_mode_oth>\n", $self->{_ins_mode_oth});
	$out .= sprintf("\t\t\t<ins_method>%d</ins_method>\n", $self->{_ins_method});
	$out .= sprintf("\t\t\t<sup_review>%d</sup_review>\n", $self->{_sup_review});
	$out .= sprintf("\t\t\t<data_problem>%d</data_problem>\n", $self->{_data_problem});
	$out .= sprintf("\t\t\t<instru_comment>%s</instru_comment>\n", $self->{_instru_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</instrument>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getInstrumentId					{ my $self = shift; return $self->{_instrument_id} || ''; }
sub getEventId						{ my $self = shift; return $self->{_event_id} || ''; }
sub getInstrumentType				{ my $self = shift; return $self->{_instrument_type} || ''; }
sub getInstrumentTypeOth			{ my $self = shift; return $self->{_instrument_type_oth} || ''; }
sub getInstrumentVersion			{ my $self = shift; return $self->{_instrument_version} || ''; }
sub getInsRepeatKey				{ my $self = shift; return $self->{_ins_repeat_key} || ''; }
sub getInsStartTime					{ my $self = shift; return $self->{_ins_start_time} || ''; }
sub getInsEndTime					{ my $self = shift; return $self->{_ins_end_time} || ''; }
sub getInsDateStart					{ my $self = shift; return $self->{_ins_date_start} || ''; }
sub getInsDateEnd					{ my $self = shift; return $self->{_ins_date_end} || ''; }
sub getInsBreakoff					{ my $self = shift; return $self->{_ins_breakof} || ''; }
sub getInsStatus					{ my $self = shift; return $self->{_ins_status} || ''; }
sub getInsMode						{ my $self = shift; return $self->{_ins_mode} || ''; }
sub getInsModeOth					{ my $self = shift; return $self->{_ins_mode_oth} || ''; }
sub getInsMethod					{ my $self = shift; return $self->{_ins_method} || ''; }
sub getSupReview					{ my $self = shift; return $self->{_sup_review} || ''; }
sub getDataProblem					{ my $self = shift; return $self->{_data_problem} || ''; }
sub getInstruComment				{ my $self = shift; return $self->{_instru_comment} || ''; }
sub getCreateDate					{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
