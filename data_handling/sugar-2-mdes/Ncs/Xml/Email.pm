package Ncs::Xml::Email;

use strict;
use warnings;
use Ncs::Op;

use constant EMAIL_INFO_SOURCE_MIN		=> 1;
use constant EMAIL_INFO_SOURCE_MAX		=> 7;
use constant EMAIL_TYPE_MIN				=> 1;
use constant EMAIL_TYPE_MAX				=> 3;
use constant EMAIL_RANK_MIN				=> 1;
use constant EMAIL_RANK_MAX				=> 4;

sub new
{
	my ($class, $soap, $is_snapshot, $suppress) = @_;

	my $self = bless
	{
		_psu_id							=> undef,
		_email_id						=> undef,
		_person_id						=> undef,
		_institute_id					=> undef,
		_provider_id					=> undef,
		_email							=> undef,
		_email_rank						=> undef,
		_email_rank_oth					=> undef,
		_email_info_source				=> undef,
		_email_info_source_oth			=> undef,
		_email_info_date				=> undef,
		_email_info_update				=> undef,
		_email_type						=> undef,
		_email_type_oth					=> undef,
		_email_share					=> undef,
		_email_active					=> undef,
		_email_comment					=> undef,
		_create_date					=> undef,
		_table_spec_version				=> Ncs::Op::EMAIL_VERSION,
		_transaction_type				=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_suppress						=> $suppress,
		_sugar_soap						=> $soap,
		_table							=> Ncs::Db::DbDefs::EMAIL_TABLE,
		_sql							=> 'select ID, EMAIL_ID, EMAIL, EMAIL_RANK, ' .
											'EMAIL_RANK_OTH, EMAIL_INFO_SOURCE, EMAIL_INFO_SOURCE_OTH, ' .
											'DATE_FORMAT(email_info_date, \'%Y-%m-%d\') AS EMAIL_INFO_DATE, ' .
											'DATE_FORMAT(email_info_update, \'%Y-%m-%d\') AS EMAIL_INFO_UPDATE, ' .
											'EMAIL_TYPE, EMAIL_TYPE_OTH, EMAIL_SHARE, EMAIL_ACTIVE, EMAIL_COMMENT, ' .
											'DATE_FORMAT(create_date, \'%Y-%m-%d\') AS CREATE_DATE from ' .
											Ncs::Db::DbDefs::EMAIL_TABLE
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve email record id
	my $email_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::EMAIL_SUGAR_MODULE, 
									id => $email_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve person_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::EMAIL_SUGAR_MODULE, 
									id => $email_sugar_id, 
									module2 => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE});
	# retrieve field (person_id) value
	my $person_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'person_id'});

	# retrieve institute_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::EMAIL_SUGAR_MODULE, 
									id => $email_sugar_id, 
									module2 => Ncs::Db::DbDefs::INSTITUTION_SUGAR_MODULE});
	# retrieve field (institute_id) value
	my $institute_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::INSTITUTION_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'institute_id'});

	# retrieve provider_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::EMAIL_SUGAR_MODULE, 
									id => $email_sugar_id, 
									module2 => Ncs::Db::DbDefs::PROVIDER_SUGAR_MODULE});
	# retrieve field (provider_id) value
	my $provider_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PROVIDER_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'provider_id'});

	$self->{_psu_id}					= $psu_id_field_value;
	$self->{_email_id}					= $values->{EMAIL_ID} || Ncs::Op::UNKNOWN;
	$self->{_person_id}					= $person_id_field_value;
	$self->{_institute_id}				= $institute_id_field_value;
	$self->{_provider_id}				= $provider_id_field_value;
	$self->{_email}						= $values->{EMAIL} || Ncs::Op::UNKNOWN;
	$self->{_email_rank}				= Ncs::Op::atoi($values->{EMAIL_RANK}) || Ncs::Op::UNKNOWN;
	$self->{_email_rank_oth}			= $values->{EMAIL_RANK_OTH} || Ncs::Op::UNKNOWN;
	$self->{_email_info_source}			= Ncs::Op::atoi($values->{EMAIL_INFO_SOURCE}) || Ncs::Op::UNKNOWN;
	$self->{_email_info_source_oth}		= $values->{EMAIL_INFO_SOURCE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_email_info_date}			= $values->{EMAIL_INFO_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_email_info_update}			= $values->{EMAIL_INFO_UPDATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_email_type}				= Ncs::Op::atoi($values->{EMAIL_TYPE}) || Ncs::Op::UNKNOWN;
	$self->{_email_type_oth}			= $values->{EMAIL_TYPE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_email_share}				= $values->{EMAIL_SHARE} || Ncs::Op::UNKNOWN;
	$self->{_email_active}				= $values->{EMAIL_ACTIVE} || Ncs::Op::UNKNOWN;
	$self->{_email_comment}				= $values->{EMAIL_COMMENT} || Ncs::Op::UNKNOWN;
	$self->{_create_date}				= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "EMAIL_ID column exceeds allowed character length" unless ( length($self->{_email_id}) <= 36 );
	return "PERSON_ID column exceeds allowed character length" unless ( length($self->{_person_id}) <= 36 );
	return "INSTITUTE_ID column exceeds allowed character length" unless ( length($self->{_institute_id}) <= 36 );
	return "PROVIDER_ID column exceeds allowed character length" unless ( length($self->{_provider_id}) <= 36 );
	return "EMAIL column exceeds allowed character length" unless ( length($self->{_email}) <= 100 );
	return "EMAIL_RANK column contains an invalid numeric value" unless ( ($self->{_email_rank} >= EMAIL_RANK_MIN && 
																			$self->{_email_rank} <= EMAIL_RANK_MAX) ||
																			$self->{_email_rank} == Ncs::Op::UNKNOWN ||
																			$self->{_email_rank} == Ncs::Op::OTHER ); 
	if ($self->{_email_rank} != Ncs::Op::OTHER) { $self->{_email_rank_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "EMAIL_RANK_OTH column exceeds allowed character length" unless ( length($self->{_email_rank_oth}) <= 255 );
	return "EMAIL_INFO_SOURCE column contains an invalid numeric value" unless ( ($self->{_email_info_source} >= EMAIL_INFO_SOURCE_MIN && 
																					$self->{_email_info_source} <= EMAIL_INFO_SOURCE_MAX) ||
																					$self->{_email_info_source} == Ncs::Op::UNKNOWN || 
																					$self->{_email_info_source} == Ncs::Op::OTHER ); 
	if ($self->{_email_info_source} != Ncs::Op::OTHER) { $self->{_email_info_source_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "PHONE_INFO_SOURCE_OTH column exceeds allowed character length" unless ( length($self->{_email_info_source_oth}) <= 255 );
	return "EMAIL_INFO_DATE column contains an invalid date format" unless ( $self->{_email_info_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "EMAIL_INFO_UPDATE column contains an invalid date format" unless ( $self->{_email_info_update} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "EMAIL_TYPE column contains an invalid numeric value" unless ( ($self->{_email_type} >= EMAIL_TYPE_MIN && 
																			$self->{_email_type} <= EMAIL_TYPE_MAX) ||
																			$self->{_email_type} == Ncs::Op::OTHER || 
																			$self->{_email_type} == Ncs::Op::REFUSED || 
																			$self->{_email_type} == Ncs::Op::UNKNOWN ); 
	if ($self->{_email_type} != Ncs::Op::OTHER) { $self->{_email_type_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "EMAIL_TYPE_OTH column exceeds allowed character length" unless ( length($self->{_email_type_oth}) <= 255 );
	return "EMAIL_SHARE column contains an invalid numeric value" unless ( $self->{_email_share} == Ncs::Op::YES || 
																			$self->{_email_share} == Ncs::Op::NO ||
																			$self->{_email_share} == Ncs::Op::UNKNOWN );
	return "EMAIL_ACTIVE column contains an invalid numeric value" unless ( $self->{_email_active} == Ncs::Op::YES || 
																			$self->{_email_active} == Ncs::Op::NO ||
																			$self->{_email_active} == Ncs::Op::UNKNOWN );
	return "EMAIL_COMMENT column exceeds allowed character length" unless ( length($self->{_email_comment}) <= 8000 );
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

	my $out = sprintf("\t\t<email>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<email_id>%s</email_id>\n", $self->{_email_id});
	$out .= sprintf("\t\t\t<person_id>%s</person_id>\n", $self->{_person_id});
	$out .= sprintf("\t\t\t<institute_id>%s</institute_id>\n", $self->{_institute_id});
	$out .= sprintf("\t\t\t<provider_id>%s</provider_id>\n", $self->{_provider_id});
	$out .= sprintf("\t\t\t<email>%s</email>\n", ($self->{_suppress}) ? Ncs::Op::SUPPRESS : $self->{_email});
	$out .= sprintf("\t\t\t<email_rank>%s</email_rank>\n", $self->{_email_rank});
	$out .= sprintf("\t\t\t<email_rank_oth>%s</email_rank_oth>\n", $self->{_email_rank_oth});
	$out .= sprintf("\t\t\t<email_info_source>%s</email_info_source>\n", $self->{_email_info_source});
	$out .= sprintf("\t\t\t<email_info_source_oth>%s</email_info_source_oth>\n", $self->{_email_info_source_oth});
	$out .= sprintf("\t\t\t<email_info_date>%s</email_info_date>\n", $self->{_email_info_date});
	$out .= sprintf("\t\t\t<email_info_update>%s</email_info_update>\n", $self->{_email_info_update});
	$out .= sprintf("\t\t\t<email_type>%s</email_type>\n", $self->{_email_type});
	$out .= sprintf("\t\t\t<email_type_oth%s</email_type_oth>\n", $self->{_email_type_oth});
	$out .= sprintf("\t\t\t<email_share>%d</email_share>\n", $self->{_email_share});
	$out .= sprintf("\t\t\t<email_active>%d</email_active>\n", $self->{_email_active});
	$out .= sprintf("\t\t\t<email_comment>%s</email_comment>\n", $self->{_email_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</email>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getEmailId						{ my $self = shift; return $self->{_email_id} || ''; }
sub getPersonId						{ my $self = shift; return $self->{_person_id} || ''; }
sub getInstituteId					{ my $self = shift; return $self->{_institute_id} || ''; }
sub getProviderId					{ my $self = shift; return $self->{_provider_id} || ''; }
sub getEmail						{ my $self = shift; return $self->{_email} || ''; }
sub getEmailRank					{ my $self = shift; return $self->{_email_rank} || ''; }
sub getEmailRankOth					{ my $self = shift; return $self->{_email_rank_oth} || ''; }
sub getEmailInfoSource				{ my $self = shift; return $self->{_email_info_source} || ''; }
sub getEmailInfoSourceOth			{ my $self = shift; return $self->{_email_info_source_oth} || ''; }
sub getEmailInfoDate				{ my $self = shift; return $self->{_email_info_date} || ''; }
sub getEmailInfoUpdate				{ my $self = shift; return $self->{_email_info_update} || ''; }
sub getEmailType					{ my $self = shift; return $self->{_email_type} || ''; }
sub getEmailTypeOth					{ my $self = shift; return $self->{_email_type_oth} || ''; }
sub getEmailShare					{ my $self = shift; return $self->{_email_share} || ''; }
sub getEmailActive					{ my $self = shift; return $self->{_email_active} || ''; }
sub getEmailComment					{ my $self = shift; return $self->{_email_comment} || ''; }
sub getCreateDate					{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
