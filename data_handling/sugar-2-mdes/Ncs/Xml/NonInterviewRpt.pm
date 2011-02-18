package Ncs::Xml::NonInterviewRpt;

use strict;
use warnings;
use Ncs::Op;

use constant NIR_TYPE_DU_MIN				=> 1;
use constant NIR_TYPE_DU_MAX				=> 3;
use constant NIR_VAC_INFO_MIN				=> 1;
use constant NIR_VAC_INFO_MAX				=> 6;
use constant NIR_NOACCESS_MIN				=> 1;
use constant NIR_NOACCESS_MAX				=> 3;
use constant NIR_ACCESS_ATTEMPT_MIN			=> 1;
use constant NIR_ACCESS_ATTEMPT_MAX			=> 3;
use constant NIR_TYPE_PERSON_MIN			=> 1;
use constant NIR_TYPE_PERSON_MAX			=> 5;
use constant COG_INFORM_RELATION_MIN		=> 1;
use constant COG_INFORM_RELATION_MAX		=> 4;
use constant DECEASED_INFORM_RELATION_MIN	=> 1;
use constant DECEASED_INFORM_RELATION_MAX	=> 4;
use constant STATE_DEATH_MIN				=> 1;
use constant STATE_DEATH_MAX				=> 51;
use constant WHO_REFUSED_MIN				=> 1;
use constant WHO_REFUSED_MAX				=> 6;
use constant REFUSER_STRENGTH_MIN			=> 1;
use constant REFUSER_STRENGTH_MAX			=> 3;
use constant REF_ACTION_MIN					=> 1;
use constant REF_ACTION_MAX					=> 2;
use constant REASON_UNAVAIL_MIN				=> 1;
use constant REASON_UNAVAIL_MAX				=> 5;
use constant MOVED_UNIT_MIN					=> 1;
use constant MOVED_UNIT_MAX					=> 3;
use constant MOVED_INFORM_RELATION_MIN		=> 1;
use constant MOVED_INFORM_RELATION_MAX		=> 7;

sub new
{
	my ($class, $soap, $is_snapshot, $suppress) = @_;

	my $self = bless
	{
		_psu_id							=> undef,
		_nir_id							=> undef,
		_contact_id						=> undef,
		_nir							=> undef,
		_du_id							=> undef,
		_person_id						=> undef,
		_nir_type_du					=> undef,
		_nir_type_du_oth				=> undef,
		_nir_vac_info					=> undef,
		_nir_vac_info_oth				=> undef,
		_nir_noaccess					=> undef,
		_nir_noaccess_oth				=> undef,
		_nir_access_attempt				=> undef,
		_nir_access_attempt_oth			=> undef,
		_nir_type_person				=> undef,
		_nir_type_person_oth			=> undef,
		_cog_inform_relation			=> undef,
		_cog_inform_relation_oth		=> undef,
		_cog_dis_desc					=> undef,
		_perm_disability				=> undef,
		_deceased_inform_relation		=> undef,
		_deceased_inform_oth			=> undef,
		_yod							=> undef,
		_state_death					=> undef,
		_who_refused					=> undef,
		_who_refused_oth				=> undef,
		_refuser_strength				=> undef,
		_ref_action						=> undef,
		_lt_illness_desc				=> undef,
		_perm_ltr						=> undef,
		_reason_unavail					=> undef,
		_reason_unavail_oth				=> undef,
		_date_available					=> undef,
		_date_moved						=> undef,
		_moved_length_time				=> undef,
		_moved_unit						=> undef,
		_moved_inform_relation			=> undef,
		_moved_relation_oth				=> undef,
		_nir_other						=> undef,
		_create_date					=> undef,
		_table_spec_version				=> Ncs::Op::NON_INTERVIEW_RPT_VERSION,
		_transaction_type				=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_suppress						=> $suppress,
		_sugar_soap						=> $soap,
		_table							=> Ncs::Db::DbDefs::NON_INTERVIEW_RPT_TABLE,
		_sql							=> 'select ID, NIR_ID, NIR, NIR_TYPE_DU, NIR_TYPE_DU_OTH, ' .
											'NIR_VAC_INFO, NIR_VAC_INFO_OTH, NIR_NOACCESS, NIR_NOACCESS_OTH, ' .
											'NIR_ACCESS_ATTEMPT, NIR_ACCESS_ATTEMPT_OTH, NIR_TYPE_PERSON, NIR_TYPE_PERSON_OTH, ' .
											'COG_INFORM_RELATION, COG_INFORM_RELATION_OTH, COG_DIS_DESC, PERM_DISABILITY, ' .
											'DECEASED_INFORM_RELATION, DECEASED_INFORM_OTH, YOD, STATE_DEATH, WHO_REFUSED, ' .
											'WHO_REFUSED_OTH, REFUSER_STRENGTH, REF_ACTION, LT_ILLNESS_DESC, PERM_LTR, ' .
											'REASON_UNAVAIL, REASON_UNAVAIL_OTH, DATE_FORMAT(date_available, \'%Y-%m-%d\') ' .
											'AS DATE_AVAILABLE, DATE_FORMAT(date_moved, \'%Y-%m-%d\') AS DATE_MOVED, ' .
											'MOVED_LENGTH_TIME, MOVED_UNIT, MOVED_INFORM_RELATION, MOVED_RELATION_OTH, ' .
											'NIR_OTHER, DATE_FORMAT(date_entered, \'%Y-%m-%d\') AS CREATE_DATE from ' .
											Ncs::Db::DbDefs::NON_INTERVIEW_RPT_TABLE . 
											' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve non interview report record id
	my $non_interview_rpt_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::NON_INTERVIEW_RPT_SUGAR_MODULE, 
									id => $non_interview_rpt_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve contact_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::NON_INTERVIEW_RPT_SUGAR_MODULE, 
									id => $non_interview_rpt_sugar_id, 
									module2 => Ncs::Db::DbDefs::CONTACT_SUGAR_MODULE});
	# retrieve field (contact_id) value
	my $contact_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::CONTACT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'contact_id'});

	# retrieve du_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::NON_INTERVIEW_RPT_SUGAR_MODULE, 
									id => $non_interview_rpt_sugar_id, 
									module2 => Ncs::Db::DbDefs::DWELLING_UNIT_SUGAR_MODULE});
	# retrieve field (du_id) value
	my $du_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::DWELLING_UNIT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'du_id'});

	# retrieve person_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::NON_INTERVIEW_RPT_SUGAR_MODULE, 
									id => $non_interview_rpt_sugar_id, 
									module2 => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE});
	# retrieve field (person_id) value
	my $person_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'person_id'});

	$self->{_psu_id}						= $psu_id_field_value;
	$self->{_nir_id}						= $values->{NIR_ID} || Ncs::Op::UNKNOWN;
	$self->{_contact_id}					= $contact_id_field_value;
	$self->{_nir}							= $values->{NIR} || Ncs::Op::UNKNOWN;
	$self->{_du_id}							= $du_id_field_value;
	$self->{_person_id}						= $person_id_field_value;
	$self->{_nir_type_du}					= Ncs::Op::atoi($values->{NIR_TYPE_DU}) || Ncs::Op::UNKNOWN;
	$self->{_nir_type_du_oth}				= $values->{NIR_TYPE_DU_OTH} || Ncs::Op::UNKNOWN;
	$self->{_nir_vac_info}					= Ncs::Op::atoi($values->{NIR_VAC_INFO}) || Ncs::Op::UNKNOWN;
	$self->{_nir_vac_info_oth}				= $values->{NIR_VAC_INFO_OTH} || Ncs::Op::UNKNOWN;
	$self->{_nir_noaccess}					= Ncs::Op::atoi($values->{NIR_NOACCESS}) || Ncs::Op::UNKNOWN;
	$self->{_nir_noaccess_oth}				= $values->{NIR_NOACCESS_OTH} || Ncs::Op::UNKNOWN;
	$self->{_nir_access_attempt}			= Ncs::Op::atoi($values->{NIR_ACCESS_ATTEMPT}) || Ncs::Op::UNKNOWN;
	$self->{_nir_access_attempt_oth}		= $values->{NIR_ACCESS_ATTEMPT_OTH} || Ncs::Op::UNKNOWN;
	$self->{_nir_type_person}				= Ncs::Op::atoi($values->{NIR_TYPE_PERSON}) || Ncs::Op::UNKNOWN;
	$self->{_nir_type_person_oth}			= $values->{NIR_TYPE_PERSON_OTH} || Ncs::Op::UNKNOWN;
	$self->{_cog_inform_relation}			= Ncs::Op::atoi($values->{COG_INFORM_RELATION}) || Ncs::Op::UNKNOWN;
	$self->{_cog_inform_relation_oth}		= $values->{COG_INFORM_RELATION_OTH} || Ncs::Op::UNKNOWN;
	$self->{_cog_dis_desc}					= $values->{COG_DIS_DESC} || Ncs::Op::UNKNOWN;
	$self->{_perm_disability}				= Ncs::Op::atoi($values->{PERM_DISABILITY}) || Ncs::Op::UNKNOWN;
	$self->{_deceased_inform_relation}		= Ncs::Op::atoi($values->{DECEASED_INFORM_RELATION}) || Ncs::Op::UNKNOWN;
	$self->{_deceased_inform_oth}			= $values->{DECEASED_INFORM_OTH} || Ncs::Op::UNKNOWN;
	$self->{_yod}							= $values->{YOD} || Ncs::Op::UNKNOWN;
	$self->{_state_death}					= Ncs::Op::atoi($values->{STATE_DEATH}) || Ncs::Op::UNKNOWN;
	$self->{_who_refused}					= Ncs::Op::atoi($values->{WHO_REFUSED}) || Ncs::Op::UNKNOWN;
	$self->{_who_refused_oth}				= $values->{WHO_REFUSED_OTH} || Ncs::Op::UNKNOWN;
	$self->{_refuser_strength}				= Ncs::Op::atoi($values->{REFUSER_STRENGTH}) || Ncs::Op::UNKNOWN;
	$self->{_ref_action}					= Ncs::Op::atoi($values->{REF_ACTION}) || Ncs::Op::UNKNOWN;
	$self->{_lt_illness_desc}				= $values->{LT_ILLNESS_DESC} || Ncs::Op::UNKNOWN;
	$self->{_perm_ltr}						= $values->{PERM_LTR} || Ncs::Op::UNKNOWN;
	$self->{_reason_unavail}				= Ncs::Op::atoi($values->{REASON_UNAVAIL}) || Ncs::Op::UNKNOWN;
	$self->{_reason_unavail_oth}			= $values->{REASON_UNAVAIL_OTH} || Ncs::Op::UNKNOWN;
	$self->{_date_available}				= $values->{DATE_AVAILABLE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_date_moved}					= $values->{DATE_MOVED} || Ncs::Op::UNKNOWN_DATE;
	$self->{_moved_length_time}				= $values->{MOVED_LENGTH_TIME} || Ncs::Op::UNKNOWN;
	$self->{_moved_unit}					= Ncs::Op::atoi($values->{MOVED_UNIT}) || Ncs::Op::UNKNOWN;
	$self->{_moved_inform_relation}			= Ncs::Op::atoi($values->{MOVED_INFORM_RELATION}) || Ncs::Op::UNKNOWN;
	$self->{_moved_relation_oth}			= $values->{MOVED_RELATION_OTH} || Ncs::Op::UNKNOWN;
	$self->{_nir_other}						= $values->{NIR_OTHER} || Ncs::Op::UNKNOWN;
	$self->{_create_date}					= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "NIR_ID column exceeds allowed character length" unless ( length($self->{_nir_id}) <= 36 );
	return "CONTACT_ID column exceeds allowed character length" unless ( length($self->{_contact_id}) <= 36 );
	return "NIR column exceeds allowed character length" unless ( length($self->{_nir}) <= 8000 );
	return "DU_ID column exceeds allowed character length" unless ( length($self->{_du_id}) <= 36 );
	return "PERSON_ID column exceeds allowed character length" unless ( length($self->{_person_id}) <= 36 );
	return "NIR_TYPE_DU column contains an invalid numeric value" unless ( ($self->{_nir_type_du} >= NIR_TYPE_DU_MIN && 
																				$self->{_nir_type_du} <= NIR_TYPE_DU_MAX) ||
																				$self->{_nir_type_du} == Ncs::Op::OTHER || 
																				$self->{_nir_type_du} == Ncs::Op::NOT_APPLICABLE || 
																				$self->{_nir_type_du} == Ncs::Op::UNKNOWN ); 
	if ($self->{_nir_type_du} != Ncs::Op::OTHER) { $self->{_nir_type_du_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "NIR_TYPE_DU_OTH column exceeds allowed character length" unless ( length($self->{_nir_type_du_oth}) <= 255 );
	return "NIR_VAC_INFO column contains an invalid numeric value" unless ( ($self->{_nir_vac_info} >= NIR_VAC_INFO_MIN && 
																				$self->{_nir_vac_info} <= NIR_VAC_INFO_MAX) ||
																				$self->{_nir_vac_info} == Ncs::Op::OTHER || 
																				$self->{_nir_vac_info} == Ncs::Op::NOT_APPLICABLE || 
																				$self->{_nir_vac_info} == Ncs::Op::UNKNOWN ); 
	if ($self->{_nir_vac_info} != Ncs::Op::OTHER) { $self->{_nir_vac_info_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "NIR_VAC_INFO_OTH column exceeds allowed character length" unless ( length($self->{_nir_vac_info_oth}) <= 255 );
	return "NIR_NOACCESS column contains an invalid numeric value" unless ( ($self->{_nir_noaccess} >= NIR_NOACCESS_MIN && 
																				$self->{_nir_noaccess} <= NIR_NOACCESS_MAX) ||
																				$self->{_nir_noaccess} == Ncs::Op::OTHER || 
																				$self->{_nir_noaccess} == Ncs::Op::NOT_APPLICABLE || 
																				$self->{_nir_noaccess} == Ncs::Op::UNKNOWN ); 
	if ($self->{_nir_noaccess} != Ncs::Op::OTHER) { $self->{_nir_noaccess_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "NIR_NOACCESS_OTH column exceeds allowed character length" unless ( length($self->{_nir_noaccess_oth}) <= 255 );
	return "NIR_ACCESS_ATTEMPT column contains an invalid numeric value" unless ( ($self->{_nir_access_attempt} >= NIR_ACCESS_ATTEMPT_MIN && 
																				$self->{_nir_access_attempt} <= NIR_ACCESS_ATTEMPT_MAX) ||
																				$self->{_nir_access_attempt} == Ncs::Op::OTHER || 
																				$self->{_nir_access_attempt} == Ncs::Op::NOT_APPLICABLE || 
																				$self->{_nir_access_attempt} == Ncs::Op::UNKNOWN ); 
	if ($self->{_nir_access_attempt} != Ncs::Op::OTHER) { $self->{_nir_access_attempt_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "NIR_ACCESS_ATTEMPT_OTH column exceeds allowed character length" unless ( length($self->{_nir_access_attempt_oth}) <= 255 );
	return "NIR_TYPE_PERSON column contains an invalid numeric value" unless ( ($self->{_nir_type_person} >= NIR_TYPE_PERSON_MIN && 
																				$self->{_nir_type_person} <= NIR_TYPE_PERSON_MAX) ||
																				$self->{_nir_type_person} == Ncs::Op::OTHER || 
																				$self->{_nir_type_person} == Ncs::Op::NOT_APPLICABLE || 
																				$self->{_nir_type_person} == Ncs::Op::UNKNOWN ); 
	if ($self->{_nir_type_person} != Ncs::Op::OTHER) { $self->{_nir_type_person_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "NIR_TYPE_PERSON_OTH column exceeds allowed character length" unless ( length($self->{_nir_type_person_oth}) <= 255 );
	return "COG_INFORM_RELATION column contains an invalid numeric value" unless ( ($self->{_cog_inform_relation} >= COG_INFORM_RELATION_MIN && 
																				$self->{_cog_inform_relation} <= COG_INFORM_RELATION_MAX) ||
																				$self->{_cog_inform_relation} == Ncs::Op::OTHER || 
																				$self->{_cog_inform_relation} == Ncs::Op::UNKNOWN || 
																				$self->{_cog_inform_relation} == Ncs::Op::NOT_APPLICABLE || 
																				$self->{_cog_inform_relation} == Ncs::Op::UNKNOWN ); 
	if ($self->{_cog_inform_relation} != Ncs::Op::OTHER) { $self->{_cog_inform_relation_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "COG_INFORM_RELATION_OTH column exceeds allowed character length" unless ( length($self->{_cog_inform_relation_oth}) <= 255 );
	return "COG_DIS_DESC column exceeds allowed character length" unless ( length($self->{_cog_dis_desc}) <= 8000 );
	return "PERM_DISABILITY column contains an invalid numeric value" unless ( $self->{_perm_disability} == Ncs::Op::YES || 
																				$self->{_perm_disability} == Ncs::Op::NO  ||
																				$self->{_perm_disability} == Ncs::Op::UNKNOWN ||
																				$self->{_perm_disability} == Ncs::Op::NOT_APPLICABLE );
	return "DECEASED_INFORM_RELATION column contains an invalid numeric value" unless ( ($self->{_deceased_inform_relation} >= DECEASED_INFORM_RELATION_MIN && 
																				$self->{_deceased_inform_relation} <= DECEASED_INFORM_RELATION_MAX) ||
																				$self->{_deceased_inform_relation} == Ncs::Op::OTHER || 
																				$self->{_deceased_inform_relation} == Ncs::Op::UNKNOWN || 
																				$self->{_deceased_inform_relation} == Ncs::Op::NOT_APPLICABLE ); 
	if ($self->{_deceased_inform_relation} != Ncs::Op::OTHER) { $self->{_deceased_inform_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "DECEASED_INFORM_RELATION_OTH column exceeds allowed character length" unless ( length($self->{_deceased_inform_oth}) <= 255 );
	return "STATE_DEATH column contains an invalid numeric value" unless ( ($self->{_state_death} >= STATE_DEATH_MIN && 
																				$self->{_state_death} <= STATE_DEATH_MAX) ||
																				$self->{_state_death} == Ncs::Op::UNKNOWN ); 
	return "WHO_REFUSED column contains an invalid numeric value" unless ( ($self->{_who_refused} >= WHO_REFUSED_MIN && 
																				$self->{_who_refused} <= WHO_REFUSED_MAX) ||
																				$self->{_who_refused} == Ncs::Op::OTHER || 
																				$self->{_who_refused} == Ncs::Op::UNKNOWN || 
																				$self->{_who_refused} == Ncs::Op::NOT_APPLICABLE ); 
	if ($self->{_who_refused} != Ncs::Op::OTHER) { $self->{_who_refused_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "WHO_REFUSED_OTH column exceeds allowed character length" unless ( length($self->{_who_refused_oth}) <= 255 );
	return "REFUSER_STRENGTH column contains an invalid numeric value" unless ( ($self->{_refuser_strength} >= REFUSER_STRENGTH_MIN && 
																				$self->{_refuser_strength} <= REFUSER_STRENGTH_MAX) ||
																				$self->{_refuser_strength} == Ncs::Op::UNKNOWN ||
																				$self->{_refuser_strength} == Ncs::Op::NOT_APPLICABLE ); 
	return "REF_ACTION column contains an invalid numeric value" unless ( ($self->{_ref_action} >= REF_ACTION_MIN && 
																				$self->{_ref_action} <= REF_ACTION_MAX) ||
																				$self->{_ref_action} == Ncs::Op::NOT_APPLICABLE || 
																				$self->{_ref_action} == Ncs::Op::UNKNOWN ); 
	return "LT_ILLNESS_DESC column exceeds allowed character length" unless ( length($self->{_lt_illness_desc}) <= 8000 );
	return "PERM_LTR column contains an invalid numeric value" unless ( $self->{_perm_ltr} == Ncs::Op::YES || 
																				$self->{_perm_ltr} == Ncs::Op::NO ||
																				$self->{_perm_ltr} == Ncs::Op::UNKNOWN ||
																				$self->{_perm_ltr} == Ncs::Op::NOT_APPLICABLE ); 
	return "REASON_UNAVAIL column contains an invalid numeric value" unless ( ($self->{_reason_unavail} >= REASON_UNAVAIL_MIN && 
																				$self->{_reason_unavail} <= REASON_UNAVAIL_MAX) ||
																				$self->{_reason_unavail} == Ncs::Op::OTHER || 
																				$self->{_reason_unavail} == Ncs::Op::UNKNOWN || 
																				$self->{_reason_unavail} == Ncs::Op::NOT_APPLICABLE ); 
	if ($self->{_reason_unavail} != Ncs::Op::OTHER) { $self->{_reason_unavail_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "REASON_UNAVAIL_OTH column exceeds allowed character length" unless ( length($self->{_reason_unavail_oth}) <= 255 );
	return "DATE_AVAILABLE column contains an invalid date format" unless ( $self->{_date_available} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "DATE_MOVED column contains an invalid date format" unless ( $self->{_date_moved} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "MOVED_UNIT column contains an invalid numeric value" unless ( ($self->{_moved_unit} >= MOVED_UNIT_MIN && 
																			$self->{_moved_unit} <= MOVED_UNIT_MAX) ||
																			$self->{_moved_unit} == Ncs::Op::NOT_APPLICABLE || 
																			$self->{_moved_unit} == Ncs::Op::UNKNOWN ); 
	return "MOVED_INFORM_RELATION column contains an invalid numeric value" unless ( ($self->{_moved_inform_relation} >= MOVED_INFORM_RELATION_MIN && 
																				$self->{_moved_inform_relation} <= MOVED_INFORM_RELATION_MAX) ||
																				$self->{_moved_inform_relation} == Ncs::Op::OTHER || 
																				$self->{_moved_inform_relation} == Ncs::Op::NOT_APPLICABLE || 
																				$self->{_moved_inform_relation} == Ncs::Op::UNKNOWN ); 
	if ($self->{_moved_inform_relation} != Ncs::Op::OTHER) { $self->{_moved_relation_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "MOVED_INFORM_RELATION_OTH column exceeds allowed character length" unless ( length($self->{_moved_relation_oth}) <= 255 );
	return "NIR_OTHER column exceeds allowed character length" unless ( length($self->{_nir_other}) <= 8000 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<non_interview_rpt>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<nir_id>%s</nir_id>\n", $self->{_nir_id});
	$out .= sprintf("\t\t\t<contact_id>%s</contact_id>\n", $self->{_contact_id});
	$out .= sprintf("\t\t\t<nir>%s</nir>\n", $self->{_nir});
	$out .= sprintf("\t\t\t<du_id>%s</du_id>\n", $self->{_du_id});
	$out .= sprintf("\t\t\t<person_id>%s</person_id>\n", $self->{_person_id});
	$out .= sprintf("\t\t\t<nir_type_du>%d</nir_type_du>\n", $self->{_nir_type_du});
	$out .= sprintf("\t\t\t<nir_type_du_oth>%s</nir_type_du_oth>\n", $self->{_nir_type_du_oth});
	$out .= sprintf("\t\t\t<nir_vac_info>%d</nir_vac_info>\n", $self->{_nir_vac_info});
	$out .= sprintf("\t\t\t<nir_vac_info_oth>%s</nir_vac_info_oth>\n", $self->{_nir_vac_info_oth});
	$out .= sprintf("\t\t\t<nir_noaccess>%d</nir_noaccess>\n", $self->{_nir_noaccess});
	$out .= sprintf("\t\t\t<nir_noaccess_oth>%s</nir_noaccess_oth>\n", $self->{_nir_noaccess_oth});
	$out .= sprintf("\t\t\t<nir_access_attempt>%d</nir_access_attempt>\n", $self->{_nir_access_attempt});
	$out .= sprintf("\t\t\t<nir_access_attempt_oth>%s</nir_access_attempt_oth>\n", $self->{_nir_access_attempt_oth});
	$out .= sprintf("\t\t\t<nir_type_person>%d</nir_type_person>\n", $self->{_nir_type_person});
	$out .= sprintf("\t\t\t<nir_type_person_oth>%s</nir_type_person_oth>\n", $self->{_nir_type_person_oth});
	$out .= sprintf("\t\t\t<cog_inform_relation>%d</cog_inform_relation>\n", $self->{_cog_inform_relation});
	$out .= sprintf("\t\t\t<cog_inform_relation_oth>%s</cog_inform_relation_oth>\n", $self->{_cog_inform_relation_oth});
	$out .= sprintf("\t\t\t<cog_dis_desc>%s</cog_dis_desc>\n", $self->{_cog_dis_desc});
	$out .= sprintf("\t\t\t<perm_disability>%s</perm_disability>\n", $self->{_perm_disability});
	$out .= sprintf("\t\t\t<deceased_inform_relation>%d</deceased_inform_relation>\n", $self->{_deceased_inform_relation});
	$out .= sprintf("\t\t\t<deceased_inform_oth>%s</deceased_inform_oth>\n", $self->{_deceased_inform_oth});
	$out .= sprintf("\t\t\t<yod>%d</yod>\n", $self->{_yod});
	$out .= sprintf("\t\t\t<state_death>%s</state_death>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_state_death});
	$out .= sprintf("\t\t\t<who_refused>%d</who_refused>\n", $self->{_who_refused});
	$out .= sprintf("\t\t\t<who_refused_oth>%s</who_refused_oth>\n", $self->{_who_refused_oth});
	$out .= sprintf("\t\t\t<refuser_strength>%d</refuser_strength>\n", $self->{_refuser_strength});
	$out .= sprintf("\t\t\t<ref_action>%d</ref_action>\n", $self->{_ref_action});
	$out .= sprintf("\t\t\t<lt_illness_desc>%s</lt_illness_desc>\n", $self->{_lt_illness_desc});
	$out .= sprintf("\t\t\t<perm_ltr>%d</perm_ltr>\n", $self->{_perm_ltr});
	$out .= sprintf("\t\t\t<reason_unavail>%d</reason_unavail>\n", $self->{_reason_unavail});
	$out .= sprintf("\t\t\t<reason_unavail_oth>%s</reason_unavail_oth>\n", $self->{_reason_unavail_oth});
	$out .= sprintf("\t\t\t<date_available>%s</date_available>\n", $self->{_date_available});
	$out .= sprintf("\t\t\t<date_moved>%s</date_moved>\n", $self->{_date_moved});
	$out .= sprintf("\t\t\t<moved_length_time>%.1f</moved_length_time>\n", $self->{_moved_length_time});
	$out .= sprintf("\t\t\t<moved_unit>%d</moved_unit>\n", $self->{_moved_unit});
	$out .= sprintf("\t\t\t<moved_inform_relation>%d</moved_inform_relation>\n", $self->{_moved_inform_relation});
	$out .= sprintf("\t\t\t<moved_relation_oth>%s</moved_relation_oth>\n", $self->{_moved_relation_oth});
	$out .= sprintf("\t\t\t<nir_other>%s</nir_other>\n", $self->{_nir_other});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</non_interview_rpt>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getNirId						{ my $self = shift; return $self->{_nir_id} || ''; }
sub getContactId					{ my $self = shift; return $self->{_contact_id} || ''; }
sub getNir							{ my $self = shift; return $self->{_nir} || ''; }
sub getDuId							{ my $self = shift; return $self->{_du_id} || ''; }
sub getPersonId						{ my $self = shift; return $self->{_person_id} || ''; }
sub getNirTypeDu					{ my $self = shift; return $self->{_nir_type_id} || ''; }
sub getNirTypeDuOth					{ my $self = shift; return $self->{_nir_type_id_oth} || ''; }
sub getNirVacInfo					{ my $self = shift; return $self->{_nir_vac_info} || ''; }
sub getNirVacInfoOth				{ my $self = shift; return $self->{_nir_vac_info_oth} || ''; }
sub getNirNoaccess					{ my $self = shift; return $self->{_nir_noaccess} || ''; }
sub getNirNoaccessOth				{ my $self = shift; return $self->{_nir_noaccess_oth} || ''; }
sub getNirAccessAttempt				{ my $self = shift; return $self->{_nir_access_attempt} || ''; }
sub getNirAccessAttemptOth			{ my $self = shift; return $self->{_nir_access_attempt_oth} || ''; }
sub getNirTypePerson				{ my $self = shift; return $self->{_nir_type_person} || ''; }
sub getNirTypePersonOth				{ my $self = shift; return $self->{_nir_type_peson_oth} || ''; }
sub getCogInformRelation			{ my $self = shift; return $self->{_cog_inform_relation} || ''; }
sub getCogInformRelationOth			{ my $self = shift; return $self->{_cog_inform_relation_oth} || ''; }
sub getCogDisDesc					{ my $self = shift; return $self->{_cog_dis_desc} || ''; }
sub getPermDisability				{ my $self = shift; return $self->{_perm_disability} || ''; }
sub getDeceasedInformRelation		{ my $self = shift; return $self->{_deceased_inform_relation} || ''; }
sub getDeceasedInformOth			{ my $self = shift; return $self->{_deceased_inform_oth} || ''; }
sub getYod							{ my $self = shift; return $self->{_yod} || ''; }
sub getStateDeath					{ my $self = shift; return $self->{_state_death} || ''; }
sub getWhoRefused					{ my $self = shift; return $self->{_who_refused} || ''; }
sub getWhoRefusedOth				{ my $self = shift; return $self->{_who_refused_oth} || ''; }
sub getRefuserStrength				{ my $self = shift; return $self->{_refuser_strength} || ''; }
sub getRefAction					{ my $self = shift; return $self->{_ref_action} || ''; }
sub getLtIllnessDesc				{ my $self = shift; return $self->{_lt_illness_desc} || ''; }
sub getPermLtr						{ my $self = shift; return $self->{_perm_ltr} || ''; }
sub getReasonUnavail				{ my $self = shift; return $self->{_reason_unavail} || ''; }
sub getReasonUnavailOth				{ my $self = shift; return $self->{_reason_unavail_oth} || ''; }
sub getDateAvailable				{ my $self = shift; return $self->{_date_available} || ''; }
sub getDateMoved					{ my $self = shift; return $self->{_date_moved} || ''; }
sub getMovedLengthTime				{ my $self = shift; return $self->{_moved_length_time} || ''; }
sub getMovedUnit					{ my $self = shift; return $self->{_moved_unit} || ''; }
sub getMovedInformRelation			{ my $self = shift; return $self->{_moved_inform_relation} || ''; }
sub getMovedRelationOth				{ my $self = shift; return $self->{_moved_relation_oth} || ''; }
sub getNirOther						{ my $self = shift; return $self->{_nir_other} || ''; }
sub getCreateDate					{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
