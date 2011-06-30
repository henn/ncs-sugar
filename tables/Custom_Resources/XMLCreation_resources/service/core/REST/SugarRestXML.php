<?php
if(!defined('sugarEntry'))define('sugarEntry', true);

require_once('service/core/REST/SugarRest.php');

/**
 * This class is an XML implementation of REST protocol
 *
 */
class SugarRestXML extends SugarRest{

    /**
     * @see SugarRest::serve()
     */
    public function serve()
    {
        $GLOBALS['log']->info('Begin: SugarRestXML->serve');
        $xml = !empty($_REQUEST['rest_data'])? $_REQUEST['rest_data']: '';
        if (empty($_REQUEST['method']) || !method_exists($this->implementation, $_REQUEST['method'])) {
            $er = new SoapError();
            $er->set_error('invalid_call');
            $this->fault($er);
        } else {
            $method = $_REQUEST['method'];
            $data = $this->convertXMLToArray(from_html($xml));
            if (!is_array($data))$data = array($data);
            $GLOBALS['log']->info('End: SugarRestXML->serve');
            return call_user_func_array(array($this->implementation, $method), $data);
        }
    }
    /**
     *
     * @param array $input
     * @return string XML 
     */
    protected function convertArrayToXML($input) {
        $GLOBALS['log']->info('Begin: SugarRestXML->convertArrayToXML');
        $GLOBALS['log']->debug('SugarRestXML::convertArrayToXML Input:');
        $GLOBALS['log']->debug(var_export($input, true));
        $xmlWriter = new XMLWriter();
        $xmlWriter->openMemory();
        $xmlWriter->setIndent(true);
        $xmlWriter->startDocument('1.0','UTF-8');
        $xmlWriter->startElement('result');
        foreach ($input as $key => $value){
            if (is_array($value)) {
                $xmlWriter->startElement($key);
                $this->convertArrayItemToXML($value,$xmlWriter);
                $xmlWriter->endElement();
            } else {
                $xmlWriter->writeElement($key,$value);
            }
        }
        $xmlWriter->endElement();
        $xmlWriter->endDocument();
        $GLOBALS['log']->info('End: SugarRestXML->convertArrayToXML');
        return $xmlWriter->outputMemory();
    } // fn
    
    /**
     * Converts an item in a PHP array into XML
     * 
     * @param array $item
     * @param object XMLWriter $xmlWriter
     * @return string XML
     */
    protected function convertArrayItemToXML(array $item, XMLWriter $xmlWriter) {
        
        foreach ($item as $key => $value){
            // If this is an array, we'll call SugarRestXML::convertArrayItemToXML()
            // to convert the array to XML, containing inside the given $key element.
            if (is_array($value)){
                $xmlWriter->startElement($key);
                $this->convertArrayItemToXML($value, $xmlWriter);
                $xmlWriter->endElement();
            }
            // If this is just a scalar, we can write out the element directly.
            else {
                $xmlWriter->writeElement($key, $value);
            }
        }
    }

    /**
     * Converts an XML string to a PHP array
     * 
     * @param string $xml 
     * @return array
     */
    protected function convertXMLToArray($xml) {
        $returnArray = array();
        $xmlObject = simplexml_load_string($xml);
        
        if ($xmlObject) {
            foreach ( $xmlObject->children() as $child) {
                // Attempt to convert the child element to a string; if it comes out a
                // non-empty string, then the child element has no children.
                $contents = trim((string) $child);
                if (!empty($contents)){
                    $returnArray[$child->getName()] = $contents;
                } else {
                    // Recursively call this method to convert any
                    // child arrays to XML
                    $returnArray[$child->getName()] = $this->convertXMLToArray($child->asXML());
                }
            }
        }
        return $returnArray;
    }
    
    	/**
	 * This function sends response to client containing error object
	 *
	 * @param SoapError $errorObject - This is an object of type SoapError
	 * @access public
	 */
	function fault($errorObject){
		$this->faultServer->faultObject = $errorObject;
	} // fn
	
	/**
	 * It will generate XML of the input object and echo it. If the input object
         * is from the export_vdr_data method it is already in XML format and just needs
         * to be bumped back.
	 * 
	 * @param array $input - assoc array of input values: key = param name, value = param type (or XML in case of export_vdr_data)
	 * @return String - echos XML string of $input
	 */
	public function generateResponse($input){
            $GLOBALS['log']->info('Begin: SugarRestXML->generateResponse');
            header('Content-Type: text/xml');
            // If there is a fault object, return it instead.
            if (isset($this->faultObject)){
                $this->generateFaultResponse($this->faultObject);
            } else {
                ob_clean();
                if ($_REQUEST['method'] == 'export_vdr_data'){  // ALREADY IN XML
                    echo $input;
                } else {
                    echo $this->convertArrayToXML($input);
                }
            }
            $GLOBALS['log']->info('End: SugarRestXML->generateResponse');
	} // fn
        
        /**
         *
         * @param SoapError $errorObject 
         */
        public function generateFaultResponse($errorObject){
            $GLOBALS['log']->info('Begin: SugarRestXML->generateFaultResponse');
            $error = $errorObject->number . ': ' . $errorObject->name . '<br>' . $errorObject->description;
            $GLOBALS['log']->error($error);
            ob_clean();
            echo $this->convertArrayToXML($errorObject->get_soap_array());
            $GLOBALS['log']->info('End: SugarRestXML->generateFaultResponse');
        } // fn
		
} // class