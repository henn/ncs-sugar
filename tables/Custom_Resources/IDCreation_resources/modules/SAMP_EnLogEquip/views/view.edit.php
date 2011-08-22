<?php 

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once('include/MVC/View/views/view.edit.php');
	require_once 'include/utils.php';

	class SAMP_EnLogEquipViewEdit extends ViewEdit {
		
		public $useForSubpanel = true;					
		
		function SAMP_EnLogEquipViewEdit(){
			parent::ViewEdit();
		}

		function display() {
			require_once 'ncs_framework/ncs_controller.php';
			$ncs = new NCS($this->bean);
			$ncs->identifier = 'EL';
			$this->ss->assign("NAME", $ncs->get_name());
			parent::display();
		}
				
	} 

?>