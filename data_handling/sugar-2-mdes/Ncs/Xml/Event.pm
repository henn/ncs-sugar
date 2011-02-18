package Ncs::Xml::Event;

use strict;
use warnings;
use Ncs::Op;

use constant EVENT_TYPE_MIN					=> 1;
use constant EVENT_TYPE_MAX					=> 14;
use constant EVENT_DISP_CAT_MIN				=> 1;
use constant EVENT_DISP_CAT_MAX				=> 6;
use constant EVENT_INCENTIVE_TYPE_MIN		=> 1;
use constant EVENT_INCENTIVE_TYPE_MAX		=> 4;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_event_id					=> undef,
		_participant_id				=> undef,
		_event_type					=> undef,
		_event_type_oth				=> undef,
		_event_repeat_key			=> undef,
		_event_disp					=> undef,
		_event_disp_cat				=> undef,
		_event_start_date			=> undef,
		_event_start_time			=> undef,
		_event_end_date				=> undef,
		_event_end_time				=> undef,
		_event_breakoff				=> undef,
		_event_incentive_type		=> undef,
		_event_incent_cash			=> undef,
		_event_incentive_noncash	=> undef,
		_event_comment				=> undef,
		_create_date				=> undef,
		_table_spec_version			=> Ncs::Op::EVENT_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap					=> $soap,
		_table						=> Ncs::Db::DbDefs::EVENT_TABLE,
		_sql						=> 'select ID, EVENT_ID, EVENT_TYPE, EVENT_TYPE_OTH, ' .
										'EVENT_REPEAT_KEY, EVENT_DISP, EVENT_DISP_CAT, ' .
										'DATE_FORMAT(event_start_date, \'%Y-%m-%d\') AS EVENT_START_DATE, ' .
										'DATE_FORMAT(event_start_time, \'%H:%i\') AS EVENT_START_TIME, ' .
										'EVENT_END_DATE, DATE_FORMAT(event_end_time, \'%H:%i\') AS ' .
										'EVENT_END_TIME, EVENT_BREAKOFF, EVENT_INCENTIVE_TYPE, ' .
										'EVENT_INCENT_NONCASH, EVENT_COMMENT, ' .
										'DATE_FORMAT(date_entered, \'%Y-%m-%d\') AS CREATE_DATE from ' .
										Ncs::Db::DbDefs::EVENT_TABLE . 
										' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve event record id
	my $event_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::EVENT_SUGAR_MODULE, 
									id => $event_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve participant_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::EVENT_SUGAR_MODULE, 
									id => $event_sugar_id, 
									module2 => Ncs::Db::DbDefs::PARTICIPANT_SUGAR_MODULE});
	# retrieve field (participant_id) value
	my $participant_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PARTICIPANT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'p_id'});

	$self->{_psu_id}						= $psu_id_field_value;
	$self->{_event_id}						= $values->{EVENT_ID} || Ncs::Op::UNKNOWN;
	$self->{_participant_id}				= $participant_id_field_value;
	$self->{_event_type}					= Ncs::Op::atoi($values->{EVENT_TYPE}) || Ncs::Op::UNKNOWN;
	$self->{_event_type_oth}				= $values->{EVENT_TYPE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_event_repeat_key}				= $values->{EVENT_REPEAT_KEY} || 0;
	$self->{_event_disp}					= $values->{EVENT_DISP} || Ncs::Op::UNKNOWN;
	$self->{_event_disp_cat}				= Ncs::Op::atoi($values->{EVENT_DISP_CAT}) || Ncs::Op::UNKNOWN;
	$self->{_event_start_date}				= $values->{EVENT_START_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_event_start_time}				= $values->{EVENT_START_TIME} || Ncs::Op::UNKNOWN_TIME;
	$self->{_event_end_date}				= $values->{EVENT_END_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_event_end_time}				= $values->{EVENT_END_TIME} || Ncs::Op::UNKNOWN_TIME;
	$self->{_event_breakoff}				= $values->{EVENT_BREAKOFF} || Ncs::Op::UNKNOWN;
	$self->{_event_incentive_type}			= Ncs::Op::atoi($values->{EVENT_INCENTIVE_TYPE}) || Ncs::Op::UNKNOWN;
	$self->{_event_incent_cash}				= $values->{EVENT_INCENT_CASH} || 0;
	$self->{_event_incentive_noncash}		= $values->{EVENT_INCENT_NONCASH} || Ncs::Op::UNKNOWN;
	$self->{_event_comment}					= $values->{EVENT_COMMENT} || '';
	$self->{_create_date}					= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "EVENT_ID column exceeds allowed character length" unless ( length($self->{_event_id}) <= 36 );
	return "PARTICIPANT_ID column exceeds allowed character length" unless ( length($self->{_participant_id}) <= 36 );
	return "EVENT_TYPE column contains an invalid numeric value" unless ( ($self->{_event_type} >= EVENT_TYPE_MIN && 
																			$self->{_event_type} <= EVENT_TYPE_MAX) ||
																			$self->{_event_type} == Ncs::Op::OTHER || 
																			$self->{_event_type} == Ncs::Op::UNKNOWN ); 
	if ($self->{_event_type} != Ncs::Op::OTHER) { $self->{_event_type_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "EVENT_TYPE_OTH column exceeds allowed character length" unless ( length($self->{_event_type_oth}) <= 255 );
	return "EVENT_DISP_CAT column contains an invalid numeric value" unless ( ($self->{_event_disp_cat} >= EVENT_DISP_CAT_MIN && 
																				$self->{_event_disp_cat} <= EVENT_DISP_CAT_MAX) ||
																				$self->{_event_disp_cat} == Ncs::Op::UNKNOWN );
	return "EVENT_START_DATE column contains an invalid date format" unless ( $self->{_event_start_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "EVENT_START_TIME column contains an invalid date format" unless ( $self->{_event_start_time} =~ /^\d{2}:\d{2}$/ );
	return "EVENT_END_DATE column contains an invalid date format" unless ( $self->{_event_end_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "EVENT_END_TIME column contains an invalid date format" unless ( $self->{_event_end_time} =~ /^\d{2}:\d{2}$/ );
	return "EVENT_BREAKOFF column contains an invalid numeric value" unless ( $self->{_event_breakoff} == Ncs::Op::YES || 
																				$self->{_event_breakoff} == Ncs::Op::NO ||
																				$self->{_event_breakoff} == Ncs::Op::UNKNOWN );
	return "EVENT_INCENTIVE_TYPE column contains an invalid numeric value" unless ( ($self->{_event_incentive_type} >= EVENT_INCENTIVE_TYPE_MIN && 
																					$self->{_event_incentive_type} <= EVENT_INCENTIVE_TYPE_MAX) ||
																					$self->{_event_incentive_type} <= Ncs::Op::UNKNOWN );
	return "EVENT_INCENT_NONCASH column exceeds allowed character length" unless ( length($self->{_event_incentive_noncash}) <= 255 );
	return "EVENT_COMMENT column exceeds allowed character length" unless ( length($self->{_event_comment}) <= 8000 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<event>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<event_id>%s</event_id>\n", $self->{_event_id});
	$out .= sprintf("\t\t\t<participant_id>%s</participant_id>\n", $self->{_participant_id});
	$out .= sprintf("\t\t\t<event_type>%d</event_type>\n", $self->{_event_type});
	$out .= sprintf("\t\t\t<event_type_oth>%s</event_type_oth>\n", $self->{_event_type_oth});
	$out .= sprintf("\t\t\t<event_repeat_key>%d</event_repeat_key>\n", $self->{_event_repeat_key});
	$out .= sprintf("\t\t\t<event_disp>%d</event_disp>\n", $self->{_event_disp});
	$out .= sprintf("\t\t\t<event_disp_cat>%d</event_disp_cat>\n", $self->{_event_disp_cat});
	$out .= sprintf("\t\t\t<event_start_date>%s</event_start_date>\n", $self->{_event_start_date});
	$out .= sprintf("\t\t\t<event_start_time>%s</event_start_time>\n", $self->{_event_start_time});
	$out .= sprintf("\t\t\t<event_end_date>%s</event_end_date>\n", $self->{_event_end_date});
	$out .= sprintf("\t\t\t<event_end_time>%s</event_end_time>\n", $self->{_event_end_time});
	$out .= sprintf("\t\t\t<event_breakoff>%s</event_breakoff>\n", $self->{_event_breakoff});
	$out .= sprintf("\t\t\t<event_incentive_type>%d</event_incentive_type>\n", $self->{_event_incentive_type});
	$out .= sprintf("\t\t\t<event_incent_cash>%.2f</event_incent_cash>\n", $self->{_event_incent_cash});
	$out .= sprintf("\t\t\t<event_incentive_noncash>%s</event_incentive_noncash>\n", $self->{_event_incentive_noncash});
	$out .= sprintf("\t\t\t<event_comment>%s</event_comment>\n", $self->{_event_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</event>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getEventId						{ my $self = shift; return $self->{_event_id} || ''; }
sub getParticipantId				{ my $self = shift; return $self->{_participant_id} || ''; }
sub getEventType					{ my $self = shift; return $self->{_event_type} || ''; }
sub getEventTypeOth					{ my $self = shift; return $self->{_event_type_oth} || ''; }
sub getEventRepeatKey				{ my $self = shift; return $self->{_event_repeat_key} || ''; }
sub getEventDisp					{ my $self = shift; return $self->{_event_disp} || ''; }
sub getEventDispCat					{ my $self = shift; return $self->{_event_disp_cat} || ''; }
sub getEventStartDate				{ my $self = shift; return $self->{_event_start_date} || ''; }
sub getEventStartTime				{ my $self = shift; return $self->{_event_start_time} || ''; }
sub getEventEndDate					{ my $self = shift; return $self->{_event_end_date} || ''; }
sub getEventEndTime					{ my $self = shift; return $self->{_event_end_time} || ''; }
sub getEventBreakoff				{ my $self = shift; return $self->{_event_breakoff} || ''; }
sub getEventIncentiveType			{ my $self = shift; return $self->{_event_incentive_type} || ''; }
sub getEventIncentCash				{ my $self = shift; return $self->{_event_incent_cash} || ''; }
sub getEventIncentiveNoncash		{ my $self = shift; return $self->{_event_incentive_noncash} || ''; }
sub getEventComment					{ my $self = shift; return $self->{_event_comment} || ''; }
sub getCreateDate					{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
