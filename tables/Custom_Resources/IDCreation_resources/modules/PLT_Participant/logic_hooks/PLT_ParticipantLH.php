<?php 

	require_once('data/SugarBean.php');
	require_once('include/utils.php');

	class PLT_ParticipantLH {

		function PLT_ParticipantLHProcess(&$bean, $event, $arguments) {

			if(isset($_SESSION['person_record']) && $_SESSION['person_record'] != '') {
				global $current_user;
				
				require_once 'modules/PLT_LkPrsPrtcpt/PLT_LkPrsPrtcpt.php';
				$partL = new PLT_LkPrsPrtcpt();  
				
				$partL->name = str_replace('SP', 'PP', $bean->name); 
				$partL->relation = "Participant/Self";
				$partL->is_active = '1';
				$partL->assigned_user_id = $current_user->id; 
				$partL->plt_lkprspe360_person_ida = $_SESSION['person_record'];
				$partL->plt_lkprsp31d3icipant_ida = $bean->id;
				$partL->plt_lkprsprlt_person_name = str_replace('SP', 'PN', $bean->name);
				$partL->plt_lkprsprrticipant_name = $bean->name;
				
				$_SESSION['person_record'] = '';
				
				$partL->save();                                             
				
			}
		}
		
	} 

?>