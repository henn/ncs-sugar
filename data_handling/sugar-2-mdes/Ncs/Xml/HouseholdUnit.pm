package Ncs::Xml::HouseholdUnit;

use strict;
use warnings;
use Ncs::Soap::SoapNcs;
use Ncs::Db::DbDefs;
use Ncs::Op;

use constant HH_ELIG_MIN		=> 1;
use constant HH_ELIG_MAX		=> 4;
use constant HH_STRUCTURE_MIN	=> 1;
use constant HH_STRUCTURE_MAX	=> 4;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id				=> undef,
		_hh_id				=> undef,
		_hh_status			=> undef,
		_hh_elig			=> undef,
		_num_age_elig		=> undef,
		_num_preg			=> undef,
		_num_preg_minor		=> undef,
		_num_preg_adult		=> undef,
		_hh_structure		=> undef,
		_hh_structure_oth	=> undef,
		_hh_comment			=> undef,
		_create_date		=> undef,
		_table_spec_version	=> Ncs::Op::HOUSEHOLD_UNIT_VERSION,
		_transaction_type	=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap			=> $soap,
		_table				=> Ncs::Db::DbDefs::HOUSEHOLD_UNIT_TABLE,
		_sql				=> 'select ID, HH_ID, HH_STATUS, HH_ELIG, NUM_AGE_ELIG, NUM_PREG, ' .
								'NUM_PREG_MINOR, NUM_PREG_ADULT, HH_STRUCTURE, HH_STRUCTURE_OTH, ' .
								'HH_COMMENT, DATE_FORMAT(create_date, \'%Y-%m-%d\') AS CREATE_DATE ' .
								'from ' . Ncs::Db::DbDefs::HOUSEHOLD_UNIT_TABLE
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve sugar household unit id
	my $household_unit_sugar_id		= $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::HOUSEHOLD_UNIT_SUGAR_MODULE, 
									id => $household_unit_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	$self->{_psu_id}				= $psu_id_field_value;
	$self->{_hh_id}					= $values->{HH_ID} || Ncs::Op::UNKNOWN;
	$self->{_hh_status}				= $values->{HH_STATUS} || Ncs::Op::UNKNOWN;
	$self->{_hh_elig}				= $values->{HH_ELIG} || Ncs::Op::UNKNOWN;
	$self->{_num_age_elig}			= $values->{NUM_AGE_ELIG} || Ncs::Op::UNKNOWN;
	$self->{_num_preg}				= $values->{NUM_PREG} || Ncs::Op::UNKNOWN;
	$self->{_num_preg_minor}		= $values->{NUM_PREG_MINOR} || Ncs::Op::UNKNOWN;
	$self->{_num_preg_adult}		= $values->{NUM_PREG_ADULT} || Ncs::Op::UNKNOWN;
	$self->{_hh_structure}			= Ncs::Op::atoi($values->{HH_STRUCTURE}) || Ncs::Op::UNKNOWN;
	$self->{_hh_structure_oth}		= $values->{HH_STRUCTURE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_hh_comment}			= $values->{HH_COMMENT} || '';
	$self->{_create_date}			= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "HH_ID column exceeds allowed character length" unless ( length($self->{_hh_id}) <= 36 );
	return "HH_STATUS column contains invalid numeric value" unless ( $self->{_hh_status} == Ncs::Op::YES || 
																		$self->{_hh_status} == Ncs::Op::NO ||
																		$self->{_hh_status} == Ncs::Op::UNKNOWN );
	return "HH_ELIG column contains invalid numeric value" unless ( ($self->{_hh_elig} >= HH_ELIG_MIN && 
																		$self->{_hh_elig} <= HH_ELIG_MAX) ||
																		$self->{_hh_elig} == Ncs::Op::UNKNOWN ); 
	return "HH_STRUCTURE column contains invalid numeric value" unless ( ($self->{_hh_structure} >= HH_STRUCTURE_MIN && 
																			$self->{_hh_structure} <= HH_STRUCTURE_MAX) || 
																			$self->{_hh_structure} == Ncs::Op::OTHER ||
																			$self->{_hh_structure} == Ncs::Op::UNKNOWN );
	if ($self->{_hh_structure} != Ncs::Op::OTHER) { $self->{_hh_structure_oth} = "" .  Ncs::Op::NOT_APPLICABLE; }
	return "HH_STRUCTURE_OTH column exceeds allowed character length" unless ( length($self->{_hh_structure_oth}) <= 255 );
	return "HH_COMMENT column exceeds allowed character length" unless ( length($self->{_hh_comment}) <= 8000 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<household_unit>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<hh_id>%s</hh_id>\n", $self->{_hh_id});
	$out .= sprintf("\t\t\t<hh_status>%s</hh_status>\n", $self->{_hh_status});
	$out .= sprintf("\t\t\t<hh_elig>%d</hh_elig>\n", $self->{_hh_elig});
	$out .= sprintf("\t\t\t<num_age_elig>%d</num_age_elig>\n", $self->{_num_age_elig});
	$out .= sprintf("\t\t\t<num_preg>%d</num_preg>\n", $self->{_num_preg});
	$out .= sprintf("\t\t\t<num_preg_minor>%d</num_preg_minor>\n", $self->{_num_preg_minor});
	$out .= sprintf("\t\t\t<num_preg_adult>%d</num_preg_adult>\n", $self->{_num_preg_adult});
	$out .= sprintf("\t\t\t<hh_structure>%d</hh_structure>\n", $self->{_hh_structure});
	$out .= sprintf("\t\t\t<hh_structure_oth>%s</hh_structure_oth>\n", $self->{_hh_structure_oth});
	$out .= sprintf("\t\t\t<hh_comment>%s</hh_comment>\n", $self->{_hh_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</household_unit>");

	return $out;
}

sub getPsuId			{ my $self = shift; return $self->{_psu_id} || ''; }
sub getHhId				{ my $self = shift; return $self->{_hh_id} || ''; }
sub getHhStatus			{ my $self = shift; return $self->{_hh_stutus} || ''; }
sub getHhElig			{ my $self = shift; return $self->{_hh_elig} || ''; }
sub getNumAgeElig		{ my $self = shift; return $self->{_num_age_elig} || ''; }
sub getNumPreg			{ my $self = shift; return $self->{_num_preg} || ''; }
sub getNumPregMinor		{ my $self = shift; return $self->{_num_preg_minor} || ''; }
sub getNumPregAdult		{ my $self = shift; return $self->{_num_preg_adult} || ''; }
sub getHhStructure		{ my $self = shift; return $self->{_hh_structure} || ''; }
sub getHhStructureOth	{ my $self = shift; return $self->{_hh_structure_oth} || ''; }
sub getHhComment		{ my $self = shift; return $self->{_hh_comment} || ''; }
sub getCreateDate		{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion	{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType	{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql				{ my $self = shift; return $self->{_sql} || ''; }
sub getTable			{ my $self = shift; return $self->{_table} || ''; }

1;
