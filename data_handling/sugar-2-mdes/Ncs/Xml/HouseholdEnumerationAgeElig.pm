package Ncs::Xml::HouseholdEnumerationAgeElig;

use strict;
use warnings;
use Ncs::Op;
use Instr::Op;

use constant AGE_ELIG_RELATE_MIN 	=> 1;
use constant AGE_ELIG_RELATE_MAX 	=> 11;

sub new
{
	my ($class, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_age_eligible_loop_id		=> undef,
		_hhenum_id					=> undef,
		_p_id						=> undef,
		_age_elig_age				=> undef,
		_age_elig_fname				=> undef,
		_age_elig_relate			=> undef,
		_table_spec_version			=> Ncs::Instr::HOUSEHOLD_ENUMERATION_AGE_ELIG_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_table						=> 'HOUSEHOLD_ENUMERATION_AGE_ELIG',
		_sql						=> 'select PSU_ID, AGE_ELIG_LOOP_ID, HHENUM_ID, P_ID, AGE_ELIG_AGE, ' .
										'AGE_ELIG_FNAME, AGE_ELIG_RELATE from HOUSEHOLD_ENUMERATION_AGE_ELIG'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	$self->{_psu_id}					= $values->{PSU_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_age_eligible_loop_id}		= $values->{AGE_ELIGIBLE_LOOP_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_hhenum_id}					= $values->{HHENUM_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_p_id}						= $values->{P_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_age_elig_age}				= $values->{AGE_ELIG_AGE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_age_elig_fname}			= $values->{AGE_ELIG_FNAME} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_age_elig_relate}			= $values->{AGE_ELIG_RELATE} || Ncs::Instr::MISSING_IN_ERROR;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "AGE_ELIGIBLE_LOOP_ID column exceeds allowed character length" unless ( length($self->{_age_eligible_loop_id}) <= 36 );
	return "HHENUM_ID column exceeds allowed character length" unless ( length($self->{_hhenum_id}) <= 36 );
	return "P_ID column exceeds allowed character length" unless ( length($self->{_p_id}) <= 36 );
	return "AGE_ELIG_FNAME column exceeds allowed character length" unless ( length($self->{_age_elig_fname}) <= 15 );
	return "AGE_ELIG_RELATE column contains an invalid numeric value" unless ( ($self->{_age_elig_relate} >= AGE_ELIG_RELATE_MIN && 
																			$self->{_age_elig_relate} <= AGE_ELIG_RELATE_MAX) ||
																			$self->{_age_elig_relate} == Ncs::Instr::REFUSED ||
																			$self->{_age_elig_relate} == Ncs::Instr::DONT_KNOW ||
																			$self->{_age_elig_relate} == Ncs::Instr::MISSING_IN_ERROR );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<household_enumeration_age_elig>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<age_eligible_loop_id>%s</age_eligible_loop_id>\n", $self->{_age_eligible_loop_id});
	$out .= sprintf("\t\t\t<hhenum_id>%s</hhenum_id>\n", $self->{_hhenum_id});
	$out .= sprintf("\t\t\t<p_id>%s</p_id>\n", $self->{_p_id});
	$out .= sprintf("\t\t\t<age_elig_age>%s</age_elig_age>\n", $self->{_age_elig_age});
	$out .= sprintf("\t\t\t<age_elig_fname>%s</age_elig_fname>\n", $self->{_age_elig_fname});
	$out .= sprintf("\t\t\t<age_elig_relate>%d</age_elig_relate>\n", $self->{_age_elig_relate});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</household_enumeration_age_elig>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getAgeEligibleLoopId			{ my $self = shift; return $self->{_age_eligible_loop_id} || ''; }
sub getHhenumId						{ my $self = shift; return $self->{_hhenum_id} || ''; }
sub getPId							{ my $self = shift; return $self->{_p_id} || ''; }
sub getAgeEligAge					{ my $self = shift; return $self->{_age_elig_age} || ''; }
sub getAgeEligFname					{ my $self = shift; return $self->{_age_elig_fname} || ''; }
sub getAgeEligRelate				{ my $self = shift; return $self->{_age_elig_relate} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
