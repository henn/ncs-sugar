<?php

/*
	This IDCreation class doesn't need to reference a $bean object in order to create a new name/id. 
	call "get_new_name" function to get a new id. This class is a modification of ncs_controller.php file.
	
	Example use: 	
		1. Make sure you include IDCreation.php file
			require_once("ncs_framework/IDCreation.php");
		2. To get a new name for an ncs event info.
			
			$IDC = new IDCreation();
			$name = $IDC->get_new_name("ncsdc_eventinfo");
		
		$name is the new ID that can be used in your code. Make sure you know the name of the "table" in sugarCRM database.	
*/

class IDCreation{

	public $identifier;
		
	function IDCreation()
	{
	
	}

	/*
	*	
	*/
	function get_new_name($table_name)
	{
		require_once 'include/utils.php';
		
		$name = $this->identifier . substr(strtoupper(create_guid()), 0,6);	
		do {
			return $name;
		} while ($this->check_for_existing_name($name, $table_name) == false);					
	}

	/*
	*
	*/
	function check_for_existing_name($nameID, $table_name) {
		$db = $GLOBALS['db']->query("select name from " . $table_name . " where name = '" . $nameID . "' and deleted = '0'");

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