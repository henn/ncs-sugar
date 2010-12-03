package Ncs::Xml::Provider;

use strict;
use warnings;
use Ncs::Op;

use constant PROVIDER_TYPE_MIN				=> 1;
use constant PROVIDER_TYPE_MAX				=> 4;
use constant PRACTICE_INFO_MIN				=> 1;
use constant PRACTICE_INFO_MAX				=> 2;
use constant PRACTICE_PATIENT_LOAD_MIN		=> 1;
use constant PRACTICE_PATIENT_LOAD_MAX		=> 5;
use constant PRACTICE_SIZE_MIN				=> 1;
use constant PRACTICE_SIZE_MAX				=> 6;
use constant PROVIDER_INFO_SOURCE_MIN		=> 1;
use constant PROVIDER_INFO_SOURCE_MAX		=> 7;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id							=> undef,
		_provider_id					=> undef,
		_provider_type					=> undef,
		_provider_type_oth				=> undef,
		_practice_info					=> undef,
		_practice_patient_load			=> undef,
		_practice_size					=> undef,
		_public_practice				=> undef,
		_provider_info_source			=> undef,
		_provider_info_source_oth		=> undef,
		_provider_info_date				=> undef,
		_provider_info_update			=> undef,
		_provider_comment				=> undef,
		_create_date					=> undef,
		_table_spec_version				=> Ncs::Op::PROVIDER_VERSION,
		_sugar_soap						=> $soap,
		_transaction_type				=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_table							=> Ncs::Db::DbDefs::PROVIDER_TABLE,
		_sql							=> 'select ID, PROVIDER_ID, PROVIDER_TYPE, PROVIDER_TYPE_OTH, ' .
											'PRACTICE_INFO, PRACTICE_PATIENT_LOAD, PRACTICE_SIZE, ' .
											'PUBLIC_PRACTICE, PROVIDER_INFO_SOURCE, PROVIDER_INFO_SOURCE_OTH, ' .
											'DATE_FORMAT(provider_info_date, \'%Y-%m-%d\') AS PROVIDER_INFO_DATE, ' .
											'PROVIDER_INFO_UPDATE, PROVIDER_COMMENT, DATE_FORMAT(create_date, ' .
											'\'%Y-%m-%d\') AS CREATE_DATE from ' . 
											Ncs::Db::DbDefs::PROVIDER_TABLE
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve provider record id
	my $provier_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PROVIDER_SUGAR_MODULE, 
									id => $provier_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	$self->{_psu_id}					= $psu_id_field_value;
	$self->{_provider_id}				= $values->{PROVIDER_ID} || Ncs::Op::UNKNOWN;
	$self->{_provider_type}				= Ncs::Op::atoi($values->{PROVIDER_TYPE}) || Ncs::Op::UNKNOWN;
	$self->{_provider_type_oth}			= $values->{PROVIDER_TYPE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_practice_info}				= $values->{PRACTICE_INFO} || Ncs::Op::UNKNOWN;
	$self->{_practice_patient_load}		= $values->{PRACTICE_PATIENT_LOAD} || Ncs::Op::UNKNOWN;
	$self->{_practice_size}				= $values->{PRACTICE_SIZE} || Ncs::Op::UNKNOWN;
	$self->{_public_practice}			= $values->{PUBLIC_PRACTICE} || Ncs::Op::UNKNOWN;
	$self->{_provider_info_source}		= Ncs::Op::atoi($values->{PROVIDER_INFO_SOURCE}) || Ncs::Op::UNKNOWN;
	$self->{_provider_info_source_oth}	= $values->{PROVIDER_INFO_SOURCE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_provider_info_date}		= $values->{PROVIDER_INFO_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_provider_info_update}		= $values->{PROVIDER_INFO_UPDATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_provider_comment}			= $values->{PROVIDER_COMMENT} || '';
	$self->{_create_date}				= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "PROVIDER_ID column exceeds allowed character length" unless ( length($self->{_provider_id}) <= 36 );
	return "PROVIDER_TYPE column contains an invalid numeric value" unless ( ($self->{_provider_type} >= PROVIDER_TYPE_MIN && 
																				$self->{_provider_type} <= PROVIDER_TYPE_MAX) ||
																				$self->{_provider_type} == Ncs::Op::OTHER ||
																				$self->{_provider_type} == Ncs::Op::UNKNOWN );
	if ($self->{_provider_type} != Ncs::Op::OTHER) { $self->{_provider_type_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "PROVIDER_TYPE_OTH column exceeds allowed character length" unless ( length($self->{_provider_type_oth}) <= 255 );
	return "PRACTICE_INFO column contains an invalid numeric value" unless ( ($self->{_practice_info} >= PRACTICE_INFO_MIN && 
																				$self->{_practice_info} <= PRACTICE_INFO_MAX) ||
																				$self->{_practice_info} == Ncs::Op::UNKNOWN );
	return "PRACTICE_PATIENT_LOAD column contains an invalid numeric value" unless ( $self->{_practice_patient_load} >= PRACTICE_PATIENT_LOAD_MIN && 
																				$self->{_practice_patient_load} <= PRACTICE_PATIENT_LOAD_MAX ||
																				$self->{_practice_patient_load} == Ncs::Op::UNKNOWN );
	return "PRACTICE_SIZE column contains an invalid numeric value" unless ( ($self->{_practice_size} >= PRACTICE_SIZE_MIN && 
																				$self->{_practice_size} <= PRACTICE_SIZE_MAX) ||
																				$self->{_practice_size} == Ncs::Op::UNKNOWN );
	return "PUBLIC_PRACTICE column contains an invalid numeric value" unless ( $self->{_public_practice} == Ncs::Op::YES || 
																				$self->{_public_practice} == Ncs::Op::NO ||
																				$self->{_public_practice} == Ncs::Op::UNKNOWN );
	return "PROVIDER_INFO_SOURCE column contains an invalid numeric value" unless ( ($self->{_provider_info_source} >= PROVIDER_INFO_SOURCE_MIN && 
																				$self->{_provider_info_source} <= PROVIDER_INFO_SOURCE_MAX) ||
																				$self->{_provider_info_source} == Ncs::Op::OTHER ||
																				$self->{_provider_info_source} == Ncs::Op::UNKNOWN );
	if ($self->{_provider_info_source} != Ncs::Op::OTHER) { $self->{_provider_info_source_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "PROVIDER_INFO_SOURCE_OTH column exceeds allowed character length" unless ( length($self->{_provider_info_source_oth}) <= 255 );
	return "PROVIDER_INFO_DATE column contains an invalid date format" unless ( $self->{_provider_info_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "PROVIDER_INFO_UPDATE column contains an invalid date format" unless ( $self->{_provider_info_update} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "PROVIDER_COMMENT column exceeds allowed character length" unless ( length($self->{_provider_comment}) <= 8000 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<provider>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<provider_id>%s</provider_id>\n", $self->{_provider_id});
	$out .= sprintf("\t\t\t<provider_type>%s</provider_type>\n", $self->{_provider_type});
	$out .= sprintf("\t\t\t<provider_type_oth>%s</provider_type_oth>\n", $self->{_provider_type_oth});
	$out .= sprintf("\t\t\t<practice_info>%d</practice_info>\n", $self->{_practice_info});
	$out .= sprintf("\t\t\t<practice_patient_load>%d</practice_patient_load>\n", $self->{_practice_patient_load});
	$out .= sprintf("\t\t\t<practice_size>%d</practice_size>\n", $self->{_practice_size});
	$out .= sprintf("\t\t\t<public_practice>%d</public_practice>\n", $self->{_public_practice});
	$out .= sprintf("\t\t\t<provider_info_source>%s</provider_info_source>\n", $self->{_provider_info_source});
	$out .= sprintf("\t\t\t<provider_info_source_oth>%s</provider_info_source_oth>\n", $self->{_provider_info_source_oth});
	$out .= sprintf("\t\t\t<provider_info_date>%s</provider_info_date>\n", $self->{_provider_info_date});
	$out .= sprintf("\t\t\t<provider_info_update>%s</provider_info_update>\n", $self->{_provider_info_update});
	$out .= sprintf("\t\t\t<provider_comment>%s</provider_comment>\n", $self->{_provider_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</provider>");

	return $out;
}

sub getPsuId					{ my $self = shift; return $self->{_psu_id} || ''; }
sub getProviderId				{ my $self = shift; return $self->{_provider_id} || ''; }
sub getProviderType				{ my $self = shift; return $self->{_provider_type} || ''; }
sub getProviderTypeOth			{ my $self = shift; return $self->{_provider_type_oth} || ''; }
sub getPracticeInfo				{ my $self = shift; return $self->{_practice_info} || ''; }
sub getPracticePatientLoad		{ my $self = shift; return $self->{_practice_patient_load} || ''; }
sub getPracticeSize				{ my $self = shift; return $self->{_practice_size} || ''; }
sub getPublicPractice			{ my $self = shift; return $self->{_public_practice} || ''; }
sub getProviderInfoSource		{ my $self = shift; return $self->{_provider_info_source} || ''; }
sub getProviderInfoSourceOth	{ my $self = shift; return $self->{_provider_info_source_oth} || ''; }
sub getProviderInfoDate			{ my $self = shift; return $self->{_provider_info_date} || ''; }
sub getProviderInfoUpdate		{ my $self = shift; return $self->{_provider_info_update} || ''; }
sub getProviderComment			{ my $self = shift; return $self->{_provider_comment} || ''; }
sub getCreateDate				{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion			{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType			{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql						{ my $self = shift; return $self->{_sql} || ''; }
sub getTable					{ my $self = shift; return $self->{_table} || ''; }

1;
