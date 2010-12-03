package Ncs::Xml::DwellingUnit;

use strict;
use warnings;
use Ncs::Soap::SoapNcs;
use Ncs::Db::DbDefs;
use Ncs::Op;

use constant DU_TYPE_MIN	=> 1;
use constant DU_TYPE_MAX	=> 10;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id				=> undef,
		_du_id				=> undef,
		_list_id			=> undef,
		_duplicate_du		=> undef,
		_missed_du			=> undef,
		_du_type			=> undef,
		_du_type_oth		=> undef,
		_du_ineligible		=> undef,
		_du_access			=> undef,
		_duid_comment		=> undef,
		_create_date		=> undef,
		_table_spec_version	=> Ncs::Op::DWELLING_UNIT_VERSION,
		_transaction_type	=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap			=> $soap,
		_table				=> Ncs::Db::DbDefs::DWELLING_UNIT_TABLE,
		_sql				=> 'select ID, DU_ID, DUPLICATE_DU, MISSED_DU, DU_TYPE, ' .
								'DU_TYPE_OTH, DU_INELIGIBLE, DU_ACCESS, DUID_COMMENT, ' .
								'DATE_FORMAT(create_date, \'%Y-%m-%d\') AS CREATE_DATE from ' .
								Ncs::Db::DbDefs::DWELLING_UNIT_TABLE
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve sugar dwelling unit record id
	my $dwelling_unit_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::DWELLING_UNIT_SUGAR_MODULE, 
									id => $dwelling_unit_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});
	# retrieve list_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::DWELLING_UNIT_SUGAR_MODULE, 
									id => $dwelling_unit_sugar_id, 
									module2 => Ncs::Db::DbDefs::LISTING_UNIT_SUGAR_MODULE});
	# retrieve field (list_id) value
	my $list_id_field_value = undef;
	if ( definded($rel_id) )
	{
		$list_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::LISTING_UNIT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'list_id'});
	}

	$self->{_psu_id}				= $psu_id_field_value;
	$self->{_du_id}					= $values->{DU_ID} || Ncs::Op::UNKNOWN;
	$self->{_list_id}				= $list_id_field_value || Ncs::Op::NOT_APPLICABLE;
	$self->{_duplicate_du}			= $values->{DUPLICATE_DU} || Ncs::Op::UNKNOWN;
	$self->{_missed_du}				= $values->{MISSED_DU} || Ncs::Op::UNKNOWN;
	$self->{_du_type}				= Ncs::Op::atoi($values->{DU_TYPE}) || Ncs::Op::UNKNOWN;
	$self->{_du_type_oth}			= $values->{DU_TYPE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_du_ineligible}			= $values->{DU_INELIGIBLE} || Ncs::Op::UNKNOWN;
	$self->{_du_access}				= $values->{DU_ACCESS} || Ncs::Op::UNKNOWN;
	$self->{_duid_comment}			= $values->{DUID_COMMENT} || '';
	$self->{_create_date}			= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_table_spec_version}	= $values->{TABLE_SPEC_VERSION} || Ncs::Op::UNKNOWN;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "DU_ID column exceeds allowed character length" unless ( length($self->{_du_id}) <= 36 );
	return "LIST_ID column exceeds allowed character length" unless ( length($self->{_list_id}) <= 36 );
	return "DUPLICATE_DU column contains invalid numeric value" unless ( $self->{_duplicate_du} == Ncs::Op::YES || 
																			$self->{_duplicate_du} == Ncs::Op::NO ||
																			$self->{_duplicate_du} == Ncs::Op::UNKNOWN );
	return "MISSED_DU column contains invalid numeric value" unless ( $self->{_missed_du} == Ncs::Op::YES || 
																		$self->{_missed_du} == Ncs::Op::NO ||
																		$self->{_missed_du} == Ncs::Op::UNKNOWN );
	return "DU_TYPE column contains invalid numeric value" unless ( ($self->{_du_type} >= DU_TYPE_MIN && 
																		$self->{_du_type} <= DU_TYPE_MAX) || 
																		$self->{_du_type} == Ncs::Op::OTHER || 
																		$self->{_du_type} == Ncs::Op::UNKNOWN );
	if ($self->{_du_type} != Ncs::Op::OTHER) { $self->{_du_type_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "DU_TYPE_OTH column exceeds allowed character length" unless ( length($self->{_du_type_oth}) <= 255 );
	return "DU_INELIGIBLE column contains invalid numeric value" unless ( $self->{_du_ineligible} == Ncs::Op::YES || 
																			$self->{_du_ineligible} == Ncs::Op::NO || 
																			$self->{_du_ineligible} == Ncs::Op::UNKNOWN);
	return "DU_ACCESS column contains invalid numeric value" unless ( $self->{_du_access} == Ncs::Op::YES || 
																			$self->{_du_access} == Ncs::Op::NO ||
																			$self->{_du_access} == Ncs::Op::UNKNOWN );
	return "DUID_COMMENT column exceeds allowed character length" unless ( length($self->{_duid_comment}) <= 8000 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<dwelling_unit>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<du_id>%s</du_id>\n", $self->{_du_id});
	$out .= sprintf("\t\t\t<list_id>%s</list_id>\n", $self->{_list_id});
	$out .= sprintf("\t\t\t<duplicate_du>%d</duplicate_du>\n", $self->{_duplicate_du});
	$out .= sprintf("\t\t\t<missed_du>%d</missed_du>\n", $self->{_missed_du});
	$out .= sprintf("\t\t\t<du_type>%d</du_type>\n", $self->{_du_type});
	$out .= sprintf("\t\t\t<du_type_oth>%s</du_type_oth>\n", $self->{_du_type_oth});
	$out .= sprintf("\t\t\t<du_ineligible>%d</du_ineligible>\n", $self->{_du_ineligible});
	$out .= sprintf("\t\t\t<du_access>%d</du_access>\n", $self->{_du_access});
	$out .= sprintf("\t\t\t<duid_comment>%s</duid_comment>\n", $self->{_duid_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</dwelling_unit>");

	return $out;
}

sub getPsuId			{ my $self = shift; return $self->{_psu_id} || ''; }
sub getDuId				{ my $self = shift; return $self->{_du_id} || ''; }
sub getListId			{ my $self = shift; return $self->{_list_id} || ''; }
sub getDuplicateDu		{ my $self = shift; return $self->{_duplicate_du} || ''; }
sub getMissedDu			{ my $self = shift; return $self->{_missed_du} || ''; }
sub getDuType			{ my $self = shift; return $self->{_du_type} || ''; }
sub getDuTypeOth		{ my $self = shift; return $self->{_du_type_oth} || ''; }
sub getDuInelgible		{ my $self = shift; return $self->{_du_inelgible} || ''; }
sub getDuAccess			{ my $self = shift; return $self->{_du_access} || ''; }
sub getDuIdComment		{ my $self = shift; return $self->{_duid_comment} || ''; }
sub getCreateDate		{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion	{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType	{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql				{ my $self = shift; return $self->{_sql} || ''; }
sub getTable			{ my $self = shift; return $self->{_table} || ''; }

1;
