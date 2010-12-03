package Ncs::Xml::PregnancyScreenerHowKnowNcs;

use strict;
use warnings;
use Ncs::Op;
use Instr::Op;

use constant HOW_KNOW_NCS_MIN 	=> 1;
use constant HOW_KNOW_NCS_MAX 	=> 5;

sub new
{
	my ($class, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_ps_how_know_ncs_id			=> undef,
		_ps_id						=> undef,
		_how_know_ncs				=> undef,
		_table_spec_version			=> Ncs::Instr::PREGNANCY_SCREENER_HOW_KNOW_NCS_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_table						=> 'PREGNANCY_SCREENER_HOW_KNOW_NCS',
		_sql						=> 'select PSU_ID, PS_HOW_KNOW_NCS_ID, PS_ID, HOW_KNOW_NCS from ' .
										'PREGNANCY_SCREENER_HOW_KNOW_NCS'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	$self->{_psu_id}					= $values->{PSU_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_ps_how_know_ncs_id}		= $values->{PS_HOW_KNOW_NCS_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_ps_id}						= $values->{PS_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_how_know_ncs}				= Ncs::Op::atoi($values->{HOW_KNOW_NCS}) || Ncs::Instr::MISSING_IN_ERROR;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "PS_HOW_KNOW_NCS_ID column exceeds allowed character length" unless ( length($self->{_ps_how_know_ncs_id}) <= 36 );
	return "PS_ID column exceeds allowed character length" unless ( length($self->{_ps_id}) <= 36 );
	return "HOW_KNOW_NCS column contains an invalid numeric value" unless ( ($self->{_how_know_ncs} >= HOW_KNOW_NCS_MIN && 
																			$self->{_how_know_ncs} <= HOW_KNOW_NCS_MAX) ||
																			$self->{_how_know_ncs} == Ncs::Instr::OTHER );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<pregnancy_screener_how_know_ncs>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<ps_how_know_ncs_id>%s</ps_how_know_ncs_id>\n", $self->{_ps_how_know_ncs_id});
	$out .= sprintf("\t\t\t<ps_id>%s</ps_id>\n", $self->{_ps_id});
	$out .= sprintf("\t\t\t<how_know_ncs>%d</how_know_ncs>\n", $self->{_how_know_ncs});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</pregnancy_screener_how_know_ncs>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getPsHowKnowNcsId				{ my $self = shift; return $self->{_ps_how_know_ncs_id} || ''; }
sub getPsId							{ my $self = shift; return $self->{_ps_id} || ''; }
sub getHowKnowNcs					{ my $self = shift; return $self->{_how_know_ncs} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
