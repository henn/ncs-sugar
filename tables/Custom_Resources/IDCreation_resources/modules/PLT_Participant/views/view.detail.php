<?php 

//added by JL

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once('include/MVC/View/views/view.detail.php');
	require_once 'include/utils.php';

	class PLT_ParticipantViewDetail extends ViewDetail {
		
		function PLT_ParticipantViewDetail(){
			parent::ViewDetail();
		}

		function display() {
			
			$this->th2 = new TemplateHandler();
			$this->th2->clearCache($this->module);
			
			parent::display();
		}							
	} 

?>