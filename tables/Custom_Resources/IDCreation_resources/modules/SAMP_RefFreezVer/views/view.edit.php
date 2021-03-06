<?php 

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once('include/MVC/View/views/view.edit.php');
	require_once 'include/utils.php';

	class SAMP_RefFreezVerViewEdit extends ViewEdit {
		
		public $useForSubpanel = true;			
		
		function SAMP_RefFreezVerViewEdit(){
			parent::ViewEdit();
		}

		function display() {
			require_once 'ncs_framework/ncs_controller.php';
			$ncs = new NCS($this->bean);
			$ncs->identifier = 'FV';
			$this->ss->assign("NAME", $ncs->get_name());
			parent::display();
		}
		
		

	} 

?>