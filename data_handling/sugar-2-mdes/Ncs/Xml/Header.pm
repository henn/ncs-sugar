package Ncs::Xml::Header;

use strict;
use warnings;

sub new
{
	my ($class, $header, $is_snapshot) = @_;

	my $self = bless
	{
		_sc_id			=> $header->{SC_ID},
		_psu_id			=> $header->{PSU_ID},
		_spec_version	=> $header->{TABLE_SPEC_VERSION},
		_is_snapshot	=> $is_snapshot
	}, $class;

	return $self;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t<ncs:transmission_header>\n");
	$out .= sprintf("\t\t<sc_id>%d</sc_id>\n", $self->{_sc_id});
	$out .= sprintf("\t\t<psu_id>%d</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t<specification_version>%s</specification_version>\n", $self->{_spec_version});
	$out .= sprintf("\t\t<is_snapshot>%s</is_snapshot>\n", $self->{_is_snapshot});
	$out .= sprintf("\t</ncs:transmission_header>");

	return $out;
}

sub getScId				{ my $self = shift; return $self->{_sc_id} || ''; }
sub getPsuId			{ my $self = shift; return $self->{_psu_id} || ''; }
sub getSpecVersion		{ my $self = shift; return $self->{_spec_version} || ''; }
sub getIsSnapshot		{ my $self = shift; return $self->{_is_snapshot} || ''; }

1;
