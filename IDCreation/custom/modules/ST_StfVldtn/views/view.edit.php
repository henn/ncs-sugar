<?php 

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once('include/MVC/View/views/view.edit.php');
	require_once 'include/utils.php';

	class ST_StfVldtnViewEdit extends ViewEdit {
		
		function ST_StfVldtnViewEdit(){
			parent::ViewEdit();
		}

		function display() {
			require_once 'ncs_framework/ncs_controller.php';
			$ncs = new NCS($this->bean);
			$ncs->identifier = 'SV';
			$this->ss->assign("NAME", $ncs->get_name());
			parent::display();
		}
		
		

	} 

?>