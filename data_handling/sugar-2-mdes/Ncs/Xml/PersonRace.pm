package Ncs::Xml::PersonRace;

use strict;
use warnings;
use Ncs::Op;

use constant RACE_MIN	=> 1;
use constant RACE_MAX	=> 6;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_person_race_id				=> undef,
		_person_id					=> undef,
		_race						=> undef,		
		_race_oth					=> undef,		
		_create_date				=> undef,
		_table_spec_version			=> Ncs::Op::PERSON_RACE_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap					=> $soap,
		_table						=> Ncs::Db::DbDefs::PERSON_RACE_TABLE,
		_sql						=> 'select ID, PERSON_RACE_ID, RACE, RACE_OTH, ' .
										'DATE_FORMAT(create_date, \'%Y-%m-%d\') AS CREATE_DATE from ' .
										Ncs::Db::DbDefs::PERSON_RACE_TABLE
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve sugar person race record id
	my $person_race_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PERSON_RACE_SUGAR_MODULE, 
									id => $person_race_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve person_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PERSON_RACE_SUGAR_MODULE, 
									id => $person_race_sugar_id, 
									module2 => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE});
	# retrieve field (person_id) value
	my $person_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'person_id'});

	$self->{_psu_id}				= $psu_id_field_value;
	$self->{_person_race_id}		= $values->{PERSON_RACE_ID} || Ncs::Op::UNKNOWN;
	$self->{_person_id}				= $person_id_field_value;
	$self->{_race}					= Ncs::Op::atoi($values->{RACE}) || Ncs::Op::UNKNOWN;
	$self->{_race_oth}				= $values->{RACE_OTH} || Ncs::Op::UNKNOWN;
	$self->{_create_date}			= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "PERSON_RACE_ID column exceeds allowed character length" unless ( length($self->{_person_race_id}) <= 36 );
	return "PERSON_ID column exceeds allowed character length" unless ( length($self->{_person_id}) <= 36 );
	return "RACE column contains an invalid numeric value" unless ( ($self->{_race} >= RACE_MIN && 
																		$self->{_race} <= RACE_MAX) ||
																		$self->{_race} == Ncs::Op::REFUSED ||
																		$self->{_race} == Ncs::Op::UNKNOWN || 
																		$self->{_race} == Ncs::Op::OTHER );
	if ($self->{_race} != Ncs::Op::OTHER) { $self->{_race_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "RACE_OTH column exceeds allowed character length" unless ( length($self->{_race_oth}) <= 255 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<person_race>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<person_race_id>%s</person_race_id>\n", $self->{_person_race_id});
	$out .= sprintf("\t\t\t<person_id>%s</person_id>\n", $self->{_person_id});
	$out .= sprintf("\t\t\t<race>%d</race>\n", $self->{_race});
	$out .= sprintf("\t\t\t<race_oth>%s</race_oth>\n", $self->{_race_oth});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</person_race>");

	return $out;
}

sub getPsuId				{ my $self = shift; return $self->{_psu_id} || ''; }
sub getPersonRaceId			{ my $self = shift; return $self->{_person_race_id} || ''; }
sub getPersonId				{ my $self = shift; return $self->{_person_id} || ''; }
sub getRace					{ my $self = shift; return $self->{_race} || ''; }
sub getRaceOth				{ my $self = shift; return $self->{_race_oth} || ''; }
sub getCreateDate			{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion		{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType		{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql					{ my $self = shift; return $self->{_sql} || ''; }
sub getTable				{ my $self = shift; return $self->{_table} || ''; }

1;
