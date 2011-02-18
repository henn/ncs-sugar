package Ncs::Xml::NonInterviewRptNoaccess;

use strict;
use warnings;
use Ncs::Op;

use constant NIR_NOACCESS_MIN		=> 1;
use constant NIR_NOACCESS_MAX		=> 3;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_nir_noaccess_id			=> undef,
		_nir_id						=> undef,
		_nir_noaccess				=> undef,
		_nir_noaccess_oth			=> undef,
		_create_date				=> undef,
		_table_spec_version			=> Ncs::Op::NON_INTERVIEW_RPT_NOACCESS_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap					=> $soap,
		_table						=> Ncs::Db::DbDefs::NON_INTERVIEW_RPT_NOACCESS_TABLE,
		_sql						=> 'select ID, NIR_NOACCESS_ID, NIR_NOACCESS, NIR_NOACCESS_OTH, ' .
										'DATE_FORMAT(date_entered, \'%Y-%m-%d\') AS CREATE_DATE from ' .
										Ncs::Db::DbDefs::NON_INTERVIEW_RPT_NOACCESS_TABLE . 
										' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve non interview report noaccess record id
	my $non_interview_rpt_noaccess_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::NON_INTERVIEW_RPT_NOACCESS_SUGAR_MODULE, 
									id => $non_interview_rpt_noaccess_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve nir_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::NON_INTERVIEW_RPT_NOACCESS_SUGAR_MODULE, 
									id => $non_interview_rpt_noaccess_sugar_id, 
									module2 => Ncs::Db::DbDefs::NON_INTERVIEW_RPT_SUGAR_MODULE});
	# retrieve field (nir_id) value
	my $nir_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::NON_INTERVIEW_RPT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'nir_id'});

	$self->{_psu_id}				= $psu_id_field_value;
	$self->{_nir_noaccess_id}		= $values->{NIR_NOACCESS_ID} || Ncs::Op::UNKNOWN;
	$self->{_nir_id}				= $nir_id_field_value;
	$self->{_nir_noaccess}			= Ncs::Op::atoi($values->{NIR_NOACCESS}) || Ncs::Op::UNKNOWN;
	$self->{_nir_noaccess_oth}		= $values->{NIR_NOACCESS_OTH} || Ncs::Op::UNKNOWN;
	$self->{_create_date}			= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "NIR_NOACCESS_ID column exceeds allowed character length" unless ( length($self->{_nir_noaccess_id}) <= 36 );
	return "NIR_ID column exceeds allowed character length" unless ( length($self->{_nir_id}) <= 36 );
	return "NIR_NOACCESS column contains an invalid numeric value" unless ( ($self->{_nir_noaccess} >= NIR_NOACCESS_MIN && 
																			$self->{_nir_noaccess} <= NIR_NOACCESS_MAX) ||
																			$self->{_nir_noaccess} == Ncs::Op::OTHER || 
																			$self->{_nir_noaccess} == Ncs::Op::NOT_APPLICABLE || 
																			$self->{_nir_noaccess} == Ncs::Op::UNKNOWN ); 
	if ($self->{_nir_noaccess} != Ncs::Op::OTHER) { $self->{_nir_noaccess_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "NIR_NOACCESS_OTH column exceeds allowed character length" unless ( length($self->{_nir_noaccess_oth}) <= 255 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<non_interview_rpt_noaccess>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<nir_noaccess_id>%s</nir_noaccess_id>\n", $self->{_nir_noaccess_id});
	$out .= sprintf("\t\t\t<nir_id>%s</nir_id>\n", $self->{_nir_id});
	$out .= sprintf("\t\t\t<nir_noaccess>%d</nir_noaccess>\n", $self->{_nir_noaccess});
	$out .= sprintf("\t\t\t<nir_noaccess_oth>%s</nir_noaccess_oth>\n", $self->{_nir_noaccess_oth});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</non_interview_rpt_noaccess>");

	return $out;
}

sub getPsuId					{ my $self = shift; return $self->{_psu_id} || ''; }
sub getNirNoaccessId			{ my $self = shift; return $self->{_vir_noaccess_id} || ''; }
sub getNirId					{ my $self = shift; return $self->{_nir_id} || ''; }
sub getNirNoaccess				{ my $self = shift; return $self->{_nir_noaccess} || ''; }
sub getNirNoaccessOth			{ my $self = shift; return $self->{_nir_noaccess_oth} || ''; }
sub getCreateDate				{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion			{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType			{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql						{ my $self = shift; return $self->{_sql} || ''; }
sub getTable					{ my $self = shift; return $self->{_table} || ''; }

1;
