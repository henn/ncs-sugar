<?php
/*
 * All the constants used to map between human friendly names and SugarCRM / 
 * Module names are stored here
 */

/*
 * PAGE SIZE FOR INCREMENTAL EXTRACTION OF MODULE DATA
 */
define('EXTRACT_PAGE_SIZE',                         '200');

/*
 * MODULE MAPPINGS
 */
define('STUDY_CENTER_SUGAR_MODULE',                 'GT_StudyCntr');
define('LISTING_UNIT_SUGAR_MODULE',                 'GT_ListingUnt');
define('SSU_SUGAR_MODULE',                          'GT_SecSampUnt');
define('TSU_SUGAR_MODULE',                          'GT_TerSampUnt');
define('PSU_SUGAR_MODULE',                          'GT_PrmSampUnt');
define('DWELLING_UNIT_SUGAR_MODULE',                'GT_DwellingUnt');
define('LINK_HOUSEHOLD_DWELLING_SUGAR_MODULE',      'GT_DwlUntHsLnk');
define('HOUSEHOLD_UNIT_SUGAR_MODULE',               'GT_Household');
define('STAFF_SUGAR_MODULE',                        'ST_StaffRstr');
define('STAFF_LANGUAGE_SUGAR_MODULE',               'ST_StfLang');
define('STAFF_VALIDATION_SUGAR_MODULE',             'ST_StfVldtn');
define('STAFF_WEEKLY_EXPENSE_SUGAR_MODULE',         'ST_StfWkExpns');
define('STAFF_EXP_MNGMNT_SUGAR_MODULE',             'ST_StfExpMgTsk');
define('STAFF_EXP_DATA_CLLCTN_TASKS_SUGAR_MODULE',  'ST_StfExpDCTsk');
define('STAFF_CERT_TRAINING_SUGAR_MODULE',          'ST_StfCrtTrn');
define('OUTREACH_SUGAR_MODULE',                     'ST_WkOEAct');
define('OUTREACH_STAFF_SUGAR_MODULE',               'ST_OtrchStaff');
define('OUTREACH_EVAL_SUGAR_MODULE',                'ST_MSOutEval');
define('PERSON_SUGAR_MODULE',                       'PLT_Person');
define('PERSON_RACE_SUGAR_MODULE',                  'PLT_PersonRace');
define('LINK_PERSON_HOUSEHOLD_SUGAR_MODULE',        'PLT_LnkPrsHshld');
define('PARTICIPANT_SUGAR_MODULE',                  'PLT_Participant');
define('LINK_PERSON_PARTICIPANT_SUGAR_MODULE',      'PLT_LkPrsPrtcpt');
define('PARTICIPANT_CONSENT_SUGAR_MODULE',          'PLT_PrtcptCnsnt');
define('PARTICIPANT_VIS_CONSENT_SUGAR_MODULE',      'PLT_PrtcptVstC');
define('PPG_DETAILS_SUGAR_MODULE',                  'PLT_PPGDetails');
define('PPG_STATUS_HISTORY_SUGAR_MODULE',           'PLT_PPGStsHstry');
define('LINK_PERSON_PROVIDER_SUGAR_MODULE',         'OLT_PrsnPrvdLnk');
define('PROVIDER_SUGAR_MODULE',                     'OLT_Provider');
define('INSTITUTION_SUGAR_MODULE',                  'OLT_Institution');
define('LINK_PERSON_INSTITUTE_SUGAR_MODULE',        'OLT_PrsnInstLnk');
define('ADDRESS_SUGAR_MODULE',                      'LTT_Address');
define('TELEPHONE_SUGAR_MODULE',                    'LTT_Telephone');
define('EMAIL_SUGAR_MODULE',                        'LTT_Email');
define('EVENT_SUGAR_MODULE',                        'NCSDC_EventInfo');
define('INSTRUMENT_SUGAR_MODULE',                   'NCSDC_Instrument');
//define('CONTACT_SUGAR_MODULE',                      'NCSDC_CntctInfo');
define('CONTACT_SUGAR_MODULE',                      'Notes');
define('LINK_CONTACT_SUGAR_MODULE',                 'NCSDC_CntLnk');
define('SPECIMEN_SUGAR_MODULE',                     'NCSDC_SPECIMEN');
define('NON_INTERVIEW_RPT_SUGAR_MODULE',            'NCSDC_NonInterRpt');
define('NON_INTERVIEW_RPT_VACANT_SUGAR_MODULE',     'NCSDC_NIntRptVcnt');
define('NON_INTERVIEW_RPT_NOACCESS_SUGAR_MODULE',   'NCSDC_NIRNAccMltS');
define('NON_INTERVIEW_RPT_REFUSAL_SUGAR_MODULE',    'NCSDC_NIRRfsMltS');
define('NON_INTERVIEW_RPT_DUTYPE_SUGAR_MODULE',     'NCSDC_NIRDUTpMltS');
define('INCIDENT_SUGAR_MODULE',                     'NCSDC_Incident');
define('INCIDENT_MEDIA_SUGAR_MODULE',               'NCSDC_IncMedMultS');
define('INCIDENT_UNANTICIPATED_SUGAR_MODULE',       'NCSDC_IncUnatMltS');

//// 	2.0 NEW MODULES
define('OUTREACH_RACE_SUGAR_MODULE',                'ST_MSOutRace');
define('OUTREACH_TARGET_SUGAR_MODULE',              'ST_MSOutTarg');
define('OUTREACH_LANG2_SUGAR_MODULE',               'ST_MSOutLang2');
define('PARTICIPANT_AUTHORIZATION_SUGAR_MODULE',    'PLT_PartAuthFrm');
define('PROVIDER_ROLE_SUGAR_MODULE',                'OLT_MSProvRole');
define('SPEC_EQUIPMENT_SUGAR_MODULE',               'SAMP_SPECEquip');
define('SPECIMEN_PICKUP_SUGAR_MODULE',              'SAMP_SPECPickup');
define('SPECIMEN_RECEIPT_SUGAR_MODULE',             'SAMP_SPECReceipt');
define('SPECIMEN_SHIPPING_SUGAR_MODULE',            'SAMP_SPECShippin');
define('SPECIMEN_STORAGE_SUGAR_MODULE',             'SAMP_SPECStorage');
define('SPECIMEN_INFO_SUGAR_MODULE',                'SAMP_SPSCInfo');
define('ENVIRONMENTAL_EQUIPMENT_INFO_SUGAR_MODULE', 'SAMP_EnEquip');
define('ENV_EQUIPMENT_PROBLEM_LOG_SUGAR_MODULE',    'SAMP_EnLogEquip');
define('PARTICIPANT_CONSENT_SAMPLE_SUGAR_MODULE',   'PLT_PartSampCon');
define('PARTICIPANT_RECORD_VISIT_SUGAR_MODULE',     'PLT_PartRVIS');
define('PRECISION_THERMOMETER_CERT_SUGAR_MODULE',   'SAMP_PreThrmCert');
define('REFRIGERATOR_FREEZER_VER_SUGAR_MODULE',     'SAMP_RefFreezVer');
define('SAMPLE_RECEIPT_STORAGE_SUGAR_MODULE',       'SAMP_RecStor');
define('SAMPLE_SHIPPING_SUGAR_MODULE',              'SAMP_SampShip');
define('SRSC_INFO_SUGAR_MODULE',                    'SAMP_SRSCInfo');
define('SUBSAMPLE_DOC_SUGAR_MODULE',                'SAMP_SubSampDoc');
define('TRH_METER_CALIBRATION_SUGAR_MODULE',        'SAMP_TRhMeterCal');
define('DRFT_THERM_VERIFICATION_SUGAR_MODULE',      'SAMP_DRFThermVer');
define('SAMPLE_RECEIPT_CONFIRM_SUGAR_MODULE',       'SAMP_RecConf');

/*
 * TABLE MAPPINGS
 */
define('STUDY_CENTER_TABLE', 'gt_studycntr');
define('LISTING_UNIT_TABLE', 'gt_listingunt');
define('PSU_TABLE',          'gt_prmsampunt');
define('SSU_TABLE',          'gt_secsampunt');
define('PERSON_TABLE',       'plt_person');

/*
 * MANY TO MANY JOIN TABLE DEFINITIONS TO SUPPORT WHERE WE NEED TO INCLUDE RELATED MODULES IN PARENT QUERY
 */
define('SAMPLERECEIPTCONF_SRSCINFO_JOIN', 'samp_recconf_samp_srscinfo');

/*
 * FOREIGN KEY IN JOIN TABLE
 */
define('PERSONRACE_PERSON_RHS', 'plt_personf367_person_ida');
define('LINKPERSONHOUSEHOLD_PERSON_RHS', 'plt_lnkprs4cf8_person_ida');
define('LINKPERSONPARTICIPANT_PERSON_RHS', 'plt_lkprspe360_person_ida');
define('LINKPERSONPROVIDER_PERSON_RHS', 'olt_prsnpr6fcd_person_ida');
define('LINKPERSONINSTITUTE_PERSON_RHS', 'olt_prsnin2337_person_ida');
define('ADDRESS_PERSON_RHS', 'plt_personf16c_person_ida');
define('TELEPHONE_PERSON_RHS', 'plt_personf121_person_ida');
define('EMAIL_PERSON_RHS', 'plt_personbd01_person_ida');
define('CONTACTLINKING_PERSON_RHS', 'ncsdc_cntl89b6_person_ida');
define('NONINTERVIEWREPORT_PERSON_RHS', 'ncsdc_nonid10e_person_ida');
define('SAMPLERECEIPT_CENTRIFUGESTAFF_RHS', 'samp_specr703daffrstr_ida');

/*
 * PARSE LIST OF MODULES TO EXPORT
 */

$parseList = array(
            STUDY_CENTER_SUGAR_MODULE =>'parseStudyCenter',
            PSU_SUGAR_MODULE =>'parsePSU',
            SSU_SUGAR_MODULE =>'parseSSU',
            TSU_SUGAR_MODULE =>'parseTSU',
            LISTING_UNIT_SUGAR_MODULE =>'parseListingUnit',
            DWELLING_UNIT_SUGAR_MODULE =>'parseDwellingUnit',
            HOUSEHOLD_UNIT_SUGAR_MODULE =>'parseHouseHoldUnit',
            LINK_HOUSEHOLD_DWELLING_SUGAR_MODULE =>'parseLinkHouseHoldDwelling',
            STAFF_SUGAR_MODULE =>'parseStaff',
            STAFF_LANGUAGE_SUGAR_MODULE =>'parseStaffLanguage',
            STAFF_VALIDATION_SUGAR_MODULE =>'parseStaffValidation',
            STAFF_WEEKLY_EXPENSE_SUGAR_MODULE =>'parseStaffWeeklyExpense',
            STAFF_EXP_MNGMNT_SUGAR_MODULE =>'parseStaffExpenseManagementTask',
            STAFF_EXP_DATA_CLLCTN_TASKS_SUGAR_MODULE =>'parseStaffExpenseDataCollectionTask',
            OUTREACH_SUGAR_MODULE =>'parseOutreach',
            OUTREACH_RACE_SUGAR_MODULE =>'parseOutreachRace',
            OUTREACH_STAFF_SUGAR_MODULE =>'parseOutreachStaff',
            OUTREACH_EVAL_SUGAR_MODULE =>'parseOutreachEval',
            OUTREACH_TARGET_SUGAR_MODULE =>'parseOutreachTarget',
            OUTREACH_LANG2_SUGAR_MODULE =>'parseOutreachLanguage2',
            STAFF_CERT_TRAINING_SUGAR_MODULE =>'parseStaffCertTraining',
            PERSON_SUGAR_MODULE =>'parsePerson',
            PERSON_RACE_SUGAR_MODULE =>'parsePersonRace',
            LINK_PERSON_HOUSEHOLD_SUGAR_MODULE =>'parseLinkPersonHousehold',
            PARTICIPANT_SUGAR_MODULE =>'parseParticipant',
            LINK_PERSON_PARTICIPANT_SUGAR_MODULE =>'parseLinkPersonParticipant',
            PARTICIPANT_AUTHORIZATION_SUGAR_MODULE =>'parseParticipantAuthorizationForm',
            PARTICIPANT_CONSENT_SUGAR_MODULE =>'parseParticipantConsent',
            PPG_DETAILS_SUGAR_MODULE =>'parsePPGDetails',
            PPG_STATUS_HISTORY_SUGAR_MODULE=>'parsePPGStatusHistory',
            PROVIDER_SUGAR_MODULE =>'parseProvider',
            PROVIDER_ROLE_SUGAR_MODULE =>'parseProviderRole',
            LINK_PERSON_PROVIDER_SUGAR_MODULE =>'parseLinkPersonProvider',
            INSTITUTION_SUGAR_MODULE =>'parseInstitution',
            LINK_PERSON_INSTITUTE_SUGAR_MODULE =>'parseLinkPersonInstitute',
            ADDRESS_SUGAR_MODULE =>'parseAddress',
            TELEPHONE_SUGAR_MODULE =>'parseTelephone',
            EMAIL_SUGAR_MODULE =>'parseEmail',
            EVENT_SUGAR_MODULE =>'parseEvent',
            INSTRUMENT_SUGAR_MODULE =>'parseInstrument',
            CONTACT_SUGAR_MODULE =>'parseContact',
            LINK_CONTACT_SUGAR_MODULE =>'parseContactLinking',
            NON_INTERVIEW_RPT_SUGAR_MODULE =>'parseNonInterviewReprt',
            NON_INTERVIEW_RPT_VACANT_SUGAR_MODULE =>'parseNIRVacant',
            NON_INTERVIEW_RPT_NOACCESS_SUGAR_MODULE =>'parseNIRNoAccess',
            NON_INTERVIEW_RPT_REFUSAL_SUGAR_MODULE =>'parseNIRRefusal',
            NON_INTERVIEW_RPT_DUTYPE_SUGAR_MODULE =>'parseNIRDuType',
            INCIDENT_SUGAR_MODULE =>'parseIncident',
            INCIDENT_MEDIA_SUGAR_MODULE =>'parseIncidentMedia',
            INCIDENT_UNANTICIPATED_SUGAR_MODULE =>'parseIncidentUnanticipated',
            SPEC_EQUIPMENT_SUGAR_MODULE =>'parseSPECEquipment',
            SPECIMEN_PICKUP_SUGAR_MODULE =>'parseSpecimenPickup',
            SPECIMEN_RECEIPT_SUGAR_MODULE =>'parseSpecimenReceipt',
            SPECIMEN_SHIPPING_SUGAR_MODULE =>'parseSpecimenShipping',
            SPECIMEN_STORAGE_SUGAR_MODULE =>'parseSpecimenStorage',
            SPECIMEN_INFO_SUGAR_MODULE =>'parseSpecimenInfo',
            ENVIRONMENTAL_EQUIPMENT_INFO_SUGAR_MODULE =>'parseEnvironmentalEquipmentInformation',
            ENV_EQUIPMENT_PROBLEM_LOG_SUGAR_MODULE =>'parseEnvironmentalEquipmentProblemLog',
            PARTICIPANT_CONSENT_SAMPLE_SUGAR_MODULE =>'parseParticipantConsentSample',
            PARTICIPANT_RECORD_VISIT_SUGAR_MODULE =>'parseParticipantRecordVisit',
            PARTICIPANT_VIS_CONSENT_SUGAR_MODULE =>'parseParticipantVisitConsent',
            PRECISION_THERMOMETER_CERT_SUGAR_MODULE =>'parsePrecisionThermometerCertification',
            REFRIGERATOR_FREEZER_VER_SUGAR_MODULE =>'parseRefrigeratorFreezerVerification', 
            SAMPLE_RECEIPT_STORAGE_SUGAR_MODULE =>'parseSampleReceiptStorage', 
            SAMPLE_SHIPPING_SUGAR_MODULE =>'parseSampleShipping', 
            //SRSC_INFO_SUGAR_MODULE =>'parseSrscInformation', <-- PROBLEM WITH JOIN TABLE
            SUBSAMPLE_DOC_SUGAR_MODULE =>'parseSubsampleDocument',
            TRH_METER_CALIBRATION_SUGAR_MODULE =>'parseTRHMeterCalibration',
            DRFT_THERM_VERIFICATION_SUGAR_MODULE =>'parseDigitalRefrigeratorFreezerThermVerification',
            SAMPLE_RECEIPT_CONFIRM_SUGAR_MODULE =>'parseSampleReceiptConfirmation',    
);
?>
