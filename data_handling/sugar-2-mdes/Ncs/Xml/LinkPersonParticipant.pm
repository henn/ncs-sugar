package Ncs::Xml::LinkPersonParticipant;

use strict;
use warnings;
use Ncs::Op;

use constant RELATION_MIN	=> 1;
use constant RELATION_MAX	=> 18;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_person_pid_id				=> undef,
		_p_id						=> undef,
		_person_id					=> undef,
		_relation					=> undef,
		_relation_oth				=> undef,
		_is_active					=> undef,
		_create_date				=> undef,
		_table_spec_version			=> Ncs::Op::LINK_PERSON_PARTICIPANT_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap					=> $soap,
		_table						=> Ncs::Db::DbDefs::LINK_PERSON_PARTICIPANT_TABLE,
		_sql						=> 'select ID, PERSON_PID_ID, RELATION, RELATION_OTH, ' .
										'IS_ACTIVE, DATE_FORMAT(date_entered, \'%Y-%m-%d\') AS CREATE_DATE from ' .
										Ncs::Db::DbDefs::LINK_PERSON_PARTICIPANT_TABLE . 
										' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve participant id
	my $link_person_participant_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::LINK_PERSON_PARTICIPANT_SUGAR_MODULE, 
									id => $link_person_participant_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve p_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::LINK_PERSON_PARTICIPANT_SUGAR_MODULE, 
									id => $link_person_participant_sugar_id, 
									module2 => Ncs::Db::DbDefs::PARTICIPANT_SUGAR_MODULE});
	# retrieve field (p_id) value
	my $p_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PARTICIPANT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'p_id'});

	# retrieve person_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::LINK_PERSON_PARTICIPANT_SUGAR_MODULE, 
									id => $link_person_participant_sugar_id, 
									module2 => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE});
	# retrieve field (person_id) value
	my $person_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'person_id'});

	$self->{_psu_id}				= $psu_id_field_value;
	$self->{_person_pid_id}			= $values->{PERSON_PID_ID} || Ncs::Op::UNKNOWN;
	$self->{_p_id}					= $p_id_field_value;
	$self->{_person_id}				= $person_id_field_value;
	$self->{_relation}				= Ncs::Op::atoi($values->{RELATION}) || Ncs::Op::UNKNOWN;
	$self->{_relation_oth}			= $values->{RELATION_OTH} || Ncs::Op::UNKNOWN;
	$self->{_is_active}				= $values->{IS_ACTIVE} || Ncs::Op::UNKNOWN;
	$self->{_create_date}			= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "PERSON_PID_ID column exceeds allowed character length" unless ( length($self->{_person_pid_id}) <= 36 );
	return "P_ID column exceeds allowed character length" unless ( length($self->{_p_id}) <= 36 );
	return "PERSON_ID column exceeds allowed character length" unless ( length($self->{_person_id}) <= 36 );
	return "RELATION column contains an invalid numeric value" unless ( ($self->{_relation} >= RELATION_MIN && 
																			$self->{_relation} <= RELATION_MAX) ||
																			$self->{_relation} == Ncs::Op::OTHER ||
																			$self->{_relation} == Ncs::Op::UNKNOWN );
	if ($self->{_relation} != Ncs::Op::OTHER) { $self->{_relation_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "RELATION_OTH column exceeds allowed character length" unless ( length($self->{_relation_oth}) <= 255 );
	return "IS_ACTIVE column contains an invalid numeric value" unless ( $self->{_is_active} == Ncs::Op::YES || 
																			$self->{_is_active} <= Ncs::Op::NO ||
																			$self->{_is_active} <= Ncs::Op::UNKNOWN );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<link_person_participant>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<person_pid_id>%s</person_pid_id>\n", $self->{_person_pid_id});
	$out .= sprintf("\t\t\t<p_id>%s</p_id>\n", $self->{_p_id});
	$out .= sprintf("\t\t\t<person_id>%s</person_id>\n", $self->{_person_id});
	$out .= sprintf("\t\t\t<relation>%d</relation>\n", $self->{_relation});
	$out .= sprintf("\t\t\t<relation_oth>%s</relation_oth>\n", $self->{_relation_oth});
	$out .= sprintf("\t\t\t<is_active>%d</is_active>\n", $self->{_is_active});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</link_person_participant>");

	return $out;
}

sub getPsuId				{ my $self = shift; return $self->{_psu_id} || ''; }
sub getPersonPidId			{ my $self = shift; return $self->{_person_pid_id} || ''; }
sub getPId					{ my $self = shift; return $self->{_p_id} || ''; }
sub getPersonId				{ my $self = shift; return $self->{_person_id} || ''; }
sub getRelation				{ my $self = shift; return $self->{_relation} || ''; }
sub getRelationOth			{ my $self = shift; return $self->{_relation_oth} || ''; }
sub getIsActive				{ my $self = shift; return $self->{_is_active} || ''; }
sub getCreateDate			{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion		{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType		{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql					{ my $self = shift; return $self->{_sql} || ''; }
sub getTable				{ my $self = shift; return $self->{_table} || ''; }

1;
