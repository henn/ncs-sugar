package Ncs::Xml::ParticipantConsent;

use strict;
use warnings;
use Ncs::Op;

use constant CONSENT_TYPE_MIN			=> 1;
use constant CONSENT_TYPE_MAX			=> 6;
use constant CONSENT_LANGUAGE_MIN		=> 1;
use constant CONSENT_LANGUAGE_MAX		=> 17;
use constant WHO_CONSENTED_MIN			=> 1;
use constant WHO_CONSENTED_MAX			=> 3;
use constant WHO_WTHDRW_CONSENT_MIN		=> 1;
use constant WHO_WTHDRW_CONSENT_MAX		=> 3;
use constant CONSENT_TRANSLATE_MIN		=> 1;
use constant CONSENT_TRANSLATE_MAX		=> 6;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_participant_consent_id		=> undef,
		_p_id						=> undef,
		_consent_type				=> undef,
		_consent_given				=> undef,
		_consent_date				=> undef,
		_consent_withdraw			=> undef,
		_consent_withdraw_date		=> undef,
		_consent_langauge			=> undef,
		_consent_language_oth		=> undef,
		_person_who_consented_id	=> undef,
		_who_consented				=> undef,
		_person_wthdrw_consent_id	=> undef,
		_who_wthdrw_consent			=> undef,
		_consent_translate			=> undef,
		_consent_comments			=> undef,
		_contact_link_id			=> undef,
		_create_date				=> undef,
		_sugar_soap					=> $soap,
		_table_spec_version			=> Ncs::Op::PARTICIPANT_CONSENT_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_table						=> Ncs::Db::DbDefs::PARTICIPANT_CONSENT_TABLE,
		_sql						=> 'select ID, PARTICIPANT_CONSENT_ID, CONSENT_TYPE, ' .
										'CONSENT_GIVEN, DATE_FORMAT(create_date, \'%Y-%m-%d\') AS ' .
										'CONSENT_DATE, CONSENT_WITHDRAW, DATE_FORMAT(create_date, ' .
										'\'%Y-%m-%d\') AS CONSENT_WITHDRAW_DATE, CONSENT_LANGUAGE, ' .
										'CONSENT_LANGUAGE_OTH, WHO_CONSENTED, ' .
										'WHO_WTHDRW_CONSENT, CONSENT_TRANSLATE, ' .
										'CONSENT_COMMENTS, DATE_FORMAT(create_date, ' .
										'\'%Y-%m-%d\') AS CREATE_DATE from ' . 
										Ncs::Db::DbDefs::PARTICIPANT_CONSENT_TABLE
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve participant consent record sugar id
	my $participant_consent_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PARTICIPANT_CONSENT_SUGAR_MODULE, 
									id => $participant_consent_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve p_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PARTICIPANT_CONSENT_SUGAR_MODULE, 
									id => $participant_consent_sugar_id, 
									module2 => Ncs::Db::DbDefs::PARTICIPANT_SUGAR_MODULE});
	# retrieve field (p_id) value
	my $p_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PARTICIPANT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'p_id'});

	# retrieve person_who_consented_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PARTICIPANT_CONSENT_SUGAR_MODULE, 
									id => $participant_consent_sugar_id, 
									module2 => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE,
									relationship_name => Ncs::Db::DbDefs::PARTICIPANT_CONSENT_PRSN_WHO_CONSNTED_REL});
	# retrieve field (person_id) value
	my $person_who_consented_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'person_id'});

	# retrieve person_wthdrw_consent_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PARTICIPANT_CONSENT_SUGAR_MODULE, 
									id => $participant_consent_sugar_id, 
									module2 => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									relationship_name => Ncs::Db::DbDefs::PARTICIPANT_CONSENT_PRSN_WTHDRW_CONSNT_REL});
	# retrieve field (person_id) value
	my $person_wthdrw_consent_id_field_value;
	if(defined($rel_id))
	{
		$person_wthdrw_consent_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'person_id'});
	}
	else
	{
		# if no person has withdrawn consent, set to not applicable
		$person_wthdrw_consent_id_field_value = Ncs::Op::NOT_APPLICABLE;
	}

	# retrieve contact_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PARTICIPANT_CONSENT_SUGAR_MODULE, 
									id => $participant_consent_sugar_id, 
									module2 => Ncs::Db::DbDefs::CONTACT_SUGAR_MODULE});
	# retrieve field (contact_id) value
	my $contact_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::CONTACT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'contact_id'});

	$self->{_psu_id}					= $psu_id_field_value;
	$self->{_participant_consent_id}	= $values->{PARTICIPANT_CONSENT_ID} || Ncs::Op::UNKNOWN;
	$self->{_p_id}						= $p_id_field_value;
	$self->{_consent_type}				= Ncs::Op::atoi($values->{CONSENT_TYPE}) || Ncs::Op::UNKNOWN;
	$self->{_consent_given}				= $values->{CONSENT_GIVEN} || Ncs::Op::UNKNOWN;
	$self->{_consent_date}				= $values->{CONSENT_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_consent_withdraw}			= $values->{CONSENT_WITHDRAW} || Ncs::Op::UNKNOWN;
	$self->{_consent_withdraw_date}		= $values->{CONSENT_WITHDRAW_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_consent_language}			= Ncs::Op::atoi($values->{CONSENT_LANGUAGE}) || Ncs::Op::UNKNOWN;
	$self->{_consent_language_oth}		= $values->{CONSENT_LANGUAGE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_person_who_consented_id}	= $person_who_consented_id_field_value;
	$self->{_who_consented}				= Ncs::Op::atoi($values->{WHO_CONSENTED}) || Ncs::Op::UNKNOWN;
	$self->{_person_wthdrw_consent_id}	= $values->{PERSON_WTHDRW_CONSENT_ID} || Ncs::Op::UNKNOWN;
	$self->{_who_wthdrw_consent}		= $person_wthdrw_consent_id_field_value;
	$self->{_consent_translate}			= Ncs::Op::atoi($values->{CONSENT_TRANSLATE}) || Ncs::Op::UNKNOWN;
	$self->{_consent_comments}			= $values->{CONSENT_COMMENTS} || '';
	$self->{_contact_link_id}			= $contact_id_field_value;
	$self->{_create_date}				= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "PARTICIPANT_CONSENT_ID column exceeds allowed character length" unless ( length($self->{_participant_consent_id}) <= 36 );
	return "P_ID column exceeds allowed character length" unless ( length($self->{_p_id}) <= 36 );
	return "CONSENT_TYPE column contains an invalid numeric value" unless ( ($self->{_consent_type} >= CONSENT_TYPE_MIN && 
																				$self->{_consent_type} <= CONSENT_TYPE_MAX) ||
																				$self->{_consent_type} == Ncs::Op::UNKNOWN );
	return "CONSENT_GIVEN column contains an invalid numeric value" unless ( $self->{_consent_given} == Ncs::Op::YES || 
																				$self->{_consent_given} <= Ncs::Op::NO ||
																				$self->{_consent_given} == Ncs::Op::UNKNOWN );
	if ( $self->{_consent_given} == Ncs::Op::NO ) { 
		$self->{_consent_date} = Ncs::Op::NOT_APPLICABLE_DATE 
	}
	else {
		return "CONSENT_DATE column contains an invalid date format" unless ( $self->{_consent_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	}
	return "CONSENT_WITHDRAW column contains an invalid numeric value" unless ( $self->{_consent_withdraw} == Ncs::Op::YES || 
																				$self->{_consent_withdraw} <= Ncs::Op::NO ||
																				$self->{_consent_withdraw} == Ncs::Op::UNKNOWN );
	if ( $self->{_consent_withdraw} == Ncs::Op::NO ) { 
		$self->{_consent_withdraw_date} = Ncs::Op::NOT_APPLICABLE_DATE;
		$self->{_person_wthdrw_consent_id} = Ncs::Op::NOT_APPLICABLE;
		$self->{_who_wthdrw_consent} = Ncs::Op::NOT_APPLICABLE;
	} else {
		return "CONSENT_WITHDRAW_DATE column contains an invalid date format" unless ( $self->{_consent_withdraw_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	}
	return "CONSENT_LANGUAGE column contains an invalid numeric value" unless ( ($self->{_consent_language} >= CONSENT_LANGUAGE_MIN && 
																					$self->{_consent_language} <= CONSENT_LANGUAGE_MAX) ||
																					$self->{_consent_language} == Ncs::Op::REFUSED ||
																					$self->{_consent_language} == Ncs::Op::OTHER || 
																					$self->{_consent_language} == Ncs::Op::UNKNOWN );
	if ($self->{_consent_language} != Ncs::Op::OTHER) { $self->{_consent_language_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "CONSENT_LANGUAGE_OTH column exceeds allowed character length" unless ( length($self->{_consent_language_oth}) <= 255 );
	return "PERSON_WHO_CONSENTED_ID column exceeds allowed character length" unless ( length($self->{_person_who_consented_id}) <= 36 );
	return "WHO_CONSENTED column contains an invalid numeric value" unless ( ($self->{_who_consented} >= WHO_CONSENTED_MIN && 
																				$self->{_who_consented} <= WHO_CONSENTED_MAX) ||
																				$self->{_who_consented} == Ncs::Op::UNKNOWN );
	return "PERSON_WTHDRW_CONSENT_ID column exceeds allowed character length" unless ( length($self->{_person_wthdrw_consent_id}) <= 36 );
	return "WHO_WTHDRW_CONSENT column contains an invalid numeric value" unless ( ($self->{_who_wthdrw_consent} >= WHO_WTHDRW_CONSENT_MIN && 
																					$self->{_who_wthdrw_consent} <= WHO_WTHDRW_CONSENT_MAX) || 
																					$self->{_who_wthdrw_consent} == Ncs::Op::NOT_APPLICABLE ||
																					$self->{_who_wthdrw_consent} == Ncs::Op::UNKNOWN );
	return "CONSENT_TRANSLATE column contains an invalid numeric value" unless ( ($self->{_consent_translate} >= CONSENT_TRANSLATE_MIN && 
																					$self->{_consent_translate} <= CONSENT_TRANSLATE_MAX) ||
																					$self->{_consent_translate} == Ncs::Op::UNKNOWN );
	return "CONSENT_COMMENTS column exceeds allowed character length" unless ( length($self->{_consent_comments}) <= 8000 );
	return "CONTACT_LINK_ID column exceeds allowed character length" unless ( length($self->{_contact_link_id}) <= 36 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<participant_consent>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<participant_consent_id>%s</participant_consent_id>\n", $self->{_participant_consent_id});
	$out .= sprintf("\t\t\t<p_id>%s</p_id>\n", $self->{_p_id});
	$out .= sprintf("\t\t\t<consent_type>%d</consent_type>\n", $self->{_consent_type});
	$out .= sprintf("\t\t\t<consent_given>%d</consent_given>\n", $self->{_consent_given});
	$out .= sprintf("\t\t\t<consent_date>%s</consent_date>\n", $self->{_consent_date});
	$out .= sprintf("\t\t\t<consent_withdraw>%d</consent_withdraw>\n", $self->{_consent_withdraw});
	$out .= sprintf("\t\t\t<consent_withdraw_date>%s</consent_withdraw_date>\n", $self->{_consent_withdraw_date});
	$out .= sprintf("\t\t\t<consent_language>%d</consent_language>\n", $self->{_consent_language});
	$out .= sprintf("\t\t\t<consent_language_oth>%s</consent_language_oth>\n", $self->{_consent_language_oth});
	$out .= sprintf("\t\t\t<person_who_consented_id>%s</person_who_consented_id>\n", $self->{_person_who_consented_id});
	$out .= sprintf("\t\t\t<who_consented>%d</who_consented>\n", $self->{_who_consented});
	$out .= sprintf("\t\t\t<person_wthdrw_consent_id>%s</person_wthdrw_consent_id>\n", $self->{_person_wthdrw_consent_id});
	$out .= sprintf("\t\t\t<who_wthdrw_consent>%d</who_wthdrw_consent>\n", $self->{_who_wthdrw_consent});
	$out .= sprintf("\t\t\t<consent_translate>%d</consent_translate>\n", $self->{_consent_translate});
	$out .= sprintf("\t\t\t<consent_comments>%s</consent_comments>\n", $self->{_consent_comments});
	$out .= sprintf("\t\t\t<contact_link_id>%s</contact_link_id>\n", $self->{_contact_link_id});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</participant_consent>");

	return $out;
}

sub getPsuId					{ my $self = shift; return $self->{_psu_id} || ''; }
sub getParticipantConsentId		{ my $self = shift; return $self->{_participant_consent_id} || ''; }
sub getPId						{ my $self = shift; return $self->{_p_id} || ''; }
sub getConsentType				{ my $self = shift; return $self->{_consent_type} || ''; }
sub getConsentGiven				{ my $self = shift; return $self->{_consent_given} || ''; }
sub getConsentDate				{ my $self = shift; return $self->{_consent_date} || ''; }
sub getConsentWithdraw			{ my $self = shift; return $self->{_consent_withdraw} || ''; }
sub getConsentWithdrawDate		{ my $self = shift; return $self->{_consent_withdraw_date} || ''; }
sub getConsentLanguage			{ my $self = shift; return $self->{_consent_language} || ''; }
sub getConsentLanguageOth		{ my $self = shift; return $self->{_consent_language_oth} || ''; }
sub getPersonWhoConsentedId		{ my $self = shift; return $self->{_person_who_consented_id} || ''; }
sub getWhoConsented				{ my $self = shift; return $self->{_who_consented} || ''; }
sub getPersonWthdrwConsentId	{ my $self = shift; return $self->{_person_wthdrw_consent_id} || ''; }
sub getWhoWthdrwConsent			{ my $self = shift; return $self->{_who_wthdrw_consent} || ''; }
sub getConsentTranslate			{ my $self = shift; return $self->{_consent_translate} || ''; }
sub getConsentComments			{ my $self = shift; return $self->{_consent_comments} || ''; }
sub getCreateDate				{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion			{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType			{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql						{ my $self = shift; return $self->{_sql} || ''; }
sub getTable					{ my $self = shift; return $self->{_table} || ''; }

1;
