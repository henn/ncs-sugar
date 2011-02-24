<?php 

	class CustomGT_Dwelling_UntController extends SugarController
	{
		
		public function action_exportxml() {
	        if ( !empty($_REQUEST['uid']) ) {
				
				$domDoc = new DOMDocument;
				
	            $recordIds = explode(',',$_REQUEST['uid']);
				$i = 0;
				$xml = '';
				
	            foreach ( $recordIds as $recordId ) {
	                $bean = SugarModule::get($_REQUEST['module'])->loadBean();
	                $bean->retrieve($recordId);
					//echo '<pre>' . print_r($bean->field_name_map,1) . '</pre>';
					$rootElt = $domDoc->createElement('record');
					$rootNode = $domDoc->appendChild($rootElt);
						$attr = $domDoc->createAttribute('count');
						    $attrVal = $domDoc->createTextNode($i);
						    $attr->appendChild($attrVal);
						    $rootNode->appendChild($attr);
					foreach ($bean->fetched_row as $key => $value) {
						$subElt = $domDoc->createElement($key);
						$subNode = $rootNode->appendChild($subElt);
						$textNode = $domDoc->createTextNode($value);
						$subNode->appendChild($textNode);
					}
					
					$i++;
	                
	            }
				
				$fileName = "xml_file_" . create_guid();
				$xmlContent = $domDoc->saveXML();
				
				//echo htmlentities($domDoc->saveXML());
				$this->save_xml_file($fileName . ".xml", $xmlContent);
				
				// download XML file...
				ob_clean();
				header("Pragma: cache");
				header("Content-type: application/octet-stream; charset=".$GLOBALS['locale']->getExportCharset());
				header("Content-Disposition: attachment; filename={$fileName}.xml");
				header("Content-transfer-encoding: binary");
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT" );
				header("Cache-Control: post-check=0, pre-check=0", false );
				header("Content-Length: ".strlen($xmlContent));

				print $GLOBALS['locale']->translateCharset($xmlContent, 'UTF-8', $GLOBALS['locale']->getExportCharset());

				sugar_cleanup(true);
	        }

	        sugar_die('');
	    }
	

		function xmlHeader(){
			$header = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
			return $header;
		}
		
		function process_xml($key, $data) {
			return '<' . $key . '>' . $data . '</key>';
		}

	
		function save_xml_file($filename,$xml_file) {
			global $app_strings;

			if (!$handle = sugar_fopen($filename, 'w')) {
				$GLOBALS['log']->debug("Cannot open file ($filename)");
				return;
			}

			if (fwrite($handle,$xml_file) === FALSE) {
				$GLOBALS['log']->debug("Cannot write to file ($filename)");
				return false;
			}

			$GLOBALS['log']->debug("Success, wrote ($xml_file) to file ($filename)");

			fclose($handle);
			return true;

		}
		
		
	} 

?>