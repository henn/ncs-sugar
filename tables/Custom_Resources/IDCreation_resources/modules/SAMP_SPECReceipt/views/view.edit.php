<?php 	

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once('include/MVC/View/views/view.edit.php');	
	require_once 'include/utils.php';		
	
	class SAMP_SPECReceiptViewEdit extends ViewEdit {
	
		function SAMP_SPECReceiptViewEdit(){
			parent::ViewEdit();
			}
			
		function display() {
			$_SESSION['Table_Name']="samp_specreceipt";
			$_SESSION['Pompt']=true;
			parent::display();
		}	
	} 
?>