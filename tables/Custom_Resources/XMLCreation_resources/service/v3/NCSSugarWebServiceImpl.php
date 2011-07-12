<?php
if(!defined('sugarEntry'))define('sugarEntry', true);

/**
 * This class is an implemenatation class for all the custom rest services
 */
require_once('service/v3/SugarWebServiceImplv3.php');
require_once('NCSSugarWebServiceUtil.php');
require_once('NCSSugarWebServiceConstants.php');

class NCSSugarWebServiceImpl extends SugarWebServiceImplv3 {
    
    protected $tempfilename;
    
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
        global $current_user;
    	if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', '', '', '', $error) || !is_admin($current_user)) {
    		$error->set_error('invalid_login');
                self::$helperObject->setFaultObject($error);
    		return;
    	} // if   
        $this->tempfilename = tempnam('cache/xml', 'NCS'); // Windows only takes first 3 characters for prefix anyway
        $xmlWriter = new XMLWriter();
        $xmlWriter->openMemory();
        $xmlWriter->setIndent(true);
        $xmlWriter->startDocument('1.0', 'UTF-8');
        $xmlWriter->startElementNS('ns1','recruitment_substudy_transmission_envelope','http://www.nationalchildrensstudy.gov');
        $this->insert_vdr_header($session, $xmlWriter);
        $this->insert_vdr_tables($session, $xmlWriter);
        $xmlWriter->endElement();
        $xmlWriter->endDocument();   
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // DO VALIDATION - MAY HAVE FLAG TO REQUEST IT, DEFAULT FALSE
        if ($doValidation) {
            //$xmlResponse = $xmlWriter->outputMemory();  
            //$this->validate_document($xmlResponse);
            // return $xmlResponse;
            $this->validate_xml_document();
            return file_get_contents($this->tempfilename);
        } else {
            // return $xmlWriter->outputMemory();
            return file_get_contents($this->tempfilename);
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
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
    }
    
    private function insert_vdr_tables($session, &$xmlWriter){
        $xmlWriter->startElementNS('ns1','transmission_tables', null);
        // STUDY CENTER
        $results = parent::get_entry_list($session, STUDY_CENTER_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseStudyCenter($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // PRIMARY SAMPLING UNIT
        $results = parent::get_entry_list($session, PSU_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parsePSU($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // SECONDARY SAMPLING UNIT
        $results = parent::get_entry_list($session, SSU_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseSSU($xmlWriter, $results);   
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // TERTIARY SAMPLING UNIT
        $results = parent::get_entry_list($session, TSU_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseTSU($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // LISTING UNIT
        $results = parent::get_entry_list($session, LISTING_UNIT_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseListingUnit($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // DWELLING UNIT
        $results = parent::get_entry_list($session, DWELLING_UNIT_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseDwellingUnit($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // HOUSEHOLD UNIT
        $results = parent::get_entry_list($session, HOUSEHOLD_UNIT_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseHouseHoldUnit($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // HOUSEHOLD TO DWELLING LINK
        $results = parent::get_entry_list($session, LINK_HOUSEHOLD_DWELLING_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseLinkHouseHoldDwelling($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // STAFF
        $results = parent::get_entry_list($session, STAFF_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseStaff($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // STAFF LANGUAGE
        $results = parent::get_entry_list($session, STAFF_LANGUAGE_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseStaffLanguage($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // STAFF VALIDATION
        $results = parent::get_entry_list($session, STAFF_VALIDATION_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseStaffValidation($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // STAFF WEEKLY EXPENSE
        $results = parent::get_entry_list($session, STAFF_WEEKLY_EXPENSE_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseStaffWeeklyExpense($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // STAFF EXPENSE MANAGEMENT TASKS
        $results = parent::get_entry_list($session, STAFF_EXP_MNGMNT_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseStaffExpenseManagementTask($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // STAFF EXPENSE DATA COLLECTION TASKS
        $results = parent::get_entry_list($session, STAFF_EXP_DATA_CLLCTN_TASKS_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseStaffExpenseDataCollectionTask($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // OUTREACH
        $results = parent::get_entry_list($session, OUTREACH_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseOutreach($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // ***** 2.0 Modules ***
	// OUTREACH RACE
        $results = parent::get_entry_list($session, OUTREACH_RACE_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseOutreachRace($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// ********************* 
	// OUTREACH STAFF  ** DOES NOT SEEM TO BE IMPLEMENTED CONSISTENTLY AS THERE IS ALSO A RELATIONSHIP DEFINED BETWEEM OUTREACH AND STATT
        // WITHOUT USING A MODULE DEFINITION **
        $results = parent::get_entry_list($session, OUTREACH_STAFF_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseOutreachStaff($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // OUTREACH EVAL ** ARE THESE RIGHT?? **
        $results = parent::get_entry_list($session, OUTREACH_EVAL_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseOutreachEval($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // ***** 2.0 Modules ***
	// OUTREACH TARGET
        $results = parent::get_entry_list($session, OUTREACH_TARGET_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseOutreachTarget($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// OUTREACH LANGUAGE 2
        $results = parent::get_entry_list($session, OUTREACH_LANG2_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseOutreachLanguage2($xmlWriter, $results);		
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // ********************* 
        // STAFF CERTIFICATION TRAINING
        $results = parent::get_entry_list($session, STAFF_CERT_TRAINING_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseStaffCertTraining($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // PERSON
        $results = parent::get_entry_list($session, PERSON_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parsePerson($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // PERSON RACE
        $results = parent::get_entry_list($session, PERSON_RACE_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parsePersonRace($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // LINK PERSON TO HOUSEHOLD
        $results = parent::get_entry_list($session, LINK_PERSON_HOUSEHOLD_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseLinkPersonHousehold($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // PARTICIPANT
        $results = parent::get_entry_list($session, PARTICIPANT_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseParticipant($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // LINK PERSON PARTICIPANT
        $results = parent::get_entry_list($session, LINK_PERSON_PARTICIPANT_SUGAR_MODULE, '', '', '', array(),null,'100000',false);
        self::$helperObject->parseLinkPersonParticipant($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // ***** 2.0 Modules ***
	// OUTREACH RACE
        $results = parent::get_entry_list($session, PARTICIPANT_AUTHORIZATION_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseParticipantAuthorizationForm($xmlWriter, $results);
	file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // *********************
	// PARTICIPANT CONSENT
        $results = parent::get_entry_list($session, PARTICIPANT_CONSENT_SUGAR_MODULE, '', '', '', array(),null,'100000',false);
        self::$helperObject->parseParticipantConsent($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// PARTICIPANT VISIT CONSENT //MOVED 
        // PPG DETAILS
        $results = parent::get_entry_list($session, PPG_DETAILS_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parsePPGDetails($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // PPG STATUS HISTORY
        $results = parent::get_entry_list($session, PPG_STATUS_HISTORY_SUGAR_MODULE, '', '','', array(), null, '100000', false);
        self::$helperObject->parsePPGStatusHistory($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // PROVIDER
        $results = parent::get_entry_list($session, PROVIDER_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseProvider($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
       	// ***** 2.0 Modules ***
	// PROVIDER ROLE
        $results = parent::get_entry_list($session, PROVIDER_ROLE_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseProviderRole($xmlWriter, $results);
	file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // *********************
        // LINK PERSON TO PROVIDER
        $results = parent::get_entry_list($session, LINK_PERSON_PROVIDER_SUGAR_MODULE, '', '', '',array(),null,'100000', false);
        self::$helperObject->parseLinkPersonProvider($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // INSTITUTION
        $results = parent::get_entry_list($session, INSTITUTION_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseInstitution($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // LINK PERSON TO INSTITUTE
        $results = parent::get_entry_list($session, LINK_PERSON_INSTITUTE_SUGAR_MODULE, '', '', '', array(), null, '100000', false); 
        self::$helperObject->parseLinkPersonIntitute($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // ADDRESS
	// TEST OF PAGING STYLE EXTRACT
        $results = null;
        $fetch_offset = 0;
        do {
            $results = parent::get_entry_list($session, ADDRESS_SUGAR_MODULE, '', 'id', $fetch_offset, array(), null, '500', false);
            self::$helperObject->parseAddress($xmlWriter, $results);
            file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
            $fetch_offset = $results['next_offset'];
        } while ($results['result_count'] != 0);
        // TELEPHONE
        $results = parent::get_entry_list($session, TELEPHONE_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseTelephone($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // EMAIL  *** BROKEN MODULE!!! ***
        $results = parent::get_entry_list($session, EMAIL_SUGAR_MODULE, '', '', '', array(), null, '100000', false); // THIS MODULE IS BROKEN, CANNOT RELATE OR SAVE
        self::$helperObject->parseEmail($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // EVENT
        $results = parent::get_entry_list($session, EVENT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseEvent($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// *********************
	// INSTRUMENT
        $results = parent::get_entry_list($session, INSTRUMENT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseInstrument($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// CONTACT
        $results = parent::get_entry_list($session, CONTACT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseContact($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// LINK CONTACT
        $results = parent::get_entry_list($session, LINK_CONTACT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseContactLinking($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// NON INTERVIEW REPORT
        $results = parent::get_entry_list($session, NON_INTERVIEW_RPT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseNonInterviewReprt($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// NON INTERVIEW REPORT VACANT
        $results = parent::get_entry_list($session, NON_INTERVIEW_RPT_VACANT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseNIRVacant($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// NON INTERVIEW REPORT NOACCESS
        $results = parent::get_entry_list($session, NON_INTERVIEW_RPT_NOACCESS_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseNIRNoAccess($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// NON INTERVIEW REPORT REFUSAL
        $results = parent::get_entry_list($session, NON_INTERVIEW_RPT_REFUSAL_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseNIRRefusal($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// NON INTERVIEW REPORT DUTYPE
        $results = parent::get_entry_list($session, NON_INTERVIEW_RPT_DUTYPE_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseNIRDuType($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// INCIDENT
        $results = parent::get_entry_list($session, INCIDENT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseIncident($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// INCIDENT MEDIA
        $results = parent::get_entry_list($session, INCIDENT_MEDIA_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseIncidentMedia($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// INCIDENT UNANTICIPATED
        $results = parent::get_entry_list($session, INCIDENT_UNANTICIPATED_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseIncidentUnanticipated($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// *********************
	// ***** 2.0 Modules ***
	 // SPEC EQUIPMENT
        $results = parent::get_entry_list($session, SPEC_EQUIPMENT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseSPECEquipment($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// SPECIMEN PICKUP
        $results = parent::get_entry_list($session, SPECIMEN_PICKUP_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseSpecimenPickup($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// SPECIMEN RECEIPT
        $results = parent::get_entry_list($session, SPECIMEN_RECEIPT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseSpecimenReceipt($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// SPECIMEN SHIPPING
        $results = parent::get_entry_list($session, SPECIMEN_SHIPPING_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseSpecimenShipping($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// SPECIMEN STORAGE
        $results = parent::get_entry_list($session, SPECIMEN_STORAGE_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseSpecimenStorage($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// SPECIMEN INFO
        $results = parent::get_entry_list($session, SPECIMEN_INFO_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseSpecimenInfo($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// ENVIRONMENTAL EQUIPMENT INFO
        $results = parent::get_entry_list($session, ENVIRONMENTAL_EQUIPMENT_INFO_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseEnvironmentalEquipmentInformation($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// ENV EQUIPMENT PROBLEM LOG
        $results = parent::get_entry_list($session, ENV_EQUIPMENT_PROBLEM_LOG_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseEnvironmentalEquipmentProblemLog($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// PARTICIPANT CONSENT SAMPLE
        $results = parent::get_entry_list($session, PARTICIPANT_CONSENT_SAMPLE_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseParticipantConsentSample($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// PARTICIPANT RECORD VISIT
        $results = parent::get_entry_list($session, PARTICIPANT_RECORD_VISIT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseParticipantRecordVisit($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	//PARTICIPANT VISIT CONSENT //MOVED 
        $results = parent::get_entry_list($session, PARTICIPANT_VIS_CONSENT_SUGAR_MODULE, '', '', '', array(), null, '100000', false);
        self::$helperObject->parseParticipantVisitConsent($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
        // PRECISION THERMOMETER CERT
        $results = parent::get_entry_list($session, PRECISION_THERMOMETER_CERT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parsePrecisionThermometerCertification($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// REFRIGERATOR FREEZER VERIFICATION
        $results = parent::get_entry_list($session, REFRIGERATOR_FREEZER_VER_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseRefrigeratorFreezerVerification($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// SAMPLE RECEIPT STORAGE
        $results = parent::get_entry_list($session, SAMPLE_RECEIPT_STORAGE_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseSampleReceiptStorage($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// SAMPLE SHIPPING
        $results = parent::get_entry_list($session, SAMPLE_SHIPPING_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseSampleShipping($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// SRSC INFO
        $results = parent::get_entry_list($session, SRSC_INFO_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseSrscInformation($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// SUBSAMPLE DOC
        $results = parent::get_entry_list($session, SUBSAMPLE_DOC_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseSubsampleDocument($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// TRH METER CALIBRATION
        $results = parent::get_entry_list($session, TRH_METER_CALIBRATION_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseTRHMeterCalibration($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// DIGITAL REFRIGERATOR FREEZER THERMOMETER VERIFICATION
        $results = parent::get_entry_list($session, DRFT_THERM_VERIFICATION_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseDigitalRefrigeratorFreezerThermVerification($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// SAMPLE RECEIPT CONFIRM
        $results = parent::get_entry_list($session, SPEC_EQUIPMENT_SUGAR_MODULE, '', '', '', array(), NULL, '10000', false);
        self::$helperObject->parseSampleReceiptConfirmation($xmlWriter, $results);
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
	// *********************
        $xmlWriter->endElement();
        file_put_contents($this->tempfilename, $xmlWriter->flush(true), FILE_APPEND);
    }
    
    private function validate_document(&$xmlResponse) {
        libxml_use_internal_errors(true);
        $testDoc = new DOMDocument();
        if ($testDoc->loadXML($xmlResponse)) {
            if (!$testDoc->schemaValidate('custom/service/v3/schema_2.0.01.02.xsd')) {
                $this->generate_doc_errors($xmlResponse);
            }
        }
    }
    
    private function validate_xml_document() {
        libxml_use_internal_errors(true);
        $testDoc = new DOMDocument();
        if ($testDoc->load($this->tempfilename)) {
            if (!$testDoc->schemaValidate('custom/service/v3/schema_2.0.01.02.xsd')) {
                $this->generate_xml_doc_errors();
            }
        }
    }
    
    private function generate_xml_doc_errors() {
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
        file_put_contents($this->tempfilename, $xmlErrorWriter->flush(true), FILE_APPEND);
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
