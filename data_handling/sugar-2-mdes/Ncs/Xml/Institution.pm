package Ncs::Xml::Institution;

use strict;
use warnings;
use Ncs::Op;

use constant INSTITUTE_TYPE_MIN				=> 1;
use constant INSTITUTE_TYPE_MAX				=> 4;
use constant INSTITUTE_RELATION_MIN			=> 1;
use constant INSTITUTE_RELATION_MAX			=> 3;
use constant INSTITUTE_OWNER_MIN			=> 1;
use constant INSTITUTE_OWNER_MAX			=> 2;
use constant INSTITUTE_UNIT_MIN				=> 1;
use constant INSTITUTE_UNIT_MAX				=> 3;
use constant INSTITUTE_INFO_SOURCE_MIN		=> 1;
use constant INSTITUTE_INFO_SOURCE_MAX		=> 7;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id							=> undef,
		_institute_id					=> undef,
		_institute_type					=> undef,
		_institute_type_oth				=> undef,
		_institute_relation				=> undef,
		_institute_relation_oth			=> undef,
		_institute_owner				=> undef,
		_institute_owner_oth			=> undef,
		_institute_size					=> undef,
		_institute_unit					=> undef,
		_institute_unit_oth				=> undef,
		_institute_info_source			=> undef,
		_institute_info_source_oth		=> undef,
		_institute_info_date			=> undef,
		_institute_info_update			=> undef,
		_institute_comment				=> undef,
		_create_date					=> undef,
		_table_spec_version				=> Ncs::Op::INSTITUTION_VERSION,
		_transaction_type				=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap						=> $soap,
		_table							=> Ncs::Db::DbDefs::INSTITUTION_TABLE,
		_sql							=> 'select ID, INSTITUTE_ID, INSTITUTE_TYPE, INSTITUTE_TYPE_OTH, ' .
											'INSTITUTE_RELATION, INSTITUTE_RELATION_OTH, INSTITUTE_OWNER, ' .
											'INSTITUTE_OWNER_OTH, INSTITUTE_SIZE, INSTITUTE_UNIT, ' .
											'INSTITUTE_UNIT_OTH, INSTITUTE_INFO_SOURCE, ' .
											'INSTITUTE_INFO_SOURCE_OTH, DATE_FORMAT(institute_info_date, ' .
											'\'%Y-%m-%d\') AS INSTITUTE_INFO_DATE, ' .
											'DATE_FORMAT(institute_info_update, \'%Y-%m-%d\') AS ' .
											'INSTITUTE_INFO_UPDATE, INSTITUTE_COMMENT, DATE_FORMAT(date_entered, ' .
											'\'%Y-%m-%d\') AS CREATE_DATE from ' . 
											Ncs::Db::DbDefs::INSTITUTION_TABLE . 
											' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve institution record id
	my $institution_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::INSTITUTION_SUGAR_MODULE, 
									id => $institution_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	$self->{_psu_id}						= $psu_id_field_value;
	$self->{_institute_id}					= $values->{INSTITUTE_ID} || Ncs::Op::UNKNOWN;
	$self->{_institute_type}				= Ncs::Op::atoi($values->{INSTITUTE_TYPE}) || Ncs::Op::UNKNOWN;
	$self->{_institute_type_oth}			= $values->{INSTITUTE_TYPE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_institute_relation}			= Ncs::Op::atoi($values->{INSTITUTE_RELATION}) || Ncs::Op::UNKNOWN;
	$self->{_institute_relation_oth}		= $values->{INSTITUTE_RELATION_OTH} || Ncs::Op::UNKNOWN;
	$self->{_institute_owner}				= Ncs::Op::atoi($values->{INSTITUTE_OWNER}) || Ncs::Op::UNKNOWN;
	$self->{_institute_owner_oth}			= $values->{INSTITUTE_OWNER_OTH} || Ncs::Op::UNKNOWN;
	$self->{_institute_size}				= $values->{INSTITUTE_SIZE} || Ncs::Op::UNKNOWN;
	$self->{_institute_unit}				= Ncs::Op::atoi($values->{INSTITUTE_UNIT}) || Ncs::Op::UNKNOWN;
	$self->{_institute_unit_oth}			= $values->{INSTITUTE_UNIT_OTH} || Ncs::Op::UNKNOWN;
	$self->{_institute_info_source}			= Ncs::Op::atoi($values->{INSTITUTE_INFO_SOURCE}) || Ncs::Op::UNKNOWN;
	$self->{_institute_info_source_oth}		= $values->{INSTITUTE_INFO_SOURCE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_institute_info_date}			= $values->{INSTITUTE_INFO_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_institute_info_update}			= $values->{INSTITUTE_INFO_UPDATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_institute_comment}				= $values->{INSTITUTE_COMMENT} || '';
	$self->{_create_date}					= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "INSTITUTE_ID column exceeds allowed character length" unless ( length($self->{_institute_id}) <= 36 );
	return "INSTITUTE_TYPE column contains an invalid numeric value" unless ( ($self->{_institute_type} >= INSTITUTE_TYPE_MIN && 
																				$self->{_institute_type} <= INSTITUTE_TYPE_MAX) ||
																				$self->{_institute_type} == Ncs::Op::OTHER ||
																				$self->{_institute_type} == Ncs::Op::UNKNOWN ); 
	if ($self->{_institute_type} != Ncs::Op::OTHER) { $self->{_institute_type_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "INSTITUTE_TYPE_OTH column exceeds allowed character length" unless ( length($self->{_institute_type_oth}) <= 255 );
	return "INSTITUTE_RELATION column contains an invalid numeric value" unless ( ($self->{_institute_relation} >= INSTITUTE_RELATION_MIN && 
																					$self->{_institute_relation} <= INSTITUTE_RELATION_MAX) ||
																					$self->{_institute_relation} == Ncs::Op::OTHER || 
																					$self->{_institute_relation} == Ncs::Op::UNKNOWN ); 
	if ($self->{_institute_relation} != Ncs::Op::OTHER) { $self->{_institute_relation_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "INSTITUTE_RELATION_OTH column exceeds allowed character length" unless ( length($self->{_institute_relation_oth}) <= 255 );
	return "INSTITUTE_OWNER column contains an invalid numeric value" unless ( ($self->{_institute_owner} >= INSTITUTE_OWNER_MIN && 
																					$self->{_institute_owner} <= INSTITUTE_OWNER_MAX) ||
																					$self->{_institute_owner} == Ncs::Op::OTHER || 
																					$self->{_institute_owner} == Ncs::Op::UNKNOWN ); 
	if ($self->{_institute_owner} != Ncs::Op::OTHER) { $self->{_institute_owner_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "INSTITUTE_OWNER_OTH column exceeds allowed character length" unless ( length($self->{_institute_relation_oth}) <= 255 );
	return "INSTITUTE_UNIT column contains an invalid numeric value" unless ( ($self->{_institute_unit} >= INSTITUTE_UNIT_MIN && 
																				$self->{_institute_unit} <= INSTITUTE_UNIT_MAX) ||
																				$self->{_institute_unit} == Ncs::Op::OTHER || 
																				$self->{_institute_unit} == Ncs::Op::UNKNOWN ); 
	if ($self->{_institute_unit} != Ncs::Op::OTHER) { $self->{_institute_unit_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "INSTITUTE_UNIT_OTH column exceeds allowed character length" unless ( length($self->{_institute_unit_oth}) <= 255 );
	return "INSTITUTE_INFO_SOURCE column contains an invalid numeric value" unless ( ($self->{_institute_info_source} >= INSTITUTE_INFO_SOURCE_MIN && 
																				$self->{_institute_info_source} <= INSTITUTE_INFO_SOURCE_MAX) ||
																				$self->{_institute_info_source} == Ncs::Op::OTHER || 
																				$self->{_institute_info_source} == Ncs::Op::UNKNOWN ); 
	if ($self->{_institute_info_source} != Ncs::Op::OTHER) { $self->{_institute_info_source_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "INSTITUTE_INFO_SOURCE_OTH column exceeds allowed character length" unless ( length($self->{_institute_info_source_oth}) <= 255 );
	return "INSTITUTE_INFO_DATE column contains an invalid date format" unless ( $self->{_institute_info_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "INSTITUTE_INFO_UPDATE column contains an invalid date format" unless ( $self->{_institute_info_update} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "INSTITUTE_COMMENT column exceeds allowed character length" unless ( length($self->{_institute_comment}) <= 255 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<institution>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<institute_id>%s</institute_id>\n", $self->{_institute_id});
	$out .= sprintf("\t\t\t<institute_type>%s</institute_type>\n", $self->{_institute_type});
	$out .= sprintf("\t\t\t<institute_relation>%s</institute_relation>\n", $self->{_institute_relation});
	$out .= sprintf("\t\t\t<institute_relation_oth>%s</institute_relation_oth>\n", $self->{_institute_relation_oth});
	$out .= sprintf("\t\t\t<institute_owner>%s</institute_owner>\n", $self->{_institute_owner});
	$out .= sprintf("\t\t\t<institute_owner_oth>%s</institute_owner_oth>\n", $self->{_institute_owner_oth});
	$out .= sprintf("\t\t\t<institute_size>%s</institute_size>\n", $self->{_institute_size});
	$out .= sprintf("\t\t\t<institute_unit>%s</institute_unit>\n", $self->{_institute_unit});
	$out .= sprintf("\t\t\t<institute_unit_oth>%s</institute_unit_oth>\n", $self->{_institute_unit_oth});
	$out .= sprintf("\t\t\t<institute_info_source>%s</institute_info_source>\n", $self->{_institute_info_source});
	$out .= sprintf("\t\t\t<institute_info_source_oth>%s</institute_info_source_oth>\n", $self->{_institute_info_source_oth});
	$out .= sprintf("\t\t\t<institute_info_date>%s</institute_info_date>\n", $self->{_institute_info_date});
	$out .= sprintf("\t\t\t<institute_info_update>%s</institute_info_update>\n", $self->{_institute_info_update});
	$out .= sprintf("\t\t\t<institute_comment>%s</institute_comment>\n", $self->{_institute_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</institution>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getInstituteId					{ my $self = shift; return $self->{_institute_id} || ''; }
sub getInstituteType				{ my $self = shift; return $self->{_institute_type} || ''; }
sub getInstituteRelation			{ my $self = shift; return $self->{_institute_relation} || ''; }
sub getInstituteRelationOth			{ my $self = shift; return $self->{_institute_relation_oth} || ''; }
sub getInstituteOwner				{ my $self = shift; return $self->{_institute_owner} || ''; }
sub getInstituteOwnerOth			{ my $self = shift; return $self->{_institute_owner_oth} || ''; }
sub getInstituteSize				{ my $self = shift; return $self->{_institute_size} || ''; }
sub getInstituteUnit				{ my $self = shift; return $self->{_institute_unit} || ''; }
sub getInstituteUnitOth				{ my $self = shift; return $self->{_institute_unit_oth} || ''; }
sub getInstituteInfoSource			{ my $self = shift; return $self->{_institute_info_source} || ''; }
sub getInstituteInfoSourceOth		{ my $self = shift; return $self->{_institute_info_source_oth} || ''; }
sub getInstituteInfoDate			{ my $self = shift; return $self->{_institute_info_date} || ''; }
sub getInstituteInfoUpdate			{ my $self = shift; return $self->{_institute_info_update} || ''; }
sub getInstituteComment				{ my $self = shift; return $self->{_institute_comment} || ''; }
sub getCreateDate					{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
