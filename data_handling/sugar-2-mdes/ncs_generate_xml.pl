#!/usr/bin/perl

###############################################################################
#
# San Diego SuperComputer Center.
#
# National Childrens Study Data Transmission File Generator Application.
#
# Program Description:
#
# This application retrieves data from the NCS database and constructs an 
# XML formatted file for transmission to the NCS Program Office.
#
###############################################################################

use strict;
use warnings;
use Getopt::Long;
use Pod::Usage;
use Log::Log4perl qw(:levels get_logger);
use Cwd;
use Ncs::Ncs;

#
# Process command line options and arguments.
#
GetOptions(
           "h|help"     => \(my $help = undef),
           "m|man"      => \(my $man = undef),
           "s|snapshot=s"	=> \(my $is_snapshot = "true"),
		   "p|suppress=s"	=> \(my $suppress = "false")
          ) || pod2usage (-verbose => 1);

pod2usage(-verbose => 1) if $help;
pod2usage(-verbose => 2) if $man;
pod2usage(-verbose => 1) unless (lc($is_snapshot) eq "true" || lc($is_snapshot) eq "false");
pod2usage(-verbose => 1) unless (lc($suppress) eq "true" || lc($suppress) eq "false");
$is_snapshot = lc($is_snapshot);
$suppress = lc($suppress) eq "true" ? 1 : 0;

#
# Set application configurations details.
#
my $logConf = getcwd . '/config/ncs_log.cfg';
my $workDir = getcwd . '/work';
my $saveDir = getcwd . '/save';
my $xml_file = $workDir . "/" . "transmissionFile.xml";		# TO DO: need to find out file name format
my $error = undef;

Log::Log4perl->init_and_watch($logConf, 10);
my $logger = get_logger("");

#
# Begin process...
#
$logger->info("** NCS Data Transmission File Generator **");

#
# Create a new NCS xml formatted file
#
$error = begin_ncs_xml_file($xml_file);
if ($error)
{
    $logger->error("Cannot create NCS data transmission file - $error");
    exit 1;
}

#
# Insert 'envelope' xml open tag into file
#
$error = open_envelope($xml_file);
if ($error)
{
    $logger->error("An error occurred while writing NCS data transmission file - $error");
    exit 1;
}

#
# Insert 'header' xml section into file
#
$error = insert_header($xml_file, $is_snapshot);
if ($error)
{
    $logger->error("An error occurred while writing NCS data transmission file - $error");
    exit 1;
}

#
# Insert 'tables' xml section into file
#
$error = insert_tables($xml_file, $is_snapshot, $suppress);
if ($error)
{
    $logger->error("An error occurred while writing NCS data transmission file - $error");
    exit 1;
}

#
# Insert 'envelope' xml close tag into file
#
$error = close_envelope($xml_file);
if ($error)
{
    $logger->error("An error occurred while writing NCS data transmission file - $error");
    exit 1;
}

$logger->info("Application completed in ", time() - $^T, " seconds.");

__END__

=pod

=head1 NAME

ncs_generate_xml.pl - National Childrens Study Data Transmission File Generator

=head1 DESCRIPTION

This application creates the XML data tranmission file that is sent to the 
NCS Program Office. 

=head1 SYNOPSIS

ncs_generate_xml.pl [OPTIONS] [ARGUMENTS]

=head1 OPTIONS

=over 15

=item B<-h>, B<--help>

Print usage message.

=item B<-m>, B<--man>

Print detailed manual page.

=back

=head1 ARGUMENTS

=over 15

=item B<-s>, B<--snapshot>

Define whether transmission is snapshot or incremental, "true" = snapshot 
"false" = incremental. Default is true.

=item B<-p>, B<--suppress>

Define whether to create an xml file with suppressed data, "true" = yes
"false" = no. Default is false.

=cut
