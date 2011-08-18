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
     * @param string $session Session ID returned by a previous call to login. Requried to use this method.
     * @param array $parts An array of sections (parts) to export in one call. They are labelled A, B, C
     * @param boolean $doValidation Set to true if you want the service to validate the response against the schema
     */
    function export_vdr_data($session, $parts, $doValidation = false)
    {
        $GLOBALS['log']->error('');
        $GLOBALS['log']->error('=========================================================');
        $GLOBALS['log']->error('Memory usage at start of export: ' . memory_get_usage());
    	$error = new SoapError();
        global $current_user;
    	if (!self::$helperObject->checkSessionAndModuleAccess($session, 'invalid_session', '', '', '', $error) || !is_admin($current_user)) {
    		$error->set_error('invalid_login');
                self::$helperObject->setFaultObject($error);
    		return;
    	} // if  
        $this->tempfilename = tempnam('cache/xml', 'NCS'); // Windows only takes first 3 characters for prefix anyway
        // BUILD XML FILE
        $xmlWriter = new XMLWriter();
        $xmlWriter->openUri($this->tempfilename);
        $xmlWriter->setIndent(true);
        $xmlWriter->startDocument('1.0', 'UTF-8');
        $xmlWriter->startElementNS('ns1','recruitment_substudy_transmission_envelope','http://www.nationalchildrensstudy.gov');
        // INSERT HEADER
        self::$helperObject->parseHeaderValues($xmlWriter);
        // INSERT TABLES
        $xmlWriter->startElementNS('ns1','transmission_tables', null);
        if($parts["partA"] == 'true'){
            $xmlWriter->writeComment("Beginning of part A");
            self::$helperObject->parseStudyCenter($xmlWriter);
            self::$helperObject->parsePSU($xmlWriter);
            self::$helperObject->parseSSU($xmlWriter);
            self::$helperObject->parseTSU($xmlWriter);
            self::$helperObject->parseListingUnit($xmlWriter);
            self::$helperObject->parseDwellingUnit($xmlWriter);
            self::$helperObject->parseHouseHoldUnit($xmlWriter);
            self::$helperObject->parseLinkHouseHoldDwelling($xmlWriter);
            self::$helperObject->parseStaff($xmlWriter);
            self::$helperObject->parseStaffLanguage($xmlWriter);
            self::$helperObject->parseStaffValidation($xmlWriter);
            self::$helperObject->parseStaffWeeklyExpense($xmlWriter);
            self::$helperObject->parseStaffExpenseManagementTask($xmlWriter);
            self::$helperObject->parseStaffExpenseDataCollectionTask($xmlWriter);
            $xmlWriter->writeComment("End of part A");
        }
        if($parts["partB"] == 'true'){
            $xmlWriter->writeComment("Beginning of part B");
            self::$helperObject->parseOutreach($xmlWriter);
            self::$helperObject->parseOutreachRace($xmlWriter);
            self::$helperObject->parseOutreachStaff($xmlWriter);
            self::$helperObject->parseOutreachEval($xmlWriter);
            self::$helperObject->parseOutreachTarget($xmlWriter);
            self::$helperObject->parseOutreachLanguage2($xmlWriter);
            self::$helperObject->parseStaffCertTraining($xmlWriter);
            self::$helperObject->parsePerson($xmlWriter);
            self::$helperObject->parsePersonRace($xmlWriter);
            self::$helperObject->parseLinkPersonHousehold($xmlWriter);
            self::$helperObject->parseParticipant($xmlWriter);
            self::$helperObject->parseLinkPersonParticipant($xmlWriter);
            self::$helperObject->parseParticipantAuthorizationForm($xmlWriter);
            self::$helperObject->parseParticipantConsent($xmlWriter);
            $xmlWriter->writeComment("End of part B");
        }
        if($parts["partC"] == 'true'){
            $xmlWriter->writeComment("Beginning of part C");
            self::$helperObject->parsePPGDetails($xmlWriter);
            self::$helperObject->parsePPGStatusHistory($xmlWriter);
            self::$helperObject->parseProvider($xmlWriter);
            self::$helperObject->parseProviderRole($xmlWriter);
            self::$helperObject->parseLinkPersonProvider($xmlWriter);
            self::$helperObject->parseInstitution($xmlWriter);
            self::$helperObject->parseLinkPersonIntitute($xmlWriter);
            self::$helperObject->parseAddress($xmlWriter);
            $xmlWriter->writeComment("End of part C");
        }
        if($parts["partD"] == 'true'){
            $xmlWriter->writeComment("Beginning of part D");
            self::$helperObject->parseTelephone($xmlWriter);
            self::$helperObject->parseEmail($xmlWriter);
            self::$helperObject->parseEvent($xmlWriter);
            self::$helperObject->parseInstrument($xmlWriter);
            self::$helperObject->parseContact($xmlWriter);
            self::$helperObject->parseContactLinking($xmlWriter);
            self::$helperObject->parseNonInterviewReprt($xmlWriter);
            self::$helperObject->parseNIRVacant($xmlWriter);
            self::$helperObject->parseNIRNoAccess($xmlWriter);
            self::$helperObject->parseNIRRefusal($xmlWriter);
            self::$helperObject->parseNIRDuType($xmlWriter);
            $xmlWriter->writeComment("End of part D");
        }
        if($parts["partE"] == 'true'){
            $xmlWriter->writeComment("Beginning of part E");
            self::$helperObject->parseIncident($xmlWriter);
            self::$helperObject->parseIncidentMedia($xmlWriter);
            self::$helperObject->parseIncidentUnanticipated($xmlWriter);
            self::$helperObject->parseSPECEquipment($xmlWriter);
            self::$helperObject->parseSpecimenPickup($xmlWriter);
            self::$helperObject->parseSpecimenReceipt($xmlWriter);
            self::$helperObject->parseSpecimenShipping($xmlWriter);
            self::$helperObject->parseSpecimenStorage($xmlWriter);
            self::$helperObject->parseSpecimenInfo($xmlWriter);
            $xmlWriter->writeComment("End of part E");
        }
        if($parts["partF"] == 'true'){
            $xmlWriter->writeComment("Beginning of part F");
            self::$helperObject->parseEnvironmentalEquipmentInformation($xmlWriter);
            self::$helperObject->parseEnvironmentalEquipmentProblemLog($xmlWriter);
            self::$helperObject->parseParticipantConsentSample($xmlWriter);
            self::$helperObject->parseParticipantRecordVisit($xmlWriter);
            self::$helperObject->parseParticipantVisitConsent($xmlWriter);
            self::$helperObject->parsePrecisionThermometerCertification($xmlWriter);
            self::$helperObject->parseRefrigeratorFreezerVerification($xmlWriter); 
            self::$helperObject->parseSampleReceiptStorage($xmlWriter); 
            self::$helperObject->parseSampleShipping($xmlWriter); 
            //self::$helperObject->parseSrscInformation($xmlWriter); <-- PROBLEM WITH JOIN TABLE
            self::$helperObject->parseSubsampleDocument($xmlWriter);
            self::$helperObject->parseTRHMeterCalibration($xmlWriter);
            self::$helperObject->parseDigitalRefrigeratorFreezerThermVerification($xmlWriter);
            self::$helperObject->parseSampleReceiptConfirmation($xmlWriter);
            $xmlWriter->writeComment("End of part F");
        }
        $xmlWriter->endElement(); // tables
        $xmlWriter->endElement(); // Envelope
        $xmlWriter->endDocument();
        $xmlWriter->flush();
        $GLOBALS['log']->error('Memory usage at end of export: ' . memory_get_usage());
        // DO VALIDATION - MAY HAVE FLAG TO REQUEST IT, DEFAULT FALSE
        if ($doValidation) {
            $this->validate_xml_document();
            $GLOBALS['log']->error('Memory usage after validation: ' . memory_get_usage());
            return file_get_contents($this->tempfilename);
        } else {
            return file_get_contents($this->tempfilename);
        }
    }
    
    private function validate_xml_document() {
        libxml_use_internal_errors(TRUE);
        $testDoc = new XMLReader();
        if (!$testDoc->open($this->tempfilename))
        {
            die("I cannot find the XML file that was just generated! I was told it was in: " . $this->tempfilename);
        };
        if (!$testDoc->setSchema('custom/service/v3/schema_2.0.01.02.xsd'))
        {
            die("I cannot find the Schema file that was provided." );
        };
        $testDoc->setParserProperty(XMLReader::VALIDATE, true);
        while ($testDoc->read()); 
        $tmpVar = $testDoc->name;
        if (!$testDoc->isValid()) {
            $this->generate_xml_doc_errors();
        }
        $testDoc->close();
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
