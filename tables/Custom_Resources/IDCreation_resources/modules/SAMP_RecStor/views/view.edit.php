<?php 	

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once('include/MVC/View/views/view.edit.php');	
	require_once 'include/utils.php';		
	
	class SAMP_RecStorViewEdit extends ViewEdit {
	
		function SAMP_RecStorViewEdit(){
			parent::ViewEdit();
			}
			
		function display() {
			$_SESSION['Table_Name']="samp_recstor";
			$_SESSION['Pompt']=true;
			parent::display();
		}	
	} 
?>