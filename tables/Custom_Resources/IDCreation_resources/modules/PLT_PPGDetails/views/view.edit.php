<?php 

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once('include/MVC/View/views/view.edit.php');
	require_once 'include/utils.php';

	class PLT_PPGDetailsViewEdit extends ViewEdit {
		
		public $useForSubpanel = true;
		
		function PLT_PPGDetailsViewEdit(){
			parent::ViewEdit();
		}

		function display() {
		
			//for quickcreate form and regular edit view.
			require_once 'ncs_framework/ncs_controller.php';
			$ncs = new NCS($this->bean);
			$ncs->identifier = 'GD';
			$this->ss->assign("NAME", $ncs->get_name());
			parent::display();
		}
		
		

	} 

?>