package Ncs::Op;

###########################################################################
#
# NCS Data Transmission File Generator
#
# This module contains 'operational' type constant values used by the NCS 
# application(s).  Operational element constants are defined in the 
# Operational Elements Data Specification (OED spec).
#
# Also, some useful routines related to OED is included.
#
###########################################################################

use strict;

##########################
#
# Operational field values
#
##########################
use constant YES					=> 1;
use constant NO						=> 2;
use constant REFUSED 				=> -1;
use constant OTHER 					=> -5;
use constant UNKNOWN 				=> -6;
use constant NOT_APPLICABLE 		=> -7;

# Date #
use constant NOT_APPLICABLE_DATE 	=> '9777-97-97';
use constant UNKNOWN_DATE 			=> '9666-96-96';
use constant UNKNOWN_YEAR_MONTH 	=> '9666-96';
use constant REFUSED_DATE 			=> '9111-91-91';

# Time #
use constant NOT_APPLICABLE_TIME 	=> '97:97';
use constant UNKNOWN_TIME 			=> '96:96';
use constant REFUSED_TIME 			=> '91:91';


##########################
#
# This term used to de-identify information
#
##########################
use constant SUPPRESS 			=> 'SUPPRESSED';


##########################
#
# Operational Data Element Table Version Numbers.
#
# Table version numbers; it was deemed not necessary to create the 
# 'table_spec_version' field inside the Sugar tables.  Therefore, we
# handle the table version numbers from within the transmission
# script.
#
#########################
use constant STUDY_CENTER_VERSION					=> '1.0';
use constant LISTING_UNIT_VERSION					=> '1.0';
use constant SSU_VERSION							=> '1.0';
use constant TSU_VERSION							=> '1.0';
use constant PSU_VERSION							=> '1.0';
use constant DWELLING_UNIT_VERSION					=> '1.0';
use constant LINK_HOUSEHOLD_DWELLING_VERSION		=> '1.0';
use constant HOUSEHOLD_UNIT_VERSION					=> '1.0';
use constant STAFF_VERSION							=> '1.0';
use constant STAFF_LANGUAGE_VERSION					=> '1.0';
use constant STAFF_VALIDATION_VERSION				=> '1.0';
use constant STAFF_WEEKLY_EXPENSE_VERSION			=> '1.0';
use constant STAFF_EXP_MNGMNT_TASKS_VERSION			=> '1.0';
use constant STAFF_EXP_DATA_CLLCTN_TASKS_VERSION	=> '1.0';
use constant STAFF_CERT_TRAINING_VERSION			=> '1.0';
use constant PERSON_VERSION							=> '1.0';
use constant PERSON_RACE_VERSION					=> '1.0';
use constant LINK_PERSON_HOUSEHOLD_VERSION			=> '1.0';
use constant PARTICIPANT_VERSION					=> '1.0';
use constant LINK_PERSON_PARTICIPANT_VERSION		=> '1.0';
use constant PARTICIPANT_CONSENT_VERSION			=> '1.0';
use constant PARTICIPANT_VIS_CONSENT_VERSION		=> '1.0';
use constant PPG_DETAILS_VERSION					=> '1.0';
use constant PPG_STATUS_HISTORY_VERSION				=> '1.0';
use constant PROVIDER_VERSION						=> '1.0';
use constant LINK_PERSON_PROVIDER_VERSION			=> '1.0';
use constant INSTITUTION_VERSION					=> '1.0';
use constant LINK_PERSON_INSTITUTE_VERSION			=> '1.0';
use constant ADDRESS_VERSION						=> '1.0';
use constant TELEPHONE_VERSION						=> '1.0';
use constant EMAIL_VERSION							=> '1.0';
use constant EVENT_VERSION							=> '1.0';
use constant INSTRUMENT_VERSION						=> '1.0';
use constant CONTACT_VERSION						=> '1.0';
use constant LINK_CONTACT_VERSION					=> '1.0';
use constant NON_INTERVIEW_RPT_VERSION				=> '1.0';
use constant NON_INTERVIEW_RPT_VACANT_VERSION		=> '1.0';
use constant NON_INTERVIEW_RPT_NOACCESS_VERSION		=> '1.0';
use constant NON_INTERVIEW_RPT_REFUSAL_VERSION		=> '1.0';
use constant INCIDENT_VERSION						=> '1.0';
use constant INCIDENT_MEDIA_VERSION					=> '1.0';
use constant INCIDENT_UNANTICIPATED_VERSION			=> '1.0';
use constant OUTREACH_VERSION						=> '1.0';
use constant OUTREACH_STAFF_VERSION					=> '1.0';
use constant OUTREACH_EVAL_VERSION					=> '1.0';

###########################################################################
#
# atoi() "ascii to int"
#
# Takes in an ascii value, replaces underscores with hyphens, then returns
# a scalar value.  This routine is needed because negative values cannot
# be represented inside Sugar lists.  Therefore, underscores are used 
# in place of negative signs.
#
###########################################################################
sub atoi
{
    my ($asc_val) = @_;

	# underscores are used in Sugar CRM to represent negative values.
	$asc_val =~ s/_/-/g;

	return scalar($asc_val);
}

1;
