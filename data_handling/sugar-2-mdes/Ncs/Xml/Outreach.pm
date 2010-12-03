package Ncs::Xml::Outreach;

use strict;
use warnings;
use Ncs::Op;

use constant OUTREACH_TARGET_MIN		=> 1;
use constant OUTREACH_TARGET_MAX		=> 34;
use constant OUTREACH_MODE_MIN			=> 1;
use constant OUTREACH_MODE_MAX			=> 12;
use constant OUTREACH_TYPE_MIN			=> 1;
use constant OUTREACH_TYPE_MAX			=> 22;
use constant OUTREACH_LANG2_MIN			=> 1;
use constant OUTREACH_LANG2_MAX			=> 17;
use constant OUTREACH_RACE2_MIN			=> 1;
use constant OUTREACH_RACE2_MAX			=> 6;
use constant OUTREACH_CULTURE2_MIN		=> 1;
use constant OUTREACH_CULTURE2_MAX		=> 18;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id							=> undef,
		_tsu_id							=> undef,
		_outreach_event_id				=> undef,
		_outreach_event_date			=> undef,
		_outreach_target				=> undef,
		_outreach_target_oth			=> undef,
		_outreach_mode					=> undef,
		_outreach_mode_oth				=> undef,
		_outreach_type					=> undef,
		_outreach_type_oth				=> undef,
		_outreach_tailored				=> undef,
		_outreach_lang1					=> undef,
		_outreach_lang2					=> undef,
		_outreach_lang_oth				=> undef,
		_outreach_race1					=> undef,
		_outreach_race2					=> undef,
		_outreach_race_oth				=> undef,
		_outreach_culture1				=> undef,
		_outreach_culture2				=> undef,
		_outreach_culture_oth			=> undef,
		_outreach_quantity				=> undef,
		_outreach_cost					=> undef,
		_outreach_staffing				=> undef,
		_outreach_incident				=> undef,
		_incident_id					=> undef,
		_create_date					=> undef,
		_table_spec_version				=> Ncs::Op::OUTREACH_VERSION,
		_transaction_type				=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap						=> $soap,
		_table							=> Ncs::Db::DbDefs::OUTREACH_TABLE,
		_sql							=> 'select ID, OUTREACH_EVENT_ID, ' .
											'DATE_FORMAT(OUTREACH_EVENT_DATE, \'%Y-%m-%d\') AS OUTREACH_EVENT_DATE, ' . 
											'OUTREACH_TARGET, OUTREACH_TARGET_OTH, OUTREACH_MODE, OUTREACH_MODE_OTH, ' .
											'OUTREACH_TYPE, OUTREACH_TYPE_OTH, OUTREACH_TAILORED, OUTREACH_LANG1, ' .
											'OUTREACH_LANG2, OUTREACH_LANG_OTH, OUTREACH_RACE1, OUTREACH_RACE2, ' .
											'OUTREACH_RACE_OTH, OUTREACH_CULTURE1, OUTREACH_CULTURE2, ' .
											'OUTREACH_CULTURE_OTH, OUTREACH_QUANTITY, OUTREACH_COST, OUTREACH_STAFFING, ' .
											'OUTREACH_INCIDENT, DATE_FORMAT(CREATE_DATE, \'%Y-%m-%d\') AS ' .
											'CREATE_DATE from ' . Ncs::Db::DbDefs::OUTREACH_TABLE
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve sugar outreach record d
	my $outreach_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::OUTREACH_SUGAR_MODULE, 
									id => $outreach_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve tsu id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::OUTREACH_SUGAR_MODULE, 
									id => $outreach_sugar_id, 
									module2 => Ncs::Db::DbDefs::TSU_SUGAR_MODULE});
	# retrieve field (tsu_id) value
	my $tsu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::TSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'tsu_id'});

	# retrieve incident id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::OUTREACH_SUGAR_MODULE, 
									id => $outreach_sugar_id, 
									module2 => Ncs::Db::DbDefs::INCIDENT_SUGAR_MODULE});
	# retrieve field (incident_id) value
	my $incident_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::INCIDENT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'incident_id'});

	$self->{_psu_id}						= $psu_id_field_value;
	$self->{_tsu_id}						= $tsu_id_field_value;
	$self->{_outreach_event_id}				= $values->{OUTREACH_EVENT_ID} || Ncs::Op::UNKNOWN;
	$self->{_outreach_event_date}			= $values->{OUTREACH_EVENT_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_outreach_target}				= Ncs::Op::atoi($values->{OUTREACH_TARGET}) || Ncs::Op::UNKNOWN;
	$self->{_outreach_target_oth}			= $values->{OUTREACH_TARGET_OTH} || Ncs::Op::UNKNOWN;
	$self->{_outreach_mode}					= Ncs::Op::atoi($values->{OUTREACH_MODE}) || Ncs::Op::UNKNOWN;
	$self->{_outreach_mode_oth}				= $values->{OUTREACH_MODE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_outreach_type}					= Ncs::Op::atoi($values->{OUTREACH_TYPE}) || Ncs::Op::UNKNOWN;
	$self->{_outreach_type_oth}				= $values->{OUTREACH_TYPE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_outreach_tailored}				= Ncs::Op::atoi($values->{OUTREACH_TAILORED}) || Ncs::Op::UNKNOWN;
	$self->{_outreach_lang1}				= Ncs::Op::atoi($values->{OUTREACH_LANG1}) || Ncs::Op::UNKNOWN;
	$self->{_outreach_lang2}				= Ncs::Op::atoi($values->{OUTREACH_LANG2}) || Ncs::Op::UNKNOWN;
	$self->{_outreach_lang_oth}				= $values->{OUTREACH_LANG_OTH} || Ncs::Op::UNKNOWN;
	$self->{_outreach_race1}				= Ncs::Op::atoi($values->{OUTREACH_RACE1}) || Ncs::Op::UNKNOWN;
	$self->{_outreach_race2}				= Ncs::Op::atoi($values->{OUTREACH_RACE2}) || Ncs::Op::UNKNOWN;
	$self->{_outreach_race_oth}				= $values->{OUTREACH_RACE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_outreach_culture1}				= Ncs::Op::atoi($values->{OUTREACH_CULTURE1}) || Ncs::Op::UNKNOWN;
	$self->{_outreach_culture2}				= Ncs::Op::atoi($values->{OUTREACH_CULTURE2}) || Ncs::Op::UNKNOWN;
	$self->{_outreach_culture_oth}			= $values->{OUTREACH_CULTURE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_outreach_quantity}				= $values->{OUTREACH_QUANTITY} || defined($values->{OUTREACH_QUANTITY}) ? 0 : Ncs::Op::UNKNOWN;
	$self->{_outreach_cost}					= $values->{OUTREACH_COST} || Ncs::Op::UNKNOWN;
	$self->{_outreach_staffing}				= $values->{OUTREACH_STAFFING} || Ncs::Op::UNKNOWN;
	$self->{_outreach_incident}				= Ncs::Op::atoi($values->{OUTREACH_INCIDENT}) || Ncs::Op::UNKNOWN;
	$self->{_incident_id}					= $incident_id_field_value;
	$self->{_create_date}					= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "TSU_ID column exceeds allowed character length" unless ( length($self->{_tsu_id}) <= 36 );
	return "OUTREACH_EVENT_ID column exceeds allowed character length" unless ( length($self->{_outreach_event_id}) <= 36 );
	return "OUTREACH_EVENT_DATE column contains an invalid date format" unless ( $self->{_outreach_event_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "OUTREACH_TARGET column contains an invalid numeric value" unless ( ($self->{_outreach_target} >= OUTREACH_TARGET_MIN && 
																			$self->{_outreach_target} <= OUTREACH_TARGET_MAX) ||
																			$self->{_outreach_target} == Ncs::Op::OTHER ||
																			$self->{_outreach_target} == Ncs::Op::UNKNOWN );
	if ($self->{_outreach_target} != Ncs::Op::OTHER) { $self->{_outreach_target_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "OUTREACH_TARGET_OTH column exceeds allowed character length" unless ( length($self->{_outreach_target_oth}) <= 255 );
	return "OUTREACH_MODE column contains an invalid numeric value" unless ( ($self->{_outreach_mode} >= OUTREACH_MODE_MIN && 
																			$self->{_outreach_mode} <= OUTREACH_MODE_MAX) ||
																			$self->{_outreach_mode} == Ncs::Op::OTHER ||
																			$self->{_outreach_mode} == Ncs::Op::UNKNOWN );
	if ($self->{_outreach_mode} != Ncs::Op::OTHER) { $self->{_outreach_mode_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "OUTREACH_MODE_OTH column exceeds allowed character length" unless ( length($self->{_outreach_mode_oth}) <= 255 );
	return "OUTREACH_TYPE column contains an invalid numeric value" unless ( ($self->{_outreach_type} >= OUTREACH_TYPE_MIN && 
																			$self->{_outreach_type} <= OUTREACH_TYPE_MAX) ||
																			$self->{_outreach_type} == Ncs::Op::OTHER ||
																			$self->{_outreach_type} == Ncs::Op::UNKNOWN );
	if ($self->{_outreach_type} != Ncs::Op::OTHER) { $self->{_outreach_type_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "OUTREACH_TYPE_OTH column exceeds allowed character length" unless ( length($self->{_outreach_type_oth}) <= 255 );
	return "OUTREACH_TAILORED column contains an invalid numeric value" unless ( $self->{_outreach_tailored} == Ncs::Op::YES || 
																			$self->{_outreach_tailored} == Ncs::Op::NO ||
																			$self->{_outreach_tailored} == Ncs::Op::UNKNOWN );
	return "OUTREACH_LANG1 column contains an invalid numeric value" unless ( $self->{_outreach_lang1} == Ncs::Op::YES || 
																			$self->{_outreach_lang1} == Ncs::Op::NO ||
																			$self->{_outreach_lang1} == Ncs::Op::UNKNOWN );
	return "OUTREACH_LANG2 column contains an invalid numeric value" unless ( ($self->{_outreach_lang2} >= OUTREACH_LANG2_MIN && 
																			$self->{_outreach_lang2} <= OUTREACH_LANG2_MAX) ||
																			$self->{_outreach_lang2} == Ncs::Op::REFUSED ||
																			$self->{_outreach_lang2} == Ncs::Op::UNKNOWN ||
																			$self->{_outreach_lang2} == Ncs::Op::NOT_APPLICABLE ||
																			$self->{_outreach_lang2} == Ncs::Op::OTHER );
	if ($self->{_outreach_lang2} != Ncs::Op::OTHER) { $self->{_outreach_lang_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "OUTREACH_LANG_OTH column exceeds allowed character length" unless ( length($self->{_outreach_lang_oth}) <= 255 );
	return "OUTREACH_RACE1 column contains an invalid numeric value" unless ( $self->{_outreach_race1} == Ncs::Op::YES || 
																			$self->{_outreach_race1} == Ncs::Op::NO ||
																			$self->{_outreach_race1} == Ncs::Op::UNKNOWN );
	return "OUTREACH_RACE2 column contains an invalid numeric value" unless ( ($self->{_outreach_race2} >= OUTREACH_RACE2_MIN && 
																			$self->{_outreach_race2} <= OUTREACH_RACE2_MAX) ||
																			$self->{_outreach_race2} == Ncs::Op::NOT_APPLICABLE ||
																			$self->{_outreach_race2} == Ncs::Op::OTHER ||
																			$self->{_outreach_race2} == Ncs::Op::UNKNOWN );
	if ($self->{_outreach_race2} != Ncs::Op::OTHER) { $self->{_outreach_race_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "OUTREACH_RACE_OTH column exceeds allowed character length" unless ( length($self->{_outreach_race_oth}) <= 255 );
	return "OUTREACH_CULTURE1 column contains an invalid numeric value" unless ( $self->{_outreach_culture1} == Ncs::Op::YES || 
																			$self->{_outreach_culture1} == Ncs::Op::NO ||
																			$self->{_outreach_culture1} == Ncs::Op::UNKNOWN );
	return "OUTREACH_CULTURE2 column contains an invalid numeric value" unless ( ($self->{_outreach_culture2} >= OUTREACH_CULTURE2_MIN && 
																			$self->{_outreach_culture2} <= OUTREACH_CULTURE2_MAX) ||
																			$self->{_outreach_culture2} == Ncs::Op::NOT_APPLICABLE ||
																			$self->{_outreach_culture2} == Ncs::Op::OTHER ||
																			$self->{_outreach_culture2} == Ncs::Op::UNKNOWN );
	if ($self->{_outreach_culture2} != Ncs::Op::OTHER) { $self->{_outreach_culture_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "OUTREACH_CULTURE_OTH column exceeds allowed character length" unless ( length($self->{_outreach_culture_oth}) <= 255 );
	return "OUTREACH_INCIDENT column contains an invalid numeric value" unless ( $self->{_outreach_incident} == Ncs::Op::YES || 
																			$self->{_outreach_incident} == Ncs::Op::NO ||
																			$self->{_outreach_incident} == Ncs::Op::UNKNOWN );
	return "INCIDENT_ID column exceeds allowed character length" unless ( length($self->{_incident_id}) <= 36 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<outreach>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<tsu_id>%s</tsu_id>\n", $self->{_tsu_id});
	$out .= sprintf("\t\t\t<outreach_event_id>%s</outreach_event_id>\n", $self->{_outreach_event_id});
	$out .= sprintf("\t\t\t<outreach_event_date>%s</outreach_event_date>\n", $self->{_outreach_event_date});
	$out .= sprintf("\t\t\t<outreach_target>%d</outreach_target>\n", $self->{_outreach_target});
	$out .= sprintf("\t\t\t<outreach_target_oth>%s</outreach_target_oth>\n", $self->{_outreach_target_oth});
	$out .= sprintf("\t\t\t<outreach_mode>%s</outreach_mode>\n", $self->{_outreach_mode});
	$out .= sprintf("\t\t\t<outreach_mode_oth>%s</outreach_mode_oth>\n", $self->{_outreach_mode_oth});
	$out .= sprintf("\t\t\t<outreach_type>%d</outreach_type>\n", $self->{_outreach_type});
	$out .= sprintf("\t\t\t<outreach_type_oth>%s</outreach_type_oth>\n", $self->{_outreach_type_oth});
	$out .= sprintf("\t\t\t<outreach_tailored>%s</outreach_tailored>\n", $self->{_outreach_tailored});
	$out .= sprintf("\t\t\t<outreach_lang1>%s</outreach_lang1>\n", $self->{_outreach_lang1});
	$out .= sprintf("\t\t\t<outreach_lang2>%d</outreach_lang2>\n", $self->{_outreach_lang2});
	$out .= sprintf("\t\t\t<outreach_lang_oth>%s</outreach_lang_oth>\n", $self->{_outreach_lang_oth});
	$out .= sprintf("\t\t\t<outreach_race1>%s</outreach_race1>\n", $self->{_outreach_race1});
	$out .= sprintf("\t\t\t<outreach_race2>%d</outreach_race2>\n", $self->{_outreach_race2});
	$out .= sprintf("\t\t\t<outreach_race_oth>%s</outreach_race_oth>\n", $self->{_outreach_race_oth});
	$out .= sprintf("\t\t\t<outreach_culture1>%s</outreach_culture1>\n", $self->{_outreach_culture1});
	$out .= sprintf("\t\t\t<outreach_culture2>%s</outreach_culture2>\n", $self->{_outreach_culture2});
	$out .= sprintf("\t\t\t<outreach_culture_oth>%s</outreach_culture_oth>\n", $self->{_outreach_culture_oth});
	$out .= sprintf("\t\t\t<outreach_quantity>%d</outreach_quantity>\n", $self->{_outreach_quantity});
	$out .= sprintf("\t\t\t<outreach_cost>%s</outreach_cost>\n", $self->{_outreach_cost});
	$out .= sprintf("\t\t\t<outreach_staffing>%d</outreach_staffing>\n", $self->{_outreach_staffing});
	$out .= sprintf("\t\t\t<outreach_incident>%s</outreach_incident>\n", $self->{_outreach_incident});
	$out .= sprintf("\t\t\t<incident_id>%s</incident_id>\n", $self->{_incident_id});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</outreach>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getTsuId						{ my $self = shift; return $self->{_tsu_id} || ''; }
sub getOutreachEventId				{ my $self = shift; return $self->{_outreach_event_id} || ''; }
sub getOutreachEventDate			{ my $self = shift; return $self->{_outreach_event_date} || ''; }
sub getOutreachTarget				{ my $self = shift; return $self->{_outreach_target} || ''; }
sub getOutreachTargetOth			{ my $self = shift; return $self->{_outreach_target_oth} || ''; }
sub getOutreachMode					{ my $self = shift; return $self->{_outreach_mode} || ''; }
sub getOutreachModeOth				{ my $self = shift; return $self->{_outreach_mode_oth} || ''; }
sub getOutreachType					{ my $self = shift; return $self->{_outreach_type} || ''; }
sub getOutreachTypeOth				{ my $self = shift; return $self->{_outreach_type_oth} || ''; }
sub getOutreachTailored				{ my $self = shift; return $self->{_outreach_tailored} || ''; }
sub getOutreachLang1				{ my $self = shift; return $self->{_outreach_lang1} || ''; }
sub getOutreachLang2				{ my $self = shift; return $self->{_outreach_lang2} || ''; }
sub getOutreachLangOth				{ my $self = shift; return $self->{_outreach_lang_oth} || ''; }
sub getOutreachRace1				{ my $self = shift; return $self->{_outreach_race1} || ''; }
sub getOutreachRace2				{ my $self = shift; return $self->{_outreach_race2} || ''; }
sub getOutreachRaceOth				{ my $self = shift; return $self->{_outreach_race_oth} || ''; }
sub getOutreachCulture1				{ my $self = shift; return $self->{_outreach_culture1} || ''; }
sub getOutreachCulture2				{ my $self = shift; return $self->{_outreach_culture2} || ''; }
sub getOutreachCultureOth			{ my $self = shift; return $self->{_outreach_culture_oth} || ''; }
sub getOutreachQuantity				{ my $self = shift; return $self->{_outreach_quantity} || ''; }
sub getOutreachCost					{ my $self = shift; return $self->{_outreach_cost} || ''; }
sub getOutreachStaffing				{ my $self = shift; return $self->{_outreach_staffing} || ''; }
sub getOutreachIncident				{ my $self = shift; return $self->{_outreach_incident} || ''; }
sub getIncidentId					{ my $self = shift; return $self->{_incident_id} || ''; }
sub getCreateDate					{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
