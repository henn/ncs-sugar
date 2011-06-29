<?php
if(!defined('sugarEntry'))define('sugarEntry', true);

/**
 * This class is an implemenatation class for all the custom rest services
 */
require_once('service/v3/SugarWebServiceImplv3.php');
require_once('NCSSugarWebServiceUtil.php');
require_once('NCSSugarWebServiceConstants.php');

class NCSSugarWebServiceImpl extends SugarWebServiceImplv3 {
    
    public function __construct()
    {
        self::$helperObject = new NCSSugarWebServiceUtil();
    }
    
    /**
     *
     * @param String $session -- Session ID returned by a previous call to login.
     * @return string XML 
     */
    function export_vdr_data($session, $doValidation = false)
    {
    	$error = new SoapError();
    	if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', '', '', '', $error)) {
    		$error->set_error('invalid_login');
    		return;
    	} // if        
        $xmlWriter = new XMLWriter();
        $xmlWriter->openMemory();
        $xmlWriter->setIndent(true);
        $xmlWriter->startDocument('1.0', 'UTF-8');
        $xmlWriter->startElementNS('ns1','recruitment_substudy_transmission_envelope','http://www.nationalchildrensstudy.gov');
        $this->insert_vdr_header($session, $xmlWriter);
        $this->insert_vdr_tables($session, $xmlWriter);
        $xmlWriter->endElement();
        $xmlWriter->endDocument();      
        // DO VALIDATION - MAY HAVE FLAG TO REQUEST IT, DEFAULT FALSE
        if ($doValidation) {
            $xmlResponse = $xmlWriter->outputMemory();  
            $this->validate_document($xmlResponse);
            return $xmlResponse;
        } else {
            return $xmlWriter->outputMemory();
        }
    }
    
    private function insert_vdr_header($session,&$xmlWriter) {
        $results = parent::get_entry_list($session, PSU_SUGAR_MODULE, '', '', '', array('id','name','sc_id'), null, 1, false);
        $xmlWriter->startElementNS('ns1','transmission_header', null);
            $xmlWriter->startElement('sc_id');
                $xmlWriter->text($results['entry_list'][0]['name_value_list']['sc_id']['value']);
            $xmlWriter->endElement();
            $xmlWriter->startElement('psu_id');
                $xmlWriter->text($results['entry_list'][0]['name_value_list']['name']['value']);
            $xmlWriter->endElement();
            $xmlWriter->startElement('specification_version');
                $xmlWriter->text('1.1.01.00');
            $xmlWriter->endElement();
            $xmlWriter->startElement('is_snapshot');
                $xmlWriter->text('true');
            $xmlWriter->endElement();
        $xmlWriter->endElement();
    }
    
    private function insert_vdr_tables($session, &$xmlWriter){
        $xmlWriter->startElementNS('ns1','transmission_tables', null);
        // STUDY CENTER
        $results = parent::get_entry_list($session, STUDY_CENTER_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseStudyCenter($xmlWriter, $results);
        // PRIMARY SAMPLING UNIT
        $results = parent::get_entry_list($session, PSU_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parsePSU($xmlWriter, $results);
        // SECONDARY SAMPLING UNIT
        $results = parent::get_entry_list($session, SSU_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseSSU($xmlWriter, $results);   
        // TERTIARY SAMPLING UNIT
        $results = parent::get_entry_list($session, TSU_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseTSU($xmlWriter, $results);
        // LISTING UNIT
        $results = parent::get_entry_list($session, LISTING_UNIT_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseListingUnit($xmlWriter, $results);
        // DWELLING UNIT
        $results = parent::get_entry_list($session, DWELLING_UNIT_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseDwellingUnit($xmlWriter, $results);
        // HOUSEHOLD UNIT
        $results = parent::get_entry_list($session, HOUSEHOLD_UNIT_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseHouseHoldUnit($xmlWriter, $results);
        // HOUSEHOLD TO DWELLING LINK
        $results = parent::get_entry_list($session, LINK_HOUSEHOLD_DWELLING_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseLinkHouseHoldDwelling($xmlWriter, $results);
        // STAFF
        $results = parent::get_entry_list($session, STAFF_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseStaff($xmlWriter, $results);
        // STAFF LANGUAGE
        $results = parent::get_entry_list($session, STAFF_LANGUAGE_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseStaffLanguage($xmlWriter, $results);
        // STAFF VALIDATION
        $results = parent::get_entry_list($session, STAFF_VALIDATION_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseStaffValidation($xmlWriter, $results);
        // STAFF WEEKLY EXPENSE
        $results = parent::get_entry_list($session, STAFF_WEEKLY_EXPENSE_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseStaffWeeklyExpense($xmlWriter, $results);
        // STAFF EXPENSE MANAGEMENT TASKS
        $results = parent::get_entry_list($session, STAFF_EXP_MNGMNT_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseStaffExpenseManagementTask($xmlWriter, $results);
        // STAFF EXPENSE DATA COLLECTION TASKS
        $results = parent::get_entry_list($session, STAFF_EXP_DATA_CLLCTN_TASKS_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseStaffExpenseDataCollectionTask($xmlWriter, $results);
        // OUTREACH
        $results = parent::get_entry_list($session, OUTREACH_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseOutreach($xmlWriter, $results);
       
	   //// ***** 2.0 Modules ***
		//// OUTREACH RACE
        // $results = parent::get_entry_list($session, OUTREACH_RACE_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseOutreachRace($xmlWriter, $results);
		//// ********************* 
		
		// OUTREACH STAFF  ** DOES NOT SEEM TO BE IMPLEMENTED CONSISTENTLY AS THERE IS ALSO A RELATIONSHIP DEFINED BETWEEM OUTREACH AND STATT
        // WITHOUT USING A MODULE DEFINITION **
        $results = parent::get_entry_list($session, OUTREACH_STAFF_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseOutreachStaff($xmlWriter, $results);
        // OUTREACH EVAL ** ARE THESE RIGHT?? **
        $results = parent::get_entry_list($session, OUTREACH_EVAL_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseOutreachEval($xmlWriter, $results);
        
		//// ***** 2.0 Modules ***
		//// OUTREACH TARGET
        // $results = parent::get_entry_list($session, OUTREACH_TARGET_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseOutreachTarget($xmlWriter, $results);
		//// OUTREACH LANGUAGE 2
        // $results = parent::get_entry_list($session, OUTREACH_LANG2_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseOutreachLanguage2($xmlWriter, $results);		
		//// ********************* 
        
		// STAFF CERTIFICATION TRAINING
        $results = parent::get_entry_list($session, STAFF_CERT_TRAINING_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseStaffCertTraining($xmlWriter, $results);
        // PERSON
        $results = parent::get_entry_list($session, PERSON_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parsePerson($xmlWriter, $results);
        // PERSON RACE
        $results = parent::get_entry_list($session, PERSON_RACE_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parsePersonRace($xmlWriter, $results);
        // LINK PERSON TO HOUSEHOLD
        $results = parent::get_entry_list($session, LINK_PERSON_HOUSEHOLD_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseLinkPersonHousehold($xmlWriter, $results);
        // PARTICIPANT
        $results = parent::get_entry_list($session, PARTICIPANT_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseParticipant($xmlWriter, $results);
        // LINK PERSON PARTICIPANT
        $results = parent::get_entry_list($session, LINK_PERSON_PARTICIPANT_SUGAR_MODULE, '', '', '', array(),null,'100000',false);
        self::$helperObject->parseLinkPersonParticipant($xmlWriter, $results);
       
	    //// ***** 2.0 Modules ***
		//// OUTREACH RACE
        // $results = parent::get_entry_list($session, PARTICIPANT_AUTHORIZATION_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseParticipantAuthorizationForm($xmlWriter, $results);
		//// *********************
	   
	    // PARTICIPANT CONSENT
        $results = parent::get_entry_list($session, PARTICIPANT_CONSENT_SUGAR_MODULE, '', '', '', array(),null,'100000',false);
        self::$helperObject->parseParticipantConsent($xmlWriter, $results);
		////PARTICIPANT VISIT CONSENT //MOVED 
        $results = parent::get_entry_list($session, PARTICIPANT_VIS_CONSENT_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseParticipantVisitConsent($xmlWriter, $results);
	    // PPG DETAILS
        $results = parent::get_entry_list($session, PPG_DETAILS_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parsePPGDetails($xmlWriter, $results);
        // PPG STATUS HISTORY
        $results = parent::get_entry_list($session, PPG_STATUS_HISTORY_SUGAR_MODULE, '', '','', array(), null, '100000', false);
        self::$helperObject->parsePPGStatusHistory($xmlWriter, $results);
        // PROVIDER
        $results = parent::get_entry_list($session, PROVIDER_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseProvider($xmlWriter, $results);
       	//// ***** 2.0 Modules ***
		//// PROVIDER ROLE
        // $results = parent::get_entry_list($session, PROVIDER_ROLE_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseProviderRole($xmlWriter, $results);
		//// *********************
        // LINK PERSON TO PROVIDER
        $results = parent::get_entry_list($session, LINK_PERSON_PROVIDER_SUGAR_MODULE, '', '', '',array(),null,'100000', false);
        self::$helperObject->parseLinkPersonProvider($xmlWriter, $results);
        // INSTITUTION
        $results = parent::get_entry_list($session, INSTITUTION_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseInstitution($xmlWriter, $results);
        // LINK PERSON TO INSTITUTE
        $results = parent::get_entry_list($session, LINK_PERSON_INSTITUTE_SUGAR_MODULE, '', '', '', array(), null, '100000', false); 
        self::$helperObject->parseLinkPersonIntitute($xmlWriter, $results);
        // ADDRESS
        $results = parent::get_entry_list($session, ADDRESS_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseAddress($xmlWriter, $results);
        // TELEPHONE
        $results = parent::get_entry_list($session, TELEPHONE_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseTelephone($xmlWriter, $results);
        // EMAIL  *** BROKEN MODULE!!! ***
        $results = parent::get_entry_list($session, EMAIL_SUGAR_MODULE, '', '', '', array(), null, '100000', false); // THIS MODULE IS BROKEN, CANNOT RELATE OR SAVE
        self::$helperObject->processEmail($xmlWriter, $results);
        // EVENT
        $results = parent::get_entry_list($session, EVENT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->processEvent($xmlWriter, $results);
		
		// *********************
		 // INSTRUMENT
        $results = parent::get_entry_list($session, INSTRUMENT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->processInstrument($xmlWriter, $results);
		 // CONTACT
        $results = parent::get_entry_list($session, CONTACT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->processContact($xmlWriter, $results);
		 // LINK CONTACT
        $results = parent::get_entry_list($session, LINK_CONTACT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->processContactLinking($xmlWriter, $results);
		 // NON INTERVIEW REPORT
        $results = parent::get_entry_list($session, NON_INTERVIEW_RPT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->processNonInterviewReprt($xmlWriter, $results);
		 // NON INTERVIEW REPORT VACANT
        $results = parent::get_entry_list($session, NON_INTERVIEW_RPT_VACANT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->processNIRVacant($xmlWriter, $results);
		 // NON INTERVIEW REPORT NOACCESS
        $results = parent::get_entry_list($session, NON_INTERVIEW_RPT_NOACCESS_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->processNIRNoAccess($xmlWriter, $results);
		 // NON INTERVIEW REPORT REFUSAL
        $results = parent::get_entry_list($session, NON_INTERVIEW_RPT_REFUSAL_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->processNIRRefusal($xmlWriter, $results);
		 // NON INTERVIEW REPORT DUTYPE
        $results = parent::get_entry_list($session, NON_INTERVIEW_RPT_DUTYPE_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->processNIRDuType($xmlWriter, $results);
		 // INCIDENT
        $results = parent::get_entry_list($session, INCIDENT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->processIncident($xmlWriter, $results);
		 // INCIDENT MEDIA
        $results = parent::get_entry_list($session, INCIDENT_MEDIA_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->processIncidentMedia($xmlWriter, $results);
		 // INCIDENT UNANTICIPATED
        $results = parent::get_entry_list($session, INCIDENT_UNANTICIPATED_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->processIncidentUnanticipated($xmlWriter, $results);
		// *********************
		//// ***** 2.0 Modules ***
		 //// SPEC EQUIPMENT
        // $results = parent::get_entry_list($session, SPEC_EUIPMENT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseSPECEquipment($xmlWriter, $results);
		 //// SPECIMEN PICKUP
        // $results = parent::get_entry_list($session, SPECIMEN_PICKUP_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseSpecimenPickup($xmlWriter, $results);
		 //// SPECIMEN RECEIPT
        // $results = parent::get_entry_list($session, SPECIMEN_RECEIPT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseSpecimenReceipt($xmlWriter, $results);
		 //// SPECIMEN SHIPPING
        // $results = parent::get_entry_list($session, SPECIMEN_SHIPPING_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseSpecimenShipping($xmlWriter, $results);
		 //// SPECIMEN STORAGE
        // $results = parent::get_entry_list($session, SPECIMEN_STORAGE_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseSpecimenStorage($xmlWriter, $results);
		 //// SPECIMEN INFO
        // $results = parent::get_entry_list($session, SPECIMEN_INFO_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseSpecimenInfo($xmlWriter, $results);
		 //// ENVIRONMENTAL EQUIPMENT INFO
        // $results = parent::get_entry_list($session, ENVIRONMENTAL_EQUIPMENT_INFO_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseEnvironmentalEquipmentInformation($xmlWriter, $results);
		 //// ENV EQUIPMENT PROBLEM LOG
        // $results = parent::get_entry_list($session, ENV_EQUIPMENT_PROBLEM_LOG_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseEnvironmentalEquipmentProblemLog($xmlWriter, $results);
		 //// PARTICIPANT CONSENT SAMPLE
        // $results = parent::get_entry_list($session, PARTICIPANT_CONSENT_SAMPLE_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseParticipantConsentSample($xmlWriter, $results);
		 //// PARTICIPANT RECORD VISIT
        // $results = parent::get_entry_list($session, PARTICIPANT_RECORD_VISIT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseParticipantRecordVisit($xmlWriter, $results);
		////PARTICIPANT VISIT CONSENT //MOVED 
        // $results = parent::get_entry_list($session, PARTICIPANT_VIS_CONSENT_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        // self::$helperObject->parseParticipantVisitConsent($xmlWriter, $results);
         //// PRECISION THERMOMETER CERT
        // $results = parent::get_entry_list($session, PRECISION_THERMOMETER_CERT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parsePrecisionThermometerCertification($xmlWriter, $results);
		 //// REFRIGERATOR FREEZER VERIFICATION
        // $results = parent::get_entry_list($session, REFRIGERATOR_FREEZER_VER_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseRefrigeratorFreezerVerification($xmlWriter, $results);
		 //// SAMPLE RECEIPT STORAGE
        // $results = parent::get_entry_list($session, SAMPLE_RECEIPT_STORAGE_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseSampleReceiptStorage($xmlWriter, $results);
		 //// SAMPLE SHIPPING
        // $results = parent::get_entry_list($session, SAMPLE_SHIPPING_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseSampleShipping($xmlWriter, $results);
		 //// SRSC INFO
        // $results = parent::get_entry_list($session, SRSC_INFO_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseSrscInformation($xmlWriter, $results);
		 //// SUBSAMPLE DOC
        // $results = parent::get_entry_list($session, SUBSAMPLE_DOC_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseSubsampleDocument($xmlWriter, $results);
		 //// TRH METER CALIBRATION
        // $results = parent::get_entry_list($session, TRH_METER_CALIBRATION_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseTRHMeterCalibration($xmlWriter, $results);
		 //// DIGITAL REFRIGERATOR FREEZER THERMOMETER VERIFICATION
        // $results = parent::get_entry_list($session, DRFT_THERM_VERIFICATION_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseDigitalRefrigeratorFreezerThermVerification($xmlWriter, $results);
		 //// SAMPLE RECEIPT CONFIRM
        // $results = parent::get_entry_list($session, SPEC_EUIPMENT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        // self::$helperObject->parseSampleReceiptConfirmation($xmlWriter, $results);
		//// *********************
        $xmlWriter->endElement();
    }
    
    private function validate_document(&$xmlResponse) {
        libxml_use_internal_errors(true);
        $testDoc = new DOMDocument();
        if ($testDoc->loadXML($xmlResponse)) {
            if (!$testDoc->schemaValidate('custom/service/v3/schema1_2.xsd')) {
                $this->generate_doc_errors($xmlResponse);
            }
        }
    }
    
    private function generate_doc_errors(&$xmlResponse) {
        $errors = libxml_get_errors();
        $xmlErrorWriter = new XMLWriter();
        $xmlErrorWriter->openMemory();
        $xmlErrorWriter->setIndent(true);
        $xmlErrorWriter->startElement('errors');
        foreach ($errors as $error) {
            $this->report_doc_error($error, $xmlErrorWriter);
        }
        libxml_clear_errors();
        $xmlErrorWriter->endElement();
        $xmlResponse .= $xmlErrorWriter->outputMemory();
    }
    
    private function report_doc_error($error, &$xmlErrorWriter) {
        $xmlErrorWriter->startElement('error');
            $xmlErrorWriter->startAttribute('level');
            switch ($error->level) {
                case LIBXML_ERR_WARNING:
                    $xmlErrorWriter->text('warning');
                    break;
                case LIBXML_ERR_ERROR:
                    $xmlErrorWriter->text('error');
                    break;
                case LIBXML_ERR_FATAL:
                    $xmlErrorWriter->text('fatal');
                    break;
                default:
                    $xmlErrorWriter->text('unknown');
            }
            $xmlErrorWriter->endAttribute();
            $xmlErrorWriter->startAttribute('line'); $xmlErrorWriter->text($error->line); $xmlErrorWriter->endAttribute();
            $xmlErrorWriter->startAttribute('column'); $xmlErrorWriter->text($error->column); $xmlErrorWriter->endAttribute();
            $xmlErrorWriter->text($error->message);
        $xmlErrorWriter->endElement();
    }
}

NCSSugarWebServiceImpl::$helperObject = new NCSSugarWebServiceUtil();
?>
