#!/usr/bin/perl

####
# Note!: This test script must be run from the root NCS application root directory to work.
####

use strict;
use warnings;
use Log::Log4perl qw(:levels get_logger);
use Cwd;
use Ncs::Soap::SoapNcs;
use Ncs::Db::DbDefs;

my $logConf = getcwd . '/config/ncs_log.cfg';
Log::Log4perl->init_and_watch($logConf, 10);
my $logger = get_logger("");

# create soap class
my $soap = Ncs::Soap::SoapNcs->new();

# retrieve a relationship id
my $relatioship_id = $soap->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::PARTICIPANT_CONSENT_SUGAR_MODULE, 
										id => '54ba7581-0d94-3b2d-5262-4cd42966274d', 
										module2 => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE,
										relationship_name => Ncs::Db::DbDefs::PARTICIPANT_CONSENT_PRSN_WTHDRW_CONSNT_REL});
if(defined($relatioship_id)) {
	$logger->info("Relationship id is:" . $relatioship_id);
}

# retrieve field (person id) value
my $field_value = $soap->get_field_value({module => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
										id => $relatioship_id, 
										field => 'name'});

if(defined($field_value)) {
	$logger->info("Field value is:" . $field_value);
}

