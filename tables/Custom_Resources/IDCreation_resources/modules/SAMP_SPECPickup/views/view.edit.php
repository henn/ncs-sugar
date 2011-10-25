<?php 	

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once('include/MVC/View/views/view.edit.php');	
	require_once 'include/utils.php';		
	
	class SAMP_SPECPickupViewEdit extends ViewEdit {
	
		function SAMP_SPECPickupViewEdit(){
			parent::ViewEdit();
			}
			
		function display() {
			$_SESSION['Table_Name']="samp_specpickup";
			$_SESSION['Pompt']=false;
			parent::display();
		}	
	} 
?>