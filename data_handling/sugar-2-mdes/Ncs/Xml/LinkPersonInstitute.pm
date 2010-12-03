package Ncs::Xml::LinkPersonInstitute;

use strict;
use warnings;
use Ncs::Op;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_person_institute_id		=> undef,
		_institute_id				=> undef,
		_person_id					=> undef,
		_is_active					=> undef,
		_create_date				=> undef,
		_table_spec_version			=> Ncs::Op::LINK_PERSON_INSTITUTE_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap					=> $soap,
		_table						=> Ncs::Db::DbDefs::LINK_PERSON_INSTITUTE_TABLE,
		_sql						=> 'select ID, PERSON_INSTITUTE_ID, ' .
										'IS_ACTIVE, DATE_FORMAT(create_date, \'%Y-%m-%d\') AS ' .
										'CREATE_DATE from ' . 
										Ncs::Db::DbDefs::LINK_PERSON_INSTITUTE_TABLE
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve link person institute record id
	my $link_person_institute_sugar_id	= $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::LINK_PERSON_INSTITUTE_SUGAR_MODULE, 
									id => $link_person_institute_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve institute_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::LINK_PERSON_INSTITUTE_SUGAR_MODULE, 
									id => $link_person_institute_sugar_id, 
									module2 => Ncs::Db::DbDefs::INSTITUTION_SUGAR_MODULE});
	# retrieve field (institute_id) value
	my $institute_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::INSTITUTION_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'institute_id'});

	# retrieve person_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::LINK_PERSON_INSTITUTE_SUGAR_MODULE, 
									id => $link_person_institute_sugar_id, 
									module2 => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE});
	# retrieve field (person_id) value
	my $person_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'person_id'});

	$self->{_psu_id}					= $psu_id_field_value;
	$self->{_person_institute_id}		= $values->{PERSON_INSTITUTE_ID} || Ncs::Op::UNKNOWN;
	$self->{_institute_id}				= $institute_id_field_value;
	$self->{_person_id}					= $person_id_field_value;
	$self->{_is_active}					= $values->{IS_ACTIVE} || Ncs::Op::UNKNOWN;
	$self->{_create_date}				= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "PERSON_INSTITUTE_ID column exceeds allowed character length" unless ( length($self->{_person_institute_id}) <= 36 );
	return "INSTITUTE_ID column exceeds allowed character length" unless ( length($self->{_institute_id}) <= 36 );
	return "PERSON_ID column exceeds allowed character length" unless ( length($self->{_person_id}) <= 36 );
	return "IS_ACTIVE column contains an invalid numeric value" unless ( $self->{_is_active} == Ncs::Op::YES || 
																			$self->{_is_active} == Ncs::Op::NO ||
																			$self->{_is_active} == Ncs::Op::UNKNOWN );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<link_person_institute>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<person_institute_id>%s</person_institute_id>\n", $self->{_person_institute_id});
	$out .= sprintf("\t\t\t<institute_id>%s</institute_id>\n", $self->{_institute_id});
	$out .= sprintf("\t\t\t<person_id>%s</person_id>\n", $self->{_person_id});
	$out .= sprintf("\t\t\t<is_active>%d</is_active>\n", $self->{_is_active});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</link_person_institute>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getPersonInstituteId			{ my $self = shift; return $self->{_person_institute_id} || ''; }
sub getInstituteId					{ my $self = shift; return $self->{_institute_id} || ''; }
sub getPersonId						{ my $self = shift; return $self->{_person_id} || ''; }
sub getIsActive						{ my $self = shift; return $self->{_is_active} || ''; }
sub getCreateDate					{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
