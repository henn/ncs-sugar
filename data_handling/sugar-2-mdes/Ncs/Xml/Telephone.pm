package Ncs::Xml::Telephone;

use strict;
use warnings;
use Ncs::Op;

use constant PHONE_INFO_SOURCE_MIN		=> 1;
use constant PHONE_INFO_SOURCE_MAX		=> 7;
use constant PHONE_TYPE_MIN				=> 1;
use constant PHONE_TYPE_MAX				=> 5;
use constant PHONE_RANK_MIN				=> 1;
use constant PHONE_RANK_MAX				=> 4;

sub new
{
	my ($class, $soap, $is_snapshot, $suppress) = @_;

	my $self = bless
	{
		_psu_id							=> undef,
		_phone_id						=> undef,
		_person_id						=> undef,
		_institute_id					=> undef,
		_provider_id					=> undef,
		_phone_info_source				=> undef,
		_phone_info_source_oth			=> undef,
		_phone_info_date				=> undef,
		_phone_info_update				=> undef,
		_phone_nbr						=> undef,
		_phone_ext						=> undef,
		_phone_type						=> undef,
		_phone_type_oth					=> undef,
		_phone_rank						=> undef,
		_phone_rank_oth					=> undef,
		_phone_landline					=> undef,
		_phone_share					=> undef,
		_cell_permission				=> undef,
		_text_permission				=> undef,
		_phone_comment					=> undef,
		_create_date					=> undef,
		_table_spec_version				=> Ncs::Op::TELEPHONE_VERSION,
		_transaction_type				=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_suppress						=> $suppress,
		_sugar_soap						=> $soap,
		_table							=> Ncs::Db::DbDefs::TELEPHONE_TABLE,
		_sql							=> 'select ID, PHONE_ID, PHONE_INFO_SOURCE, ' .
											'PHONE_INFO_SOURCE_OTH, DATE_FORMAT(date_entered, ' .
											'\'%Y-%m-%d\') AS PHONE_INFO_DATE, DATE_FORMAT(date_modified, ' .
											'\'%Y-%m-%d\') AS PHONE_INFO_UPDATE, PHONE_NBR, PHONE_EXT, PHONE_TYPE, ' .
											'PHONE_TYPE_OTH, PHONE_RANK, PHONE_RANK_OTH, PHONE_LANDLINE, ' .
											'PHONE_SHARE, CELL_PERMISSION, TEXT_PERMISSION, PHONE_COMMENT, ' .
											'DATE_FORMAT(date_entered, \'%Y-%m-%d\') AS CREATE_DATE from ' . 
											Ncs::Db::DbDefs::TELEPHONE_TABLE . 
											' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve telephone record id
	my $telephone_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::TELEPHONE_SUGAR_MODULE, 
									id => $telephone_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve person_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::TELEPHONE_SUGAR_MODULE, 
									id => $telephone_sugar_id, 
									module2 => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE});
	# retrieve field (person_id) value
	my $person_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'person_id'});

	# retrieve institute_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::TELEPHONE_SUGAR_MODULE, 
									id => $telephone_sugar_id, 
									module2 => Ncs::Db::DbDefs::INSTITUTION_SUGAR_MODULE});
	# retrieve field (institute_id) value
	my $institute_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::INSTITUTION_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'institute_id'});

	# retrieve provider_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::TELEPHONE_SUGAR_MODULE, 
									id => $telephone_sugar_id, 
									module2 => Ncs::Db::DbDefs::PROVIDER_SUGAR_MODULE});
	# retrieve field (provider_id) value
	my $provider_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PROVIDER_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'provider_id'});

	$self->{_psu_id}					= $psu_id_field_value;
	$self->{_phone_id}					= $values->{PHONE_ID} || Ncs::Op::UNKNOWN,
	$self->{_person_id}					= $person_id_field_value,
	$self->{_institute_id}				= $institute_id_field_value,
	$self->{_provider_id}				= $provider_id_field_value,
	$self->{_phone_info_source}			= Ncs::Op::atoi($values->{PHONE_INFO_SOURCE}) || Ncs::Op::UNKNOWN,
	$self->{_phone_info_source_oth}		= $values->{PHONE_INFO_SOURCE_OTH} || Ncs::Op::UNKNOWN,
	$self->{_phone_info_date}			= $values->{PHONE_INFO_DATE} || Ncs::Op::UNKNOWN_DATE,
	$self->{_phone_info_update}			= $values->{PHONE_INFO_UPDATE} || Ncs::Op::UNKNOWN_DATE,
	$self->{_phone_nbr}					= $values->{PHONE_NBR} || Ncs::Op::UNKNOWN,
	$self->{_phone_ext}					= $values->{PHONE_EXT} || Ncs::Op::UNKNOWN,
	$self->{_phone_type}				= Ncs::Op::atoi($values->{PHONE_TYPE}) || Ncs::Op::UNKNOWN,
	$self->{_phone_type_oth}			= $values->{PHONE_TYPE_OTH} || Ncs::Op::UNKNOWN,
	$self->{_phone_rank}				= Ncs::Op::atoi($values->{PHONE_RANK}) || Ncs::Op::UNKNOWN,
	$self->{_phone_rank_oth}			= $values->{PHONE_RANK_OTH} || Ncs::Op::UNKNOWN,
	$self->{_phone_landline}			= $values->{PHONE_LANDLINE} || Ncs::Op::UNKNOWN,
	$self->{_phone_share}				= $values->{PHONE_SHARE} || Ncs::Op::UNKNOWN,
	$self->{_cell_permission}			= $values->{CELL_PERMISSION} || Ncs::Op::UNKNOWN,
	$self->{_text_permission}			= $values->{TEXT_PERMISSION} || Ncs::Op::UNKNOWN,
	$self->{_phone_comment}				= $values->{PHONE_COMMENT} || Ncs::Op::UNKNOWN,
	$self->{_create_date}				= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "PHONE_ID column exceeds allowed character length" unless ( length($self->{_phone_id}) <= 36 );
	return "PERSON_ID column exceeds allowed character length" unless ( length($self->{_person_id}) <= 36 );
	return "INSTITUTE_ID column exceeds allowed character length" unless ( length($self->{_institute_id}) <= 36 );
	return "PROVIDER_ID column exceeds allowed character length" unless ( length($self->{_provider_id}) <= 36 );
	return "PHONE_INFO_SOURCE column contains an invalid numeric value" unless ( ($self->{_phone_info_source} >= PHONE_INFO_SOURCE_MIN && 
																					$self->{_phone_info_source} <= PHONE_INFO_SOURCE_MAX) ||
																					$self->{_phone_info_source} == Ncs::Op::OTHER || 
																					$self->{_phone_info_source} == Ncs::Op::UNKNOWN ); 
	if ($self->{_phone_info_source} != Ncs::Op::OTHER) { $self->{_phone_info_source_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "PHONE_INFO_SOURCE_OTH column exceeds allowed character length" unless ( length($self->{_phone_info_source_oth}) <= 255 );
	return "PHONE_INFO_DATE column contains an invalid date format" unless ( $self->{_phone_info_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "PHONE_INFO_UPDATE column contains an invalid date format" unless ( $self->{_phone_info_update} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "PHONE_NBR column exceeds allowed character length" unless ( length($self->{_phone_nbr}) <= 10 );
	return "PHONE_EXT column exceeds allowed character length" unless ( length($self->{_phone_ext}) <= 5 );
	return "PHONE_TYPE column contains an invalid numeric value" unless ( ($self->{_phone_type} >= PHONE_TYPE_MIN && 
																			$self->{_phone_type} <= PHONE_TYPE_MAX) ||
																			$self->{_phone_type} == Ncs::Op::OTHER || 
																			$self->{_phone_type} == Ncs::Op::REFUSED || 
																			$self->{_phone_type} == Ncs::Op::UNKNOWN ); 
	if ($self->{_phone_type} != Ncs::Op::OTHER) { $self->{_phone_type_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "PHONE_TYPE_OTH column exceeds allowed character length" unless ( length($self->{_phone_type_oth}) <= 255 );
	return "PHONE_RANK column contains an invalid numeric value" unless ( ($self->{_phone_rank} >= PHONE_RANK_MIN && 
																				$self->{_phone_rank} <= PHONE_RANK_MAX) ||
																				$self->{_phone_rank} == Ncs::Op::OTHER || 
																				$self->{_phone_rank} == Ncs::Op::UNKNOWN ); 
	if ($self->{_phone_rank} != Ncs::Op::OTHER) { $self->{_phone_rank_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "PHONE_RANK_OTH column exceeds allowed character length" unless ( length($self->{_phone_rank_oth}) <= 255 );
	return "PHONE_LANDLINE column contains an invalid numeric value" unless ( $self->{_phone_landline} == Ncs::Op::YES || 
																				$self->{_phone_landline} == Ncs::Op::NO ||
																				$self->{_phone_landline} == Ncs::Op::UNKNOWN );
	return "PHONE_SHARE column contains an invalid numeric value" unless ( $self->{_phone_share} == Ncs::Op::YES || 
																			$self->{_phone_share} == Ncs::Op::NO ||
																			$self->{_phone_share} == Ncs::Op::UNKNOWN );
	return "CELL_PERMISSION column contains an invalid numeric value" unless ( $self->{_cell_permission} == Ncs::Op::YES || 
																				$self->{_cell_permission} == Ncs::Op::NO ||
																				$self->{_cell_permission} == Ncs::Op::UNKNOWN );
	return "TEXT_PERMISSION column contains an invalid numeric value" unless ( $self->{_text_permission} == Ncs::Op::YES || 
																				$self->{_text_permission} == Ncs::Op::NO ||
																				$self->{_text_permission} == Ncs::Op::UNKNOWN );
	return "PHONE_COMMENT column exceeds allowed character length" unless ( length($self->{_phone_comment}) <= 8000 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	if ( $self->{_person_id} != Ncs::Op::UNKNOWN ) { 
		$self->{_institute_id} = Ncs::Op::NOT_APPLICABLE; 
		$self->{_provider_id} = Ncs::Op::NOT_APPLICABLE; 
	}
	if ( $self->{_institute_id} != Ncs::Op::UNKNOWN && $self->{_institute_id} != Ncs::Op::NOT_APPLICABLE) { 
		$self->{_person_id} = Ncs::Op::NOT_APPLICABLE; 
		$self->{_provider_id} = Ncs::Op::NOT_APPLICABLE; 
	}
	if ( $self->{_provider_id} != Ncs::Op::UNKNOWN && $self->{_provider_id} != Ncs::Op::NOT_APPLICABLE ) { 
		$self->{_person_id} = Ncs::Op::NOT_APPLICABLE; 
		$self->{_institute_id} = Ncs::Op::NOT_APPLICABLE; 
	}

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<telephone>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<phone_id>%s</phone_id>\n", $self->{_phone_id});
	$out .= sprintf("\t\t\t<person_id>%s</person_id>\n", $self->{_person_id});
	$out .= sprintf("\t\t\t<institute_id>%s</institute_id>\n", $self->{_institute_id});
	$out .= sprintf("\t\t\t<provider_id>%s</provider_id>\n", $self->{_provider_id});
	$out .= sprintf("\t\t\t<phone_info_source>%s</phone_info_source>\n", $self->{_phone_info_source});
	$out .= sprintf("\t\t\t<phone_info_source_oth>%s</phone_info_source_oth>\n", $self->{_phone_info_source_oth});
	$out .= sprintf("\t\t\t<phone_info_date>%s</phone_info_date>\n", $self->{_phone_info_date});
	$out .= sprintf("\t\t\t<phone_info_update>%s</phone_info_update>\n", $self->{_phone_info_update});
	$out .= sprintf("\t\t\t<phone_nbr>%s</phone_nbr>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_phone_nbr});
	$out .= sprintf("\t\t\t<phone_ext>%s</phone_ext>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_phone_ext});
	$out .= sprintf("\t\t\t<phone_type>%s</phone_type>\n", $self->{_phone_type});
	$out .= sprintf("\t\t\t<phone_type_oth>%s</phone_type_oth>\n", $self->{_phone_type_oth});
	$out .= sprintf("\t\t\t<phone_rank>%s</phone_rank>\n", $self->{_phone_rank});
	$out .= sprintf("\t\t\t<phone_rank_oth>%s</phone_rank_oth>\n", $self->{_phone_rank_oth});
	$out .= sprintf("\t\t\t<phone_landline>%d</phone_landline>\n", $self->{_phone_landline});
	$out .= sprintf("\t\t\t<phone_share>%d</phone_share>\n", $self->{_phone_share});
	$out .= sprintf("\t\t\t<cell_permission>%d</cell_permission>\n", $self->{_cell_permission});
	$out .= sprintf("\t\t\t<text_permission>%d</text_permission>\n", $self->{_text_permission});
	$out .= sprintf("\t\t\t<phone_comment>%s</phone_comment>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_phone_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</telephone>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getPhoneId						{ my $self = shift; return $self->{_phone_id} || ''; }
sub getPersonId						{ my $self = shift; return $self->{_person_id} || ''; }
sub getInstituteId					{ my $self = shift; return $self->{_institute_id} || ''; }
sub getProviderId					{ my $self = shift; return $self->{_provider_id} || ''; }
sub getPhoneInfoSource				{ my $self = shift; return $self->{_phone_info_source} || ''; }
sub getPhoneInfoSourceOth			{ my $self = shift; return $self->{_phone_info_source_oth} || ''; }
sub getPhoneInfoDate				{ my $self = shift; return $self->{_phone_info_date} || ''; }
sub getPhoneInfoUpdate				{ my $self = shift; return $self->{_phone_info_update} || ''; }
sub getPhoneNbr						{ my $self = shift; return $self->{_phone_nbr} || ''; }
sub getPhoneExt						{ my $self = shift; return $self->{_phone_ext} || ''; }
sub getPhoneType					{ my $self = shift; return $self->{_phone_type} || ''; }
sub getPhoneTypeOth					{ my $self = shift; return $self->{_phone_type_oth} || ''; }
sub getPhoneRank					{ my $self = shift; return $self->{_phone_rank} || ''; }
sub getPhoneRankOth					{ my $self = shift; return $self->{_phone_rank_oth} || ''; }
sub getPhoneLandline				{ my $self = shift; return $self->{_phone_landline} || ''; }
sub getPhoneShare					{ my $self = shift; return $self->{_phone_share} || ''; }
sub getCellPermission				{ my $self = shift; return $self->{_cell_permission} || ''; }
sub getTextPermission				{ my $self = shift; return $self->{_text_permission} || ''; }
sub getPhoneComment					{ my $self = shift; return $self->{_phone_comment} || ''; }
sub getCreateDate					{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
