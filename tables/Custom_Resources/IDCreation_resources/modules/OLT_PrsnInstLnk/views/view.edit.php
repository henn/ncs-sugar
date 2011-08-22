<?php 

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once('include/MVC/View/views/view.edit.php');
	require_once 'include/utils.php';

	class OLT_PrsnInstLnkViewEdit extends ViewEdit {
		
		public $useForSubpanel = true;				
		
		function OLT_PrsnInstLnkViewEdit(){
			parent::ViewEdit();
		}

		function display() {
			require_once 'ncs_framework/ncs_controller.php';
			$ncs = new NCS($this->bean);
			$ncs->identifier = 'NI';
			$this->ss->assign("NAME", $ncs->get_name());
			parent::display();
		}
			
	} 

?>