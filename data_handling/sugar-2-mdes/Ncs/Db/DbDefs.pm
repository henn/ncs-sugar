package Ncs::Db::DbDefs;

###########################################################################
#
# NCS Data Transmission File Generator
#
# This module contains database type constant values used by the NCS 
# application(s).  For example, tables names, connection details, 
# sugar module names, sugar relationship names.
#
###########################################################################

use strict;

####################################
#
# MySql database connection details
#
####################################
use constant SUGAR_DNS				=> 'DBI:mysql:sugarCRM:localhost';	### update with appropriate database details
use constant SUGAR_USERNAME			=> 'sugaruser';						### update with valid SugarCRM username
use constant SUGAR_PASSWD			=> 'userpasswd';					### update with valid SugarCRM password

####################################
#
# Back-end database table names.
#
# These values should represent the MySql table names.
#
# Update any entries that are not correct.  Add new entries as required.
#
# The table names are used to extract data from the MySql back-end tables.
#
###################################

#
# Operational Data Elements Tables
#
use constant STUDY_CENTER_TABLE							=> 'geo_study_center';
use constant LISTING_UNIT_TABLE							=> 'geo_listing_unit';
use constant SSU_TABLE									=> 'geo_secondary_sampling_unit';
use constant TSU_TABLE									=> 'geo_tertiary_sampling_unit';
use constant PSU_TABLE									=> 'geo_primary_sampling_unit';
use constant DWELLING_UNIT_TABLE						=> 'geo_dwelling_unit';
use constant LINK_HOUSEHOLD_DWELLING_TABLE				=> 'geo_du_hh_link';
use constant HOUSEHOLD_UNIT_TABLE						=> 'geo_household_unit';
use constant STAFF_TABLE								=> 'st_staff';
use constant STAFF_LANGUAGE_TABLE						=> 'st_staff_language';
use constant STAFF_VALIDATION_TABLE						=> 'st_staff_validation';
use constant STAFF_WEEKLY_EXPENSE_TABLE					=> 'st_staff_weekly_expense';
use constant STAFF_EXP_MNGMNT_TASKS_TABLE				=> 'st_staff_exp_mngmnt_tasks';
use constant STAFF_EXP_DATA_CLLCTN_TASKS_TABLE			=> 'st_staff_exp_data_cllctn_tasks';
use constant STAFF_CERT_TRAINING_TABLE					=> 'st_staff_cert_training';
use constant PERSON_TABLE								=> 'plt_person';
use constant PERSON_RACE_TABLE							=> 'plt_person_race';
use constant LINK_PERSON_HOUSEHOLD_TABLE				=> 'plt_link_person_household';
use constant PARTICIPANT_TABLE							=> 'plt_participant';
use constant LINK_PERSON_PARTICIPANT_TABLE				=> 'plt_link_person_participant';
use constant PARTICIPANT_CONSENT_TABLE					=> 'plt_participant_consent';
use constant PARTICIPANT_VIS_CONSENT_TABLE				=> 'plt_participant_visit_consent';
use constant PPG_DETAILS_TABLE							=> 'plt_ppg_details';
use constant PPG_STATUS_HISTORY_TABLE					=> 'plt_ppg_status_history';
use constant PROVIDER_TABLE								=> 'olt_provider';
use constant LINK_PERSON_PROVIDER_TABLE					=> 'olt_link_person_provider';
use constant INSTITUTION_TABLE							=> 'olt_institution';
use constant LINK_PERSON_INSTITUTE_TABLE				=> 'olt_link_person_institute';
use constant ADDRESS_TABLE								=> 'ltt_address';
use constant TELEPHONE_TABLE							=> 'ltt_telephone';
use constant EMAIL_TABLE								=> 'ltt_email';
use constant EVENT_TABLE								=> 'ncsdc_event';
use constant INSTRUMENT_TABLE							=> 'ncsdc_instrument';
use constant CONTACT_TABLE								=> 'ncsdc_contact';
use constant LINK_CONTACT_TABLE							=> 'ncsdc_link_contact';
use constant SPECIMEN_TABLE								=> 'SPECIMEN';
use constant NON_INTERVIEW_RPT_TABLE					=> 'ncsdc_non_interview_reprt';
use constant NON_INTERVIEW_RPT_VACANT_TABLE				=> 'ncsdc_non_interview_rpt_vacant';
use constant NON_INTERVIEW_RPT_NOACCESS_TABLE			=> 'ncsdc_non_interview_rpt_noaccess';
use constant NON_INTERVIEW_RPT_REFUSAL_TABLE			=> 'ncsdc_non_interview_rpt_refusal';
use constant INCIDENT_TABLE								=> 'ncsdc_incident';
use constant INCIDENT_MEDIA_TABLE						=> 'ncsdc_incident_media';
use constant INCIDENT_UNANTICIPATED_TABLE				=> 'ncsdc_incident_unanticipated';
use constant OUTREACH_TABLE								=> 'st_outreach';
use constant OUTREACH_STAFF_TABLE						=> 'st_outreach_staff';
use constant OUTREACH_EVAL_TABLE						=> 'st_outreach_eval';

#
# Instrument Data Elements Tables 
#
use constant PREGNANCY_SCREENER_TABLE					=> 'PREGNANCY_SCREENER';
use constant PREGNANCY_SCREENER_RACE_TABLE				=> 'PREGNANCY_SCREENER_RACE';
use constant PREGNANCY_SCREENER_HOW_KNOW_NCS_TABLE		=> 'PREGNANCY_SCREENER_HOW_KNOW_NCS';
use constant HOUSEHOLD_ENUMERATION_TABLE 				=> 'HOUSEHOLD_ENUMERATION';
use constant HOUSEHOLD_ENUMERATION_PREGNANT_TABLE 		=> 'HOUSEHOLD_ENUMERATION_PREGNANT';
use constant HOUSEHOLD_ENUMERATION_AGE_ELIG_TABLE 		=> 'HOUSEHOLD_ENUMERATION_AGE_ELIG';

####################################
#
# SugarCRM module names.
#
# These values represent the SugarCRM module names.
#
# Update any entries that are not correct.  Add new entries as required.
#
# Note: the SugarCRM module names are the module names as represented in the 
# back-end of Sugar.  You should note, that Sugar will report the module names 
# differently through its web interface.  Hence, many of the module names 
# here have a prefix attached (ie. 'PLT'), even though Sugar's web interface 
# does not display the prefix as part of the module name.
#
# The module names are used to retrieve relationship data through Sugar's SOAP API.
#
###################################

#
# Operational Data Element Modules
#
use constant STUDY_CENTER_SUGAR_MODULE					=> 'geo_Study_Center';
use constant LISTING_UNIT_SUGAR_MODULE					=> 'geo_Listing_Unit';
use constant SSU_SUGAR_MODULE							=> 'geo_Secondary_Sampling_Unit';
use constant TSU_SUGAR_MODULE							=> 'geo_Tertiary_Sampling_Unit';
use constant PSU_SUGAR_MODULE							=> 'geo_Primary_Sampling_Unit';
use constant DWELLING_UNIT_SUGAR_MODULE					=> 'geo_Dwelling_Unit';
use constant LINK_HOUSEHOLD_DWELLING_SUGAR_MODULE		=> 'geo_DU_HH_Link';
use constant HOUSEHOLD_UNIT_SUGAR_MODULE				=> 'geo_Household_Unit';
use constant STAFF_SUGAR_MODULE							=> 'ST_STAFF';
use constant STAFF_LANGUAGE_SUGAR_MODULE				=> 'ST_STAFF_LANGUAGE';
use constant STAFF_VALIDATION_SUGAR_MODULE				=> 'ST_STAFF_VALIDATION';
use constant STAFF_WEEKLY_EXPENSE_SUGAR_MODULE			=> 'ST_STAFF_WEEKLY_EXPENSE';
use constant STAFF_EXP_MNGMNT_SUGAR_MODULE				=> 'ST_STAFF_EXP_MNGMNT_TASKS';
use constant STAFF_EXP_DATA_CLLCTN_TASKS_SUGAR_MODULE	=> 'ST_STAFF_EXP_DATA_CLLCTN_TASKS';
use constant STAFF_CERT_TRAINING_SUGAR_MODULE			=> 'ST_STAFF_CERT_TRAINING';
use constant PERSON_SUGAR_MODULE						=> 'PLT_PERSON';
use constant PERSON_RACE_SUGAR_MODULE					=> 'PLT_PERSON_RACE';
use constant LINK_PERSON_HOUSEHOLD_SUGAR_MODULE			=> 'PLT_LINK_PERSON_HOUSEHOLD';
use constant PARTICIPANT_SUGAR_MODULE					=> 'PLT_PARTICIPANT';
use constant LINK_PERSON_PARTICIPANT_SUGAR_MODULE		=> 'PLT_LINK_PERSON_PARTICIPANT';
use constant PARTICIPANT_CONSENT_SUGAR_MODULE			=> 'PLT_Participant_Consent';
use constant PARTICIPANT_VIS_CONSENT_SUGAR_MODULE		=> 'PLT_PARTICIPANT_VISIT_CONSENT';
use constant PPG_DETAILS_SUGAR_MODULE					=> 'PLT_PPG_DETAILS';
use constant PPG_STATUS_HISTORY_SUGAR_MODULE			=> 'PLT_PPG_STATUS_HISTORY';
use constant LINK_PERSON_PROVIDER_SUGAR_MODULE			=> 'OLT_LINK_PERSON_PROVIDER';
use constant PROVIDER_SUGAR_MODULE						=> 'OLT_PROVIDER';
use constant INSTITUTION_SUGAR_MODULE					=> 'OLT_INSTITUTION';
use constant LINK_PERSON_INSTITUTE_SUGAR_MODULE			=> 'OLT_LINK_PERSON_INSTITUTE';
use constant ADDRESS_SUGAR_MODULE						=> 'LT_ADDRESS';
use constant TELEPHONE_SUGAR_MODULE						=> 'LT_TELEPHONE';
use constant EMAIL_SUGAR_MODULE							=> 'LT_EMAIL';
use constant EVENT_SUGAR_MODULE							=> 'NCSDC_EVENT';
use constant INSTRUMENT_SUGAR_MODULE					=> 'NCSDC_INSTRUMENT';
use constant CONTACT_SUGAR_MODULE						=> 'NCSDC_CONTACT';
use constant LINK_CONTACT_SUGAR_MODULE					=> 'NCSDC_LINK_CONTACT';
use constant SPECIMEN_SUGAR_MODULE						=> 'NCSDC_SPECIMEN';
use constant NON_INTERVIEW_RPT_SUGAR_MODULE				=> 'NCSDC_NON_INTERVIEW_RPT_DUTYPE';
use constant NON_INTERVIEW_RPT_VACANT_SUGAR_MODULE		=> 'NCSDC_NON_INTERVIEW_RPT_VACANT';
use constant NON_INTERVIEW_RPT_NOACCESS_SUGAR_MODULE	=> 'NCSDC_NON_INTERVIEW_RPT_NOACCESS';
use constant NON_INTERVIEW_RPT_REFUSAL_SUGAR_MODULE		=> 'NCSDC_NON_INTERVIEW_RPT_REFUSAL';
use constant INCIDENT_SUGAR_MODULE						=> 'NCSDC_INCIDENT';
use constant INCIDENT_MEDIA_SUGAR_MODULE				=> 'NCSDC_INCIDENT_MEDIA';
use constant INCIDENT_UNANTICIPATED_SUGAR_MODULE		=> 'NCSDC_INCIDENT_UNANTICIPATED';
use constant OUTREACH_SUGAR_MODULE						=> 'ST_OUTREACH';
use constant OUTREACH_STAFF_SUGAR_MODULE				=> 'ST_OUTREACH_STAFF';
use constant OUTREACH_EVAL_SUGAR_MODULE					=> 'ST_OUTREACH_EVAL';

#
# Instrument Data Element Modules
#

####################################
#
# SugarCRM relationship names.
#
# These relationship names are used with the get_relationships() SOAP function 
# call.
#
# They are only required when there is more than one relationship of the same 
# type defined between two sugar modules.
#
###################################
use constant PARTICIPANT_CONSENT_PRSN_WHO_CONSNTED_REL		=> 'plt_person_plt_participant_consent';
use constant PARTICIPANT_CONSENT_PRSN_WTHDRW_CONSNT_REL		=> 'plt_person_plt_participant_consent_1';
use constant INCIDENT_INC_STAFF_RPTR_ID_REL					=> 'plt_staff_ncsdc_incident';
use constant INCIDENT_INC_STAFF_SPRVSR_ID_REL				=> 'plt_staff_ncsdc_incident_1';
use constant INCIDENT_INC_RECIP_IS_STAFF_REL				=> 'plt_staff_ncsdc_incident_2';
use constant INCIDENT_INC_RECIP_IS_FAMILY_REL				=> 'plt_staff_plt_person';
use constant INCIDENT_INC_RECIP_IS_AQUAINT_REL				=> 'plt_staff_plt_person_1';
use constant INCIDENT_INC_CONTACT_PERSON_REL				=> 'plt_staff_plt_person_2';

1;
