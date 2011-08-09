<?php 

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once('include/MVC/View/views/view.edit.php');
	require_once 'include/utils.php';

	class LTT_EmailViewEdit extends ViewEdit {
		
		function LTT_EmailViewEdit(){
			parent::ViewEdit();
		}

		function display() {
			require_once 'ncs_framework/ncs_controller.php';			
				
			//auto-fill relate fields problem
			//http://www.sugarcrm.com/forums/showthread.php?p=255687
			//http://www.sugarcrm.com/forums/showthread.php?p=257879		
			if(empty($this->bean->id) && isset($_REQUEST['person_name'])  && isset($_REQUEST['person_id']) && isset($this->bean->field_name_map['plt_person_ltt_email_name']['id_name']))
			{			
				$person_ida = $this->bean->field_name_map['plt_person_ltt_email_name']['id_name'];			
				$this->bean->plt_person_ltt_email_name = $_REQUEST['person_name'];				
				//need to set person id to fix javascript error (required by sugar).				
				$this->bean->$person_ida = $_REQUEST['person_id'];
			}
		
			
			$ncs = new NCS($this->bean);
			$ncs->identifier = 'EM';
			$this->ss->assign("NAME", $ncs->get_name());
			parent::display();
		}
		
		

	} 

?>