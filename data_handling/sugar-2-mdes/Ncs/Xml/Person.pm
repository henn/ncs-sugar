package Ncs::Xml::Person;

use strict;
use warnings;
use Ncs::Op;

use constant PREFIX_MIN				=> 1;
use constant PREFIX_MAX				=> 5;
use constant SUFFIX_MIN				=> 1;
use constant SUFFIX_MAX				=> 3;
use constant SEX_MIN				=> 1;
use constant SEX_MAX				=> 3;
use constant AGE_RANGE_MIN			=> 1;
use constant AGE_RANGE_MAX			=> 7;
use constant ETHNIC_GROUP_MIN		=> 1;
use constant ETHNIC_GROUP_MAX		=> 2;
use constant PERSON_LANG_MIN		=> 1;
use constant PERSON_LANG_MAX		=> 17;
use constant MARISTAT_MIN			=> 1;
use constant MARISTAT_MAX			=> 6;
use constant PREF_CONTACT_MIN		=> 1;
use constant PREF_CONTACT_MAX		=> 6;
use constant MOVE_INFO_MIN			=> 1;
use constant MOVE_INFO_MAX			=> 4;
use constant P_INFO_SOURCE_MIN		=> 1;
use constant P_INFO_SOURCE_MAX		=> 8;

sub new
{
	my ($class, $soap, $is_snapshot, $suppress) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_person_id					=> undef,
		_prefix						=> undef,
		_first_name					=> undef,		
		_last_name					=> undef,		
		_middle_name				=> undef,
		_maiden_name				=> undef,
		_suffix						=> undef,
		_title						=> undef,
		_sex						=> undef,
		_age						=> undef,
		_age_range					=> undef,
		_person_dob					=> undef,
		_deceased					=> undef,
		#_ssn_4						=> undef,
		_ethnic_group				=> undef,
		_person_lang				=> undef,
		_person_lang_other			=> undef,
		_maristat					=> undef,
		_maristat_oth				=> undef,
		_pref_contact				=> undef,
		_pref_contact_oth			=> undef,
		_plan_move					=> undef,
		_move_info					=> undef,
		_new_address_id				=> undef,
		_when_move					=> undef,
		_date_move					=> undef,
		_p_tracing					=> undef,
		_p_info_source				=> undef,
		_p_info_source_oth			=> undef,
		_p_info_date				=> undef,
		_p_info_update				=> undef,
		_person_comment				=> undef,
		_create_date				=> undef,
		_table_spec_version			=> Ncs::Op::PERSON_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_suppress					=> $suppress,
		_sugar_soap					=> $soap,
		_table						=> Ncs::Db::DbDefs::PERSON_TABLE,
		_sql						=> 'select ID, PERSON_ID, PREFIX, FIRST_NAME, LAST_NAME, MIDDLE_NAME, ' .
										'MAIDEN_NAME, SUFFIX, TITLE, SEX, AGE, AGE_RANGE, PERSON_DOB, DECEASED, ' .
										'ETHNIC_GROUP, PERSON_LANG, PERSON_LANG_OTH, MARISTAT, MARISTAT_OTH, ' .
										'PREF_CONTACT, PREF_CONTACT_OTH, PLAN_MOVE, MOVE_INFO, NEW_ADDRESS_ID, ' .
										'WHEN_MOVE, DATE_MOVE, P_TRACING, P_INFO_SOURCE, P_INFO_SOURCE_OTH, ' .
										'DATE_FORMAT(p_info_date, \'%Y-%m-%d\') AS P_INFO_DATE, ' .
										'DATE_FORMAT(p_info_update, \'%Y-%m-%d\') AS P_INFO_UPDATE, ' .
										'PERSON_COMMENT, DATE_FORMAT(date_entered, \'%Y-%m-%d\') AS ' .
										'CREATE_DATE from ' . Ncs::Db::DbDefs::PERSON_TABLE . 
										' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve sugar person record id
	my $person_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									id => $person_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve new_address_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									id => $person_sugar_id, 
									module2 => Ncs::Db::DbDefs::ADDRESS_SUGAR_MODULE});
	# retrieve field (new_address_id) value, if a relationship id exists
	my $new_address_id_field_value = undef;
	if(defined($rel_id))
	{
		$new_address_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::ADDRESS_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'address_id'});
	}

	$self->{_psu_id}				= $psu_id_field_value;
	$self->{_person_id}				= $values->{PERSON_ID} || Ncs::Op::UNKNOWN;
	$self->{_prefix}				= Ncs::Op::atoi($values->{PREFIX}) || Ncs::Op::UNKNOWN;
	$self->{_first_name}			= $values->{FIRST_NAME} || Ncs::Op::UNKNOWN;
	$self->{_last_name}				= $values->{LAST_NAME} || Ncs::Op::UNKNOWN;
	$self->{_middle_name}			= $values->{MIDDLE_NAME} || Ncs::Op::UNKNOWN;
	$self->{_maiden_name}			= $values->{MAIDEN_NAME} || Ncs::Op::UNKNOWN;
	$self->{_suffix}				= Ncs::Op::atoi($values->{SUFFIX}) || Ncs::Op::UNKNOWN;
	$self->{_title}					= $values->{TITLE} || Ncs::Op::UNKNOWN;
	$self->{_sex}					= Ncs::Op::atoi($values->{SEX}) || Ncs::Op::UNKNOWN;
	$self->{_age}					= $values->{AGE} || Ncs::Op::UNKNOWN;
	$self->{_age_range}				= Ncs::Op::atoi($values->{AGE_RANGE}) || Ncs::Op::UNKNOWN;
	$self->{_person_dob}			= $values->{PERSON_DOB} || Ncs::Op::UNKNOWN_DATE;
	$self->{_deceased}				= $values->{DECEASED} || Ncs::Op::UNKNOWN;
	#$self->{_ssn_4}				= $values->{SSN_4};
	$self->{_ethnic_group}			= Ncs::Op::atoi($values->{ETHNIC_GROUP}) || Ncs::Op::UNKNOWN;
	$self->{_person_lang}			= Ncs::Op::atoi($values->{PERSON_LANG}) || Ncs::Op::UNKNOWN;
	$self->{_person_lang_other}		= $values->{PRESON_LANG_OTHER} || Ncs::Op::UNKNOWN;
	$self->{_maristat}				= Ncs::Op::atoi($values->{MARISTAT}) || Ncs::Op::UNKNOWN;
	$self->{_maristat_oth}			= $values->{MARISTAT_OTH} || Ncs::Op::UNKNOWN;
	$self->{_pref_contact}			= Ncs::Op::atoi($values->{PREF_CONTACT}) || Ncs::Op::UNKNOWN;
	$self->{_pref_contact_oth}		= $values->{PREF_CONTACT_OTH} || Ncs::Op::UNKNOWN;
	$self->{_plan_move}				= $values->{PLAN_MOVE} || Ncs::Op::UNKNOWN;
	$self->{_move_info}				= Ncs::Op::atoi($values->{MOVE_INFO}) || Ncs::Op::UNKNOWN;
	$self->{_new_address_id}		= $new_address_id_field_value || Ncs::Op::NOT_APPLICABLE;
	$self->{_when_move}				= $values->{WHEN_MOVE} || Ncs::Op::UNKNOWN;
	$self->{_date_move}				= $values->{DATE_MOVE} || Ncs::Op::UNKNOWN_YEAR_MONTH;
	$self->{_p_tracing}				= $values->{P_TRACING} || Ncs::Op::UNKNOWN;
	$self->{_p_info_source}			= Ncs::Op::atoi($values->{P_INFO_SOURCE}) || Ncs::Op::UNKNOWN;
	$self->{_p_info_source_oth}		= $values->{P_INFO_SOURCE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_p_info_date}			= $values->{P_INFO_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_p_info_update}			= $values->{P_INFO_UPDATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_person_comment}		= $values->{PERSON_COMMENT} || '';
	$self->{_create_date}			= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "PERSON_ID column exceeds allowed character length" unless ( length($self->{_person_id}) <= 36 );
	return "PREFIX column contains an invalid numeric value" unless ( ($self->{_prefix} >= PREFIX_MIN && 
																		$self->{_prefix} <= PREFIX_MAX) ||
																		$self->{_prefix} == Ncs::Op::NOT_APPLICABLE ||
																		$self->{_prefix} == Ncs::Op::UNKNOWN );
	return "FIRST_NAME column exceeds allowed character length" unless ( length($self->{_first_name}) <= 15 );
	return "LAST_NAME column exceeds allowed character length" unless ( length($self->{_last_name}) <= 15 );
	return "MIDDLE_NAME column exceeds allowed character length" unless ( length($self->{_middle_name}) <= 15 );
	return "MAIDEN_NAME column exceeds allowed character length" unless ( length($self->{_maiden_name}) <= 15 );
	return "SUFFIX column contains an invalid numeric value" unless ( ($self->{_suffix} >= SUFFIX_MIN && 
																		$self->{_suffix} <= SUFFIX_MAX) ||
																		$self->{_suffix} == Ncs::Op::NOT_APPLICABLE ||
																		$self->{_suffix} == Ncs::Op::UNKNOWN );
	return "TITLE column exceeds allowed character length" unless ( length($self->{_title}) <= 5 );
	return "SEX column contains an invalid numeric value" unless ( ($self->{_sex} >= SEX_MIN && 
																	$self->{_sex} <= SEX_MAX) ||
																	$self->{_sex} == Ncs::Op::UNKNOWN );
	return "AGE RANGE column contains an invalid numeric value" unless ( ($self->{_age_range} >= AGE_RANGE_MIN && 
																			$self->{_age_range} <= AGE_RANGE_MAX) ||
																			$self->{_age_range} == Ncs::Op::REFUSED ||
																			$self->{_age_range} == Ncs::Op::UNKNOWN );
	return "PERSON_DOB column contains an invalid date format" unless ( $self->{_person_dob} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "DECEASED column contains an invalid numeric value" unless ( $self->{_deceased} == Ncs::Op::YES || 
																		$self->{_deceased} == Ncs::Op::NO ||
																		$self->{_deceased} == Ncs::Op::UNKNOWN );
	return "ETHNIC_GROUP column contains an invalid numeric value" unless ( ($self->{_ethnic_group} >= ETHNIC_GROUP_MIN && 
																				$self->{_ethnic_group} <= ETHNIC_GROUP_MAX) ||
																				$self->{_ethnic_group} == Ncs::Op::REFUSED ||
																				$self->{_ethnic_group} == Ncs::Op::UNKNOWN );
	return "PERSON_LANG column contains an invalid numeric value" unless ( ($self->{_person_lang} >= PERSON_LANG_MIN && 
																			$self->{_person_lang} <= PERSON_LANG_MAX) ||
																			$self->{_person_lang} == Ncs::Op::REFUSED ||
																			$self->{_person_lang} == Ncs::Op::UNKNOWN || 
																			$self->{_person_lang} == Ncs::Op::OTHER );
	if ($self->{_person_lang} != Ncs::Op::OTHER) { $self->{_person_lang_other} = "". Ncs::Op::NOT_APPLICABLE; }
	return "PERSON_LANG_OTH column exceeds allowed character length" unless ( length($self->{_person_lang_other}) <= 255 );
	return "MARISTAT column contains an invalid numeric value" unless ( ($self->{_maristat} >= MARISTAT_MIN && 
																			$self->{_maristat} <= MARISTAT_MAX) ||
																			$self->{_maristat} == Ncs::Op::REFUSED ||
																			$self->{_maristat} == Ncs::Op::UNKNOWN || 
																			$self->{_maristat} == Ncs::Op::OTHER );
	if ($self->{_maristat} != Ncs::Op::OTHER) { $self->{_maristat_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "MARISTAT_OTH column exceeds allowed character length" unless ( length($self->{_maristat_oth}) <= 255 );
	return "PREF_CONTACT column contains an invalid numeric value" unless ( ($self->{_pref_contact} >= PREF_CONTACT_MIN && 
																				$self->{_pref_contact} <= PREF_CONTACT_MAX) ||
																				$self->{_pref_contact} == Ncs::Op::OTHER ||
																				$self->{_pref_contact} == Ncs::Op::UNKNOWN );
	if ($self->{_pref_contact} != Ncs::Op::OTHER) { $self->{_pref_contact_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "PREF_CONTACT_OTH column exceeds allowed character length" unless ( length($self->{_pref_contact_oth}) <= 255 );
	return "PLAN_MOVE column contains an invalid numeric value" unless ( $self->{_plan_move} == Ncs::Op::YES || 
																			$self->{_plan_move} == Ncs::Op::NO ||
																			$self->{_plan_move} == Ncs::Op::REFUSED ||
																			$self->{_plan_move} == Ncs::Op::UNKNOWN ); 
	return "MOVE_INFO column contains an invalid numeric value" unless ( ($self->{_move_info} >= MOVE_INFO_MIN && 
																			$self->{_move_info} <= MOVE_INFO_MAX) ||
																			$self->{_move_info} == Ncs::Op::NOT_APPLICABLE ||
																			$self->{_move_info} == Ncs::Op::UNKNOWN );
	return "NEW_ADDRESS_ID column exceeds allowed character length" unless ( length($self->{_new_address_id}) <= 36 );
	return "WHEN_MOVE column contains an invalid numeric value" unless ( $self->{_when_move} == Ncs::Op::YES || 
																			$self->{_when_move} == Ncs::Op::NO ||
																			$self->{_when_move} == Ncs::Op::REFUSED ||
																			$self->{_when_move} == Ncs::Op::UNKNOWN || 
																			$self->{_when_move} == Ncs::Op::NOT_APPLICABLE );
	return "DATE_MOVE column contains an invalid date format" unless ( $self->{_date_move} =~ /^\d{4}-\d{2}$/ );
	return "P_TRACING column contains an invalid numeric value" unless ( $self->{_p_tracing} == Ncs::Op::YES || 
																			$self->{_p_tracing} == Ncs::Op::NO ||
																			$self->{_p_tracing} == Ncs::Op::UNKNOWN );
	return "P_INFO_SOURCE column contains an invalid numeric value" unless ( ($self->{_p_info_source} >= P_INFO_SOURCE_MIN && 
																				$self->{_p_info_source} <= P_INFO_SOURCE_MAX) ||
																				$self->{_p_info_source} == Ncs::Op::OTHER ||
																				$self->{_p_info_source} == Ncs::Op::UNKNOWN );
	if ($self->{_p_info_source} != Ncs::Op::OTHER) { $self->{_p_info_source_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "P_INFO_SOURCE_OTH column exceeds allowed character length" unless ( length($self->{_p_info_source_oth}) <= 255 );
	return "P_INFO_DATE column contains an invalid date format" unless ( $self->{_p_info_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "P_INFO_UPDATE column contains an invalid date format" unless ( $self->{_p_info_update} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "PERSON_COMMENT column exceeds allowed character length" unless ( length($self->{_person_comment}) <= 8000 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<person>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<person_id>%s</person_id>\n", $self->{_person_id} );
	$out .= sprintf("\t\t\t<prefix>%d</prefix>\n", $self->{_prefix});
	$out .= sprintf("\t\t\t<first_name>%s</first_name>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_first_name});
	$out .= sprintf("\t\t\t<last_name>%s</last_name>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_last_name});
	$out .= sprintf("\t\t\t<middle_name>%s</middle_name>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_middle_name});
	$out .= sprintf("\t\t\t<maiden_name>%s</maiden_name>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_maiden_name});
	$out .= sprintf("\t\t\t<suffix>%s</suffix>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_suffix});
	$out .= sprintf("\t\t\t<title>%s</title>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_title});
	$out .= sprintf("\t\t\t<sex>%s</sex>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_sex});
	$out .= sprintf("\t\t\t<age>%d</age>\n", $self->{_age});
	$out .= sprintf("\t\t\t<age_range>%d</age_range>\n", $self->{_age_range});
	$out .= sprintf("\t\t\t<person_dob>%s</person_dob>\n", $self->{_person_dob});
	$out .= sprintf("\t\t\t<deceased>%s</deceased>\n", $self->{_deceased});
	#$out .= sprintf("\t\t\t<ssn_4>%s</ssn_4>\n", $self->{_ssn_4});
	$out .= sprintf("\t\t\t<ethnic_group>%d</ethnic_group>\n", $self->{_ethnic_group});
	$out .= sprintf("\t\t\t<person_lang>%d</person_lang>\n", $self->{_person_lang});
	$out .= sprintf("\t\t\t<person_lang_other>%s</person_lang_other>\n", $self->{_person_lang_other});
	$out .= sprintf("\t\t\t<maristat>%d</maristat>\n", $self->{_maristat});
	$out .= sprintf("\t\t\t<maristat_oth>%s</maristat_oth>\n", $self->{_maristat_oth});
	$out .= sprintf("\t\t\t<pref_contact>%d</pref_contact>\n", $self->{_pref_contact});
	$out .= sprintf("\t\t\t<pref_contact_oth>%s</pref_contact_oth>\n", $self->{_pref_contact_oth});
	$out .= sprintf("\t\t\t<plan_move>%d</plan_move>\n", $self->{_plan_move});
	$out .= sprintf("\t\t\t<move_info>%d</move_info>\n", $self->{_move_info});
	$out .= sprintf("\t\t\t<new_address_id>%s</new_address_id>\n", $self->{_new_address_id});
	$out .= sprintf("\t\t\t<when_move>%d</when_move>\n", $self->{_when_move});
	$out .= sprintf("\t\t\t<date_move>%s</date_move>\n", $self->{_date_move});
	$out .= sprintf("\t\t\t<p_tracing>%d</p_tracing>\n", $self->{_p_tracing});
	$out .= sprintf("\t\t\t<p_info_source>%d</p_info_source>\n", $self->{_p_info_source});
	$out .= sprintf("\t\t\t<p_info_source_oth>%s</p_info_source_oth>\n", $self->{_p_info_source_oth});
	$out .= sprintf("\t\t\t<p_info_date>%s</p_info_date>\n", $self->{_p_info_date});
	$out .= sprintf("\t\t\t<p_info_update>%s</p_info_update>\n", $self->{_p_info_update});
	$out .= sprintf("\t\t\t<person_comment>%s</person_comment>\n", $self->{_person_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</person>");

	return $out;
}

sub getPsuId				{ my $self = shift; return $self->{_psu_id} || ''; }
sub getPersonId				{ my $self = shift; return $self->{_person_id} || ''; }
sub getPrefix				{ my $self = shift; return $self->{_prefix} || ''; }
sub getFirstName			{ my $self = shift; return $self->{_first_name} || ''; }
sub getLastName				{ my $self = shift; return $self->{_last_name} || ''; }
sub getMiddleName			{ my $self = shift; return $self->{_middle_name} || ''; }
sub getMaidenName			{ my $self = shift; return $self->{_maiden_name} || ''; }
sub getSuffix				{ my $self = shift; return $self->{_suffix} || ''; }
sub getTitle				{ my $self = shift; return $self->{_title} || ''; }
sub getSex					{ my $self = shift; return $self->{_sex} || ''; }
sub getAge					{ my $self = shift; return $self->{_age} || ''; }
sub getAgeRange				{ my $self = shift; return $self->{_age_range} || ''; }
sub getPersonDob			{ my $self = shift; return $self->{_person_dob} || ''; }
sub getDeceased				{ my $self = shift; return $self->{_deceased} || ''; }
sub getEthnicGroup			{ my $self = shift; return $self->{_ethnic_group} || ''; }
sub getPersonLang			{ my $self = shift; return $self->{_person_lang} || ''; }
sub getPersonLangOther		{ my $self = shift; return $self->{_person_lang_other} || ''; }
sub getMaristat				{ my $self = shift; return $self->{_maristat} || ''; }
sub getMaristatOth			{ my $self = shift; return $self->{_maristat_oth} || ''; }
sub getPrefContact			{ my $self = shift; return $self->{_pref_contact} || ''; }
sub getPrefContanctOth		{ my $self = shift; return $self->{_pref_contact_oth} || ''; }
sub getPlanMove				{ my $self = shift; return $self->{_plan_move} || ''; }
sub getMoveInfo				{ my $self = shift; return $self->{_move_info} || ''; }
sub getNewAddressId			{ my $self = shift; return $self->{_new_address_id} || ''; }
sub getWhenMove				{ my $self = shift; return $self->{_when_move} || ''; }
sub getDateMove				{ my $self = shift; return $self->{_date_move} || ''; }
sub getPTracing				{ my $self = shift; return $self->{_p_tracing} || ''; }
sub getPInfoSource			{ my $self = shift; return $self->{_p_info_source} || ''; }
sub getPInfoSourceOth		{ my $self = shift; return $self->{_p_info_source_oth} || ''; }
sub getPInfoDate			{ my $self = shift; return $self->{_p_info_date} || ''; }
sub getPInfoUpdate			{ my $self = shift; return $self->{_p_info_update} || ''; }
sub getPersonComment		{ my $self = shift; return $self->{_person_comment} || ''; }
sub getCreateDate			{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion		{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType		{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql					{ my $self = shift; return $self->{_sql} || ''; }
sub getTable				{ my $self = shift; return $self->{_table} || ''; }

1;
