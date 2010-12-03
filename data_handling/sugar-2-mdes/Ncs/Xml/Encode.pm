package Ncs::Xml::Encode;

use strict;
use warnings;

sub new
{
	my ($class) = @_;

	my $self = bless
	{
		_version	=> "1.0",
		_encoding	=> "UTF-8"
	}, $class;

	return $self;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("<?xml version=\"%s\" encoding=\"%s\"?>", $self->{_version}, $self->{_encoding});

	return $out;
}

sub getVersion		{ my $self = shift; return $self->{_version} || ''; }
sub getEncoding		{ my $self = shift; return $self->{_encoding} || ''; }

1;
