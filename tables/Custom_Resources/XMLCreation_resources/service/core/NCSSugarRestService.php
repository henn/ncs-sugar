<?php
 if(!defined('sugarEntry'))define('sugarEntry', true);

 require_once('service/core/SugarRestService.php');
 class NCSSugarRestService extends SugarRestService {
    
     	/**
	 * Constructor. Added XML response type for NCS
	 *
	 * @param String $url - REST url
	 */
	function __construct($url){
		$GLOBALS['log']->info('Begin: NCSSugarRestService->__construct');
		$this->restURL = $url;
		$responseTypeString = 'SugarRest';
		if(!empty($_REQUEST['response_type'])) {
			$responseTypeString = clean_string($_REQUEST['response_type'], 'ALPHANUM');
			if (strcasecmp($responseTypeString, 'JSON') === 0) {
				$responseTypeString = 'SugarRest'. 'JSON';
			} elseif (strcasecmp($responseTypeString, 'RSS') === 0) {
				$responseTypeString = 'SugarRest'. 'RSS';
			} elseif(strcasecmp($responseTypeString, 'Serialize') === 0) {
				$responseTypeString = 'SugarRest'. 'Serialize';
			} elseif(strcasecmp($responseTypeString, 'XML') === 0) {        // Add XML Response Type
                                $responseTypeString = 'SugarRest'. 'XML';               // Build XML Response Type Class
                        }
		} // if
		$this->responseClass = $responseTypeString;
		//$this->responseClass = (!empty($_REQUEST['response_type']))?'SugarRest'.clean_string($_REQUEST['response_type'], 'ALPHANUM'): 'SugarRest';
		
		if(!file_exists('service/core/REST/' . $this->responseClass. '.php') && !file_exists('custom/service/core/REST/' . $this->responseClass. '.php'))$this->responseClass = 'SugarRest';
		$this->serverClass = (!empty($_REQUEST['input_type']))?'SugarRest'.clean_string($_REQUEST['input_type'], 'ALPHANUM'): 'SugarRest';
		$GLOBALS['log']->info('SugarRestService->__construct serverclass = ' . $this->serverClass);
		if(!file_exists('service/core/REST/' . $this->serverClass . '.php') && !file_exists('custom/service/core/REST/' . $this->serverClass . '.php'))$this->serverClass = 'SugarRest';
		if (file_exists('custom/service/core/REST/' . $this->serverClass . '.php')) {
                    require_once('custom/service/core/REST/' . $this->serverClass . '.php');
                } else {
                    require_once('service/core/REST/'. $this->serverClass . '.php');
                }
		$GLOBALS['log']->info('End: NCSSugarRestService->__construct');
	} // ctor
        
        	/**
	 * It passes request data to REST server and sends response back to client
         * Extended to support XML for NCS
	 * @access public
	 */	
	function serve(){
		$GLOBALS['log']->info('Begin: NCSSugarRestService->serve');
		if (file_exists('custom/service/core/REST/' . $this->responseClass . '.php'))
                {
                    require_once('custom/service/core/REST/'. $this->responseClass . '.php');
                } else {
                    require_once('service/core/REST/'. $this->responseClass . '.php');
                }
		$response  = $this->responseClass;
		
		$responseServer = new $response($this->implementation);
		$this->server->faultServer = $responseServer;
		$this->responseServer->faultServer = $responseServer;
                // There is a chance with the export_vdr_data method we may need to jump straight to
                // that method and stream back the XMLWriter object or run into memory problems
		$responseServer->generateResponse($this->server->serve());
		$GLOBALS['log']->info('End: NCSSugarRestService->serve');
	} // fn
 }
?>
