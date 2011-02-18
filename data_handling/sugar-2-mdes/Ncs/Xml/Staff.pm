package Ncs::Xml::Staff;

use strict;
use warnings;
use Ncs::Op;

use constant STAFF_TYPE_MIN			=> 1;
use constant STAFF_TYPE_MAX			=> 14;
use constant STAFF_AGE_RANGE_MIN	=> 1;
use constant STAFF_AGE_RANGE_MAX	=> 7;
use constant STAFF_GENDER_MIN		=> 1;
use constant STAFF_GENDER_MAX		=> 3;
use constant STAFF_RACE_MIN			=> 1;
use constant STAFF_RACE_MAX			=> 6;
use constant STAFF_ETHNICITY_MIN	=> 1;
use constant STAFF_ETHNICITY_MAX	=> 2;
use constant STAFF_EXP_MIN			=> 1;
use constant STAFF_EXP_MAX			=> 3;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id				=> undef,
		_staff_id			=> undef,
		_staff_type			=> undef,
		_staff_type_oth		=> undef,
		_subcontractor		=> undef,
		_staff_yob			=> undef,
		_staff_age_range	=> undef,
		_staff_gender		=> undef,
		_staff_race			=> undef,
		_staff_race_oth		=> undef,
		_staff_ethnicity	=> undef,
		_staff_exp			=> undef,
		_staff_comment		=> undef,
		_create_date		=> undef,
		_table_spec_version	=> Ncs::Op::STAFF_VERSION,
		_transaction_type	=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap			=> $soap,
		_table				=> Ncs::Db::DbDefs::STAFF_TABLE,
		_sql				=> 'select ID, STAFF_ID, STAFF_TYPE, STAFF_TYPE_OTH, SUBCONTRACTOR, ' .
								'STAFF_YOB, STAFF_AGE_RANGE, STAFF_GENDER, STAFF_RACE, STAFF_RACE_OTH, ' .
								'STAFF_ETHNICITY, STAFF_EXP, STAFF_COMMENT, DATE_FORMAT(date_entered, ' .
								'\'%Y-%m-%d\') AS CREATE_DATE from ' . Ncs::Db::DbDefs::STAFF_TABLE . 
								' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve sugar staff record id
	my $staff_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::STAFF_SUGAR_MODULE, 
									id => $staff_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	$self->{_psu_id}				= $psu_id_field_value;
	$self->{_staff_id}				= $values->{STAFF_ID} || Ncs::Op::UNKNOWN;
	$self->{_staff_type}			= Ncs::Op::atoi($values->{STAFF_TYPE}) || Ncs::Op::UNKNOWN;
	$self->{_staff_type_oth}		= $values->{STAFF_TYPE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_subcontractor}			= $values->{SUBCONTRACTOR} || Ncs::Op::UNKNOWN;
	$self->{_staff_yob}				= $values->{STAFF_YOB} || Ncs::Op::UNKNOWN;
	$self->{_staff_age_range}		= Ncs::Op::atoi($values->{STAFF_AGE_RANGE}) || Ncs::Op::UNKNOWN;
	$self->{_staff_gender}			= Ncs::Op::atoi($values->{STAFF_GENDER}) || Ncs::Op::UNKNOWN;
	$self->{_staff_race}			= Ncs::Op::atoi($values->{STAFF_RACE}) || Ncs::Op::UNKNOWN;
	$self->{_staff_race_oth}		= Ncs::Op::atoi($values->{STAFF_RACE_OTH}) || Ncs::Op::UNKNOWN;
	$self->{_staff_ethnicity}		= $values->{STAFF_ETHNICITY} || Ncs::Op::UNKNOWN;
	$self->{_staff_exp}				= Ncs::Op::atoi($values->{STAFF_EXP}) || Ncs::Op::UNKNOWN;
	$self->{_staff_comment}			= $values->{STAFF_COMMENT} || '';
	$self->{_create_date}			= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "STAFF_ID column exceeds allowed character length" unless ( length($self->{_staff_id}) <= 36 );
	return "STAFF_TYPE column contains invalid numeric value" unless ( ($self->{_staff_type} >= STAFF_TYPE_MIN && 
																		$self->{_staff_type} <= STAFF_TYPE_MAX) || 
																		$self->{_staff_type} == Ncs::Op::OTHER ||
																		$self->{_staff_type} == Ncs::Op::UNKNOWN );
	if ($self->{_staff_type} != Ncs::Op::OTHER) { $self->{_staff_type_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "STAFF_TYPE_OTH column exceeds allowed character length" unless ( length($self->{_staff_type_oth}) <= 255 );
	return "SUBCONTRACTOR column contains invalid numeric value" unless ( $self->{_subcontractor} == Ncs::Op::YES || 
																			$self->{_subcontractor} == Ncs::Op::NO ||
																			$self->{_subcontractor} == Ncs::Op::UNKNOWN );
	return "STAFF_YOB column exceeds allowed character length" unless ( length($self->{_staff_yob}) <= 9999 );
	return "STAFF_AGE_RANGE column contains invalid numeric value" unless ( ($self->{_staff_age_range} >= STAFF_AGE_RANGE_MIN && 
																				$self->{_staff_age_range} <= STAFF_AGE_RANGE_MAX) || 
																				$self->{_staff_age_range} == Ncs::Op::REFUSED || 
																				$self->{_staff_age_range} == Ncs::Op::UNKNOWN );
	return "STAFF_GENDER column contains invalid numeric value" unless ( ($self->{_staff_gender} >= STAFF_GENDER_MIN && 
																				$self->{_staff_gender} <= STAFF_GENDER_MAX) || 
																				$self->{_staff_age_range} == Ncs::Op::UNKNOWN );
	return "STAFF_RACE column contains invalid numeric value" unless ( ($self->{_staff_race} >= STAFF_RACE_MIN && 
																				$self->{_staff_race} <= STAFF_RACE_MAX) || 
																				$self->{_staff_age_range} == Ncs::Op::REFUSED || 
																				$self->{_staff_age_range} == Ncs::Op::OTHER || 
																				$self->{_staff_age_range} == Ncs::Op::UNKNOWN );
	if ($self->{_staff_race} != Ncs::Op::OTHER) { $self->{_staff_race_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "STAFF_RACE_OTH column exceeds allowed character length" unless ( length($self->{_staff_race_oth}) <= 255 );
	return "STAFF_ETHNICITY column contains invalid numeric value" unless ( ($self->{_staff_ethnicity} >= STAFF_ETHNICITY_MIN && 
																				$self->{_staff_ethnicity} <= STAFF_ETHNICITY_MAX) || 
																				$self->{_staff_ethnicity} == Ncs::Op::REFUSED || 
																				$self->{_staff_ethnicity} == Ncs::Op::UNKNOWN );
	return "STAFF_EXP column contains invalid numeric value" unless ( ($self->{_staff_exp} >= STAFF_EXP_MIN && 
																				$self->{_staff_exp} <= STAFF_EXP_MAX) || 
																				$self->{_staff_exp} == Ncs::Op::NOT_APPLICABLE ||
																				$self->{_staff_exp} == Ncs::Op::UNKNOWN );
	return "STAFF_COMMENT column exceeds allowed character length" unless ( length($self->{_staff_comment}) <= 8000 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<staff>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<staff_id>%s</staff_id>\n", $self->{_staff_id});
	$out .= sprintf("\t\t\t<staff_type>%d</staff_type>\n", $self->{_staff_type});
	$out .= sprintf("\t\t\t<staff_type_oth>%s</staff_type_oth>\n", $self->{_staff_type_oth});
	$out .= sprintf("\t\t\t<subcontractor>%d</subcontractor>\n", $self->{_subcontractor});
	$out .= sprintf("\t\t\t<staff_yob>%d</staff_yob>\n", $self->{_staff_yob});
	$out .= sprintf("\t\t\t<staff_age_range>%d</staff_age_range>\n", $self->{_staff_age_range});
	$out .= sprintf("\t\t\t<staff_gender>%d</staff_gender>\n", $self->{_staff_gender});
	$out .= sprintf("\t\t\t<staff_race>%d</staff_race>\n", $self->{_staff_race});
	$out .= sprintf("\t\t\t<staff_race_oth>%s</staff_race_oth>\n", $self->{_staff_race_oth});
	$out .= sprintf("\t\t\t<staff_ethnicity>%d</staff_ethnicity>\n", $self->{_staff_ethnicity});
	$out .= sprintf("\t\t\t<staff_exp>%d</staff_exp>\n", $self->{_staff_exp});
	$out .= sprintf("\t\t\t<staff_comment>%s</staff_comment>\n", $self->{_staff_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</staff>");

	return $out;
}

sub getPsuId			{ my $self = shift; return $self->{_psu_id} || ''; }
sub getStaffId			{ my $self = shift; return $self->{_staff_id} || ''; }
sub getStaffType		{ my $self = shift; return $self->{_staff_type} || ''; }
sub getStaffTypeOth		{ my $self = shift; return $self->{_staff_tyep_oth} || ''; }
sub getSubcontractor	{ my $self = shift; return $self->{_subcontractor} || ''; }
sub getStaffYob			{ my $self = shift; return $self->{_staff_yob} || ''; }
sub getStaffAgeRange	{ my $self = shift; return $self->{_staff_age_range} || ''; }
sub getStaffGender		{ my $self = shift; return $self->{_staff_gender} || ''; }
sub getStaffRace		{ my $self = shift; return $self->{_staff_race} || ''; }
sub getStaffRaceOth		{ my $self = shift; return $self->{_staff_race_oth} || ''; }
sub getStaffEthnicity	{ my $self = shift; return $self->{_staff_ethnicity} || ''; }
sub getStaffExp			{ my $self = shift; return $self->{_staff_exp} || ''; }
sub getStaffComment		{ my $self = shift; return $self->{_staff_comment} || ''; }
sub getCreateDate		{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion	{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType	{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql				{ my $self = shift; return $self->{_sql} || ''; }
sub getTable			{ my $self = shift; return $self->{_table} || ''; }

1;
