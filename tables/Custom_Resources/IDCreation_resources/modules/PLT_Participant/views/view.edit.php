<?php 

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once('include/MVC/View/views/view.edit.php');
	require_once 'include/utils.php';

	class PLT_ParticipantViewEdit extends ViewEdit {
		
		function PLT_ParticipantViewEdit(){
			parent::ViewEdit();
		}

		function display() {
			
			if(isset($_REQUEST['person_id']) && trim($_REQUEST['person_id']) != ''){
				$partID = str_replace('PN', 'SP', $_REQUEST['person_id']);
				$_SESSION['person_record'] = $_REQUEST['person_record'];
				$this->ss->assign("NAME", $partID);
			} else {
				require_once 'ncs_framework/ncs_controller.php';
				$ncs = new NCS($this->bean);
				$ncs->identifier = 'SP';
				$this->ss->assign("NAME", $ncs->get_name());	
			}
			
			
			parent::display();
		}
		
		

	} 

?>