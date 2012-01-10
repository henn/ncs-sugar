<?php 

	/**
	* 
	*/
	
	class NCS
	{
		
		public $bean;
		public $identifier;
		
		function __construct(&$bean)
		{
			# intitialization code
			$this->bean = $bean;
		}
				
		function get_name() {
			require_once 'include/utils.php';

			//if(trim($this->bean->name) == '') {
			if(trim($this->bean->name) == '' || (isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate']=='true'))
			{
				$name = $this->identifier . substr(strtoupper(create_guid()), 0,6);	
				do {
					return $name;
				} while ($this->check_for_existing_name_id($name) == false);
			
			} else {
			
				return $this->bean->name;
			
			}
		}
		
		function check_for_existing_name_id($nameID) {
			$db = $GLOBALS['db']->query("select name from " . $this->bean->table_name . " where name = '" . $nameID . "' and deleted = '0'");

			while ($dbArray = $GLOBALS['db']->fetchByAssoc($db)) {
				// field is $dbArray['field_name'];
				if($dbArray['name'] == $nameID){
					return 'true';
				} else{
					return 'false';
				}
			}
			return 'false';
		}
	}
	 

?>