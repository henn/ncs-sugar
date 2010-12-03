package Ncs::Xml::Envelope;

use strict;
use warnings;

sub new
{
	my ($class) = @_;

	my $self = bless
	{
		_schemaLocation		=> "http://www.nationalchildrensstudy.gov",
		_ncs				=> "http://www.nationalchildrensstudy.gov",
		_xsi				=> "http://www.w3.org/2001/XMLSchema-instance",
	}, $class;

	return $self;
}

sub print_open_tag
{
	my $self = shift;

	my $out = sprintf("<ncs:recruitment_substudy_transmission_envelope xsi:schemaLocation=\"%s\" xmlns:ncs=\"%s\" xmlns:xsi=\"%s\">", 
										$self->{_schemaLocation}, 
										$self->{_ncs},
										$self->{_xsi});

	return $out;
}

sub print_close_tag
{
	my $self = shift;

	my $out = sprintf("</ncs:recruitment_substudy_transmission_envelope>");

	return $out;
}

sub getSchemaLocation		{ my $self = shift; return $self->{_schemaLocation} || ''; }
sub getNcs					{ my $self = shift; return $self->{_ncs} || ''; }
sub getXsi					{ my $self = shift; return $self->{_xsi} || ''; }

1;
