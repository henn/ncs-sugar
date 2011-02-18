package Ncs::Xml::HouseholdEnumeration;

use strict;
use warnings;
use Ncs::Op;
use Instr::Op;

sub new
{
	my ($class, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_psu_name					=> undef,
		_hhenum_id					=> undef,
		_recruit_type				=> undef,
		_du_id						=> undef,
		_hh_id						=> undef,
		_p_id						=> undef,
		_event_id					=> undef,
		_event_type					=> undef,
		_event_repeat_key			=> undef,
		_instrument_id				=> undef,
		_instrument_type			=> undef,
		_instrument_version			=> undef,
		_instrument_repeat_key		=> undef,
		_time_stamp_1				=> undef,
		_hh_member					=> undef,
		_time_stamp_2				=> undef,
		_address_id					=> undef,
		_address_1					=> undef,
		_address_2					=> undef,
		_unit						=> undef,
		_city						=> undef,
		_state						=> undef,
		_zip						=> undef,
		_zip4						=> undef,
		_private					=> undef,
		_time_stamp_3				=> undef,
		_place_type					=> undef,
		_place_type_oth				=> undef,
		_place_name					=> undef,
		_admin						=> undef,
		_rooms						=> undef,
		_reside_age					=> undef,
		_reside_preg				=> undef,
		_time_stamp_4				=> undef,
		_r_gender					=> undef,
		_num_adult					=> undef,
		_num_male					=> undef,
		_num_female					=> undef,
		_age_elig					=> undef,
		_num_age_elig				=> undef,
		_time_stamp_5				=> undef,
		_pregnant					=> undef,
		_num_preg					=> undef,
		_num_preg_minor				=> undef,
		_num_preg_adult				=> undef,
		_time_stamp_6				=> undef,
		_time_stamp_7				=> undef,
		_confirm_1					=> undef,
		_confirm_2					=> undef,
		_time_stamp_8				=> undef,
		_residence_type				=> undef,
		_apt_1						=> undef,
		_apt_2						=> undef,
		_enum_status				=> undef,
		_time_stamp_9				=> undef,
		_r_fname					=> undef,
		_r_lname					=> undef,
		_r_phone					=> undef,
		_r_phone_type				=> undef,
		_r_phone_name1				=> undef,
		_r_phone_type_oth			=> undef,
		_r_phone_alt				=> undef,
		_r_phone_alt_type			=> undef,
		_r_phone_name2				=> undef,
		_r_phone_alt_type_oth		=> undef,
		_timestamp_10				=> undef,
		_hh_elig					=> undef,
		_time_stamp_11				=> undef,
		_contact_type				=> undef,
		_english					=> undef,
		_contact_lang				=> undef,
		_contact_lang_oth			=> undef,
		_interpret					=> undef,
		_contact_interpret			=> undef,
		_contact_interpret_oth		=> undef,
		_time_stamp_12				=> undef,
		_table_spec_version			=> Ncs::Instr::HOUSEHOLD_ENUMERATION_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_table						=> Ncs::Db::DbDefs::HOUSEHOLD_ENUMERATION_TABLE,
		_sql						=> 'select psu_name, hhenum_id, recruit_type, du_id, hh_id, p_id, event_id, ' .
										'event_type, event_repeat_key, instrument_id, instrument_type, ' .
										'instrument_version, instrument_repeat_key, DATE_FORMAT(time_stamp_1, ' .
										'\'%Y-%m-%dT%H-%i-%s\') as time_stamp_1, hh_member, DATE_FORMAT(time_stamp_2, ' .
										'\'%Y-%m-%dT%H-%i-%s\') as time_stamp_2, address_id, address_1, address_2, ' .
										'unit, city, state, zip, zip4, private, DATE_FORMAT(time_stamp_3, ' .
										'\'%Y-%m-%dT%H-%i-%s\') as time_stamp_3, place_type, place_type_oth, ' .
										'place_name, admin, rooms, reside_age, reside_preg, DATE_FORMAT(time_stamp_4, ' .
										'\'%Y-%m-%dT%H-%i-%s\') as time_stamp_4, r_gender, num_adult, num_male, ' .
										'num_female, age_elig, num_age_elig, DATE_FORMAT(time_stamp_5, ' .
										'\'%Y-%m-%dT%H-%i-%s\') as time_stamp_5, pregnant, num_preg, num_preg_minor, ' .
										'num_preg_adult, DATE_FORMAT(time_stamp_6, \'%Y-%m-%dT%H-%i-%s\') as ' .
										'time_stamp_6, DATE_FORMAT(time_stamp_7, \'%Y-%m-%dT%H-%i-%s\') as time_stamp_7, ' .
										'confirm_1, confirm_2, DATE_FORMAT(time_stamp_8, \'%Y-%m-%dT%H-%i-%s\') as ' . 
										'time_stamp_8, residence_type, apt_1, apt_2, enum_status, DATE_FORMAT(time_stamp_9, ' . 
										'\'%Y-%m-%dT%H-%i-%s\') as time_stamp_9, r_fname, r_lname, r_phone, r_phone_type, ' .
										'r_phone_name1, r_phone_type_oth, r_phone_alt, r_phone_alt_type, r_phone_name2, ' .
										'r_phone_alt_type_oth, DATE_FORMAT(time_stamp_10, \'%Y-%m-%dT%H-%i-%s\') as ' . 
										'timestamp_10, hh_elig, DATE_FORMAT(time_stamp_11, \'%Y-%m-%dT%H-%i-%s\') as ' .
										'time_stamp_11, contact_type, english, contact_lang, contact_lang_oth, ' .
										'interpret, contact_interpret, contact_interpret_oth, DATE_FORMAT(time_stamp_12, ' . 
										'time_stamp_12 from ' . Ncs::Db::DbDefs::HOUSEHOLD_ENUMERATION_TABLE
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	$self->{_psu_id}					= $values->{psu_id} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_psu_name}					= $values->{psu_name} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_hhenum_id}					= $values->{hhenum_id} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_recruit_type}				= $values->{recruit_type} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_du_id}						= $values->{du_id} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_hh_id}						= $values->{hh_id} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_p_id}						= $values->{p_id} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_event_id}					= $values->{event_id} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_event_type}				= $values->{event_type} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_event_repeat_key}			= $values->{event_repeat_key} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_instrument_id}				= $values->{instrument_id} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_instrument_type}			= $values->{instrument_type} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_instrument_version}		= $values->{instrument_version} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_instrument_repeat_key}		= $values->{instrument_repeat_key} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_1}				= $values->{time_stamp_1} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_hh_member}					= $values->{hh_member} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_2}				= $values->{time_stamp_2} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_address_id}				= $values->{address_id} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_address_1}					= $values->{address_1} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_address_2}					= $values->{address_2} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_unit}						= $values->{unit} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_city}						= $values->{city} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_state}						= $values->{state} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_zip}						= $values->{zip} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_zip4}						= $values->{zip4} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_private}					= $values->{private} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_3}				= $values->{time_stamp_3} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_place_type}				= $values->{place_type} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_place_type_oth}			= $values->{place_type_oth} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_place_name}				= $values->{place_name} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_admin}						= $values->{place_name} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_rooms}						= $values->{rooms} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_reside_age}				= $values->{reside_age} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_reside_preg}				= $values->{reside_preg} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_4}				= $values->{time_stamp_4} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_r_gender}					= $values->{r_gender} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_num_adult}					= $values->{num_adult} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_num_male}					= $values->{num_male} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_num_female}				= $values->{num_female} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_age_elig}					= $values->{age_elig} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_num_age_elig}				= $values->{num_age_elig} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_5}				= $values->{time_stamp_5} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_pregnant}					= $values->{pregnant} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_num_preg}					= $values->{num_preg} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_num_preg_minor}			= $values->{num_preg_minor} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_num_preg_adult}			= $values->{num_preg_adult} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_6}				= $values->{time_stamp_6} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_7}				= $values->{time_stamp_7} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_confirm_1}					= $values->{confirm_1} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_confirm_2}					= $values->{confirm_2} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_8}				= $values->{time_stamp_8} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_residence_type}			= $values->{residence_type} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_apt_1}						= $values->{apt_1} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_apt_2}						= $values->{apt_2} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_enum_status}				= $values->{enum_status} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_9}				= $values->{time_stamp_9} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_r_fname}					= $values->{r_fname} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_r_lname}					= $values->{r_lname} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_r_phone}					= $values->{r_phone} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_r_phone_type}				= $values->{r_phone_type} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_r_phone_name1}				= $values->{r_phone_name1} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_r_phone_type_oth}			= $values->{r_phone_type_oth} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_r_phone_alt}				= $values->{r_phone_alt} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_r_phone_alt_type}			= $values->{r_phone_alt_type} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_r_phone_name2}				= $values->{r_phone_name2} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_r_phone_alt_type_oth}		= $values->{r_phone_alt_type_oth} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_timestamp_10}				= $values->{timestamp_10} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_hh_elig}					= $values->{hh_elig} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_11}				= $values->{time_stamp_11} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_contact_type}				= $values->{contact_type} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_english}					= $values->{english} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_contact_lang}				= $values->{contact_lang} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_contact_lang_oth}			= $values->{contact_lang_oth} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_interpret}					= $values->{interpret} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_contact_interpret}			= $values->{contact_interpret} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_contact_interpret_oth}		= $values->{contact_interpret_oth} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_time_stamp_12}				= $values->{time_stamp_12} || Ncs::Instr::MISSING_IN_ERROR;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<household_enumeration>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<psu_name>%s</psu_name>\n", $self->{_psu_name});
	$out .= sprintf("\t\t\t<hhenum_id>%s</hhenum_id>\n", $self->{_hhenum_id});
	$out .= sprintf("\t\t\t<recruit_type>%d</recruit_type>\n", $self->{_recruit_type});
	$out .= sprintf("\t\t\t<du_id>%s</du_id>\n", $self->{_du_id});
	$out .= sprintf("\t\t\t<hh_id>%s</hh_id>\n", $self->{_hh_id});
	$out .= sprintf("\t\t\t<p_id>%s</p_id>\n", $self->{_p_id});
	$out .= sprintf("\t\t\t<event_id>%s</event_id>\n", $self->{_event_id});
	$out .= sprintf("\t\t\t<event_type>%d</event_type>\n", $self->{_event_type});
	$out .= sprintf("\t\t\t<event_repeat_key>%d</event_repeat_key>\n", $self->{_event_repeat_key});
	$out .= sprintf("\t\t\t<instrument_id>%s</instrument_id>\n", $self->{_instrument_id});
	$out .= sprintf("\t\t\t<instrument_type>%d</instrument_type>\n", $self->{_instrument_type});
	$out .= sprintf("\t\t\t<instrument_version>%s</instrument_version>\n", $self->{_instrument_version});
	$out .= sprintf("\t\t\t<instrument_repeat_key>%d</instrument_repeat_key>\n", $self->{_instrument_repeat_key});
	$out .= sprintf("\t\t\t<time_stamp_1>%s</time_stamp_1>\n", $self->{_time_stamp_1});
	$out .= sprintf("\t\t\t<hh_member>%d</hh_member>\n", $self->{_hh_member});
	$out .= sprintf("\t\t\t<time_stamp_2>%s</time_stamp_2>\n", $self->{_time_stamp_2});
	$out .= sprintf("\t\t\t<address_id>%s</address_id>\n", $self->{_address_id});
	$out .= sprintf("\t\t\t<address_1>%s</address_1>\n", $self->{_address_1});
	$out .= sprintf("\t\t\t<address_2>%s</address_2>\n", $self->{_address_2});
	$out .= sprintf("\t\t\t<unit>%s</unit>\n", $self->{_unit});
	$out .= sprintf("\t\t\t<city>%s</city>\n", $self->{_city});
	$out .= sprintf("\t\t\t<state>%d</state>\n", $self->{_state});
	$out .= sprintf("\t\t\t<zip>%s</zip>\n", $self->{_zip});
	$out .= sprintf("\t\t\t<zip4>%s</zip4>\n", $self->{_zip4});
	$out .= sprintf("\t\t\t<private>%d</private>\n", $self->{_private});
	$out .= sprintf("\t\t\t<time_stamp_3>%s</time_stamp_3>\n", $self->{_time_stamp_3});
	$out .= sprintf("\t\t\t<place_type>%d</place_type>\n", $self->{_place_type});
	$out .= sprintf("\t\t\t<place_type_oth>%s</place_type_oth>\n", $self->{_place_type_oth});
	$out .= sprintf("\t\t\t<place_name>%s</place_name>\n", $self->{_place_name});
	$out .= sprintf("\t\t\t<admin>%d</admin>\n", $self->{_admin});
	$out .= sprintf("\t\t\t<rooms>%d</rooms>\n", $self->{_rooms});
	$out .= sprintf("\t\t\t<reside_age>%d</reside_age>\n", $self->{_reside_age});
	$out .= sprintf("\t\t\t<reside_preg>%d</reside_preg>\n", $self->{_reside_preg});
	$out .= sprintf("\t\t\t<time_stamp_4>%s</time_stamp_4>\n", $self->{_time_stamp_4});
	$out .= sprintf("\t\t\t<r_gender>%d</r_gender>\n", $self->{_r_gender});
	$out .= sprintf("\t\t\t<num_adult>%d</num_adult>\n", $self->{_num_adult});
	$out .= sprintf("\t\t\t<num_male>%d</num_male>\n", $self->{_num_male});
	$out .= sprintf("\t\t\t<num_female>%d</num_female>\n", $self->{_num_female});
	$out .= sprintf("\t\t\t<age_elig>%d</age_elig>\n", $self->{_age_elig});
	$out .= sprintf("\t\t\t<num_age_elig>%d</num_age_elig>\n", $self->{_num_age_elig});
	$out .= sprintf("\t\t\t<time_stamp_5>%s</time_stamp_5>\n", $self->{_time_stamp_5});
	$out .= sprintf("\t\t\t<pregnant>%d</pregnant>\n", $self->{_pregnant});
	$out .= sprintf("\t\t\t<num_preg>%d</num_preg>\n", $self->{_num_preg});
	$out .= sprintf("\t\t\t<num_preg_minor>%d</num_preg_minor>\n", $self->{_num_preg_minor});
	$out .= sprintf("\t\t\t<num_preg_adult>%d</num_preg_adult>\n", $self->{_num_preg_adult});
	$out .= sprintf("\t\t\t<time_stamp_6>%s</time_stamp_6>\n", $self->{_time_stamp_6});
	$out .= sprintf("\t\t\t<time_stamp_7>%s</time_stamp_7>\n", $self->{_time_stamp_7});
	$out .= sprintf("\t\t\t<confirm_1>%d</confirm_1>\n", $self->{_confirm_1});
	$out .= sprintf("\t\t\t<confirm_2>%d</confirm_2>\n", $self->{_confirm_2});
	$out .= sprintf("\t\t\t<time_stamp_8>%s</time_stamp_8>\n", $self->{_time_stamp_8});
	$out .= sprintf("\t\t\t<residence_type>%d</residence_type>\n", $self->{_residence_type});
	$out .= sprintf("\t\t\t<apt_1>%d</apt_1>\n", $self->{_apt_1});
	$out .= sprintf("\t\t\t<apt_2>%d</apt_2>\n", $self->{_apt_2});
	$out .= sprintf("\t\t\t<enum_status>%d</enum_status>\n", $self->{_enum_status});
	$out .= sprintf("\t\t\t<time_stamp_9>%s</time_stamp_9>\n", $self->{_time_stamp_9});
	$out .= sprintf("\t\t\t<r_fname>%s</r_fname>\n", $self->{_r_fname});
	$out .= sprintf("\t\t\t<r_lname>%s</r_lname>\n", $self->{_r_lname});
	$out .= sprintf("\t\t\t<r_phone>%s</r_phone>\n", $self->{_r_phone});
	$out .= sprintf("\t\t\t<r_phone_type>%d</r_phone_type>\n", $self->{_r_phone_type});
	$out .= sprintf("\t\t\t<r_phone_name1>%s</r_phone_name1>\n", $self->{_r_phone_name1});
	$out .= sprintf("\t\t\t<r_phone_type_oth>%s</r_phone_type_oth>\n", $self->{_r_phone_type_oth});
	$out .= sprintf("\t\t\t<r_phone_alt>%s</r_phone_alt>\n", $self->{_r_phone_alt});
	$out .= sprintf("\t\t\t<r_phone_alt_type>%d</r_phone_alt_type>\n", $self->{_r_phone_alt_type});
	$out .= sprintf("\t\t\t<r_phone_name2>%s</r_phone_name2>\n", $self->{_r_phone_name2});
	$out .= sprintf("\t\t\t<r_phone_alt_type_oth>%s</r_phone_alt_type_oth>\n", $self->{_r_phone_alt_type_oth});
	$out .= sprintf("\t\t\t<timestamp_10>%s</timestamp_10>\n", $self->{_timestamp_10});
	$out .= sprintf("\t\t\t<hh_elig>%d</hh_elig>\n", $self->{_hh_elig});
	$out .= sprintf("\t\t\t<time_stamp_11>%s</time_stamp_11>\n", $self->{_time_stamp_11});
	$out .= sprintf("\t\t\t<contact_type>%d</contact_type>\n", $self->{_contact_type});
	$out .= sprintf("\t\t\t<english>%d</english>\n", $self->{_english});
	$out .= sprintf("\t\t\t<contact_lang>%d</contact_lang>\n", $self->{_contact_lang});
	$out .= sprintf("\t\t\t<contact_lang_oth>%s</contact_lang_oth>\n", $self->{_contact_lang_oth});
	$out .= sprintf("\t\t\t<interpret>%d</interpret>\n", $self->{_interpret});
	$out .= sprintf("\t\t\t<contact_interpret>%d</contact_interpret>\n", $self->{_contact_interpret});
	$out .= sprintf("\t\t\t<contact_interpret_oth>%s</contact_interpret_oth>\n", $self->{_contact_interpret_oth});
	$out .= sprintf("\t\t\t<time_stamp_12>%s</time_stamp_12>\n", $self->{_time_stamp_12});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transactionType});
	$out .= sprintf("\t\t</household_enumeration>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getPsuName						{ my $self = shift; return $self->{_psu_name} || ''; }
sub getHhenumId						{ my $self = shift; return $self->{_hhenum_id} || ''; }
sub getRecruitType					{ my $self = shift; return $self->{_recruit_type} || ''; }
sub getDuId							{ my $self = shift; return $self->{_du_id} || ''; }
sub getHhId							{ my $self = shift; return $self->{_hh_id} || ''; }
sub getPId							{ my $self = shift; return $self->{_p_id} || ''; }
sub getEventId						{ my $self = shift; return $self->{_event_id} || ''; }
sub getEventType					{ my $self = shift; return $self->{_event_type} || ''; }
sub getEventRepeatKey				{ my $self = shift; return $self->{_event_repeat_key} || ''; }
sub getInstrumentId					{ my $self = shift; return $self->{_instrument_id} || ''; }
sub getInstrumentType				{ my $self = shift; return $self->{_instrument_type} || ''; }
sub getInstrumentVersion			{ my $self = shift; return $self->{_instrument_version} || ''; }
sub getInstrumentRepeatKey			{ my $self = shift; return $self->{_instrument_repeat_key} || ''; }
sub getTimeStamp1					{ my $self = shift; return $self->{_time_stamp_1} || ''; }
sub getHhMember						{ my $self = shift; return $self->{_hh_member} || ''; }
sub getTimeStamp2					{ my $self = shift; return $self->{_time_stamp_2} || ''; }
sub getAddressId					{ my $self = shift; return $self->{_address_id} || ''; }
sub getAddress1						{ my $self = shift; return $self->{_address_1} || ''; }
sub getAddress2						{ my $self = shift; return $self->{_address_2} || ''; }
sub getUnit							{ my $self = shift; return $self->{_unit} || ''; }
sub getCity							{ my $self = shift; return $self->{_city} || ''; }
sub getState						{ my $self = shift; return $self->{_state} || ''; }
sub getZip							{ my $self = shift; return $self->{_zip} || ''; }
sub getZip4							{ my $self = shift; return $self->{_zip4} || ''; }
sub getPrivate						{ my $self = shift; return $self->{_private} || ''; }
sub getTimeStamp3					{ my $self = shift; return $self->{_time_stamp_3} || ''; }
sub getPlaceType					{ my $self = shift; return $self->{_place_type} || ''; }
sub getPlaceTypeOth					{ my $self = shift; return $self->{_place_type_oth} || ''; }
sub getPlaceName					{ my $self = shift; return $self->{_place_name} || ''; }
sub getAdmin						{ my $self = shift; return $self->{_admin} || ''; }
sub getRooms						{ my $self = shift; return $self->{_rooms} || ''; }
sub getResideAge					{ my $self = shift; return $self->{_reside_age} || ''; }
sub getResidePreg					{ my $self = shift; return $self->{_reside_preg} || ''; }
sub getTimeStamp4					{ my $self = shift; return $self->{_time_stamp_4} || ''; }
sub getRGender						{ my $self = shift; return $self->{_r_gender} || ''; }
sub getNumAdult						{ my $self = shift; return $self->{_num_adult} || ''; }
sub getNumMale						{ my $self = shift; return $self->{_num_male} || ''; }
sub getNumFemale					{ my $self = shift; return $self->{_num_female} || ''; }
sub getAgeElig						{ my $self = shift; return $self->{_age_elig} || ''; }
sub getNumAgeElig					{ my $self = shift; return $self->{_num_age_elig} || ''; }
sub getTimeStamp5					{ my $self = shift; return $self->{_time_stamp_5} || ''; }
sub getPregnant						{ my $self = shift; return $self->{_pregnant} || ''; }
sub getNumPreg						{ my $self = shift; return $self->{_num_preg} || ''; }
sub getNumPregMinor					{ my $self = shift; return $self->{_num_preg_minor} || ''; }
sub getNumPregAdult					{ my $self = shift; return $self->{_num_preg_adult} || ''; }
sub getTimeStamp6					{ my $self = shift; return $self->{_time_stamp_6} || ''; }
sub getTimeStamp7					{ my $self = shift; return $self->{_time_stamp_7} || ''; }
sub getConfirm1						{ my $self = shift; return $self->{_confirm_1} || ''; }
sub getConfirm2						{ my $self = shift; return $self->{_confirm_2} || ''; }
sub getTimeStamp8					{ my $self = shift; return $self->{_time_stamp_8} || ''; }
sub getResidenceType				{ my $self = shift; return $self->{_residence_type} || ''; }
sub getApt1							{ my $self = shift; return $self->{_apt_1} || ''; }
sub getApt2							{ my $self = shift; return $self->{_apt_2} || ''; }
sub getEnumStatus					{ my $self = shift; return $self->{_enum_status} || ''; }
sub getTimeStamp9					{ my $self = shift; return $self->{_time_stamp_9} || ''; }
sub getRFname						{ my $self = shift; return $self->{_r_fname} || ''; }
sub getRLname						{ my $self = shift; return $self->{_r_lname} || ''; }
sub getRPhone						{ my $self = shift; return $self->{_r_phone} || ''; }
sub getRPhoneType					{ my $self = shift; return $self->{_r_phone_type} || ''; }
sub getRPhoneName1					{ my $self = shift; return $self->{_r_phone_name1} || ''; }
sub getRPhoneTypeOth				{ my $self = shift; return $self->{_r_phone_type_oth} || ''; }
sub getRPhoneAlt					{ my $self = shift; return $self->{_r_phone_alt} || ''; }
sub getRPhoneAltType				{ my $self = shift; return $self->{_r_phone_alt_type} || ''; }
sub getRPhoneName2					{ my $self = shift; return $self->{_r_phone_name2} || ''; }
sub getRPhoneAltTypeOth				{ my $self = shift; return $self->{_r_phone_alt_type_oth} || ''; }
sub getTimeStamp					{ my $self = shift; return $self->{_timestamp_10} || ''; }
sub getHhElig						{ my $self = shift; return $self->{_hh_elig} || ''; }
sub getTimeStamp11					{ my $self = shift; return $self->{_time_stamp_11} || ''; }
sub getContactType					{ my $self = shift; return $self->{_contact_type} || ''; }
sub getEnglish						{ my $self = shift; return $self->{_english} || ''; }
sub getContactLang					{ my $self = shift; return $self->{_contact_lang} || ''; }
sub getContactLangOth				{ my $self = shift; return $self->{_contact_lang_oth} || ''; }
sub getInterpret					{ my $self = shift; return $self->{_interpret} || ''; }
sub getContactInterpret				{ my $self = shift; return $self->{_contact_interpret} || ''; }
sub getContactInterpretOth			{ my $self = shift; return $self->{_contact_interpret_oth} || ''; }
sub getTimeStamp12					{ my $self = shift; return $self->{_time_stamp_12} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
