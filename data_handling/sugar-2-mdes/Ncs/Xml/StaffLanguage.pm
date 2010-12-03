package Ncs::Xml::StaffLanguage;

use strict;
use warnings;
use Ncs::Op;

use constant STAFF_LANG_MIN		=> 1;
use constant STAFF_LANG_MAX		=> 17;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id				=> undef,
		_staff_language_id	=> undef,
		_staff_id			=> undef,
		_staff_lang			=> undef,		
		_staff_lang_oth		=> undef,
		_create_date		=> undef,
		_table_spec_version	=> Ncs::Op::STAFF_LANGUAGE_VERSION,
		_transaction_type	=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap			=> $soap,
		_table				=> Ncs::Db::DbDefs::STAFF_LANGUAGE_TABLE,
		_sql				=> 'select ID, STAFF_LANGUAGE_ID, STAFF_LANG, STAFF_LANG_OTH, ' .
								'DATE_FORMAT(create_date, \'%Y-%m-%d\') AS CREATE_DATE, TABLE_SPEC_VERSION ' .
								'from ' . Ncs::Db::DbDefs::STAFF_LANGUAGE_TABLE
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve sugar staff language record id
	my $staff_lang_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::STAFF_LANGUAGE_SUGAR_MODULE, 
									id => $staff_lang_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve staff_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::STAFF_LANGUAGE_SUGAR_MODULE, 
									id => $staff_lang_sugar_id, 
									module2 => Ncs::Db::DbDefs::STAFF_SUGAR_MODULE});
	# retrieve field (staff_id) value
	my $staff_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::STAFF_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'staff_id'});

	$self->{_psu_id}				= $psu_id_field_value;
	$self->{_staff_language_id}		= $values->{STAFF_LANGUAGE_ID} || Ncs::Op::UNKNOWN;
	$self->{_staff_id}				= $staff_id_field_value;
	$self->{_staff_lang}			= Ncs::Op::atoi($values->{STAFF_LANG}) || Ncs::Op::UNKNOWN;
	$self->{_staff_lang_oth}		= $values->{STAFF_LANG_OTH} || Ncs::Op::UNKNOWN;
	$self->{_create_date}			= $values->{CREATE_DATE}  || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "STAFF_LANGUAGE_ID column exceeds allowed character length" unless ( length($self->{_staff_language_id}) <= 36 );
	return "STAFF_ID column exceeds allowed character length" unless ( length($self->{_staff_id}) <= 36 );
	return "STAFF_LANG column contains invalid numeric value" unless ( ($self->{_staff_lang} >= STAFF_LANG_MIN && 
																		$self->{_staff_lang} <= STAFF_LANG_MAX) || 
																		$self->{_staff_lang} == Ncs::Op::REFUSED ||
																		$self->{_staff_lang} == Ncs::Op::OTHER ||
																		$self->{_staff_lang} == Ncs::Op::UNKNOWN );
	if ($self->{_staff_lang} != Ncs::Op::OTHER) { $self->{_staff_lang_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "STAFF_LANG_OTH column exceeds allowed character length" unless ( length($self->{_staff_lang_oth}) <= 255 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<staff_language>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<staff_language_id>%s</staff_language_id>\n", $self->{_staff_language_id});
	$out .= sprintf("\t\t\t<staff_id>%s</staff_id>\n", $self->{_staff_id});
	$out .= sprintf("\t\t\t<staff_lang>%d</staff_lang>\n", $self->{_staff_lang});
	$out .= sprintf("\t\t\t<staff_lang_oth>%s</staff_lang_oth>\n", $self->{_staff_lang_oth});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</staff_language>");

	return $out;
}

sub getPsuId			{ my $self = shift; return $self->{_psu_id} || ''; }
sub getStaffLanguageId	{ my $self = shift; return $self->{_staff_language_id} || ''; }
sub getStaffId			{ my $self = shift; return $self->{_staff_id} || ''; }
sub getStaffLang		{ my $self = shift; return $self->{_staff_lang} || ''; }
sub getStaffLangOth		{ my $self = shift; return $self->{_staff_lang_oth} || ''; }
sub getCreateDate		{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion	{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType	{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql				{ my $self = shift; return $self->{_sql} || ''; }
sub getTable			{ my $self = shift; return $self->{_table} || ''; }

1;
