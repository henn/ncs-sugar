<?php 	

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once('include/MVC/View/views/view.edit.php');	
	require_once('include/utils.php');		
	
	class SAMP_BioSpecIDViewEdit extends ViewEdit {
	
		function SAMP_BioSpecIDViewEdit(){
			parent::ViewEdit();
		}
		
		//==== Check Specimen ID if needed.
		function process()
		{						
			if(isset($_REQUEST['cid']) && !empty($_REQUEST['cid']))
			{										
				$arr = array();
				$error1 = false;
				$error2 = true;
				
				$arr["error"] = "";
				$arr["error_msg"] = "";						
								
				//Check to see if the specimen ID is unique
				$result1 = $GLOBALS['db']->query("SELECT name FROM samp_specreceipt WHERE deleted='0' AND name='".$_REQUEST['cid']."'");
				
				while($row1 = $GLOBALS['db']->fetchByAssoc($result1)) {
					$arr["error"] = "true";
					$arr["error_msg"] = "There is a duplicate SPECIMEN ID in the database.";	
					$error1 = true; 
					break;
				}	
				
				if(!$error1)
				{
					//Check if the current ID exists in the preset ID set located in samp_biospecid table.
					$result2 = $GLOBALS['db']->query("SELECT name FROM samp_biospecid WHERE deleted='0' AND name='".$_REQUEST['cid']."'");
					
					while($row2 = $GLOBALS['db']->fetchByAssoc($result2)) {
						$error2 = false;
						break;
					}
					
					if($error2)
					{
						$arr["error"] = "true";
						$arr["error_msg"] = "SPECIMEN ID is not part of the predetermined biospecimen ids";						
					}
				}
				
				$er = json_encode($arr);			
				
				die($er);
			}				
			parent::process();
		}		
			
		function display() {				
			parent::display();
		}	
	} 
?>