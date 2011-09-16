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
     * @param boolean $doValidation Set to true if you want the service to validate the response against the schema
     */
    function export_vdr_data($session, $doValidation = false)
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
        global $parseList;
        foreach($parseList as $module => $method)
        {
            $object_id_list = getObjectList($module);
            while (sizeof($object_id_list) > 0) {
                if (sizeof($object_id_list) > EXTRACT_PAGE_SIZE)
                    $chunk = array_splice($object_id_list, 0, EXTRACT_PAGE_SIZE);
                else
                    $chunk = array_splice ($object_id_list, 0);
                self::$helperObject->$method($xmlWriter, $chunk);
                //call_user_func(array(), $xmlWriter, $chunk);
                $GLOBALS['log']->error('Memory usage at end of ' . $module . ' export: ' . memory_get_usage());
            }
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
