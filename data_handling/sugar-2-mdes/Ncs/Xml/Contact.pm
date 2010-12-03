package Ncs::Xml::Contact;

use strict;
use warnings;
use Ncs::Op;

use constant CONTACT_TYPE_MIN			=> 1;
use constant CONTACT_TYPE_MAX			=> 6;
use constant CONTACT_LANG_MIN			=> 1;
use constant CONTACT_LANG_MAX			=> 17;
use constant CONTACT_INTERPRET_MIN		=> 1;
use constant CONTACT_INTERPRET_MAX		=> 6;
use constant CONTACT_LOCATION_MIN		=> 1;
use constant CONTACT_LOCATION_MAX		=> 6;
use constant WHO_CONTACTED_MIN			=> 1;
use constant WHO_CONTACTED_MAX			=> 10;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id							=> undef,
		_contact_id						=> undef,
		_contact_disp					=> undef,
		_contact_type					=> undef,
		_contact_type_oth				=> undef,
		_contact_date					=> undef,
		_contact_start_time				=> undef,
		_contact_end_time				=> undef,
		_contact_lang					=> undef,
		_contact_lang_oth				=> undef,
		_contact_interpret				=> undef,
		_contact_interpret_oth			=> undef,
		_contact_location				=> undef,
		_contact_location_oth			=> undef,
		_contact_private				=> undef,
		_contact_distance				=> undef,
		_who_contacted					=> undef,
		_who_contact_oth				=> undef,
		_contact_comment				=> undef,
		_create_date					=> undef,
		_table_spec_version				=> Ncs::Op::CONTACT_VERSION,
		_transaction_type				=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap						=> $soap,
		_table							=> Ncs::Db::DbDefs::CONTACT_TABLE,
		_sql							=> 'select ID, CONTACT_ID, CONTACT_DISP, CONTACT_TYPE, CONTACT_TYPE_OTH, ' .
											'DATE_FORMAT(contact_date, \'%Y-%m-%d\') AS CONTACT_DATE, ' .
											'DATE_FORMAT(contact_start_time, \'%H:%i\') AS CONTACT_START_TIME, ' .
											'DATE_FORMAT(contact_end_time, \'%H:%i\') AS CONTACT_END_TIME, ' .
											'CONTACT_LANG, CONTACT_LANG_OTH, CONTACT_INTERPRET, CONTACT_INTERPRET_OTH, ' .
											'CONTACT_LOCATION, CONTACT_LOCATION_OTH, CONTACT_PRIVATE, CONTACT_DISTANCE, ' .
											'WHO_CONTACTED, WHO_CONTACT_OTH, CONTACT_COMMENT, ' .
											'DATE_FORMAT(create_date, \'%Y-%m-%d\') AS CREATE_DATE from ' . 
											Ncs::Db::DbDefs::CONTACT_TABLE
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve contact record id
	my $contact_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::CONTACT_SUGAR_MODULE, 
									id => $contact_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	$self->{_psu_id}						= $psu_id_field_value;
	$self->{_contact_id}					= $values->{CONTACT_ID} || Ncs::Op::UNKNOWN;
	$self->{_contact_disp}					= $values->{CONTACT_DISP};
	$self->{_contact_type}					= Ncs::Op::atoi($values->{CONTACT_TYPE}) || Ncs::Op::UNKNOWN;
	$self->{_contact_type_oth}				= $values->{CONTACT_TYPE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_contact_date}					= $values->{CONTACT_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_contact_start_time}			= $values->{CONTACT_START_TIME} || Ncs::Op::UNKNOWN_TIME;
	$self->{_contact_end_time}				= $values->{CONTACT_END_TIME} || Ncs::Op::UNKNOWN_TIME;
	$self->{_contact_lang}					= Ncs::Op::atoi($values->{CONTACT_LANG}) || Ncs::Op::UNKNOWN;
	$self->{_contact_lang_oth}				= $values->{CONTACT_LANG_OTH} || Ncs::Op::UNKNOWN;
	$self->{_contact_interpret}				= Ncs::Op::atoi($values->{CONTACT_INTERPRET}) || Ncs::Op::UNKNOWN;
	$self->{_contact_interpret_oth}			= $values->{CONTACT_INTERPRET_OTH} || Ncs::Op::UNKNOWN;
	$self->{_contact_location}				= Ncs::Op::atoi($values->{CONTACT_LOCATION}) || Ncs::Op::UNKNOWN;
	$self->{_contact_location_oth}			= $values->{CONTACT_LOCATION_OTH} || Ncs::Op::UNKNOWN;
	$self->{_contact_private}				= $values->{CONTACT_PRIVATE} || Ncs::Op::UNKNOWN;
	$self->{_contact_distance}				= $values->{CONTACT_DISTANCE} || 0;
	$self->{_who_contacted}					= Ncs::Op::atoi($values->{WHO_CONTACTED}) || Ncs::Op::UNKNOWN;
	$self->{_who_contact_oth}				= $values->{WHO_CONTACT_OTH} || Ncs::Op::UNKNOWN;
	$self->{_contact_comment}				= $values->{CONTACT_COMMENT} || Ncs::Op::UNKNOWN;
	$self->{_create_date}					= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "CONTACT_ID column exceeds allowed character length" unless ( length($self->{_contact_id}) <= 36 );
	return "CONTACT_TYPE column contains an invalid numeric value" unless ( ($self->{_contact_type} >= CONTACT_TYPE_MIN && 
																				$self->{_contact_type} <= CONTACT_TYPE_MAX) ||
																				$self->{_contact_type} == Ncs::Op::UNKNOWN ||
																				$self->{_contact_type} == Ncs::Op::OTHER ); 
	if ($self->{_contact_type} != Ncs::Op::OTHER) { $self->{_contact_type_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "CONTACT_TYPE_OTH column exceeds allowed character length" unless ( length($self->{_contact_type_oth}) <= 255 );
	return "CONTACT_DATE column contains an invalid date format" unless ( $self->{_contact_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "CONTACT_START_TIME column contains an invalid date format" unless ( $self->{_contact_start_time} =~ /^\d{2}:\d{2}$/ );
	return "CONTACT_END_TIME column contains an invalid date format" unless ( $self->{_contact_end_time} =~ /^\d{2}:\d{2}$/ );
	return "CONTACT_LANG column contains an invalid numeric value" unless ( ($self->{_contact_lang} >= CONTACT_LANG_MIN && 
																				$self->{_contact_lang} <= CONTACT_LANG_MAX) ||
																				$self->{_contact_lang} == Ncs::Op::OTHER || 
																				$self->{_contact_lang} == Ncs::Op::REFUSED || 
																				$self->{_contact_lang} == Ncs::Op::UNKNOWN ); 
	if ($self->{_contact_lang} != Ncs::Op::OTHER) { $self->{_contact_lang_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "CONTACT_LANG_OTH column exceeds allowed character length" unless ( length($self->{_contact_lang_oth}) <= 255 );
	return "CONTACT_INTERPRET column contains an invalid numeric value" unless ( ($self->{_contact_interpret} >= CONTACT_INTERPRET_MIN && 
																					$self->{_contact_interpret} <= CONTACT_INTERPRET_MAX) ||
																					$self->{_contact_interpret} == Ncs::Op::UNKNOWN ||
																					$self->{_contact_interpret} == Ncs::Op::OTHER );
	if ($self->{_contact_interpret} != Ncs::Op::OTHER) { $self->{_contact_interpret_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "CONTACT_INTERPRET_OTH column exceeds allowed character length" unless ( length($self->{_contact_interpret_oth}) <= 255 );
	return "CONTACT_LOCATION column contains an invalid numeric value" unless ( ($self->{_contact_location} >= CONTACT_LOCATION_MIN && 
																					$self->{_contact_location} <= CONTACT_LOCATION_MAX) ||
																					$self->{_contact_location} == Ncs::Op::UNKNOWN ||
																					$self->{_contact_location} == Ncs::Op::OTHER );
	if ($self->{_contact_location} != Ncs::Op::OTHER) { $self->{_contact_location_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "CONTACT_LOCATION_OTH column exceeds allowed character length" unless ( length($self->{_contact_location_oth}) <= 255 );
	return "CONTACT_PRIVATE column contains an invalid numeric value" unless ( $self->{_contact_private} == Ncs::Op::YES || 
																				$self->{_contact_private} == Ncs::Op::NO );
	return "WHO_CONTACTED column contains an invalid numeric value" unless ( ($self->{_who_contacted} >= WHO_CONTACTED_MIN && 
																				$self->{_who_contacted} <= WHO_CONTACTED_MAX) ||
																				$self->{_who_contacted} == Ncs::Op::UNKNOWN ||
																				$self->{_who_contacted} == Ncs::Op::OTHER );
	if ($self->{_who_contacted} != Ncs::Op::OTHER) { $self->{_who_contact_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "WHO_CONTACT_OTH column exceeds allowed character length" unless ( length($self->{_who_contact_oth}) <= 255 );
	return "CONTACT_COMMENT column exceeds allowed character length" unless ( length($self->{_contact_comment}) <= 8000 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<contact>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<contact_id>%s</contact_id>\n", $self->{_contact_id});
	$out .= sprintf("\t\t\t<contact_disp>%s</contact_disp>\n", $self->{_contact_disp});
	$out .= sprintf("\t\t\t<contact_type>%d</contact_type>\n", $self->{_contact_type});
	$out .= sprintf("\t\t\t<contact_type_oth>%s</contact_type_oth>\n", $self->{_contact_type_oth});
	$out .= sprintf("\t\t\t<contact_date>%s</contact_date>\n", $self->{_contact_date});
	$out .= sprintf("\t\t\t<contact_start_time>%s</contact_start_time>\n", $self->{_contact_start_time});
	$out .= sprintf("\t\t\t<contact_end_time>%s</contact_end_time>\n", $self->{_contact_end_time});
	$out .= sprintf("\t\t\t<contact_lang>%d</contact_lang>\n", $self->{_contact_lang});
	$out .= sprintf("\t\t\t<contact_lang_oth>%s</contact_lang_oth>\n", $self->{_contact_lang_oth});
	$out .= sprintf("\t\t\t<contact_interpret>%d</contact_interpret>\n", $self->{_contact_interpret});
	$out .= sprintf("\t\t\t<contact_interpret_oth>%s</contact_interpret_oth>\n", $self->{_contact_interpret_oth});
	$out .= sprintf("\t\t\t<contact_location>%d</contact_location>\n", $self->{_contact_location});
	$out .= sprintf("\t\t\t<contact_location_oth>%s</contact_location_oth>\n", $self->{_contact_location_oth});
	$out .= sprintf("\t\t\t<contact_private>%s</contact_private>\n", $self->{_contact_private});
	$out .= sprintf("\t\t\t<contact_distance>%.2f</contact_distance>\n", $self->{_contact_distance});
	$out .= sprintf("\t\t\t<who_contacted>%d</who_contacted>\n", $self->{_who_contacted});
	$out .= sprintf("\t\t\t<who_contact_oth>%s</who_contact_oth>\n", $self->{_who_contact_oth});
	$out .= sprintf("\t\t\t<contact_comment>%s</contact_comment>\n", $self->{_contact_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</contact>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getContactId					{ my $self = shift; return $self->{_contact_id} || ''; }
sub getContactDisp					{ my $self = shift; return $self->{_contact_disp} || ''; }
sub getContactType					{ my $self = shift; return $self->{_contact_type} || ''; }
sub getContactTypeOth				{ my $self = shift; return $self->{_contact_type_oth} || ''; }
sub getContactDate					{ my $self = shift; return $self->{_contact_date} || ''; }
sub getContactStartTime				{ my $self = shift; return $self->{_contact_start_time} || ''; }
sub getContactEndTime				{ my $self = shift; return $self->{_contact_end_time} || ''; }
sub getContactLang					{ my $self = shift; return $self->{_contact_lang} || ''; }
sub getContactLangOth				{ my $self = shift; return $self->{_contact_lang_oth} || ''; }
sub getContactInterpret				{ my $self = shift; return $self->{_contact_interpret} || ''; }
sub getContactInterpretOth			{ my $self = shift; return $self->{_contact_interpret_oth} || ''; }
sub getContactLocation				{ my $self = shift; return $self->{_contact_location} || ''; }
sub getContactLocationOth			{ my $self = shift; return $self->{_contact_location_oth} || ''; }
sub getContactPrivate				{ my $self = shift; return $self->{_contact_private} || ''; }
sub getContactDistance				{ my $self = shift; return $self->{_contact_distance} || ''; }
sub getWhoContacted					{ my $self = shift; return $self->{_who_contacted} || ''; }
sub getWhoContactOth				{ my $self = shift; return $self->{_who_contact_oth} || ''; }
sub getContactComment				{ my $self = shift; return $self->{_contact_comment} || ''; }
sub getCreateDate					{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
