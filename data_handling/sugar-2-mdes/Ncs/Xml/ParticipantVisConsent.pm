package Ncs::Xml::ParticipantVisConsent;

use strict;
use warnings;
use Ncs::Op;

use constant VIS_CONSENT_TYPE_MIN		=> 1;
use constant VIS_CONSENT_TYPE_MAX		=> 6;
use constant VIS_LANGUAGE_MIN			=> 1;
use constant VIS_LANGUAGE_MAX			=> 17;
use constant VIS_WHO_CONSENTED_MIN		=> 1;
use constant VIS_WHO_CONSENTED_MAX		=> 3;
use constant VIS_TRANSLATE_MIN			=> 1;
use constant VIS_TRANSLATE_MAX			=> 6;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id							=> undef,
		_pid_vis_consent_id				=> undef,
		_p_id							=> undef,
		_vis_consent_type				=> undef,
		_vis_consent_response			=> undef,
		_vis_langauge					=> undef,
		_vis_language_oth				=> undef,
		_vis_person_who_consented_id	=> undef,
		_vis_who_consented				=> undef,
		_vis_translate					=> undef,
		_vis_comments					=> undef,
		_contact_link_id				=> undef,
		_create_date					=> undef,
		_sugar_soap						=> $soap,
		_table_spec_version				=> Ncs::Op::PARTICIPANT_VIS_CONSENT_VERSION,
		_transaction_type				=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_table							=> Ncs::Db::DbDefs::PARTICIPANT_VIS_CONSENT_TABLE,
		_sql							=> 'select ID, PID_VIS_CONSENT_ID, VIS_CONSENT_TYPE, ' .
											'VIS_CONSENT_RESPONSE, VIS_LANGUAGE, VIS_LANGUAGE_OTH, ' .
											'VIS_WHO_CONSENTED, VIS_TRANSLATE, ' .
											'VIS_COMMENTS, DATE_FORMAT(date_entered, ' .
											'\'%Y-%m-%d\') AS CREATE_DATE from ' . 
											Ncs::Db::DbDefs::PARTICIPANT_VIS_CONSENT_TABLE . 
											' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve participant visit consent id
	my $participant_visit_consent_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PARTICIPANT_VIS_CONSENT_SUGAR_MODULE, 
									id => $participant_visit_consent_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve p_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PARTICIPANT_VIS_CONSENT_SUGAR_MODULE, 
									id => $participant_visit_consent_sugar_id, 
									module2 => Ncs::Db::DbDefs::PARTICIPANT_SUGAR_MODULE});
	# retrieve field (p_id) value
	my $p_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PARTICIPANT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'p_id'});

	# retrieve person_who_consented_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PARTICIPANT_VIS_CONSENT_SUGAR_MODULE, 
									id => $participant_visit_consent_sugar_id, 
									module2 => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE});
	# retrieve field (person_id) value
	my $person_who_consented_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'person_id'});

	# retrieve contact_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PARTICIPANT_VIS_CONSENT_SUGAR_MODULE, 
									id => $participant_visit_consent_sugar_id, 
									module2 => Ncs::Db::DbDefs::CONTACT_SUGAR_MODULE});
	# retrieve field (contact_id) value
	my $contact_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::CONTACT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'contact_id'});

	$self->{_psu_id}						= $psu_id_field_value;
	$self->{_pid_vis_consent_id}			= $values->{PID_VIS_CONSENT_ID} || Ncs::Op::UNKNOWN;
	$self->{_p_id}							= $p_id_field_value;
	$self->{_vis_consent_type}				= Ncs::Op::atoi($values->{VIS_CONSENT_TYPE}) || Ncs::Op::UNKNOWN;
	$self->{_vis_consent_response}			= $values->{VIS_CONSENT_RESPONSE} || Ncs::Op::UNKNOWN;
	$self->{_vis_language}					= Ncs::Op::atoi($values->{VIS_LANGUAGE}) || Ncs::Op::UNKNOWN;
	$self->{_vis_language_oth}				= $values->{VIS_LANGUAGE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_vis_person_who_consented_id}	= $person_who_consented_id_field_value;
	$self->{_vis_who_consented}				= Ncs::Op::atoi($values->{VIS_WHO_CONSENTED}) || Ncs::Op::UNKNOWN;
	$self->{_vis_translate}					= Ncs::Op::atoi($values->{VIS_TRANSLATE}) || Ncs::Op::UNKNOWN;
	$self->{_vis_comments}					= $values->{VIS_COMMENTS} || '';
	$self->{_contact_link_id}				= $contact_id_field_value;
	$self->{_create_date}					= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "PID_VIS_CONSENT_ID column exceeds allowed character length" unless ( length($self->{_pid_vis_consent_id}) <= 36 );
	return "P_ID column exceeds allowed character length" unless ( length($self->{_p_id}) <= 36 );
	return "VIS_CONSENT_TYPE column contains an invalid numeric value" unless ( $self->{_vis_consent_type} >= VIS_CONSENT_TYPE_MIN && 
																				$self->{_vis_consent_type} <= VIS_CONSENT_TYPE_MAX ||
																				$self->{_vis_consent_type} == Ncs::Op::UNKNOWN );
	return "VIS_CONSENT_RESPONSE column contains an invalid numeric value" unless ( $self->{_vis_consent_response} == Ncs::Op::YES || 
																					$self->{_vis_consent_response} <= Ncs::Op::NO ||
																					$self->{_vis_consent_response} <= Ncs::Op::UNKNOWN );
	return "VIS_LANGUAGE column contains an invalid numeric value" unless ( ($self->{_vis_language} >= VIS_LANGUAGE_MIN && 
																				$self->{_vis_language} <= VIS_LANGUAGE_MAX) ||
																				$self->{_vis_language} == Ncs::Op::REFUSED ||
																				$self->{_vis_language} == Ncs::Op::OTHER || 
																				$self->{_vis_language} == Ncs::Op::UNKNOWN );
	if ($self->{_vis_language} != Ncs::Op::OTHER) { $self->{_vis_language_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "VIS_LANGUAGE_OTH column exceeds allowed character length" unless ( length($self->{_vis_language_oth}) <= 255 );
	return "VIS_PERSON_WHO_CONSENTED_ID column exceeds allowed character length" unless ( length($self->{_vis_person_who_consented_id}) <= 36 );
	return "VIS_WHO_CONSENTED column contains an invalid numeric value" unless ( ($self->{_vis_who_consented} >= VIS_WHO_CONSENTED_MIN && 
																					$self->{_vis_who_consented} <= VIS_WHO_CONSENTED_MAX) ||
																					$self->{_vis_who_consented} == Ncs::Op::UNKNOWN );
	return "VIS_TRANSLATE column contains an invalid numeric value" unless ( ($self->{_vis_translate} >= VIS_TRANSLATE_MIN && 
																					$self->{_vis_translate} <= VIS_TRANSLATE_MAX) ||
																					$self->{_vis_translate} == Ncs::Op::UNKNOWN );
	return "VIS_COMMENTS column exceeds allowed character length" unless ( length($self->{_vis_comments}) <= 8000 );
	return "CONTACT_LINK_ID column exceeds allowed character length" unless ( length($self->{_contact_link_id}) <= 36 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<participant_vis_consent>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<pid_vis_consent_id>%s</pid_vis_consent_id>\n", $self->{_pid_vis_consent_id});
	$out .= sprintf("\t\t\t<p_id>%s</p_id>\n", $self->{_p_id});
	$out .= sprintf("\t\t\t<vis_consent_type>%d</vis_consent_type>\n", $self->{_vis_consent_type});
	$out .= sprintf("\t\t\t<vis_consent_response>%d</vis_consent_response>\n", $self->{_vis_consent_response});
	$out .= sprintf("\t\t\t<vis_lanaguage>%d</vis_lanaguage>\n", $self->{_vis_language});
	$out .= sprintf("\t\t\t<vis_language_oth>%s</vis_language_oth>\n", $self->{_vis_language_oth});
	$out .= sprintf("\t\t\t<vis_person_who_consented_id>%s</vis_person_who_consented_id>\n", $self->{_vis_person_who_consented_id});
	$out .= sprintf("\t\t\t<vis_who_consented>%d</vis_who_consented>\n", $self->{_vis_who_consented});
	$out .= sprintf("\t\t\t<vis_translate>%d</vis_translate>\n", $self->{_vis_translate});
	$out .= sprintf("\t\t\t<vis_comments>%s</vis_comments>\n", $self->{_vis_comments});
	$out .= sprintf("\t\t\t<contact_link_id>%s</contact_link_id>\n", $self->{_contact_link_id});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</participant_vis_consent>");

	return $out;
}

sub getPsuId					{ my $self = shift; return $self->{_psu_id} || ''; }
sub getPidVisConsentId			{ my $self = shift; return $self->{_pid_vis_consent_id} || ''; }
sub getPId						{ my $self = shift; return $self->{_p_id} || ''; }
sub getVisConsentType			{ my $self = shift; return $self->{_vis_consent_type} || ''; }
sub getVisConsentResponse		{ my $self = shift; return $self->{_vis_consent_response} || ''; }
sub getVisLanguage				{ my $self = shift; return $self->{_vis_lanaguage} || ''; }
sub getVisLanguageOth			{ my $self = shift; return $self->{_vis_language_oth} || ''; }
sub getPersonWhoConsentedId		{ my $self = shift; return $self->{_vis_person_who_consented_id} || ''; }
sub getVisWhoConsented			{ my $self = shift; return $self->{_vis_who_consented} || ''; }
sub getVisTranslate				{ my $self = shift; return $self->{_vis_translate} || ''; }
sub getVisComments				{ my $self = shift; return $self->{_vis_comments} || ''; }
sub getContactLinkId			{ my $self = shift; return $self->{_contact_link_id} || ''; }
sub getCreateDate				{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion			{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType			{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql						{ my $self = shift; return $self->{_sql} || ''; }
sub getTable					{ my $self = shift; return $self->{_table} || ''; }

1;
