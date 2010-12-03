package Ncs::Xml::Incident;

use strict;
use warnings;
use Ncs::Op;

use constant INCTYPE_MIN			=> 1;
use constant INCTYPE_MAX			=> 5;
use constant INCLOSS_MEDIA_MIN		=> 1;
use constant INCLOSS_MEDIA_MAX		=> 3;
use constant INSSEV_MIN				=> 1;
use constant INSSEV_MAX				=> 4;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id							=> undef,
		_incident_id					=> undef,
		_incident_date					=> undef,
		_incident_time					=> undef,
		_inc_report_date				=> undef,
		_inc_report_time				=> undef,
		_inc_staff_reporter_id			=> undef,
		_inc_staff_supervisor_id		=> undef,
		_inc_recip_is_participant		=> undef,
		_inc_recip_is_du				=> undef,
		_inc_recip_is_staff				=> undef,
		_inc_recip_is_family			=> undef,
		_inc_recip_is_acquaintance		=> undef,
		_inc_recip_is_other				=> undef,
		_inc_contact_person				=> undef,
		_inctype						=> undef,
		_inctype_oth					=> undef,
		_incloss_cmptr_model			=> undef,
		_incloss_cmptr_sn				=> undef,
		_incloss_cmptr_decal			=> undef,
		_incloss_rem_media				=> undef,
		_incloss_paper					=> undef,
		_incloss_oth					=> undef,
		_inc_description				=> undef,
		_inc_action						=> undef,
		_inc_reported					=> undef,
		_contact_link_id				=> undef,
		_create_date					=> undef,
		_table_spec_version				=> Ncs::Op::INCIDENT_VERSION,
		_transaction_type				=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap						=> $soap,
		_table							=> Ncs::Db::DbDefs::INCIDENT_TABLE,
		_sql							=> 'select ID, INCIDENT_ID, DATE_FORMAT(incident_date, \'%Y-%m-%d\') AS ' .
											'INCIDEN_DATE, DATE_FORMAT(incident_time, \'%H:%i\') AS INCIDENT_TIME, ' .
											'DATE_FORMAT(inc_report_date, \'%Y-%m-%d\') AS INC_REPORT_DATE, ' .
											'DATE_FORMAT(inc_report_time, \'%H:%i\') AS INC_REPORT_TIME, ' .
											'INC_RECIP_IS_OTHER, ' .
											'INCTYPE, INCTYPE_OTH, INCLOSS_CMPTR_MODEL, INCLOSS_CMPTR_SN, ' .
											'INCLOSS_CMPTR_DECAL, INCLOSS_REM_MEDIA, INCLOSS_PAPER, INCLOSS_OTH, ' .
											'INC_DESCRIPTION, INC_ACTION, INC_REPORTED, ' .
											'DATE_FORMAT(create_date, \'%Y-%m-%d\') AS CREATE_DATE from ' .
											Ncs::Db::DbDefs::INCIDENT_TABLE
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve incident record id
	my $incident_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::INCIDENT_SUGAR_MODULE, 
									id => $incident_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve inc_staff_reporter_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::INCIDENT_SUGAR_MODULE, 
									id => $incident_sugar_id, 
									module2 => Ncs::Db::DbDefs::STAFF_SUGAR_MODULE,
									relationship_name => Ncs::Db::DbDefs::INCIDENT_INC_STAFF_RPTR_ID_REL});
	# retrieve field (staff_id) value
	my $inc_staff_reporter_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::STAFF_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'staff_id'});

	# retrieve inc_staff_supervisor_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::INCIDENT_SUGAR_MODULE, 
									id => $incident_sugar_id, 
									module2 => Ncs::Db::DbDefs::STAFF_SUGAR_MODULE, 
									relationship_name => Ncs::Db::DbDefs::INCIDENT_INC_STAFF_SPRVSR_ID_REL});
	# retrieve field (staff_id) value
	my $inc_staff_supervisor_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::STAFF_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'staff_id'});

	# retrieve inc_recip_is_participant relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::INCIDENT_SUGAR_MODULE, 
									id => $incident_sugar_id, 
									module2 => Ncs::Db::DbDefs::PARTICIPANT_SUGAR_MODULE});
	# retrieve field (p_id) value
	my $inc_recip_is_participant_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PARTICIPANT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'p_id'});

	# retrieve inc_recip_is_du relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::INCIDENT_SUGAR_MODULE, 
									id => $incident_sugar_id, 
									module2 => Ncs::Db::DbDefs::DWELLING_UNIT_SUGAR_MODULE});
	# retrieve field (du_id) value
	my $inc_recip_is_du_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::DWELLING_UNIT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'du_id'});

	# retrieve inc_recip_is_staff relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::INCIDENT_SUGAR_MODULE, 
									id => $incident_sugar_id, 
									module2 => Ncs::Db::DbDefs::STAFF_SUGAR_MODULE, 
									relationship_name => Ncs::Db::DbDefs::INCIDENT_INC_RECIP_IS_STAFF_REL});
	# retrieve field (staff_id) value
	my $inc_recip_is_staff_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::STAFF_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'staff_id'});

	# retrieve inc_recip_is_family relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::INCIDENT_SUGAR_MODULE, 
									id => $incident_sugar_id, 
									module2 => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									relationship_name => Ncs::Db::DbDefs::INCIDENT_INC_RECIP_IS_FAMILY_REL});
	# retrieve field (person_id) value
	my $inc_recip_is_family_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'person_id'});

	# retrieve inc_recip_is_acquaintance relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::INCIDENT_SUGAR_MODULE, 
									id => $incident_sugar_id, 
									module2 => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									relationship_name => Ncs::Db::DbDefs::INCIDENT_INC_RECIP_IS_AQUAINT_REL});
	# retrieve field (person_id) value
	my $inc_recip_is_acquaintance_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'person_id'});

	# retrieve inc_contact_person relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::INCIDENT_SUGAR_MODULE, 
									id => $incident_sugar_id, 
									module2 => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									relationship_name => Ncs::Db::DbDefs::INCIDENT_INC_CONTACT_PERSON_REL});
	# retrieve field (person_id) value
	my $inc_contact_person_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'person_id'});

	# retrieve contact_link_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::INCIDENT_SUGAR_MODULE, 
									id => $incident_sugar_id, 
									module2 => Ncs::Db::DbDefs::LINK_CONTACT_SUGAR_MODULE});
	# retrieve field (contact_link_id) value
	my $inc_contact_link_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::LINK_CONTACT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'contact_link_id'});

	$self->{_psu_id}						= $psu_id_field_value;
	$self->{_incident_id}					= $values->{INCIDENT_ID} || Ncs::Op::UNKNOWN;
	$self->{_incident_date}					= $values->{INCIDENT_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_incident_time}					= $values->{INCIDENT_TIME} || Ncs::Op::UNKNOWN_TIME;
	$self->{_inc_report_date}				= $values->{INC_REPORT_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_inc_report_time}				= $values->{INC_REPORT_TIME} || Ncs::Op::UNKNOWN_TIME;
	$self->{_inc_staff_reporter_id}			= $inc_staff_reporter_id_field_value;
	$self->{_inc_staff_supervisor_id}		= $inc_staff_reporter_id_field_value;
	$self->{_inc_recip_is_participant}		= $inc_recip_is_participant_field_value;
	$self->{_inc_recip_is_du}				= $inc_recip_is_du_field_value;
	$self->{_inc_recip_is_staff}			= $inc_recip_is_staff_field_value;
	$self->{_inc_recip_is_family}			= $inc_recip_is_family_field_value;
	$self->{_inc_recip_is_acquaintance}		= $inc_recip_is_acquaintance_field_value;
	$self->{_inc_recip_is_other}			= $values->{INC_RECIP_IS_OTHER} || Ncs::Op::UNKNOWN;
	$self->{_inc_contact_person}			= $inc_contact_person_field_value;
	$self->{_inctype}						= Ncs::Op::atoi($values->{INCTYPE}) || Ncs::Op::UNKNOWN;
	$self->{_inctype_oth}					= $values->{INCTYPE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_incloss_cmptr_model}			= $values->{INCLOSS_CMPTR_MODEL} || Ncs::Op::UNKNOWN;
	$self->{_incloss_cmptr_sn}				= $values->{INCLOSS_CMPTR_SN} || Ncs::Op::UNKNOWN;
	$self->{_incloss_cmptr_decal}			= $values->{INCLOSS_CMPTR_DECAL} || Ncs::Op::UNKNOWN;
	$self->{_incloss_rem_media}				= $values->{INCLOSS_REM_MEDIA} || Ncs::Op::UNKNOWN;
	$self->{_incloss_paper}					= $values->{INCLOSS_PAPER} || Ncs::Op::UNKNOWN;
	$self->{_incloss_oth}					= $values->{INCLOSS_OTH} || Ncs::Op::UNKNOWN;
	$self->{_inc_description}				= $values->{INC_DESCRIPTION} || Ncs::Op::UNKNOWN;
	$self->{_inc_action}					= $values->{INC_ACTION} || Ncs::Op::UNKNOWN;
	$self->{_inc_reported}					= Ncs::Op::atoi($values->{INC_REPORTED}) || Ncs::Op::UNKNOWN;
	$self->{_contact_link_id}				= $inc_contact_link_id_field_value;
	$self->{_create_date}					= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "INCIDENT_ID column exceeds allowed character length" unless ( length($self->{_incident_id}) <= 36 );
	return "INCIDENT_DATE column contains an invalid date format" unless ( $self->{_incident_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "INCIDENT_TIME column contains an invalid time format" unless ( $self->{_incident_time} =~ /^\d{2}:\d{2}$/ );
	return "INC_REPORT_DATE column contains an invalid date format" unless ( $self->{_inc_report_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "INC_REPORT_TIME column contains an invalid time format" unless ( $self->{_inc_report_time} =~ /^\d{2}:\d{2}$/ );
	return "INC_STAFF_REPORTER_ID column exceeds allowed character length" unless ( length($self->{_inc_staff_reporter_id}) <= 36 );
	return "INC_STAFF_SUPERVISOR_ID column exceeds allowed character length" unless ( length($self->{_inc_staff_supervisor_id}) <= 36 );
	return "INC_RECIP_IS_PARTICIPANT column exceeds allowed character length" unless ( length($self->{_inc_recip_is_participant}) <= 36 );
	return "INC_RECIP_IS_DU column exceeds allowed character length" unless ( length($self->{_inc_recip_is_du}) <= 36 );
	return "INC_RECIP_IS_STAFF column exceeds allowed character length" unless ( length($self->{_inc_recip_is_staff}) <= 36 );
	return "INC_RECIP_IS_FAMILY column exceeds allowed character length" unless ( length($self->{_inc_recip_is_family}) <= 36 );
	return "INC_RECIP_IS_ACQUAINTANCE column exceeds allowed character length" unless ( length($self->{_inc_recip_is_acquaintance}) <= 36 );
	return "INC_CONTACT_PERSON column exceeds allowed character length" unless ( length($self->{_inc_contact_person}) <= 36 );
	return "INCTYPE column contains an invalid numeric value" unless ( ($self->{_inctype} >= INCTYPE_MIN && 
																			$self->{_inctype} <= INCTYPE_MAX) ||
																			$self->{_inctype} == Ncs::Op::OTHER ||
																			$self->{_inctype} == Ncs::Op::UNKNOWN );
	if ($self->{_inctype} != Ncs::Op::OTHER) { $self->{_inctype_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "INCTYPE_OTH column exceeds allowed character length" unless ( length($self->{_inctype_oth}) <= 255 );
	return "INCLOSS_CMPTR_MODEL column exceeds allowed character length" unless ( length($self->{_incloss_cmptr_model}) <= 16 );
	return "INCLOSS_CMPTR_SN column exceeds allowed character length" unless ( length($self->{_incloss_cmptr_sn}) <= 32 );
	return "INCLOSS_CMPTR_DECAL column exceeds allowed character length" unless ( length($self->{_incloss_cmptr_decal}) <= 32 );
	return "INCLOSS_REM_MEDIA column exceeds allowed character length" unless ( length($self->{_incloss_rem_media}) <= 32 );
	return "INCLOSS_PAPER column exceeds allowed character length" unless ( length($self->{_incloss_paper}) <= 32 );
	return "INCLOSS_OTH column exceeds allowed character length" unless ( length($self->{_incloss_oth}) <= 250 );
	return "INC_DESCRIPTION column exceeds allowed character length" unless ( length($self->{_inc_description}) <= 8000 );
	return "INC_ACTION column exceeds allowed character length" unless ( length($self->{_inc_action}) <= 8000 );
	return "INC_REPORTED column contains an invalid numeric value" unless ( $self->{_inc_reported} == Ncs::Op::YES || 
																			$self->{_inc_reported} == Ncs::Op::NO ||
																			$self->{_inc_reported} == Ncs::Op::UNKNOWN );
	return "CONTACT_LINK_ID column exceeds allowed character length" unless ( length($self->{_contact_link_id}) <= 36 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<incident>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<incident_id>%s</incident_id>\n", $self->{_incident_id});
	$out .= sprintf("\t\t\t<incident_date>%s</incident_date>\n", $self->{_incident_date});
	$out .= sprintf("\t\t\t<incident_time>%s</incident_time>\n", $self->{_incident_time});
	$out .= sprintf("\t\t\t<inc_report_date>%s</inc_report_date>\n", $self->{_inc_report_date});
	$out .= sprintf("\t\t\t<inc_report_time>%s</inc_report_time>\n", $self->{_inc_report_time});
	$out .= sprintf("\t\t\t<inc_staff_reporter_id>%s</inc_staff_reporter_id>\n", $self->{_inc_staff_reporter_id});
	$out .= sprintf("\t\t\t<inc_staff_supervisor_id>%s</inc_staff_supervisor_id>\n", $self->{_inc_staff_supervisor_id});
	$out .= sprintf("\t\t\t<inc_recip_is_participant>%s</inc_recip_is_participant>\n", $self->{_inc_recip_is_participant});
	$out .= sprintf("\t\t\t<inc_recip_is_du>%s</inc_recip_is_du>\n", $self->{_inc_recip_is_du});
	$out .= sprintf("\t\t\t<inc_recip_is_staff>%s</inc_recip_is_staff>\n", $self->{_inc_recip_is_staff});
	$out .= sprintf("\t\t\t<inc_recip_is_family>%s</inc_recip_is_family>\n", $self->{_inc_recip_is_family});
	$out .= sprintf("\t\t\t<inc_recip_is_acquaintance>%s</inc_recip_is_acquaintance>\n", $self->{_inc_recip_is_acquaintance});
	$out .= sprintf("\t\t\t<inc_recip_is_other>%d</inc_recip_is_other>\n", $self->{_inc_recip_is_other});
	$out .= sprintf("\t\t\t<inc_contact_person>%s</inc_contact_person>\n", $self->{_inc_contact_person});
	$out .= sprintf("\t\t\t<inctype>%s</inctype>\n", $self->{_inctype});
	$out .= sprintf("\t\t\t<inctype_oth>%s</inctype_oth>\n", $self->{_inctype_oth});
	$out .= sprintf("\t\t\t<incloss_cmptr_model>%s</incloss_cmptr_model>\n", $self->{_incloss_cmptr_model});
	$out .= sprintf("\t\t\t<incloss_cmptr_sn>%s</incloss_cmptr_sn>\n", $self->{_incloss_cmptr_sn});
	$out .= sprintf("\t\t\t<incloss_cmptr_decal>%s</incloss_cmptr_decal>\n", $self->{_incloss_cmptr_decal});
	$out .= sprintf("\t\t\t<incloss_rem_media>%s</incloss_rem_media>\n", $self->{_incloss_rem_media});
	$out .= sprintf("\t\t\t<incloss_paper>%s</incloss_paper>\n", $self->{_incloss_paper});
	$out .= sprintf("\t\t\t<incloss_oth>%s</incloss_oth>\n", $self->{_incloss_oth});
	$out .= sprintf("\t\t\t<inc_description>%s</inc_description>\n", $self->{_inc_description});
	$out .= sprintf("\t\t\t<inc_action>%s</inc_action>\n", $self->{_inc_action});
	$out .= sprintf("\t\t\t<inc_reported>%d</inc_reported>\n", $self->{_inc_reported});
	$out .= sprintf("\t\t\t<contact_link_id>%s</contact_link_id>\n", $self->{_contact_link_id});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</incident>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getIncidentId					{ my $self = shift; return $self->{_incident_id} || ''; }
sub getIncidentDate					{ my $self = shift; return $self->{_incident_date} || ''; }
sub getIncidentTime					{ my $self = shift; return $self->{_incident_time} || ''; }
sub getIncReportDate				{ my $self = shift; return $self->{_inc_report_date} || ''; }
sub getIncReportTime				{ my $self = shift; return $self->{_inc_report_time} || ''; }
sub getIncStaffReporterId			{ my $self = shift; return $self->{_inc_staff_reporter_id} || ''; }
sub getIncStaffSupervisorId			{ my $self = shift; return $self->{_inc_staff_supervisor_id} || ''; }
sub getIncRecipIsParticipant		{ my $self = shift; return $self->{_inc_recip_is_participant} || ''; }
sub getIncRecipIsDu					{ my $self = shift; return $self->{_inc_recip_is_du} || ''; }
sub getIncRecipIsStaff				{ my $self = shift; return $self->{_inc_recip_is_staff} || ''; }
sub getIncRecipIsFamily				{ my $self = shift; return $self->{_inc_recip_is_family} || ''; }
sub getIncRecipIsAcquaintance		{ my $self = shift; return $self->{_inc_recip_is_acquaintance} || ''; }
sub getIncRecipIsOther				{ my $self = shift; return $self->{_inc_recip_is_other} || ''; }
sub getIncContactPerson				{ my $self = shift; return $self->{_inc_contact_person} || ''; }
sub getIncType						{ my $self = shift; return $self->{_inctype} || ''; }
sub getIncTypeOth					{ my $self = shift; return $self->{_inctype_oth} || ''; }
sub getInclossCmptrModel			{ my $self = shift; return $self->{_incloss_cmptr_model} || ''; }
sub getInclossCmptrSn				{ my $self = shift; return $self->{_incloss_cmptr_sn} || ''; }
sub getInclossCmptrDecal			{ my $self = shift; return $self->{_incloss_cmptr_decal} || ''; }
sub getInclossRemMedia				{ my $self = shift; return $self->{_incloss_rem_media} || ''; }
sub getInclossPaper					{ my $self = shift; return $self->{_incloss_paper} || ''; }
sub getInclossOth					{ my $self = shift; return $self->{_incloss_oth} || ''; }
sub getIncDescription				{ my $self = shift; return $self->{_inc_description} || ''; }
sub getIncAction					{ my $self = shift; return $self->{_inc_action} || ''; }
sub getIncReported					{ my $self = shift; return $self->{_inc_reported} || ''; }
sub getContactLinkId				{ my $self = shift; return $self->{_contact_link_id} || ''; }
sub getCreateDate					{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
