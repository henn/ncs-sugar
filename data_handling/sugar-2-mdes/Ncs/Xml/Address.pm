package Ncs::Xml::Address;

use strict;
use warnings;
use Ncs::Op;

use constant ADDRESS_RANK_MIN			=> 1;
use constant ADDRESS_RANK_MAX			=> 4;
use constant ADDRESS_INFO_SOURCE_MIN	=> 1;
use constant ADDRESS_INFO_SOURCE_MAX	=> 9;
use constant ADDRESS_INFO_MODE_MIN		=> 1;
use constant ADDRESS_INFO_MODE_MAX		=> 6;
use constant ADDRESS_TYPE_MIN			=> 1;
use constant ADDRESS_TYPE_MAX			=> 5;
use constant ADDRESS_DESCRIPTION_MIN	=> 1;
use constant ADDRESS_DESCRIPTION_MAX	=> 8;
use constant STATE_MIN					=> 1;
use constant STATE_MAX					=> 51;

sub new
{
	my ($class, $soap, $is_snapshot, $suppress) = @_;

	my $self = bless
	{
		_psu_id							=> undef,
		_address_id						=> undef,
		_person_id						=> undef,
		_institute_id					=> undef,
		_provider_id					=> undef,
		_du_id							=> undef,
		_address_rank					=> undef,
		_address_rank_oth				=> undef,
		_address_info_source			=> undef,
		_address_info_source_oth		=> undef,
		_address_info_mode				=> undef,
		_address_info_mode_oth			=> undef,
		_address_info_date				=> undef,
		_address_info_update			=> undef,
		_address_start_date				=> undef,
		_address_end_date				=> undef,
		_address_type					=> undef,
		_address_type_oth				=> undef,
		_address_description			=> undef,
		_address_description_oth		=> undef,
		_address_1						=> undef,
		_address_2						=> undef,
		_unit							=> undef,
		_city							=> undef,
		_state							=> undef,
		_zip							=> undef,
		_zip4							=> undef,
		_address_comment				=> undef,
		_create_date					=> undef,
		_table_spec_version				=> Ncs::Op::ADDRESS_VERSION,
		_transaction_type				=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_suppress						=> $suppress,
		_sugar_soap						=> $soap,
		_table							=> Ncs::Db::DbDefs::ADDRESS_TABLE,
		_sql							=> 'select ID, ADDRESS_ID, ' .
											'ADDRESS_RANK, ADDRESS_RANK_OTH, ADDRESS_INFO_SOURCE, ' .
											'ADDRESS_INFO_SOURCE_OTH, ADDRESS_INFO_MODE, ADDRESS_INFO_MODE_OTH, ' .
											'DATE_FORMAT(date_entered, \'%Y-%m-%d\') AS ADDRESS_INFO_DATE, ' .
											'DATE_FORMAT(date_modified, \'%Y-%m-%d\') AS ADDRESS_INFO_UPDATE, ' .
											'ADDRESS_START_DATE, ADDRESS_END_DATE, ADDRESS_TYPE, ADDRESS_TYPE_OTH, ' .
											'ADDRESS_DESCRIPTION, ADDRESS_DESCRIPTION_OTH, ADDRESS_1, ADDRESS_2, ' .
											'UNIT, CITY, STATE, ZIP, ZIP4, ADDRESS_COMMENT, DATE_FORMAT(date_entered, ' .
											'\'%Y-%m-%d\') AS CREATE_DATE from ' . Ncs::Db::DbDefs::ADDRESS_TABLE . 
											' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve address record id
	my $address_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::ADDRESS_SUGAR_MODULE, 
									id => $address_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve person_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::ADDRESS_SUGAR_MODULE, 
									id => $address_sugar_id, 
									module2 => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE});
	# retrieve field (person_id) value
	my $person_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'person_id'});

	# retrieve institute_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::ADDRESS_SUGAR_MODULE, 
									id => $address_sugar_id, 
									module2 => Ncs::Db::DbDefs::INSTITUTION_SUGAR_MODULE});
	# retrieve field (institute_id) value
	my $institute_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::INSTITUTION_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'institute_id'});

	# retrieve du_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::ADDRESS_SUGAR_MODULE, 
									id => $address_sugar_id, 
									module2 => Ncs::Db::DbDefs::DWELLING_UNIT_SUGAR_MODULE});
	# retrieve field (du_id) value
	my $du_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::DWELLING_UNIT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'du_id'});

	$self->{_psu_id}						= $psu_id_field_value;
	$self->{_address_id}					= $values->{ADDRESS_ID} || Ncs::Op::UNKNOWN,
	$self->{_person_id}						= $person_id_field_value,
	$self->{_institute_id}					= $institute_id_field_value,
	$self->{_provider_id}					= $values->{PROVIDER_ID} || Ncs::Op::UNKNOWN,
	$self->{_du_id}							= $du_id_field_value,
	$self->{_address_rank}					= Ncs::Op::atoi($values->{ADDRESS_RANK}) || Ncs::Op::UNKNOWN,
	$self->{_address_rank_oth}				= $values->{ADDRESS_RANK_OTH} || Ncs::Op::UNKNOWN,
	$self->{_address_info_source}			= Ncs::Op::atoi($values->{ADDRESS_INFO_SOURCE}) || Ncs::Op::UNKNOWN,
	$self->{_address_info_source_oth}		= $values->{ADDRESS_INFO_SOURCE_OTH} || Ncs::Op::UNKNOWN,
	$self->{_address_info_mode}				= Ncs::Op::atoi($values->{ADDRESS_INFO_MODE}) || Ncs::Op::UNKNOWN,
	$self->{_address_info_mode_oth}			= $values->{ADDRESS_INFO_MODE_OTH} || Ncs::Op::UNKNOWN,
	$self->{_address_info_date}				= $values->{ADDRESS_INFO_DATE} || Ncs::Op::UNKNOWN_DATE,
	$self->{_address_info_update}			= $values->{ADDRESS_INFO_UPDATE} || Ncs::Op::UNKNOWN_DATE,
	$self->{_address_start_date}			= $values->{ADDRESS_START_DATE} || Ncs::Op::UNKNOWN_DATE,
	$self->{_address_end_date}				= $values->{ADDRESS_END_DATE} || Ncs::Op::UNKNOWN_DATE,
	$self->{_address_type}					= Ncs::Op::atoi($values->{ADDRESS_TYPE}) || Ncs::Op::UNKNOWN,
	$self->{_address_type_oth}				= $values->{ADDRESS_TYPE_OTH} || Ncs::Op::UNKNOWN,
	$self->{_address_description}			= Ncs::Op::atoi($values->{ADDRESS_DESCRIPTION}) || Ncs::Op::UNKNOWN,
	$self->{_address_description_oth}		= $values->{ADDRESS_DESCRIPTION_OTH} || Ncs::Op::UNKNOWN,
	$self->{_address_1}						= $values->{ADDRESS_1} || Ncs::Op::UNKNOWN,
	$self->{_address_2}						= $values->{ADDRESS_2} || Ncs::Op::UNKNOWN,
	$self->{_unit}							= $values->{UNIT} || Ncs::Op::UNKNOWN,
	$self->{_city}							= $values->{CITY} || Ncs::Op::UNKNOWN,
	$self->{_state}							= Ncs::Op::atoi($values->{STATE}) || Ncs::Op::UNKNOWN,
	$self->{_zip}							= $values->{ZIP} || Ncs::Op::UNKNOWN,
	$self->{_zip4}							= $values->{ZIP4} || Ncs::Op::UNKNOWN,
	$self->{_address_comment}				= $values->{ADDRESS_COMMENT} || '',
	$self->{_create_date}					= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "ADDRESS_ID column exceeds allowed character length" unless ( length($self->{_address_id}) <= 36 );
	return "PERSON_ID column exceeds allowed character length" unless ( length($self->{_person_id}) <= 36 );
	return "INSTITUTE_ID column exceeds allowed character length" unless ( length($self->{_institute_id}) <= 36 );
	return "PROVIDER_ID column exceeds allowed character length" unless ( length($self->{_provider_id}) <= 36 );
	return "DU_ID column exceeds allowed character length" unless ( length($self->{_du_id}) <= 36 );
	return "ADDRESS_RANK column contains an invalid numeric value" unless ( ($self->{_address_rank} >= ADDRESS_RANK_MIN && 
																				$self->{_address_rank} <= ADDRESS_RANK_MAX) ||
																				$self->{_address_rank} == Ncs::Op::OTHER || 
																				$self->{_address_rank} == Ncs::Op::UNKNOWN ); 
	if ($self->{_address_rank} != Ncs::Op::OTHER) { $self->{_address_rank_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "ADDRESS_RANK_OTH column exceeds allowed character length" unless ( length($self->{_address_rank_oth}) <= 255 );
	return "ADDRESS_INFO_SOURCE column contains an invalid numeric value" unless ( ($self->{_address_info_source} >= ADDRESS_INFO_SOURCE_MIN && 
																					$self->{_address_info_source} <= ADDRESS_INFO_SOURCE_MAX) ||
																					$self->{_address_info_source} == Ncs::Op::UNKNOWN || 
																					$self->{_address_info_source} == Ncs::Op::OTHER ); 
	if ($self->{_address_info_source} != Ncs::Op::OTHER) { $self->{_address_info_source_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "ADDRESS_INFO_SOURCE_OTH column exceeds allowed character length" unless ( length($self->{_address_info_source_oth}) <= 255 );
	return "ADDRESS_INFO_MODE column contains an invalid numeric value" unless ( ($self->{_address_info_mode} >= ADDRESS_INFO_MODE_MIN && 
																					$self->{_address_info_mode} <= ADDRESS_INFO_MODE_MAX) ||
																					$self->{_address_info_mode} == Ncs::Op::UNKNOWN || 
																					$self->{_address_info_mode} == Ncs::Op::OTHER ); 
	if ($self->{_address_info_mode} != Ncs::Op::OTHER) { $self->{_address_info_mode_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "ADDRESS_INFO_MODE_OTH column exceeds allowed character length" unless ( length($self->{_address_info_mode_oth}) <= 255 );
	return "ADDRESS_INFO_DATE column contains an invalid date format" unless ( $self->{_address_info_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "ADDRESS_INFO_UPDATE column contains an invalid date format" unless ( $self->{_address_info_update} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "ADDRESS_START_DATE column contains an invalid date format" unless ( $self->{_address_start_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "ADDRESS_END_DATE column contains an invalid date format" unless ( $self->{_address_end_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "ADDRESS_TYPE column contains an invalid numeric value" unless ( ($self->{_address_type} >= ADDRESS_TYPE_MIN && 
																				$self->{_address_type} <= ADDRESS_TYPE_MAX) ||
																				$self->{_address_type} == Ncs::Op::OTHER || 
																				$self->{_address_type} == Ncs::Op::UNKNOWN ); 
	if ($self->{_address_type} != Ncs::Op::OTHER) { $self->{_address_type_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "ADDRESS_TYPE_OTH column exceeds allowed character length" unless ( length($self->{_address_type_oth}) <= 255 );
	return "ADDRESS_DESCRIPTION column contains an invalid numeric value" unless ( ($self->{_address_description} >= ADDRESS_DESCRIPTION_MIN && 
																					$self->{_address_description} <= ADDRESS_DESCRIPTION_MAX) ||
																					$self->{_address_description} == Ncs::Op::OTHER || 
																					$self->{_address_description} == Ncs::Op::UNKNOWN ); 
	if ($self->{_address_description} != Ncs::Op::OTHER) { $self->{_address_description_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "ADDRESS_DESCRIPTION_OTH column exceeds allowed character length" unless ( length($self->{_address_description_oth}) <= 255 );
	return "ADDRESS_1 column exceeds allowed character length" unless ( length($self->{_address_1}) <= 100 );
	return "ADDRESS_2 column exceeds allowed character length" unless ( length($self->{_address_2}) <= 100 );
	return "UNIT column exceeds allowed character length" unless ( length($self->{_unit}) <= 10 );
	return "CITY column exceeds allowed character length" unless ( length($self->{_city}) <= 50 );
	return "STATE column contains an invalid numeric value" unless ( ($self->{_state} >= STATE_MIN && 
																		$self->{_state} <= STATE_MAX) ||
																		$self->{_state} == Ncs::Op::UNKNOWN ); 
	return "ZIP column exceeds allowed character length" unless ( length($self->{_zip}) <= 5 );
	return "ZIP4 column exceeds allowed character length" unless ( length($self->{_zip4}) <= 4 );
	return "ADDRESS_COMMENT column exceeds allowed character length" unless ( length($self->{_address_comment}) <= 8000 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<address>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<address_id>%s</address_id>\n", $self->{_address_id});
	$out .= sprintf("\t\t\t<person_id>%s</person_id>\n", $self->{_person_id});
	$out .= sprintf("\t\t\t<instittute_id>%s</instittute_id>\n", $self->{_institute_id});
	$out .= sprintf("\t\t\t<provider_id>%s</provider_id>\n", $self->{_provider_id});
	$out .= sprintf("\t\t\t<du_id>%s</du_id>\n", $self->{_du_id});
	$out .= sprintf("\t\t\t<address_rank>%s</address_rank>\n", $self->{_address_rank});
	$out .= sprintf("\t\t\t<address_rank_oth>%s</address_rank_oth>\n", $self->{_address_rank_oth});
	$out .= sprintf("\t\t\t<address_info_source>%s</address_info_source>\n", $self->{_address_info_source});
	$out .= sprintf("\t\t\t<address_info_source_oth>%s</address_info_source_oth>\n", $self->{_address_info_source_oth});
	$out .= sprintf("\t\t\t<address_info_mode>%s</address_info_mode>\n", $self->{_address_info_mode});
	$out .= sprintf("\t\t\t<address_info_mode_oth>%s</address_info_mode_oth>\n", $self->{_address_info_mode_oth});
	$out .= sprintf("\t\t\t<address_info_date>%s</address_info_date>\n", $self->{_address_info_date});
	$out .= sprintf("\t\t\t<address_info_update>%s</address_info_update>\n", $self->{_address_info_update});
	$out .= sprintf("\t\t\t<address_start_date>%s</address_start_date>\n", $self->{_address_start_date});
	$out .= sprintf("\t\t\t<address_end_date>%s</address_end_date>\n", $self->{_address_end_date});
	$out .= sprintf("\t\t\t<address_type>%s</address_type>\n", $self->{_address_type});
	$out .= sprintf("\t\t\t<address_type_oth>%s</address_type_oth>\n", $self->{_address_type_oth});
	$out .= sprintf("\t\t\t<address_description>%s</address_description>\n", $self->{_address_description});
	$out .= sprintf("\t\t\t<address_description_oth>%s</address_description_oth>\n", $self->{_address_description_oth});
	$out .= sprintf("\t\t\t<address_1>%s</address_1>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_address_1});
	$out .= sprintf("\t\t\t<address_2>%s</address_2>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_address_2});
	$out .= sprintf("\t\t\t<unit>%s</unit>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_unit});
	$out .= sprintf("\t\t\t<city>%s</city>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_city});
	$out .= sprintf("\t\t\t<state>%s</state>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_state});
	$out .= sprintf("\t\t\t<zip>%s</zip>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_zip});
	$out .= sprintf("\t\t\t<zip4>%s</zip4>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_zip4});
	$out .= sprintf("\t\t\t<address_comment>%s</address_comment>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_address_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</address>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getAddressId					{ my $self = shift; return $self->{_address_id} || ''; }
sub getPersonId						{ my $self = shift; return $self->{_person_id} || ''; }
sub getInstituteId					{ my $self = shift; return $self->{_institute_id} || ''; }
sub getProviderId					{ my $self = shift; return $self->{_provider_id} || ''; }
sub getDuId							{ my $self = shift; return $self->{_du_id} || ''; }
sub getAddressRank					{ my $self = shift; return $self->{_address_rank} || ''; }
sub getAddressRankOth				{ my $self = shift; return $self->{_address_rank_oth} || ''; }
sub getAddressInfoSource			{ my $self = shift; return $self->{_address_info_source} || ''; }
sub getAddressInfoSourceOth			{ my $self = shift; return $self->{_address_info_source_oth} || ''; }
sub getAddressInfoMode				{ my $self = shift; return $self->{_address_info_mode} || ''; }
sub getAddressInfoModeOth			{ my $self = shift; return $self->{_address_info_mode_oth} || ''; }
sub getAddressInfoDate				{ my $self = shift; return $self->{_address_info_date} || ''; }
sub getAddressInfoUpdate			{ my $self = shift; return $self->{_address_info_update} || ''; }
sub getAddressStartDate				{ my $self = shift; return $self->{_address_start_date} || ''; }
sub getAddressEndDate				{ my $self = shift; return $self->{_address_end_date} || ''; }
sub getAddressType					{ my $self = shift; return $self->{_address_type} || ''; }
sub getAddressTypeOth				{ my $self = shift; return $self->{_address_type_oth} || ''; }
sub getAddressDescription			{ my $self = shift; return $self->{_address_description} || ''; }
sub getAddressDescriptionOth		{ my $self = shift; return $self->{_address_description_oth} || ''; }
sub getAddressAddress1				{ my $self = shift; return $self->{_address_1} || ''; }
sub getAddressAddress2				{ my $self = shift; return $self->{_address_2} || ''; }
sub getAddressUnit					{ my $self = shift; return $self->{_unit} || ''; }
sub getAddressCity					{ my $self = shift; return $self->{_city} || ''; }
sub getAddressState					{ my $self = shift; return $self->{_state} || ''; }
sub getAddressZip					{ my $self = shift; return $self->{_zip} || ''; }
sub getAddressZip4					{ my $self = shift; return $self->{_zip4} || ''; }
sub getAddressComment				{ my $self = shift; return $self->{_address_comment} || ''; }
sub getCreateDate					{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
