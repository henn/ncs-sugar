<?php 

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once('include/MVC/View/views/view.edit.php');
	require_once 'include/utils.php';

	class LTT_TelephoneViewEdit extends ViewEdit {
		
		function LTT_TelephoneViewEdit(){
			parent::ViewEdit();
		}

		function display() {
			require_once 'ncs_framework/ncs_controller.php';				
		
			// echo "<pre>";
			// print_r($this->bean);
			// echo "</pre>";
			// die("");
				
			//auto-fill PLT_Person relate field
			if(empty($this->bean->id) && isset($_REQUEST['person_name'])  && isset($_REQUEST['person_id']) && isset($this->bean->field_name_map['plt_person_telephone_name']['id_name']))
			{			
				$person_ida = $this->bean->field_name_map['plt_person_telephone_name']['id_name'];			
				$this->bean->plt_person_telephone_name = $_REQUEST['person_name'];											
				$this->bean->$person_ida = $_REQUEST['person_id'];
			}		
					
			$ncs = new NCS($this->bean);
			$ncs->identifier = 'PH';
			$this->ss->assign("NAME", $ncs->get_name());
			parent::display();
		}
		
		

	} 

?>