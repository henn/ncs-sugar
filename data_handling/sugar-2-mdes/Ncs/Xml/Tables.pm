package Ncs::Xml::Tables;

use strict;
use warnings;

sub new
{
	my ($class) = @_;

	my $self = bless
	{
	}, $class;

	return $self;
}

sub print_open_tag
{
	my $self = shift;

	my $out = sprintf("\t<ncs:transmission_tables>");

	return $out;
}

sub print_close_tag
{
	my $self = shift;

	my $out = sprintf("\t</ncs:transmission_tables>");

	return $out;
}

1;
