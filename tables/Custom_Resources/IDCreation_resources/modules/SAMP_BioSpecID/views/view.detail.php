<?php 	

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once('include/MVC/View/views/view.detail.php');	
	require_once('include/utils.php');		
	
	class SAMP_BioSpecIDViewDetail extends ViewDetail {
	
		function SAMP_BioSpecIDViewDetail(){
			parent::ViewDetail();
		}
		
		//==== Check Specimen ID if needed.
		function process()
		{		
			 global $current_user;
				// echo "<pre>";
				// print_r($current_user->is_admin); // -> 0 );
				// echo "</pre>";
				// die("");
			//For SAMP_SPECReceipt module
			if(isset($_REQUEST['cid']) && !empty($_REQUEST['cid']) && isset($_SESSION['Table_Name']))
			{										
				$arr = array();
				$error1 = false;
				$error2 = true;
				
				$arr["error"] = "";
				$arr["message"] = "";	
								
				//Check to see if the specimen ID is unique
				$result1 = $GLOBALS['db']->query("SELECT name FROM ".$_SESSION['Table_Name']." WHERE deleted='0' AND name='".$_REQUEST['cid']."'");
				unset($_SESSION['Table_Name']);
				
				while($row1 = $GLOBALS['db']->fetchByAssoc($result1)) {
					$arr["error"] = "true";
					$arr["message"] = "There is a duplicate SPECIMEN ID in the database.";	
					$error1 = true; 
					break;
				}	
				
				if(!$error1)
				{
					//Check if the current ID exists in the preset ID set located in samp_biospecid table.
					$result2 = $GLOBALS['db']->query("SELECT * FROM samp_biospecid WHERE deleted='0' AND name='".$_REQUEST['cid']."'");
					
					while($row2 = $GLOBALS['db']->fetchByAssoc($result2)) {
						$error2 = false;
												
						if(!empty($row2["item_prompt"])&&$_SESSION['Pompt'])
							$arr["message"] = $row2["item_prompt"];
														
						break;
					}
					
					if($error2)
					{
						$arr["error"] = "true";
						$arr["message"] = "SPECIMEN ID is not part of the predetermined biospecimen ids";						
					}
				}
				
				$er = json_encode($arr);			
				unset($_SESSION['Pompt']);
				die($er);
			}
			parent::process();
		}		
			
		function display() {
			global $current_user;
		
			if($current_user->is_admin==1){
				parent::display();
			}		
		}	
	} 
?>