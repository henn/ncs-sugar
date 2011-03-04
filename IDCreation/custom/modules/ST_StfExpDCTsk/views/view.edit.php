<?php 

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once('include/MVC/View/views/view.edit.php');
	require_once 'include/utils.php';

	class ST_StfExpDCTskViewEdit extends ViewEdit {
		
		function ST_StfExpDCTskViewEdit(){
			parent::ViewEdit();
		}

		function display() {
			require_once 'ncs_framework/ncs_controller.php';
			$ncs = new NCS($this->bean);
			$ncs->identifier = 'DE';
			$this->ss->assign("NAME", $ncs->get_name());
			parent::display();
		}
		
		

	} 

?>