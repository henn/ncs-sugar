package Ncs::Xml::LinkHouseholdDwelling;

use strict;
use warnings;
use Ncs::Soap::SoapNcs;
use Ncs::Db::DbDefs;
use Ncs::Op;

use constant DU_RANK_MIN	=> 1;
use constant DU_RANK_MAX	=> 4;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id				=> undef,
		_hh_du_id			=> undef,
		_hh_id				=> undef,
		_du_id				=> undef,
		_is_active			=> undef,
		_du_rank			=> undef,
		_du_rank_oth		=> undef,
		_create_date		=> undef,
		_table_spec_version	=> Ncs::Op::LINK_HOUSEHOLD_DWELLING_VERSION,
		_transaction_type	=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap			=> $soap,
		_table				=> Ncs::Db::DbDefs::LINK_HOUSEHOLD_DWELLING_TABLE,
		_sql				=> 'select ID, HH_DU_ID, IS_ACTIVE, DU_RANK, ' .
								'DU_RANK_OTH, DATE_FORMAT(create_date, \'%Y-%m-%d\') AS ' .
								'CREATE_DATE, DATE_FORMAT(update_date, \'%Y-%m-%d\') AS ' .
								'UPDATE_DATE from ' . 
								Ncs::Db::DbDefs::LINK_HOUSEHOLD_DWELLING_TABLE
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve sugar link hh du id
	my $hh_du_id_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::LINK_HOUSEHOLD_DWELLING_SUGAR_MODULE, 
									id => $hh_du_id_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});
	# retrieve hh_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::LINK_HOUSEHOLD_DWELLING_SUGAR_MODULE, 
									id => $hh_du_id_sugar_id, 
									module2 => Ncs::Db::DbDefs::HOUSEHOLD_UNIT_SUGAR_MODULE});
	# retrieve field (hh_id) value
	my $hh_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::HOUSEHOLD_UNIT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'hh_id'});
	# retrieve du_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::LINK_HOUSEHOLD_DWELLING_SUGAR_MODULE, 
									id => $hh_du_id_sugar_id, 
									module2 => Ncs::Db::DbDefs::DWELLING_UNIT_SUGAR_MODULE});
	# retrieve field (du_id) value
	my $du_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::DWELLING_UNIT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'du_id'});

	$self->{_psu_id}				= $psu_id_field_value;
	$self->{_hh_du_id}				= $values->{HH_DU_ID} || Ncs::Op::UNKNOWN;
	$self->{_hh_id}					= $hh_id_field_value;
	$self->{_du_id}					= $du_id_field_value;
	$self->{_is_active}				= $values->{IS_ACTIVE} || Ncs::Op::UNKNOWN;
	$self->{_du_rank}				= Ncs::Op::atoi($values->{DU_RANK}) || Ncs::Op::UNKNOWN;
	$self->{_du_rank_oth}			= $values->{DU_RANK_OTH} || Ncs::Op::UNKNOWN;
	$self->{_create_date}			= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "HH_DU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "HH_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "DU_ID column exceeds allowed character length" unless ( length($self->{_du_id}) <= 36 );
	return "IS_ACTIVE column contains invalid numeric value" unless ( $self->{_is_active} == Ncs::Op::YES || 
																		$self->{_is_active} == Ncs::Op::NO ||
																		$self->{_is_active} == Ncs::Op::UNKNOWN );
	return "DU_RANK column contains invalid numeric value" unless ( ($self->{_du_rank} >= DU_RANK_MIN && 
																		$self->{_du_rank} <= DU_RANK_MAX) || 
																		$self->{_du_rank} == Ncs::Op::OTHER ||
																		$self->{_du_rank} == Ncs::Op::UNKNOWN );
	if ($self->{_du_rank} != Ncs::Op::OTHER) { $self->{_du_rank_oth} = "" . Ncs::Op::NOT_APPLICABLE; }
	return "DU_RANK_OTH column exceeds allowed character length" unless ( length($self->{_du_rank_oth}) <= 255 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<link_household_dwelling>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<hh_du_id>%s</hh_du_id>\n", $self->{_hh_du_id});
	$out .= sprintf("\t\t\t<hh_id>%s</hh_id>\n", $self->{_hh_id});
	$out .= sprintf("\t\t\t<du_id>%s</du_id>\n", $self->{_du_id});
	$out .= sprintf("\t\t\t<is_active>%d</is_active>\n", $self->{_is_active});
	$out .= sprintf("\t\t\t<du_rank>%d</du_rank>\n", $self->{_du_rank});
	$out .= sprintf("\t\t\t<du_rank_oth>%s</du_rank_oth>\n", $self->{_du_rank_oth});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</link_household_dwelling>");

	return $out;
}

sub getPsuId			{ my $self = shift; return $self->{_psu_id} || ''; }
sub getHhDuId			{ my $self = shift; return $self->{_hh_du_id} || ''; }
sub getHhId				{ my $self = shift; return $self->{_hh_id} || ''; }
sub getDuId				{ my $self = shift; return $self->{_du_id} || ''; }
sub getIsActive			{ my $self = shift; return $self->{_is_active} || ''; }
sub getDuRank			{ my $self = shift; return $self->{_du_rank} || ''; }
sub getDuRankOth		{ my $self = shift; return $self->{_du_rank_oth} || ''; }
sub getCreateDate		{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion	{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType	{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql				{ my $self = shift; return $self->{_sql} || ''; }
sub getTable			{ my $self = shift; return $self->{_table} || ''; }

1;
