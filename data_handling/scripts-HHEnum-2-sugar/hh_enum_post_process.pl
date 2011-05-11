#!/usr/local/apps/perl-5.8.9/bin/perl
##!/usr/bin/perl

###############################################################################
#
# San Diego SuperComputer Center.
#
# NCS Household Enumeration Questionnaire Post Processing.
#
# Program Description:
#
# This program processes completed household enumeration questionnaires from the data collection system (e.g. Zerion).
#
# Processing involves creating the required records and relationships in the 
# SugarCRM database according to the defined NCS process flow.
#
###############################################################################

use strict;
use warnings;
use Getopt::Long;
use Pod::Usage;
use Cwd;
use IO::File;
use lib::SugarDbHelper;
use lib::ZerionDbHelper;
use lib::Const;
use Data::Dumper;

# function prototype
sub trim($);

#
# static values for NCS San Diego
#
my $static_values =	{
						'SC' => '200000385',
						'PSU' => '20000040',
						'CA' => 5
					};

#
# Process command line options and arguments.
#
GetOptions(
           "h|help"		=> \(my $help = undef),
           "m|man"		=> \(my $man = undef),
           "d|debug=s"	=> \(my $debug = undef),
          ) || pod2usage (-verbose => 2);

pod2usage(-verbose => 2) if $help;
pod2usage(-verbose => 2) if $man;

print "***** Starting Household Enumeration Questionnaire Post Processing @ " . localtime() . " *****\n";

print "\nDebug is ON.\n\n" if($debug);

#
# create database objects
#
my $sugarDbHelper = lib::SugarDbHelper->new( {debug => $debug} );
my $zerionDbHelper = lib::ZerionDbHelper->new( {debug => $debug} );

#
# retrieve the Primary Sampling Unit sugar ID
#
my ($psu_sugar_id, $psu_name, $recruit_type) = $sugarDbHelper->get_psu_id($static_values->{'PSU'});
die("***Error: PSU with ID " . $static_values->{'PSU'} . " does not exist. Exiting.\n") if (!defined($psu_sugar_id));
print "PSU sugar ID is:${psu_sugar_id}\n" if($debug);

#
# retrieve the data collection (e.g. Zerion ) ids of household enumeration records that have been completed
# and are ready for post processing
#
my $hh_enum_ids = $zerionDbHelper->get_completed_hh_enum_records();
die("***Error: Failed to retrieve hh enum records to process.. exiting application.\n") if (!defined($hh_enum_ids));
print "Number of hh enum records to process:" . scalar(@$hh_enum_ids) . "\n" if($debug);

#
# process each hh enum record
#
foreach my $hh_enum_id (@$hh_enum_ids) {
	print "Processing hh enum record:${hh_enum_id}\n" if($debug);
	
	#
	# retrieve address details from questionnaire
	#
	my $zerion_address_details = $zerionDbHelper->get_hh_enum_address_details($hh_enum_id);
	if(!defined($zerion_address_details) ) {
		warn "***Error: There was an error retrieving address details for zerion hh enum $hh_enum_id\n";
		# mark this record as having an error
		$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
		# move to next record
		next;
	}

	#
	# make sure dwelling unit id exists in our returned address info
	#
	if ( !defined($zerion_address_details->{DU_ID}) ) {
		warn "***Error: failed to retrieve DU ID for zerion hh enum record $hh_enum_id\n";
		# mark this record as having an error
		$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
		# move to next record
		next;
	}
	
	#
	# Check if the address id exists, it may not exist due to the cross over from manual
	# PAPI form entry, over to using the IPADS. When the IPADS are being used, this ADDRESS_ID
	# should be available, and this check will not be needed.  In the mean time however, this 
	# check is needed.
	#
	if ( !defined($zerion_address_details->{ADDRESS_ID}) ) {
		$zerion_address_details->{ADDRESS_ID} = $sugarDbHelper->get_address_id_from_view($zerion_address_details->{DU_ID});
		print "Retrieved address id:" . $zerion_address_details->{ADDRESS_ID} . "\n" if($debug);
	}
	
	#
	# get dwelling unit sugar id for up-coming relationships
	#
	my $du_sugar_id = $sugarDbHelper->get_dwelling_unit_sugar_id($zerion_address_details->{DU_ID});
	if( !defined($du_sugar_id) ) {
		warn "***Error: DUID " . $zerion_address_details->{DU_ID} . " does not exist in sugar for zerion hh enum $hh_enum_id\n";
		# mark this record as having an error
		$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
		# move to next record
		next;
	}
	print "Dwelling Unit sugar id is:$du_sugar_id\n" if($debug);
	
	#
	# create a contact record in sugar database
	#
	my $contact_start_time = $zerionDbHelper->get_hh_enum_start_time($hh_enum_id);
	my $contact_end_time = $zerionDbHelper->get_hh_enum_end_time($hh_enum_id);
	print "Contact start time:${contact_start_time}, contact end time:${contact_end_time}\n" if($debug);
	my ($contact_sugar_id, $contact_id) = $sugarDbHelper->insert_contact($contact_start_time, $contact_end_time);
	if(defined($contact_sugar_id)) {
		print "CONTACT SUGAR ID:${contact_sugar_id}, CONTACT ID:${contact_id}\n" if ($debug);
		# set up the contact relationships
		$sugarDbHelper->insert_contact_relationships($contact_sugar_id, $psu_sugar_id);
	} else {
		warn "***Error:There was an error inserting contact for zerion hh enum record $hh_enum_id\n";
		# mark this record as having an error
		$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
		# move to next record
		next;
	}
	
	#
	# did respondent refuse to confirm address?
	#
	if( defined($zerion_address_details) ) {
		if($zerion_address_details->{GE001} eq lib::Const::REFUSED) {
			print "Address confirmation refused for hh enum: ${hh_enum_id}\n" if($debug);
			#
			# create a non-interview report record in sugar database
			#
			my ($nir_sugar_id, $nir_id) = $sugarDbHelper->insert_non_interview_report();
			if(defined($nir_sugar_id)) {
				print "NIR SUGAR ID:${nir_sugar_id}, NIR ID:${nir_id}\n" if ($debug);
				# set up the nir relationships
				$sugarDbHelper->insert_non_interview_report_relationships($nir_sugar_id, $psu_sugar_id, $contact_sugar_id, $du_sugar_id);
			} else {
				warn "***Error:There was an error inserting non-interview report for zerion hh enum $hh_enum_id\n";
				# mark this record as having an error
				$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
				# move to next record
				next;
			}		
			# mark this record as having been processed
			$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::PROCESSED);
			# move to next record
			next;
		}
	}
	
	#
	# update address details if they have changed (if user corrected any information)
	#
	if($zerion_address_details->{GE001} ne lib::Const::DONT_KNOW ) {
		$sugarDbHelper->update_address_details($zerion_address_details);
	}
	
	#
	# retrieve the address sugar ID (used when creating a person)
	#
	my $address_sugar_id = $sugarDbHelper->get_address_sugar_id($zerion_address_details->{ADDRESS_ID});
	print "Address sugar id is:${address_sugar_id}\n" if ($debug);
	if(!defined($address_sugar_id) ) {
		warn "***Error:There was an error retrieving address sugar id for zerion hh enum $hh_enum_id\n";
		# mark this record as having an error
		$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
		# move to next record
		next;
	}
	
	#
	# create person record for respondent
	#
	my ($fname, $lname, $sex) = $zerionDbHelper->get_hh_enum_respondent_person_details($hh_enum_id);
	print "fname, lname, sex:${fname}, ${lname}, ${sex}\n" if ($debug);																		
	my ($person_sugar_id, $person_id) = $sugarDbHelper->insert_person($contact_start_time, $fname, $lname, $sex, 
																		undef, lib::Const::PERSON_CONVERTED);
	if(defined($person_sugar_id)) {
		print "RESPONDENT PERSON SUGAR ID:${person_sugar_id}, RESPONDENT PERSON ID:${person_id}\n" if ($debug);
		#
		# set up the person relationships
		# in particular, create a link from person record to address record
		#
		$sugarDbHelper->insert_person_relationships($person_sugar_id, $psu_sugar_id, $address_sugar_id);			
	} else {
		warn "***Error:There was an error inserting respondent person record for zerion hh enum $hh_enum_id\n";
		# mark this record as having an error
		$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
		# move to next record
		next;
	}

	#
	# retrieve respondent's telephone number information from questionnaire
	#
	my $zerion_telephone_details = $zerionDbHelper->get_hh_enum_telephone_details($hh_enum_id);
	print "Telephone, Alternative Telephone:" . $zerion_telephone_details->{PHONE_NBR} . ", " . $zerion_telephone_details->{PHONE_ALT} . "\n" if ($debug);
	if(!defined($zerion_telephone_details) ) {
		warn "***Error:There was an error retrieving respondent's telephone details for zerion hh enum $hh_enum_id\n";
		# mark this record as having an error
		$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
		# move to next record
		next;
	}
	
	#
	# create telephone number record if one was entered
	#
	if( ! defined($zerion_telephone_details->{TR002}) || $zerion_telephone_details->{TR002} eq lib::Const::ANSWER ) {
		my ($ph_sugar_id, $ph_id) = $sugarDbHelper->insert_telephone($contact_start_time, $zerion_telephone_details->{PHONE_NBR}, 
										$zerion_telephone_details->{PHONE_TYPE}, $zerion_telephone_details->{PHONE_TYPE_OTH}, 
										lib::Const::PH_RANK_PRIMARY);
		if(defined($ph_sugar_id)) {
			print "RESPONDENTS TELEPHONE SUGAR ID:${ph_sugar_id}, RESPONDENTS TELEPHONE ID:${ph_id}\n" if ($debug);
			# set up the telephone relationships
			$sugarDbHelper->insert_telephone_relationships($ph_sugar_id, $psu_sugar_id, $person_sugar_id);
		} else {
			warn "***Error:There was an error inserting telephone for zerion hh enum $hh_enum_id\n";
			# mark this record as having an error
			$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
			# move to next record
			next;
		}
	}
	
	#
	# create alternative telephone number record if was was entered
	#
	if( ! defined($zerion_telephone_details->{TR120}) || $zerion_telephone_details->{TR120} eq lib::Const::ANSWER ) {
		my ($ph_alt_sugar_id, $ph_alt_id) = $sugarDbHelper->insert_telephone($contact_start_time, $zerion_telephone_details->{PHONE_ALT}, 
										$zerion_telephone_details->{PHONE_ALT_TYPE}, $zerion_telephone_details->{PHONE_ALT_TYPE_OTH}, 
										lib::Const::PH_RANK_SECONDARY);
		if(defined($ph_alt_sugar_id)) {
			print "RESPONDENTS ALT TELEPHONE SUGAR ID:${ph_alt_sugar_id}, RESPONDENTS ALT TELEPHONE ID:${ph_alt_id}\n" if ($debug);
			# set up the telephone relationships
			$sugarDbHelper->insert_telephone_relationships($ph_alt_sugar_id, $psu_sugar_id, $person_sugar_id);
		} else {
			warn "***Error:There was an error inserting alt telephone for zerion hh enum $hh_enum_id\n";
			# mark this record as having an error
			$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
			# move to next record
			next;
		}
	}

	#
	# create household unit record
	#
	my $du_elig_confirm = $zerionDbHelper->get_hh_enum_dwelling_unit_eligible($hh_enum_id);
	my $hh_age_eligible = $zerionDbHelper->get_hh_enum_age_eligible_women($hh_enum_id);	
	print "household unit du elig confirm value:${du_elig_confirm}, household unit number of age eligible:${hh_age_eligible}\n" if ($debug);
	my ($household_unit_sugar_id, $household_unit_id) = $sugarDbHelper->insert_household_unit($du_elig_confirm, $hh_age_eligible);
	if(defined($household_unit_sugar_id)) {
		print "HOUSEHOLD UNIT SUGAR ID:${household_unit_sugar_id}, HOUSEHOLD UNIT ID:${household_unit_id}\n" if ($debug);
		#
		# set up the household unit relationships
		#
		$sugarDbHelper->insert_household_unit_relationships($household_unit_sugar_id, $psu_sugar_id);
	} else {
		warn "***Error:There was an error inserting household unit record for zerion hh enum $hh_enum_id\n";
		# mark this record as having an error
		$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
		# move to next record
		next;
	}
	
	#
	# create link household dwelling record
	#
	my ($link_household_dwelling_sugar_id, $link_household_dwelling_id) = $sugarDbHelper->insert_link_household_dwelling();
	if(defined($link_household_dwelling_sugar_id)) {
		print "LINK HOUSEHOLD DWELLING SUGAR ID:${link_household_dwelling_sugar_id}, LINK HOUSEHOLD DWELLING ID:${link_household_dwelling_id}\n" if ($debug);
		#
		# set up the link household dwelling relationships
		#
		$sugarDbHelper->insert_link_household_dwelling_relationships($link_household_dwelling_sugar_id, $psu_sugar_id, 
																		$household_unit_sugar_id, $du_sugar_id);
	} else {
		warn "***Error:There was an error inserting link household dwelling record for zerion hh enum $hh_enum_id\n";
		# mark this record as having an error
		$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
		# move to next record
		next;
	}
		
	#
	# create link person household record
	#
	my ($link_person_household_sugar_id, $link_person_household_id) = $sugarDbHelper->insert_link_person_household();
	if(defined($link_person_household_sugar_id)) {
		print "LINK PERSON HOUSEHOLD SUGAR ID:${link_person_household_sugar_id}, LINK PERSON HOUSEHOLD ID:${link_person_household_id}\n" if ($debug);
		#
		# set up the link person household relationships
		#
		$sugarDbHelper->insert_link_person_household_relationships($link_person_household_sugar_id, $psu_sugar_id, 
																		$household_unit_sugar_id, $person_sugar_id);
	} else {
		warn "***Error:There was an error inserting link person household record for zerion hh enum $hh_enum_id\n";
		# mark this record as having an error
		$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
		# move to next record
		next;
	}
	
	#
	# create participant record
	#
	my $sugar_participant_name = $fname . " " . $lname;
	my ($participant_sugar_id, $participant_id) = $sugarDbHelper->insert_participant($sugar_participant_name);
	if(defined($participant_sugar_id)) {
		print "PARTICIPANT SUGAR ID:${participant_sugar_id}, PARTICIPANT ID:${participant_id}\n" if ($debug);
		#
		# set up the participant relationships
		#
		$sugarDbHelper->insert_participant_relationships($participant_sugar_id, $psu_sugar_id);
	} else {
		warn "***Error:There was an error inserting participant record for zerion hh enum $hh_enum_id\n";
		# mark this record as having an error
		$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
		# move to next record
		next;
	}

	#
	# create person-participant linkage
	#
	my ($person_participant_sugar_id, $person_participant_id) = $sugarDbHelper->insert_person_participant_link($sugar_participant_name, $person_id, $participant_id);
	if(defined($person_participant_sugar_id)) {
		print "PERSON-PARTICIPANT LINK SUGAR ID:${person_participant_sugar_id}, PERSON-PARTICIPANT LINK ID:${person_participant_id}\n" if ($debug);
		#
		# set up the person-participant link relationships
		#
		$sugarDbHelper->insert_person_participant_link_relationships($person_participant_sugar_id, $psu_sugar_id, $person_sugar_id,
																		$participant_sugar_id);
	} else {
		warn "***Error:There was an error inserting person-participant link record for zerion hh enum $hh_enum_id\n";
		# mark this record as having an error
		$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
		# move to next record
		next;
	}	
	
	#
	# create case
	#
	my $case_sugar_id = $sugarDbHelper->insert_case($sugar_participant_name, $person_id);
	if(defined($case_sugar_id)) {
		print "CASE SUGAR ID:${case_sugar_id}\n" if ($debug);
		#
		# set up the case relationships
		#
		$sugarDbHelper->insert_case_relationships($case_sugar_id, $person_sugar_id, $participant_sugar_id, $household_unit_sugar_id);
	} else {
		warn "***Error:There was an error inserting case record for zerion hh enum $hh_enum_id\n";
		# mark this record as having an error
		$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
		# move to next record
		next;
	}	
	
	#
	# create event record
	#
	my ($event_sugar_id, $event_id) = $sugarDbHelper->insert_event($contact_start_time, $contact_end_time);
	if(defined($event_sugar_id)) {
		print "EVENT SUGAR ID:${event_sugar_id}, EVENT ID:${event_id}\n" if ($debug);
		#
		# set up the event relationships
		#
		$sugarDbHelper->insert_event_relationships($event_sugar_id, $psu_sugar_id, $participant_sugar_id);
	} else {
		warn "***Error:There was an error inserting event record for zerion hh enum $hh_enum_id\n";
		# mark this record as having an error
		$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
		# move to next record
		next;
	}

	#
	# create instrument record
	#
	my ($instrument_sugar_id, $instrument_id) = $sugarDbHelper->insert_instrument($contact_start_time, $contact_end_time);
	if(defined($instrument_sugar_id)) {
		print "INSTRUMENT SUGAR ID:${instrument_sugar_id}, INSTRUMENT ID:${instrument_id}\n" if ($debug);
		#
		# set up the instrument relationships
		#
		$sugarDbHelper->insert_instrument_relationships($instrument_sugar_id, $psu_sugar_id, $event_sugar_id);
	} else {
		warn "***Error:There was an error inserting instrument record for zerion hh enum $hh_enum_id\n";
		# mark this record as having an error
		$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
		# move to next record
		next;
	}
	
	#
	# create contact linking record
	#
	my ($contact_link_sugar_id, $contact_link_id) = $sugarDbHelper->insert_contact_link();
	if(defined($contact_link_sugar_id)) {
		print "CONTACT LINK SUGAR ID:${contact_link_sugar_id}, CONTACT LINK ID:${contact_link_id}\n" if ($debug);
		#
		# set up the contact link relationships
		#
		$sugarDbHelper->insert_contact_link_relationships($contact_link_sugar_id, $psu_sugar_id, $contact_sugar_id, 
															$event_sugar_id, $instrument_sugar_id, $person_sugar_id);
	} else {
		warn "***Error:There was an error inserting contact link record for zerion hh enum $hh_enum_id\n";
		# mark this record as having an error
		$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
		# move to next record
		next;
	}
	
	#
	# retrieve pregnant women records from questionnaire
	#
	my $preg_women = $zerionDbHelper->get_hh_enum_pregnant_women($hh_enum_id);
	
	#
	# process each hh enum pregnant woman
	#
	foreach my $preg_woman (@$preg_women) {
		print "Processing hh enum pregnant woman:" . $preg_woman->{P_FNAME} . "\n" if($debug);
		
		# only process if relationship is not self (because we have already created a person record for the respondent)
		if ($preg_woman->{P_RELATE} ne lib::Const::PREG_WOMAN_RELATE_SELF) {
		
			#
			# create pregnant woman person record
			#
			my ($preg_person_sugar_id, $preg_person_id) = $sugarDbHelper->insert_person($contact_start_time, $preg_woman->{P_FNAME}, 
													'', lib::Const::FEMALE, $preg_woman->{P_AGE}, lib::Const::PERSON_NOT_CONVERTED);
			if(defined($preg_person_sugar_id)) {
				print "PREGNANT WOMAN PERSON SUGAR ID:${preg_person_id}, PREGNANT WOMAN PERSON ID:${preg_person_id}\n" if ($debug);
				#
				# set up the pregnant woman person relationships
				# in particular, create a link from person record to address record
				#
				$sugarDbHelper->insert_person_relationships($preg_person_sugar_id, $psu_sugar_id, $address_sugar_id);			
			} else {
				warn "***Error:There was an error inserting pregnant woman person record for zerion hh enum $hh_enum_id" .
						" pregnant woman: " . $preg_woman->{P_FNAME} . "\n";
				# mark this record as having an error
				$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
				# move to next record
				next;
			}
			
			#
			# create link person household record for pregnant woman
			#
			my ($link_preg_person_household_sugar_id, $link_preg_person_household_id) = $sugarDbHelper->insert_link_person_household();
			if(defined($link_preg_person_household_sugar_id)) {
				print "PREGNANT WOMAN LINK PERSON HOUSEHOLD SUGAR ID:${link_preg_person_household_sugar_id}, PREGNANT WOMAN LINK PERSON HOUSEHOLD ID:${link_preg_person_household_id}\n" if ($debug);
				#
				# set up the link person household relationships for pregnant woman
				#
				$sugarDbHelper->insert_link_person_household_relationships($link_preg_person_household_sugar_id, $psu_sugar_id, 
																				$household_unit_sugar_id, $preg_person_sugar_id);
			} else {
				warn "***Error:There was an error inserting link person household record for zerion hh enum $hh_enum_id" .
						" pregnant woman: " . $preg_woman->{P_FNAME} . "\n";				
				# mark this record as having an error
				$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
				# move to next record
				next;
			}
			
		} else {
			# pregnant woman is the respondent, so update the participant record type to = preg elig woman, and person record age
			$sugarDbHelper->update_participant_type($participant_sugar_id, lib::Const::PART_TYPE_PREG_WOMAN);
			$sugarDbHelper->update_person_age($person_sugar_id, $preg_woman->{P_AGE});
		}
		
	} # end foreach preg woman
		
	#
	# retrieve non-pregnant age eligible women from questionnaire
	#
	my $age_elig_women = $zerionDbHelper->get_hh_enum_age_elig_non_pregnant_women($hh_enum_id);
	
	#
	# process each hh enum age eligible non-pregnant woman
	#
	foreach my $age_elig_woman (@$age_elig_women) {
		print "Processing hh enum age eligible non-pregnant woman:" . $age_elig_woman->{AGE_ELIG_FNAME} . "\n" if($debug);
	
		# only process if relationship is not self (because we have already created a person record for the respondent)
		if ($age_elig_woman->{AGE_ELIG_RELATE} ne lib::Const::AGE_ELIG_WOMAN_RELATE_SELF) {
		
			#
			# create age eligible non-pregnant woman person record
			#
			my ($age_elig_person_sugar_id, $age_elig_person_id) = $sugarDbHelper->insert_person($contact_start_time, $age_elig_woman->{AGE_ELIG_FNAME}, 
													'', lib::Const::FEMALE, $age_elig_woman->{AGE_ELIG_AGE}, lib::Const::PERSON_NOT_CONVERTED);
			if(defined($age_elig_person_sugar_id)) {
				print "AGE ELIG NON-PREGNANT WOMAN PERSON SUGAR ID:${age_elig_person_sugar_id}, AGE ELIG NON-PREGNANT WOMAN PERSON ID:${age_elig_person_id}\n" if ($debug);
				#
				# set up the age eligible non-pregnant woman person relationships
				# in particular, create a link from person record to address record
				#
				$sugarDbHelper->insert_person_relationships($age_elig_person_sugar_id, $psu_sugar_id, $address_sugar_id);			
			} else {
				warn "***Error:There was an error inserting age elig non-pregnant woman person record for zerion hh enum $hh_enum_id" .
						" age elig non-pregnant woman: " . $age_elig_woman->{AGE_ELIG_FNAME} . "\n";
				# mark this record as having an error
				$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
				# move to next record
				next;
			}
			
			#
			# create link person household record age eligible non-pregnant woman
			#
			my ($link_age_elig_person_household_sugar_id, $link_age_elig_person_household_id) = $sugarDbHelper->insert_link_person_household();
			if(defined($link_age_elig_person_household_sugar_id)) {
				print "AGE ELIG NON-PREGNANT WOMAN LINK PERSON HOUSEHOLD SUGAR ID:${link_age_elig_person_household_sugar_id}, AGE ELIG NON-PREGNANT WOMANLINK PERSON HOUSEHOLD ID:${link_age_elig_person_household_id}\n" if ($debug);
				#
				# set up the link person household relationships age eligible non-pregnant woman
				#
				$sugarDbHelper->insert_link_person_household_relationships($link_age_elig_person_household_sugar_id, $psu_sugar_id, 
																				$household_unit_sugar_id, $age_elig_person_sugar_id);
			} else {
				warn "***Error:There was an error inserting link person household record for zerion hh enum $hh_enum_id" .
						" age elig non-pregnant woman: " . $age_elig_woman->{AGE_ELIG_FNAME} . "\n";
				# mark this record as having an error
				$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
				# move to next record
				next;
			}
			
		} else {
			# age elig non-pregnant woman is the respondent, so update the participant record type to = age elig woman and the person record age
			$sugarDbHelper->update_participant_type($participant_sugar_id, lib::Const::PART_TYPE_AGE_ELIG_WOMAN);
			$sugarDbHelper->update_person_age($person_sugar_id, $age_elig_woman->{AGE_ELIG_AGE});
		}
		
	} # end foreach age elig non-preg woman
	
	#
	# retrieve hidden dwelling unit records from questionnaire
	#
	my $hidden_dus = $zerionDbHelper->get_hh_enum_hidden_dwelling_units($hh_enum_id);
	
	#
	# process each hh enum hidden dwelling unit
	#
	foreach my $hidden_du (@$hidden_dus) {
		print "Processing hh enum hidden dwelling unit:" . $hidden_du->{HDU_ADDRESS_1} . "\n" if($debug);
	
		#
		# create dwelling unit record
		#
		my ($hidden_dwelling_sugar_id, $hidden_dwelling_id) = $sugarDbHelper->insert_dwelling_unit();
		if(defined($hidden_dwelling_sugar_id)) {
			print "HIDDEN DWELLING UNIT SUGAR ID:${hidden_dwelling_sugar_id}, HIDDEN DWELLING ID:${hidden_dwelling_id}\n" if ($debug);
			#
			# set up the dwelling unit relationships
			#
			$sugarDbHelper->insert_dwelling_relationships($hidden_dwelling_sugar_id, $psu_sugar_id, undef);
		} else {
			warn "***Error:There was an error inserting hidden dwelling unit record for zerion hh enum $hh_enum_id" .
					" hidden dwelling unit: " . $hidden_du->{HDU_ADDRESS_1} . "\n";
			# mark this record as having an error
			$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
			# move to next record
			next;
		}
				
		#
		# create address record
		#
		my ($hd_address_sugar_id, $address_id) = $sugarDbHelper->insert_address('', $hidden_du->{HDU_ADDRESS_1}, 
												$hidden_du->{HDU_ADDRESS_2}, $hidden_du->{HDU_UNIT}, '', 
												$hidden_du->{HDU_CITY}, $static_values->{CA}, $hidden_du->{HDU_ZIP}, 
												'', '', '');
		if(defined($hd_address_sugar_id)) {
			print "HIDDEN ADDRESS SUGAR ID:${hd_address_sugar_id}, HIDDEN ADDRESS ID:${address_id}\n" if ($debug);
			#
			# set up the address relationships
			#
			$sugarDbHelper->insert_address_relationships($hd_address_sugar_id, $psu_sugar_id, $hidden_dwelling_sugar_id);
		} else {
			warn "***Error:There was an error inserting address record for zerion hh enum $hh_enum_id" .
					" address sugar ID: " . $hd_address_sugar_id . "\n";
			# mark this record as having an error
			$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::ERROR);
			# move to next record
			next;
		}		
		
	} # end foreach hidden dwelling unit
	
	#
	# update the hh enum's questionnaire lookup table with all the information we now have 
	# (most of which is used in the xml export)
	#
	$zerionDbHelper->complete_hh_enum_record($hh_enum_id, $static_values->{'PSU'}, $psu_name, 
											lib::Const::AGE_MAJORITY, $recruit_type, 
											$zerion_address_details->{DU_ID}, $household_unit_id,
											$participant_id, $event_id, lib::Const::EVENT_TYPE, 
											$instrument_id, lib::Const::HH_INSTRUMENT_TYPE);
	
	#
	# mark hh enum record as having been processed
	#
	print "Marking hh enum $hh_enum_id record as processed.\n" if ($debug);
	$zerionDbHelper->set_hh_enum_status($hh_enum_id, lib::Const::PROCESSED);
	
} # next hh enum record

#
# finished!
#	
print "Application completed in ", time() - $^T, " seconds.\n";

exit 0;

__END__

=pod

=head1 NAME

hh_enum_post_process.pl - NCS Household Enumeration Questionnaire Post Processing

=head1 DESCRIPTION

NCS Household Enumeration Questionnaire Post Processing.

Program Description:

This program processes completed household enumeration questionnaires.

Processing involves creating the required records and relationships in the 
sugar application according to the defined process flow.

=head1 SYNOPSIS

hh_enum_post_process.pl [OPTIONS] [ARGUMENTS]

=head1 OPTIONS

=over 15

=item B<-h>, B<--help>

Print usage message.

=item B<-m>, B<--man>

Print detailed manual page.

=back

=head1 ARGUMENTS

=over 15

=item B<-d>, B<--debug>

Turn debug mode on.  When debug is on, debug messages are printed to screen.

example: -debug 1 to turn debug on.

=cut
