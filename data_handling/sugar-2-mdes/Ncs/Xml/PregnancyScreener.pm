package Ncs::Xml::PregnancyScreener;

use strict;
use warnings;
use Ncs::Op;
use Ncs::Instr;

use constant PREGNANCY_SCREEN 				=> 8;
use constant ENHANCED_HOUSEHOLD_ENUMERATION => 1;
use constant TWO_TIER_HIGH_INTENSITY		=> 3;


sub new
{
	my ($class, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_ps_id						=> undef,
		_recruit_type				=> undef,
		_du_id						=> undef,
		_p_id						=> undef,
		_event_id					=> undef,
		_event_type					=> undef,
		_event_repeat_key			=> undef,
		_instrument_id				=> undef,
		_instrument_type			=> undef,
		_instrument_version			=> undef,
		_instrument_repeat_key		=> undef,
		_time_stamp_1				=> undef,
		_person_dob					=> undef,
		_age						=> undef,
		_age_range					=> undef,
		_ps_status_1				=> undef,
		_time_stamp_2				=> undef,
		_address_id					=> undef,
		_address_1					=> undef,
		_address_2					=> undef,
		_unit						=> undef,
		_city						=> undef,
		_state						=> undef,
		_zip						=> undef,
		_zip4						=> undef,
		_du_elig_confirm			=> undef,
		_own_home					=> undef,
		_own_home_oth				=> undef,
		_time_stamp_3				=> undef,
		_proxy						=> undef,
		_e_minor					=> undef,
		_time_stamp_4				=> undef,
		_know_ncs					=> undef,
		_time_stamp_5				=> undef,
		_pregnant					=> undef,
		_orig_due_date				=> undef,
		_date_period				=> undef,
		_weeks_preg					=> undef,
		_month_preg					=> undef,
		_trimester					=> undef,
		_time_stamp_6				=> undef,
		_trying						=> undef,
		_hyster						=> undef,
		_ovaries					=> undef,
		_tubes_tied					=> undef,
		_menopause					=> undef,
		_med_unable					=> undef,
		_med_unable_oth				=> undef,
		_time_stamp_7				=> undef,
		_maristat					=> undef,
		_maristat_oth				=> undef,
		_educ						=> undef,
		_employ						=> undef,
		_employ_oth					=> undef,
		_ethnicity					=> undef,
		_race_oth					=> undef,
		_person_lang				=> undef,
		_person_lang_oth			=> undef,
		_hh_members					=> undef,
		_income						=> undef,
		_time_stamp_8				=> undef,
		_r_fname					=> undef,
		_r_lname					=> undef,
		_m_fname					=> undef,
		_m_lname					=> undef,
		_phone_nbr					=> undef,
		_phone_nbr_oth				=> undef,
		_phone_type					=> undef,
		_phone_type_oth				=> undef,
		_home_phone					=> undef,
		_same_addr					=> undef,
		_mail_address_id			=> undef,
		_mail_address_1				=> undef,
		_mail_address_2				=> undef,
		_mail_unit					=> undef,
		_mail_city					=> undef,
		_mail_state					=> undef,
		_mail_zip					=> undef,
		_mail_zip4					=> undef,
		_have_email					=> undef,
		_email						=> undef,
		_email_type					=> undef,
		_email_share				=> undef,
		_plan_move					=> undef,
		_where_move					=> undef,
		_move_info					=> undef,
		_new_address_id				=> undef,
		_new_address_1				=> undef,
		_new_address_2				=> undef,
		_new_unit					=> undef,
		_new_city					=> undef,
		_new_state					=> undef,
		_new_zip					=> undef,
		_new_zip4					=> undef,
		_when_move					=> undef,
		_date_move					=> undef,
		_time_stamp_9				=> undef,
		_ppg_first					=> undef,
		_time_stamp_10				=> undef,
		_english					=> undef,
		_contact_lang				=> undef,
		_contact_lang_oth			=> undef,
		_interpret					=> undef,
		_contact_interpret			=> undef,
		_contact_interpret_oth		=> undef,
		_time_stamp_11				=> undef,
		_table_spec_version			=> Ncs::Instr::PREGNANCY_SCREENER_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_table						=> 'PREGNANCY_SCREENER',
		_sql						=> 'select PSU_ID, PS_ID, RECRUIT_TYPE, DU_ID, P_ID, EVENT_ID, EVENT_TYPE, ' .
										'EVEMT_REPEAT_KEY, INSTRUMENT_ID, INSTRUMENT_TYPE, INSTRUMENT_VERSION, ' .
										'INSTRUMENT_REPEAT_KEY, DATE_FORMAT(TIME_STAMP_1, \'%Y-%m-%dT%H-%i-%s\') AS ' .
										'TIME_STAMP_1, PERSON_DOB, AGE, AGE_RANGE, PS_STATUS_1, DATE_FORMAT(TIME_STAMP_2, ' .
										'\'%Y-%m-%dT%H-%i-%s\') AS TIME_STAMP_2, ADDRESS_ID, ADDRESS_1, ADDRESS_2, ' .
										'UNIT, CITY, STATE, ZIP, ZIP4, DU_ELIG_CONFIRM, OWN_HOME, OWN_HOME_OTH, ' .
										'DATE_FORMAT(TIME_STAMP_3, \'%Y-%m-%dT%H-%i-%s\') AS TIME_STAMP_3, PROXY, ' .
										'E_MINOR, DATE_FORMAT(TIME_STAMP_4, \'%Y-%m-%dT%H-%i-%s\') AS TIME_STAMP_4, ' .
										'KNOW_NCS, DATE_FORMAT(TIME_STAMP_5, \'%Y-%m-%dT%H-%i-%s\') AS TIME_STAMP_5, ' .
										'PREGNANT, ORIG_DUE_DATE, DATE_PERIOD, WEEKS_PREG, MONTH_PREG, TRIMESTER, ' . 
										'DATE_FORMAT(TIME_STAMP_6, \'%Y-%m-%dT%H-%i-%s\') AS TIME_STAMP_6, TRYING, ' .
										'HYSTER, OVARIES, TUBES_TIED, MENOPAUSE, MED_UNABLE, MED_UNABLE_OTH, ' .
										'DATE_FORMAT(TIME_STAMP_7, \'%Y-%m-%dT%H-%i-%s\') AS TIME_STAMP_7, ' .
										'MARISTAT MARISTAT_OTH, EDUC, EMPLOY, EMPLOY_OTH, ETHNICITY, RACE_OTH, ' .
										'PERSON_LANG, PERSON_LANG_OTH, HH_MEMBERS, INCOME, DATE_FORMAT(TIME_STAMP_8, ' .
										'\'%Y-%m-%dT%H-%i-%s\') AS TIME_STAMP_8, R_FNAME, R_LNAME, M_FNAME, ' .
										'M_LNAME, PHONE_NBR, PHONE_NBR_OTH, PHONE_TYPE, PHONE_TYPE_OTH, HOME_PHONE, ' .
										'SAME_ADDR, MAIL_ADDRESS_ID, MAIL_ADDRESS_1, MAIL_ADDRESS_2, MAIL_UNIT, ' .
										'MAIL_CITY, MAIL_STATE, MAIL_ZIP, MAIL_ZIP4, HAVE_EMAIL, EMAIL, EMAIL_TYPE ' .
										'EMAIL_SHARE, PLAN_MOVE, WHERE_MOVE, MOVE_INFO, NEW_ADDRESS_ID, NEW_ADDRESS_1, ' .
										'NEW_ADDRESS_2, NEW_UNIT, NEW_CITY, NEW_STATE, NEW_ZIP, NEW_ZIP4, WHEN_MOVE, ' .
										'DATE_MOVE, DATE_FORMAT(TIME_STAMP_9, \'%Y-%m-%dT%H-%i-%s\') AS TIME_STAMP_9, ' .
										'PPG_FIRST, DATE_FORMAT(TIME_STAMP_10, \'%Y-%m-%dT%H-%i-%s\') AS TIME_STAMP_10, ' .
										'ENGLISH, CONTACT_LANG, CONTACT_LANG_OTH, INTERPRET, CONTACT_INTERPRET, ' .
										'CONTACT_INTERPRET_OTH, DATE_FORMAT(TIME_STAMP_11, \'%Y-%m-%dT%H-%i-%s\') AS ' .
										'TIME_STAMP_11, from PREGNANCY_SCREENER'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	$self->{_psu_id}					= $values->{PSU_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_ps_id}						= $values->{PS_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_recruit_type}				= $values->{RECRUIT_TYPE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_du_id}						= $values->{DU_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_p_id}						= $values->{P_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_event_id}					= $values->{EVENT_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_event_type}				= $values->{EVENT_TYPE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_event_repeat_key}			= $values->{EVENT_REPEAT_KEY} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_instrument_id}				= $values->{INSTRUMENT_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_instrument_type}			= $values->{INSTRUMENT_TYPE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_instrument_version}		= $values->{INSTRUMENT_VERSION} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_instrument_repeat_key}		= $values->{INSTRUMENT_REPEAT_KEY} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_1}				= $values->{TIME_STAMP_1} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_person_dob}				= $values->{PERSON_DOB} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_age}						= $values->{AGE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_age_range}					= $values->{AGE_RANGE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_ps_status_1}				= $values->{PS_STATUS_1} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_2}				= $values->{TIME_STAMP_2} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_address_id}				= $values->{ADDRESS_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_address_1}					= $values->{ADDRESS_1} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_address_2}					= $values->{ADDRESS_2} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_unit}						= $values->{UNIT} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_city}						= $values->{CITY} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_state}						= $values->{STATE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_zip}						= $values->{ZIP} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_zip4}						= $values->{ZIP4} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_du_elig_confirm}			= $values->{DU_ELIG_CONFIRM} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_own_home}					= $values->{OWN_HOME} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_own_home_oth}				= $values->{OWN_HOME_OTH} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_3}				= $values->{TIME_STAMP_3} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_proxy}						= $values->{PROXY} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_e_minor}					= $values->{E_MINOR} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_4}				= $values->{TIME_STAMP_4} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_know_ncs}					= $values->{KNOW_NCS} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_5}				= $values->{TIME_STAMP_5} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_pregnant}					= $values->{PREGNANT} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_orig_due_date}				= $values->{ORIG_DUE_DATE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_date_period}				= $values->{DATE_PERIOD} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_weeks_preg}				= $values->{WEEKS_PREG} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_month_preg}				= $values->{MONTH_PREG} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_trimester}					= $values->{TRIMESTER} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_6}				= $values->{TIME_STAMP_6} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_trying}					= $values->{TRYING} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_hyster}					= $values->{HYSTER} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_ovaries}					= $values->{OVARIES} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_tubes_tied}				= $values->{TUBES_TIED} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_menopause}					= $values->{MENOPAUSE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_med_unable}				= $values->{MED_UNABLE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_med_unable_oth}			= $values->{MED_UNABLE_OTH} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_7}				= $values->{TIME_STAMP_7} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_maristat}					= $values->{MARISTAT} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_maristat_oth}				= $values->{MARISTAT_OTH} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_educ}						= $values->{EDUC} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_employ}					= $values->{EMPLOY} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_employ_oth}				= $values->{EMPLOY_OTH} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_ethnicity}					= $values->{ETHNICITY} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_race_oth}					= $values->{RACE_OTH} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_person_lang}				= $values->{PERSON_LANG} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_person_lang_oth}			= $values->{PERSON_LANG_OTH} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_hh_members}				= $values->{HH_MEMBERS} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_income}					= $values->{INCOME} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_8}				= $values->{TIME_STAMP_8} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_r_fname}					= $values->{R_FNAME} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_r_lname}					= $values->{R_LNAME} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_m_fname}					= $values->{M_FNAME} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_m_lname}					= $values->{M_LNAME} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_phone_nbr}					= $values->{PHONE_NBR} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_phone_nbr_oth}				= $values->{PHONE_NBR_OTH} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_phone_type}				= $values->{PHONE_TYPE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_phone_type_oth}			= $values->{PHONE_TYPE_OTH} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_home_phone}				= $values->{HOME_PHONE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_same_addr}					= $values->{SAME_ADDR} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_mail_address_id}			= $values->{MAIL_ADDRESS_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_mail_address_1}			= $values->{MAIL_ADDRESS_1} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_mail_address_2}			= $values->{MAIL_ADDRESS_2} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_mail_unit}					= $values->{MAIL_UNIT} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_mail_city}					= $values->{MAIL_CITY} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_mail_state}				= $values->{MAIL_STATE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_mail_zip}					= $values->{MAIL_ZIP} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_mail_zip4}					= $values->{MAIL_ZIP4} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_have_email}				= $values->{HAVE_EMAIL} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_email}						= $values->{EMAIL} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_email_type}				= $values->{EMAIL_TYPE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_email_share}				= $values->{EMAIL_SHARE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_plan_move}					= $values->{PLAN_MOVE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_where_move}				= $values->{WHERE_MOVE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_move_info}					= $values->{MOVE_INFO} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_new_address_id}			= $values->{NEW_ADDRESS_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_new_address_1}				= $values->{NEW_ADDDRESS_1} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_new_address_2}				= $values->{NEW_ADDRESS_2} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_new_unit}					= $values->{NEW_UNIT} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_new_city}					= $values->{NEW_CITY} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_new_state}					= $values->{NEW_STATE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_new_zip}					= $values->{NEW_ZIP} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_new_zip4}					= $values->{NEW_ZIP4} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_when_move}					= $values->{WHEN_MOVE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_date_move}					= $values->{DATE_MOVE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_9}				= $values->{TIME_STAMP_9} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_ppg_first}					= $values->{PPG_FIRST} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_10}				= $values->{TIME_STAMP_10} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_english}					= $values->{ENGLISH} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_contact_lang}				= $values->{CONTACT_LANG} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_contact_lang_oth}			= $values->{CONTACT_LANG_OTH} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_interpret}					= $values->{INTERPRET} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_contact_interpret}			= $values->{CONTACT_INTERPRET} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_contact_interpret_oth}		= $values->{CONTACT_INTERPRET_OTH} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_11}				= $values->{TIME_STAMP_11} || Ncs::Instr::MISSING_IN_ERROR;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "PS_ID column exceeds allowed character length" unless ( length($self->{_ps_id}) <= 36 );
	return "RECRUIT_TYPE column contains an invalid numeric value" unless ( $self->{_recruit_type} == ENHANCED_HOUSEHOLD_ENUMERATION || 
																			$self->{_recruit_type} == TWO_TIER_HIGH_INTENSITY )
	return "DU_ID column exceeds allowed character length" unless ( length($self->{_du_id}) <= 36 );
	return "P_ID column exceeds allowed character length" unless ( length($self->{_p_id}) <= 36 );
	return "EVENT_ID column exceeds allowed character length" unless ( length($self->{_event_id}) <= 36 );
	return "EVENT_TYPE column contains an invalid numeric value" unless ( $self->{_event_type} == PREGNANCY_SCREEN ||
																$self->{_event_type} == Ncs::Instr::MISSING_IN_ERROR );
	return "INSTRUMENT_ID column exceeds allowed character length" unless ( length($self->{_instrument_id}) <= 36 );
	return "INSTRUMENT_TYPE column contains an invalid numeric value" unless ( $self->{_instrument_type} == PREGNANCY_SCREEN ||
																$self->{_instrument_type} == Ncs::Instr::MISSING_IN_ERROR );
	return "INSTRUMENT_VERSION column exceeds allowed character length" unless ( length($self->{_instrument_version}) <= 36 );
	return "TIME_STAMP_1 column contains an invalid date format" unless ( $self->{_time_stamp_1} =~ /^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}\$/ );
	return "TIME_STAMP_2 column contains an invalid date format" unless ( $self->{_time_stamp_2} =~ /^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}\$/ );
	return "PERSON_DOB column contains an invalid date format" unless ( $self->{_person_dob} =~ /^\d{4}-\d{2}-\d{2}$/  ||
																$self->{_person_dob} == Ncs::Instr::MISSING_IN_ERROR );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<pregnancy_screener>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<ps_id>%s</ps_id>\n", $self->{_ps_id});
	$out .= sprintf("\t\t\t<recruit_type>%d</recruit_type>\n", $self->{_recruit_type});
	$out .= sprintf("\t\t\t<du_id>%s</du_id>\n", $self->{_du_id});
	$out .= sprintf("\t\t\t<p_id>%s</p_id>\n", $self->{_p_id});
	$out .= sprintf("\t\t\t<event_id>%s</event_id>\n", $self->{_event_id});
	$out .= sprintf("\t\t\t<event_type>%d</event_type>\n", $self->{_event_type});
	$out .= sprintf("\t\t\t<event_repeat_key>%d</event_repeat_key>\n", $self->{_event_repeat_key});
	$out .= sprintf("\t\t\t<instrument_id>%s</instrument_id>\n", $self->{_instrument_id});
	$out .= sprintf("\t\t\t<instrument_type>%d</instrument_type>\n", $self->{_instrument_type});
	$out .= sprintf("\t\t\t<instrument_version>%s</instrument_version>\n", $self->{_instrument_version});
	$out .= sprintf("\t\t\t<instrument_repeat_key>%d</instrument_repeat_key>\n", $self->{_instrument_repeat_key});
	$out .= sprintf("\t\t\t<time_stamp_1>%s</time_stamp_1>\n", $self->{_time_stamp_1});
	$out .= sprintf("\t\t\t<person_dob>%s</person_dob>\n", $self->{_person_dob});
	$out .= sprintf("\t\t\t<age>%d</age>\n", $self->{_age});
	$out .= sprintf("\t\t\t<age_range>%d</age_range>\n", $self->{_age_range});
	$out .= sprintf("\t\t\t<ps_status_1>%d</ps_status_1>\n", $self->{_ps_status_1});
	$out .= sprintf("\t\t\t<time_stamp_2>%s</time_stamp_2>\n", $self->{_time_stamp_2});
	$out .= sprintf("\t\t\t<address_id>%s</address_id>\n", $self->{_address_id});
	$out .= sprintf("\t\t\t<address_1>%s</address_1>\n", $self->{_address_1});
	$out .= sprintf("\t\t\t<address_2>%s</address_2>\n", $self->{_address_2});
	$out .= sprintf("\t\t\t<unit>%s</unit>\n", $self->{_unit});
	$out .= sprintf("\t\t\t<city>%s</city>\n", $self->{_city});
	$out .= sprintf("\t\t\t<state>%d</state>\n", $self->{_state});
	$out .= sprintf("\t\t\t<zip>%s</zip>\n", $self->{_zip});
	$out .= sprintf("\t\t\t<zip4>%s</zip4>\n", $self->{_zip4});
	$out .= sprintf("\t\t\t<du_elig_confirm>%d</du_elig_confirm>\n", $self->{_du_elig_confirm});
	$out .= sprintf("\t\t\t<own_home>%d</own_home>\n", $self->{_own_home});
	$out .= sprintf("\t\t\t<own_home_oth>%s</own_home_oth>\n", $self->{_own_home_oth});
	$out .= sprintf("\t\t\t<time_stamp_3>%s</time_stamp_3>\n", $self->{_time_stamp_3});
	$out .= sprintf("\t\t\t<proxy>%d</proxy>\n", $self->{_proxy});
	$out .= sprintf("\t\t\t<e_minor>%d</e_minor>\n", $self->{_e_minor});
	$out .= sprintf("\t\t\t<time_stamp_4>%s</time_stamp_4>\n", $self->{_time_stamp_4});
	$out .= sprintf("\t\t\t<know_ncs>%d</know_ncs>\n", $self->{_know_ncs});
	$out .= sprintf("\t\t\t<time_stamp_5>%s</time_stamp_5>\n", $self->{_time_stamp_5});
	$out .= sprintf("\t\t\t<pregnant>%d</pregnant>\n", $self->{_pregnant});
	$out .= sprintf("\t\t\t<orig_due_date>%s</orig_due_date>\n", $self->{_orig_due_date});
	$out .= sprintf("\t\t\t<date_period>%s</date_period>\n", $self->{_date_period});
	$out .= sprintf("\t\t\t<weeks_preg>%d</weeks_preg>\n", $self->{_weeks_preg});
	$out .= sprintf("\t\t\t<month_preg>%d</month_preg>\n", $self->{_month_preg});
	$out .= sprintf("\t\t\t<trimester>%d</trimester>\n", $self->{_trimester});
	$out .= sprintf("\t\t\t<time_stamp_6>%s</time_stamp_6>\n", $self->{_time_stamp_6});
	$out .= sprintf("\t\t\t<trying>%d</trying>\n", $self->{_trying});
	$out .= sprintf("\t\t\t<hyster>%d</hyster>\n", $self->{_hyster});
	$out .= sprintf("\t\t\t<ovaries>%d</ovaries>\n", $self->{_ovaries});
	$out .= sprintf("\t\t\t<tubes_tied>%d</tubes_tied>\n", $self->{_tubes_tied});
	$out .= sprintf("\t\t\t<menopause>%d</menopause>\n", $self->{_menopause});
	$out .= sprintf("\t\t\t<med_unable>%d</med_unable>\n", $self->{_med_unable});
	$out .= sprintf("\t\t\t<med_unable_oth>%s</med_unable_oth>\n", $self->{_med_unable_oth});
	$out .= sprintf("\t\t\t<time_stamp_7>%s</time_stamp_7>\n", $self->{_time_stamp_7});
	$out .= sprintf("\t\t\t<maristat>%d</maristat>\n", $self->{_maristat});
	$out .= sprintf("\t\t\t<maristat_oth>%s</maristat_oth>\n", $self->{_maristat_oth});
	$out .= sprintf("\t\t\t<educ>%d</educ>\n", $self->{_educ});
	$out .= sprintf("\t\t\t<employ>%d</employ>\n", $self->{_employ});
	$out .= sprintf("\t\t\t<employ_oth>%s</employ_oth>\n", $self->{_employ_oth});
	$out .= sprintf("\t\t\t<ethnicity>%d</ethnicity>\n", $self->{_ethnicity});
	$out .= sprintf("\t\t\t<race_oth>%s</race_oth>\n", $self->{_race_oth});
	$out .= sprintf("\t\t\t<person_lang>%d</person_lang>\n", $self->{_person_lang});
	$out .= sprintf("\t\t\t<person_lang_oth>%s</person_lang_oth>\n", $self->{_person_lang_oth});
	$out .= sprintf("\t\t\t<hh_members>%d</hh_members>\n", $self->{_hh_members});
	$out .= sprintf("\t\t\t<income>%d</income>\n", $self->{_income});
	$out .= sprintf("\t\t\t<time_stamp_8>%s</time_stamp_8>\n", $self->{_time_stamp_8});
	$out .= sprintf("\t\t\t<r_fname>%s</r_fname>\n", $self->{_r_fname});
	$out .= sprintf("\t\t\t<r_lname>%s</r_lname>\n", $self->{_r_lname});
	$out .= sprintf("\t\t\t<m_fname>%s</m_fname>\n", $self->{_m_fname});
	$out .= sprintf("\t\t\t<m_lname>%s</m_lname>\n", $self->{_m_lname});
	$out .= sprintf("\t\t\t<phone_nbr>%s</phone_nbr>\n", $self->{_phone_nbr});
	$out .= sprintf("\t\t\t<phone_nbr_oth>%s</phone_nbr_oth>\n", $self->{_phone_nbr_oth});
	$out .= sprintf("\t\t\t<phone_type>%d</phone_type>\n", $self->{_phone_type});
	$out .= sprintf("\t\t\t<phone_type_oth>%s</phone_type_oth>\n", $self->{_phone_type_oth});
	$out .= sprintf("\t\t\t<home_phone>%s</home_phone>\n", $self->{_home_phone});
	$out .= sprintf("\t\t\t<same_addr>%d</same_addr>\n", $self->{_same_addr});
	$out .= sprintf("\t\t\t<mail_address_id>%s</mail_address_id>\n", $self->{_mail_address_id});
	$out .= sprintf("\t\t\t<mail_address_1>%s</mail_address_1>\n", $self->{_mail_address_1});
	$out .= sprintf("\t\t\t<mail_address_2>%s</mail_address_2>\n", $self->{_mail_address_2});
	$out .= sprintf("\t\t\t<mail_unit>%s</mail_unit>\n", $self->{_mail_unit});
	$out .= sprintf("\t\t\t<mail_city>%s</mail_city>\n", $self->{_mail_city});
	$out .= sprintf("\t\t\t<mail_state>%d</mail_state>\n", $self->{_mail_state});
	$out .= sprintf("\t\t\t<mail_zip>%s</mail_zip>\n", $self->{_mail_zip});
	$out .= sprintf("\t\t\t<mail_zip4>%s</mail_zip4>\n", $self->{_mail_zip4});
	$out .= sprintf("\t\t\t<have_email>%d</have_email>\n", $self->{_have_email});
	$out .= sprintf("\t\t\t<email>%s</email>\n", $self->{_email});
	$out .= sprintf("\t\t\t<email_type>%d</email_type>\n", $self->{_email_type});
	$out .= sprintf("\t\t\t<email_share>%d</email_share>\n", $self->{_email_share});
	$out .= sprintf("\t\t\t<plan_move>%d</plan_move>\n", $self->{_plan_move});
	$out .= sprintf("\t\t\t<where_move>%d</where_move>\n", $self->{_where_move});
	$out .= sprintf("\t\t\t<move_info>%d</move_info>\n", $self->{_move_info});
	$out .= sprintf("\t\t\t<new_address_id>%s</new_address_id>\n", $self->{_new_address_id});
	$out .= sprintf("\t\t\t<new_address_1>%s</new_address_1>\n", $self->{_new_address_1});
	$out .= sprintf("\t\t\t<new_address_2>%s</new_address_2>\n", $self->{_new_address_2});
	$out .= sprintf("\t\t\t<new_unit>%s</new_unit>\n", $self->{_new_unit});
	$out .= sprintf("\t\t\t<new_city>%s</new_city>\n", $self->{_new_city});
	$out .= sprintf("\t\t\t<new_state>%d</new_state>\n", $self->{_new_state});
	$out .= sprintf("\t\t\t<new_zip>%s</new_zip>\n", $self->{_new_zip});
	$out .= sprintf("\t\t\t<new_zip4>%s</new_zip4>\n", $self->{_new_zip4});
	$out .= sprintf("\t\t\t<when_move>%d</when_move>\n", $self->{_when_move});
	$out .= sprintf("\t\t\t<date_move>%s</date_move>\n", $self->{_date_move});
	$out .= sprintf("\t\t\t<time_stamp_9>%s</time_stamp_9>\n", $self->{_time_stamp_9});
	$out .= sprintf("\t\t\t<ppg_first>%d</ppg_first>\n", $self->{_ppg_first});
	$out .= sprintf("\t\t\t<timestamp_10>%s</timestamp_10>\n", $self->{_timestamp_10});
	$out .= sprintf("\t\t\t<english>%d</english>\n", $self->{_english});
	$out .= sprintf("\t\t\t<contact_lang>%d</contact_lang>\n", $self->{_contact_lang});
	$out .= sprintf("\t\t\t<contact_lang_oth>%s</contact_lang_oth>\n", $self->{_contact_lang_oth});
	$out .= sprintf("\t\t\t<interpret>%d</interpret>\n", $self->{_interpret});
	$out .= sprintf("\t\t\t<contact_interpret>%d</contact_interpret>\n", $self->{_contact_interpret});
	$out .= sprintf("\t\t\t<contact_interpret_oth>%s</contact_interpret_oth>\n", $self->{_contact_interpret_oth});
	$out .= sprintf("\t\t\t<time_stamp_11>%s</time_stamp_11>\n", $self->{_time_stamp_11});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transactionType});
	$out .= sprintf("\t\t</pregnancy_screener>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getPsId							{ my $self = shift; return $self->{_ps_id} || ''; }
sub getRecruitType					{ my $self = shift; return $self->{_recruit_type} || ''; }
sub getDuId							{ my $self = shift; return $self->{_du_id} || ''; }
sub getPId							{ my $self = shift; return $self->{_p_id} || ''; }
sub getEventId						{ my $self = shift; return $self->{_event_id} || ''; }
sub getEventType					{ my $self = shift; return $self->{_event_type} || ''; }
sub getEventRepeatKey				{ my $self = shift; return $self->{_event_repeat_key} || ''; }
sub getInstrumentId					{ my $self = shift; return $self->{_instrument_id} || ''; }
sub getInstrumentType				{ my $self = shift; return $self->{_instrument_type} || ''; }
sub getInstrumentVersion			{ my $self = shift; return $self->{_instrument_version} || ''; }
sub getInstrumentRepeatKey			{ my $self = shift; return $self->{_instrument_repeat_key} || ''; }
sub getTimeStamp1					{ my $self = shift; return $self->{_time_stamp_1} || ''; }
sub getPersonDob					{ my $self = shift; return $self->{_person_dob} || ''; }
sub getAge							{ my $self = shift; return $self->{_age} || ''; }
sub getAgeRange						{ my $self = shift; return $self->{_age_range} || ''; }
sub getPsStatus1					{ my $self = shift; return $self->{_ps_status_1} || ''; }
sub getTimeStamp2					{ my $self = shift; return $self->{_time_stamp_2} || ''; }
sub getAddressId					{ my $self = shift; return $self->{_address_id} || ''; }
sub getAddress1						{ my $self = shift; return $self->{_address_1} || ''; }
sub getAddress2						{ my $self = shift; return $self->{_address_2} || ''; }
sub getUnit							{ my $self = shift; return $self->{_unit} || ''; }
sub getCity							{ my $self = shift; return $self->{_city} || ''; }
sub getState						{ my $self = shift; return $self->{_state} || ''; }
sub getZip							{ my $self = shift; return $self->{_zip} || ''; }
sub getZip4							{ my $self = shift; return $self->{_zip4} || ''; }
sub getDuEligConfirm				{ my $self = shift; return $self->{_du_elig_confirm} || ''; }
sub getOwnHome						{ my $self = shift; return $self->{_own_home} || ''; }
sub getOwnHomeOth					{ my $self = shift; return $self->{_own_home_oth} || ''; }
sub getTimeStamp3					{ my $self = shift; return $self->{_time_stamp_3} || ''; }
sub getProxy						{ my $self = shift; return $self->{_proxy} || ''; }
sub getEMinor						{ my $self = shift; return $self->{_e_minor} || ''; }
sub getTimeStamp4					{ my $self = shift; return $self->{_time_stamp_4} || ''; }
sub getKnowNcs						{ my $self = shift; return $self->{_know_ncs} || ''; }
sub getTimeStamp5					{ my $self = shift; return $self->{_time_stamp_5} || ''; }
sub getPregnant						{ my $self = shift; return $self->{_pregnant} || ''; }
sub getOrigDueDate					{ my $self = shift; return $self->{_orig_due_date} || ''; }
sub getDatePeriod					{ my $self = shift; return $self->{_date_period} || ''; }
sub getWeeksPreg					{ my $self = shift; return $self->{_weeks_preg} || ''; }
sub getMonthPreg					{ my $self = shift; return $self->{_month_preg} || ''; }
sub getTrimemster					{ my $self = shift; return $self->{_trimester} || ''; }
sub getTimeStamp6					{ my $self = shift; return $self->{_time_stamp_6} || ''; }
sub getTrying						{ my $self = shift; return $self->{_trying} || ''; }
sub getHyster						{ my $self = shift; return $self->{_hyster} || ''; }
sub getOvaries						{ my $self = shift; return $self->{_ovaries} || ''; }
sub getTubesTied					{ my $self = shift; return $self->{_tubes_tied} || ''; }
sub getMenopause					{ my $self = shift; return $self->{_menopause} || ''; }
sub getMedUnable					{ my $self = shift; return $self->{_med_unable} || ''; }
sub getMedUnableOth					{ my $self = shift; return $self->{_med_unable_oth} || ''; }
sub getTimeStamp7					{ my $self = shift; return $self->{_time_stamp_7} || ''; }
sub getMaristat						{ my $self = shift; return $self->{_maristat} || ''; }
sub getMaristatOth					{ my $self = shift; return $self->{_maristat_oth} || ''; }
sub getEdu							{ my $self = shift; return $self->{_educ} || ''; }
sub getEmploy						{ my $self = shift; return $self->{_employ} || ''; }
sub getEmployOth					{ my $self = shift; return $self->{_employ_oth} || ''; }
sub getEthnicity					{ my $self = shift; return $self->{_ethnicity} || ''; }
sub getRaceOth						{ my $self = shift; return $self->{_race_oth} || ''; }
sub getPersonLang					{ my $self = shift; return $self->{_person_lang} || ''; }
sub getPersonLangOth				{ my $self = shift; return $self->{_person_lang_oth} || ''; }
sub getHhMembers					{ my $self = shift; return $self->{_hh_members} || ''; }
sub getIncome						{ my $self = shift; return $self->{_income} || ''; }
sub getTimeStamp8					{ my $self = shift; return $self->{_time_stamp_8} || ''; }
sub getRFname						{ my $self = shift; return $self->{_r_fname} || ''; }
sub getFLname						{ my $self = shift; return $self->{_r_lname} || ''; }
sub getRFname						{ my $self = shift; return $self->{_m_fname} || ''; }
sub getMLname						{ my $self = shift; return $self->{_m_lname} || ''; }
sub getPhoneNbr						{ my $self = shift; return $self->{_phone_nbr} || ''; }
sub getPhoneNbrOth					{ my $self = shift; return $self->{_phone_nbr_oth} || ''; }
sub getPhoneType					{ my $self = shift; return $self->{_phone_type} || ''; }
sub getPhoneTypeOth					{ my $self = shift; return $self->{_phone_type_oth} || ''; }
sub getHomePhone					{ my $self = shift; return $self->{_home_phone} || ''; }
sub getSameAddr						{ my $self = shift; return $self->{_same_addr} || ''; }
sub getMailAddressId				{ my $self = shift; return $self->{_mail_address_id} || ''; }
sub getMaiAddress1					{ my $self = shift; return $self->{_mail_address_1} || ''; }
sub getMailAddress2					{ my $self = shift; return $self->{_mail_address_2} || ''; }
sub getMailUnit						{ my $self = shift; return $self->{_mail_unit} || ''; }
sub getMailCity						{ my $self = shift; return $self->{_mail_city} || ''; }
sub getMailState					{ my $self = shift; return $self->{_mail_state} || ''; }
sub getMailZip						{ my $self = shift; return $self->{_mail_zip} || ''; }
sub getMailZip4						{ my $self = shift; return $self->{_mail_zip4} || ''; }
sub getHaveEmail					{ my $self = shift; return $self->{_have_email} || ''; }
sub getEmail						{ my $self = shift; return $self->{_email} || ''; }
sub getEmailType					{ my $self = shift; return $self->{_email_type} || ''; }
sub getEmailShare					{ my $self = shift; return $self->{_email_share} || ''; }
sub getPlanMove						{ my $self = shift; return $self->{_plan_move} || ''; }
sub getWhereMove					{ my $self = shift; return $self->{_where_move} || ''; }
sub getMoveInfo						{ my $self = shift; return $self->{_move_info} || ''; }
sub getNewAddressId					{ my $self = shift; return $self->{_new_address_id} || ''; }
sub getNewAddress1					{ my $self = shift; return $self->{_new_address_1} || ''; }
sub getNewAddress2					{ my $self = shift; return $self->{_new_address_2} || ''; }
sub getNewUnit						{ my $self = shift; return $self->{_new_unit} || ''; }
sub getNewCity						{ my $self = shift; return $self->{_new_city} || ''; }
sub getNewState						{ my $self = shift; return $self->{_new_state} || ''; }
sub getNewZip						{ my $self = shift; return $self->{_new_zip} || ''; }
sub getNewZip4						{ my $self = shift; return $self->{_new_zip4} || ''; }
sub getWhenMove						{ my $self = shift; return $self->{_when_move} || ''; }
sub getDateMove						{ my $self = shift; return $self->{_date_move} || ''; }
sub getTimeStamp9					{ my $self = shift; return $self->{_time_stamp_9} || ''; }
sub getPpgFirst						{ my $self = shift; return $self->{_ppg_first} || ''; }
sub getTimeStamp10					{ my $self = shift; return $self->{_time_stamp_10} || ''; }
sub getEnglish						{ my $self = shift; return $self->{_english} || ''; }
sub getContactLang					{ my $self = shift; return $self->{_contact_lang} || ''; }
sub getContactLangOth				{ my $self = shift; return $self->{_contact_lang_oth} || ''; }
sub getInterpret					{ my $self = shift; return $self->{_interpret} || ''; }
sub getContactInterpret				{ my $self = shift; return $self->{_contact_interpret} || ''; }
sub getContactInterpretOth			{ my $self = shift; return $self->{_contact_interpret_oth} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
