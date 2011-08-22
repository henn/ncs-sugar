<?php 

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once('include/MVC/View/views/view.edit.php');
	require_once 'include/utils.php';

	class NCSDC_EventInfoViewEdit extends ViewEdit {
		
		public $useForSubpanel = true;
		
		function NCSDC_EventInfoViewEdit(){
			parent::ViewEdit();
		}

		function display() {
			require_once 'ncs_framework/ncs_controller.php';
						
			//auto-fill Participant relate field when creating new event from participant summary page.
			if(empty($this->bean->id) && isset($_REQUEST['participant_name'])  && isset($_REQUEST['participant_id']) && isset($this->bean->field_name_map['ncsdc_eventrticipant_name']['id_name']))
			{			
				$participant_ida = $this->bean->field_name_map['ncsdc_eventrticipant_name']['id_name'];			
				$this->bean->ncsdc_eventrticipant_name = $_REQUEST['participant_name'];											
				$this->bean->$participant_ida = $_REQUEST['participant_id'];								
			}	
				
			$ncs = new NCS($this->bean);
			$ncs->identifier = 'EV';
			$this->ss->assign("NAME", $ncs->get_name());
			parent::display();
		}
		
		

	} 

?>