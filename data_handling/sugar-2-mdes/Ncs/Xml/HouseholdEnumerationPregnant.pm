package Ncs::Xml::HouseholdEnumerationPregnant;

use strict;
use warnings;
use Ncs::Op;
use Instr::Op;

use constant P_RELATE_MIN 	=> 1;
use constant P_RELATE_MAX 	=> 11;

sub new
{
	my ($class, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_pregnant_loop_id			=> undef,
		_hhenum_id					=> undef,
		_p_id						=> undef,
		_p_age						=> undef,
		_p_fname					=> undef,
		_p_relate					=> undef,
		_table_spec_version			=> Ncs::Instr::HOUSEHOLD_ENUMERATION_PREGNANT_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_table						=> 'HOUSEHOLD_ENUMERATION_PREGNANT',
		_sql						=> 'select PSU_ID, PREGNANT_LOOP_ID, HHENUM_ID, P_ID, P_AGE, ' .
										'P_FNAME, P_RELATE from HOUSEHOLD_ENUMERATION_PREGNANT'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	$self->{_psu_id}					= $values->{PSU_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_pregnant_loop_id}			= $values->{PREGNANT_LOOP_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_hhenum_id}					= $values->{HHENUM_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_p_id}						= $values->{P_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_p_age}						= $values->{P_AGE} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_p_fname}					= $values->{P_FNAME} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_p_relate}					= $values->{P_RELATE} || Ncs::Instr::MISSING_IN_ERROR;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "PREGNANT_LOOP_ID column exceeds allowed character length" unless ( length($self->{_pregnant_loop_id}) <= 36 );
	return "HHENUM_ID column exceeds allowed character length" unless ( length($self->{_hhenum_id}) <= 36 );
	return "P_ID column exceeds allowed character length" unless ( length($self->{_p_id}) <= 36 );
	return "P_FNAME column exceeds allowed character length" unless ( length($self->{_p_fname}) <= 15 );
	return "P_RELATE column contains an invalid numeric value" unless ( ($self->{_p_relate} >= P_RELATE_MIN && 
																			$self->{_p_relate} <= P_RELATE_MAX) ||
																			$self->{_p_relate} == Ncs::Instr::REFUSED ||
																			$self->{_p_relate} == Ncs::Instr::DONT_KNOW ||
																			$self->{_p_relate} == Ncs::Instr::MISSING_IN_ERROR );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<household_enumeration_pregnant>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<pregnant_loop_id>%s</pregnant_loop_id>\n", $self->{_pregnant_loop_id});
	$out .= sprintf("\t\t\t<hhenum_id>%s</hhenum_id>\n", $self->{_hhenum_id});
	$out .= sprintf("\t\t\t<p_id>%s</p_id>\n", $self->{_p_id});
	$out .= sprintf("\t\t\t<p_age>%s</p_age>\n", $self->{_p_age});
	$out .= sprintf("\t\t\t<p_fname>%s</p_fname>\n", $self->{_p_fname});
	$out .= sprintf("\t\t\t<p_relate>%d</p_relate>\n", $self->{_p_relate});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</household_enumeration_pregnant>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getPregnantLoopId				{ my $self = shift; return $self->{_pregnant_loop_id} || ''; }
sub getHhenumId						{ my $self = shift; return $self->{_hhenum_id} || ''; }
sub getPId							{ my $self = shift; return $self->{_p_id} || ''; }
sub getPAge							{ my $self = shift; return $self->{_p_age} || ''; }
sub getPFname						{ my $self = shift; return $self->{_p_fname} || ''; }
sub getPRelate						{ my $self = shift; return $self->{_p_relate} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
