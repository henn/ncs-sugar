package Ncs::Xml::PregnancyScreenerRace;

use strict;
use warnings;
use Ncs::Op;
use Instr::Op;

use constant RACE_MIN 	=> 1;
use constant RACE_MAX 	=> 5;

sub new
{
	my ($class, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_ps_race_id					=> undef,
		_ps_id						=> undef,
		_race						=> undef,
		_table_spec_version			=> Ncs::Instr::PREGNANCY_SCREENER_RACE_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_table						=> 'PREGNANCY_SCREENER_RACE',
		_sql						=> 'select PSU_ID, PS_RACE_ID, PS_ID, RACE from ' .
										Ncs::Instr::PREGNANCY_SCREENER_RACE_VERSION
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	$self->{_psu_id}				= $values->{PSU_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_ps_race_id}			= $values->{PS_RACE_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_ps_id}					= $values->{PS_ID} || Ncs::Instr::MISSING_IN_ERROR;
	$self->{_race}					= Ncs::Op::atoi($values->{RACE}) || Ncs::Instr::MISSING_IN_ERROR;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "PS_RACE_ID column exceeds allowed character length" unless ( length($self->{_ps_race_id}) <= 36 );
	return "PS_ID column exceeds allowed character length" unless ( length($self->{_ps_id}) <= 36 );
	return "RACE column contains an invalid numeric value" unless ( ($self->{_race} >= RACE_MIN && 
																			$self->{_race} <= RACE_MAX) ||
																			$self->{_race} == Ncs::Instr::OTHER ||
																			$self->{_race} == Ncs::Instr::REFUSED ||
																			$self->{_race} == Ncs::Instr::DONT_KNOW ||
																			$self->{_race} == Ncs::Instr::LEGITIMATE_SKIP ||
																			$self->{_race} == Ncs::Instr::MISSING_IN_ERROR );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<pregnancy_screener_race>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<ps_race_id>%s</ps_race_id>\n", $self->{_ps_race_id});
	$out .= sprintf("\t\t\t<ps_id>%s</ps_id>\n", $self->{_ps_id});
	$out .= sprintf("\t\t\t<race>%d</race>\n", $self->{_race});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</pregnancy_screener_race>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getPsRaceId						{ my $self = shift; return $self->{_ps_race_id} || ''; }
sub getPsId							{ my $self = shift; return $self->{_ps_id} || ''; }
sub getRace							{ my $self = shift; return $self->{_race} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
