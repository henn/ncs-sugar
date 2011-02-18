package Ncs::Xml::NonInterviewRptVacant;

use strict;
use warnings;
use Ncs::Op;

use constant NIR_VACANT_MIN		=> 1;
use constant NIR_VACANT_MAX		=> 6;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_nir_vacant_id				=> undef,
		_nir_id						=> undef,
		_nir_vacant					=> undef,
		_nir_vacant_oth				=> undef,
		_create_date				=> undef,
		_table_spec_version			=> Ncs::Op::NON_INTERVIEW_RPT_VACANT_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap					=> $soap,
		_table						=> Ncs::Db::DbDefs::NON_INTERVIEW_RPT_VACANT_TABLE,
		_sql						=> 'select ID, NIR_VACANT_ID, NIR_VACANT, NIR_VACANT_OTH, ' .
										'DATE_FORMAT(date_entered, \'%Y-%m-%d\') AS CREATE_DATE from ' .
										Ncs::Db::DbDefs::NON_INTERVIEW_RPT_VACANT_TABLE . 
										' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve non interview report vacant record id
	my $non_interview_rpt_vacant_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::NON_INTERVIEW_RPT_VACANT_SUGAR_MODULE, 
									id => $non_interview_rpt_vacant_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve nir_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::NON_INTERVIEW_RPT_VACANT_SUGAR_MODULE, 
									id => $non_interview_rpt_vacant_sugar_id, 
									module2 => Ncs::Db::DbDefs::NON_INTERVIEW_RPT_SUGAR_MODULE});
	# retrieve field (nir_id) value
	my $nir_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::NON_INTERVIEW_RPT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'nir_id'});

	$self->{_psu_id}				= $psu_id_field_value;
	$self->{_nir_vacant_id}			= $values->{NIR_VACANT_ID} || Ncs::Op::UNKNOWN,
	$self->{_nir_id}				= $nir_id_field_value,
	$self->{_nir_vacant}			= Ncs::Op::atoi($values->{NIR_VACANT}) || Ncs::Op::UNKNOWN,
	$self->{_nir_vacant_oth}		= $values->{NIR_VACANT_OTH} || Ncs::Op::UNKNOWN,
	$self->{_create_date}			= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "NIR_VACANT_ID column exceeds allowed character length" unless ( length($self->{_nir_vacant_id}) <= 36 );
	return "NIR_ID column exceeds allowed character length" unless ( length($self->{_nir_id}) <= 36 );
	return "NIR_VACANT column contains an invalid numeric value" unless ( ($self->{_nir_vacant} >= NIR_VACANT_MIN && 
																			$self->{_nir_vacant} <= NIR_VACANT_MAX) ||
																			$self->{_nir_vacant} == Ncs::Op::OTHER || 
																			$self->{_nir_vacant} == Ncs::Op::NOT_APPLICABLE || 
																			$self->{_nir_vacant} == Ncs::Op::UNKNOWN ); 
	if ($self->{_nir_vacant} != Ncs::Op::OTHER) { $self->{_nir_vacant_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "NIR_VACANT_OTH column exceeds allowed character length" unless ( length($self->{_nir_vacant_oth}) <= 255 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<non_interview_rpt_vacant>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<nir_vacant_id>%s</nir_vacant_id>\n", $self->{_nir_vacant_id});
	$out .= sprintf("\t\t\t<nir_id>%s</nir_id>\n", $self->{_nir_id});
	$out .= sprintf("\t\t\t<nir_vacant>%d</nir_vacant>\n", $self->{_nir_vacant});
	$out .= sprintf("\t\t\t<nir_vacant_oth>%s</nir_vacant_oth>\n", $self->{_nir_vacant_oth});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</non_interview_rpt_vacant>");

	return $out;
}

sub getPsuId					{ my $self = shift; return $self->{_psu_id} || ''; }
sub getNirVacantId				{ my $self = shift; return $self->{_vir_vacant_id} || ''; }
sub getNirId					{ my $self = shift; return $self->{_nir_id} || ''; }
sub getNirVacant				{ my $self = shift; return $self->{_nir_vacant} || ''; }
sub getNirVacantOth				{ my $self = shift; return $self->{_nir_vacant_oth} || ''; }
sub getCreateDate				{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion			{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType			{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql						{ my $self = shift; return $self->{_sql} || ''; }
sub getTable					{ my $self = shift; return $self->{_table} || ''; }

1;
