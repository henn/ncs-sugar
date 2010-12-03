###############################################################################
#
# San Diego Supercomputer Center.
#
# NCS Data Transmission File Generator Application.
#
# This module contains a collection of subroutines shared by the NCS 
# application(s).
#
###############################################################################

package Ncs::Ncs;

use strict;
use IO::File;
use Log::Log4perl qw(:levels get_logger);
use Ncs::Xml::Encode;
use Ncs::Xml::Envelope;
use Ncs::Xml::Header;
use Ncs::Xml::Tables;
use Ncs::Xml::StudyCenter;
use Ncs::Xml::ListingUnit;
use Ncs::Xml::Ssu;
use Ncs::Xml::Tsu;
use Ncs::Xml::Psu;
use Ncs::Xml::DwellingUnit;
use Ncs::Xml::LinkHouseholdDwelling;
use Ncs::Xml::HouseholdUnit;
use Ncs::Xml::Staff;
use Ncs::Xml::StaffLanguage;
use Ncs::Xml::StaffValidation;
use Ncs::Xml::StaffWeeklyExpense;
use Ncs::Xml::StaffExpMngmntTasks;
use Ncs::Xml::StaffExpDataCllctnTasks;
use Ncs::Xml::StaffCertTraining;
use Ncs::Xml::Person;
use Ncs::Xml::PersonRace;
use Ncs::Xml::LinkPersonHousehold;
use Ncs::Xml::Participant;
use Ncs::Xml::LinkPersonParticipant;
use Ncs::Xml::ParticipantConsent;
use Ncs::Xml::ParticipantVisConsent;
use Ncs::Xml::PpgDetails;
use Ncs::Xml::PpgStatusHistory;
use Ncs::Xml::Provider;
use Ncs::Xml::LinkPersonProvider;
use Ncs::Xml::Institution;
use Ncs::Xml::LinkPersonInstitute;
use Ncs::Xml::Address;
use Ncs::Xml::Telephone;
use Ncs::Xml::Email;
use Ncs::Xml::Event;
use Ncs::Xml::Instrument;
use Ncs::Xml::Contact;
use Ncs::Xml::LinkContact;
use Ncs::Xml::NonInterviewRpt;
use Ncs::Xml::NonInterviewRptVacant;
use Ncs::Xml::NonInterviewRptNoaccess;
use Ncs::Xml::NonInterviewRptRefusal;
use Ncs::Xml::Incident;
use Ncs::Xml::IncidentMedia;
use Ncs::Xml::IncidentUnanticipated;
use Ncs::Xml::Outreach;
use Ncs::Xml::OutreachStaff;
use Ncs::Xml::OutreachEval;
use Ncs::Db::TableParser;

use vars qw(@ISA);
@ISA = qw(Exporter);

use vars qw(@EXPORT);
@EXPORT = qw(
	begin_ncs_xml_file
	open_envelope
	close_envelope
	insert_header
	insert_tables
);

###########################################################################
#
# begin_ncs_xml_file()
#
# Open a new NCS xml formatted file.  This routine simply gets the xml
# file started.  It does not write any of the envelope or header sections.
#
###########################################################################
sub begin_ncs_xml_file
{
    my ($fileName) = @_;

    my $fh = IO::File->new("${fileName}", "w") 
		or return "Failed to open $fileName for writing: $!";

	my $xml_encoding = Ncs::Xml::Encode->new();
    $fh->printf("%s\n", $xml_encoding->print_tag());

    $fh->close();

	return undef;
}

###########################################################################
#
# open_envelope()
#
# This routine writes the open envelope tag ncs xml file.
#
###########################################################################
sub open_envelope
{
    my ($fileName) = @_;

    my $fh = IO::File->new("${fileName}", "a") 
		or return "Failed to write envelope open tag to $fileName: $!";

	my $xml_envelope = Ncs::Xml::Envelope->new();
    $fh->printf("%s\n", $xml_envelope->print_open_tag());

    $fh->close();

	return undef;
}

###########################################################################
#
# close_envelope()
#
# This routine writes the close envelope xml tag to the ncs xml file.
#
###########################################################################
sub close_envelope
{
    my ($fileName) = @_;

    my $fh = IO::File->new("${fileName}", "a") 
		or return "Failed to write envelope close tag to $fileName: $!";

	my $xml_envelope = Ncs::Xml::Envelope->new();
    $fh->printf("%s\n", $xml_envelope->print_close_tag());

    $fh->close();

	return undef;
}

###########################################################################
#
# insert_header()
#
# This routine writes the header section to the ncs xml file.
#
###########################################################################
sub insert_header
{
    my ($fileName, $is_snapshot) = @_;

    my $fh = IO::File->new("${fileName}", "a") 
		or return "Failed to write header section to $fileName: $!";

	my $table_parser = Ncs::Db::TableParser->new({is_snapshot => $is_snapshot});

	my $header_data = $table_parser->get_header();

	if ( !defined($header_data) )
	{
		return 'There was an error retrieving the xml header information from database, ' .
		'does the data exist?';
	}

	my $xml_header = Ncs::Xml::Header->new($header_data, $is_snapshot);

    $fh->printf("%s\n", $xml_header->print_tag());

    $fh->close();

	return undef;
}

###########################################################################
#
# insert_tables()
#
# This routine writes the tables section to the ncs xml file.
#
###########################################################################
sub insert_tables
{
    my ($fileName, $is_snapshot, $suppress) = @_;

	my $logger = get_logger("");
	my $error = undef;
	
	#
	# Insert 'tables' xml element open tag
	# 
	my $xml_tables_element = Ncs::Xml::Tables->new();
    my $fh = IO::File->new("${fileName}", "a") 
		or return "Failed to write header section to $fileName: $!";
    $fh->printf("%s\n", $xml_tables_element->print_open_tag());
	$fh->close();

	#
	# Now process each table..
	#
	
	######################################
	##                                  ##
	## OPERATIONAL DATA ELEMENT TABLES  ##
	##                                  ##
	######################################

	my $table_parser = Ncs::Db::TableParser->new({is_snapshot => $is_snapshot});
	my $soap = Ncs::Soap::SoapNcs->new();

	#
	# STUDY_CENTER table
	#
	$logger->info("Generating xml for table STUDY_CENTER");
	my $xml_study_center = Ncs::Xml::StudyCenter->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_study_center});
	return $error if ($error);

	#
	# LISTING_UNIT table
	#
	$logger->info("Generating xml for table LISTING_UNIT");
	my $xml_listing_unit = Ncs::Xml::ListingUnit->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_listing_unit});
	return $error if ($error);

	#
	# SSU table
	#
	$logger->info("Generating xml for table SSU");
	my $xml_ssu = Ncs::Xml::Ssu->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_ssu});
	return $error if ($error);

	#
	# TSU table
	#
	$logger->info("Generating xml for table TSU");
	my $xml_tsu = Ncs::Xml::Tsu->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_tsu});
	return $error if ($error);

	#
	# PSU table
	#
	$logger->info("Generating xml for table PSU");
	my $xml_psu = Ncs::Xml::Psu->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_psu});
	return $error if ($error);

	#
	# DWELLING_UNIT table
	#
	$logger->info("Generating xml for table DWELLING_UNIT");
	my $xml_dwelling_unit = Ncs::Xml::DwellingUnit->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_dwelling_unit});
	return $error if ($error);

	#
	# LINK_HOUSEHOLD_DWELLING table
	#
	$logger->info("Generating xml for table LING_HOUSEHOLD_DWELLING");
	my $xml_link_household_dwelling = Ncs::Xml::LinkHouseholdDwelling->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_link_household_dwelling});
	return $error if ($error);

	#
	# HOUSEHOLD_UNIT table
	#
	$logger->info("Generating xml for table HOUSEHOLD_UNIT");
	my $xml_household_unit = Ncs::Xml::HouseholdUnit->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_household_unit});
	return $error if ($error);

	#
	# STAFF table
	#
	$logger->info("Generating xml for table STAFF");
	my $xml_staff = Ncs::Xml::Staff->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_staff});
	return $error if ($error);

	#
	# STAFF_LANGUAGE table
	#
	$logger->info("Generating xml for table STAFF_LANGUAGE");
	my $xml_staff_language = Ncs::Xml::StaffLanguage->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_staff_language});
	return $error if ($error);

	#
	# STAFF_VALIDATION table
	#
	$logger->info("Generating xml for table STAFF_VALIDATION");
	my $xml_staff_validation = Ncs::Xml::StaffValidation->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_staff_validation});
	return $error if ($error);

	#
	# STAFF_WEEKLY_EXPENSE table
	#
	$logger->info("Generating xml for table STAFF_WEEKLY_EXPENSE");
	my $xml_staff_weekly_exp = Ncs::Xml::StaffWeeklyExpense->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_staff_weekly_exp});
	return $error if ($error);

	#
	# STAFF_EXP_MNGMNT_TASKS table
	#
	$logger->info("Generating xml for table STAFF_EXP_MNGMNT_TASKS");
	my $xml_staff_exp_mgt_tasks = Ncs::Xml::StaffExpMngmntTasks->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_staff_exp_mgt_tasks});
	return $error if ($error);

	#
	# STAFF_EXP_DATA_COLLCTN_TASKS table
	#
	$logger->info("Generating xml for table STAFF_EXP_DATA_COLLCTN_TASKS");
	my $xml_staff_exp_data_coll_tasks = Ncs::Xml::StaffExpDataCllctnTasks->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_staff_exp_data_coll_tasks});
	return $error if ($error);

	#
	# STAFF_CERT_TRAINING table
	#
	$logger->info("Generating xml for table STAFF_CERT_TRAINING");
	my $xml_staff_cert_training = Ncs::Xml::StaffCertTraining->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_staff_cert_training});
	return $error if ($error);

	#
	# PERSON table
	#
	$logger->info("Generating xml for table PERSON");
	my $xml_person = Ncs::Xml::Person->new($soap, $is_snapshot, $suppress);
	$error = $table_parser->process_table({file => $fileName, element => $xml_person});
	return $error if ($error);

	#
	# PERSON_RACE table
	#
	$logger->info("Generating xml for table PERSON_RACE");
	my $xml_person_race = Ncs::Xml::PersonRace->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_person_race});
	return $error if ($error);

	#
	# LINK_PERSON_HOUSEHOLD table
	#
	$logger->info("Generating xml for table LINK_PERSON_HOUSEHOLD");
	my $xml_link_person_household = Ncs::Xml::LinkPersonHousehold->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_link_person_household});
	return $error if ($error);

	#
	# PARTICIPANT table
	#
	$logger->info("Generating xml for table PARTICIPANT");
	my $xml_participant = Ncs::Xml::Participant->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_participant});
	return $error if ($error);

	#
	# LINK_PERSON_PARTICIPANT table
	#
	$logger->info("Generating xml for table LINK_PERSON_PARTICIPANT");
	my $xml_link_person_participant = Ncs::Xml::LinkPersonParticipant->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_link_person_participant});
	return $error if ($error);

	#
	# PARTICIPANT_CONSENT table
	#
	$logger->info("Generating xml for table PARTICIPANT_CONSENT");
	my $xml_participant_consent = Ncs::Xml::ParticipantConsent->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_participant_consent});
	return $error if ($error);

	#
	# PARTICIPANT_VIS_CONSENT table
	#
	$logger->info("Generating xml for table PARTICIPANT_VIS_CONSENT");
	my $xml_participant_vis_consent = Ncs::Xml::ParticipantVisConsent->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_participant_vis_consent});
	return $error if ($error);

	#
	# PPG_DETAILS table
	#
	$logger->info("Generating xml for table PPG_DETAILS");
	my $xml_ppg_details = Ncs::Xml::PpgDetails->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_ppg_details});
	return $error if ($error);

	#
	# PPG_STATUS_HISTORY table
	#
	$logger->info("Generating xml for table PPG_STATUS_HISTORY");
	my $xml_ppg_status_history = Ncs::Xml::PpgStatusHistory->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_ppg_status_history});
	return $error if ($error);

	#
	# PROVIDER table
	#
	$logger->info("Generating xml for table PROVIDER");
	my $xml_provider = Ncs::Xml::Provider->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_provider});
	return $error if ($error);

	#
	# LINK_PERSON_PROVIDER table
	#
	$logger->info("Generating xml for table LINK_PERSON_PROVIDER");
	my $xml_link_person_provider = Ncs::Xml::LinkPersonProvider->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_link_person_provider});
	return $error if ($error);

	#
	# INSTITUTION table
	#
	$logger->info("Generating xml for table INSTITUTION");
	my $xml_institution = Ncs::Xml::Institution->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_institution});
	return $error if ($error);

	#
	# LINK_PERSON_INSTITUTE table
	#
	$logger->info("Generating xml for table LINK_PERSON_INSTITUTE");
	my $xml_link_person_institute = Ncs::Xml::LinkPersonInstitute->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_link_person_institute});
	return $error if ($error);

	#
	# ADDRESS table
	#
	$logger->info("Generating xml for table ADDRESS");
	my $xml_address = Ncs::Xml::Address->new($soap, $is_snapshot, $suppress);
	$error = $table_parser->process_table({file => $fileName, element => $xml_address});
	return $error if ($error);

	#
	# TELEPHONE table
	#
	$logger->info("Generating xml for table TELEPHONE");
	my $xml_telephone = Ncs::Xml::Telephone->new($soap, $is_snapshot, $suppress);
	$error = $table_parser->process_table({file => $fileName, element => $xml_telephone});
	return $error if ($error);

	#
	# EMAIL table
	#
	$logger->info("Generating xml for table EMAIL");
	my $xml_email = Ncs::Xml::Email->new($soap, $is_snapshot, $suppress);
	$error = $table_parser->process_table({file => $fileName, element => $xml_email});
	return $error if ($error);

	#
	# EVENT table
	#
	$logger->info("Generating xml for table EVENT");
	my $xml_event = Ncs::Xml::Event->new($soap, $is_snapshot, $suppress);
	$error = $table_parser->process_table({file => $fileName, element => $xml_event});
	return $error if ($error);

	#
	# INSTRUMENT table
	#
	$logger->info("Generating xml for table INSTRUMENT");
	my $xml_instrument = Ncs::Xml::Instrument->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_instrument});
	return $error if ($error);

	#
	# CONTACT table
	#
	$logger->info("Generating xml for table CONTACT");
	my $xml_contact = Ncs::Xml::Contact->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_contact});
	return $error if ($error);

	#
	# LINK_CONTACT table
	#
	$logger->info("Generating xml for table LINK_CONTACT");
	my $xml_link_contact = Ncs::Xml::LinkContact->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_link_contact});
	return $error if ($error);

	#
	# NON_INTERVIEW_RPT table
	#
	$logger->info("Generating xml for table NON_INTERVIEW_RPT");
	my $xml_non_interview_rpt = Ncs::Xml::NonInterviewRpt->new($soap, $is_snapshot, $suppress);
	$error = $table_parser->process_table({file => $fileName, element => $xml_non_interview_rpt});
	return $error if ($error);

	#
	# NON_INTERVIEW_RPT_VACANT table
	#
	$logger->info("Generating xml for table NON_INTERVIEW_RPT_VACANT");
	my $xml_non_interview_rpt_vacant = Ncs::Xml::NonInterviewRptVacant->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_non_interview_rpt_vacant});
	return $error if ($error);

	#
	# NON_INTERVIEW_RPT_NOACCESS table
	#
	$logger->info("Generating xml for table NON_INTERVIEW_RPT_NOACCESS");
	my $xml_non_interview_rpt_noaccess = Ncs::Xml::NonInterviewRptNoaccess->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_non_interview_rpt_noaccess});
	return $error if ($error);

	#
	# NON_INTERVIEW_RPT_REFUSAL table
	#
	$logger->info("Generating xml for table NON_INTERVIEW_RPT_REFUSAL");
	my $xml_non_interview_rpt_refusal = Ncs::Xml::NonInterviewRptRefusal->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_non_interview_rpt_refusal});
	return $error if ($error);

	#
	# INCIDENT table
	#
	$logger->info("Generating xml for table INCIDENT");
	my $xml_incident = Ncs::Xml::Incident->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_incident});
	return $error if ($error);

	#
	# INCIDENT_MEDIA table
	#
	$logger->info("Generating xml for table INCIDENT_MEDIA");
	my $xml_incident_media = Ncs::Xml::IncidentMedia->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_incident_media});
	return $error if ($error);

	#
	# INCIDENT_UNANTICIPATED table
	#
	$logger->info("Generating xml for table INCIDENT_UNANTICIPATED");
	my $xml_incident_unanticipated = Ncs::Xml::IncidentUnanticipated->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_incident_unanticipated});
	return $error if ($error);

	#
	# OUTREACH table
	#
	$logger->info("Generating xml for table OUTREACH");
	my $xml_outreach = Ncs::Xml::Outreach->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_outreach});
	return $error if ($error);

	#
	# OUTREACH_STAFF table
	#
	$logger->info("Generating xml for table OUTREACH_STAFF");
	my $xml_outreach_staff = Ncs::Xml::OutreachStaff->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_outreach_staff});
	return $error if ($error);

	#
	# OUTREACH_EVAL table
	#
	$logger->info("Generating xml for table OUTREACH_EVAL");
	my $xml_outreach_eval = Ncs::Xml::OutreachEval->new($soap, $is_snapshot);
	$error = $table_parser->process_table({file => $fileName, element => $xml_outreach_eval});
	return $error if ($error);

	############################################################
	##                                                        ##
	##  INSTRUMENT DATA ELEMENT TABLES  (questionnaire data)  ##
	##                                                        ##
	############################################################

	
	#
	# Insert 'tables' xml element close tag
	#
    my $fh = IO::File->new("${fileName}", "a") 
		or return "Failed to write header section to $fileName: $!";
	$fh->printf("%s\n", $xml_tables_element->print_close_tag());
    $fh->close();

	return undef;
}

1;
