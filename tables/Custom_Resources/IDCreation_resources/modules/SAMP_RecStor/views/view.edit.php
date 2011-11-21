<?php 	

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once('include/MVC/View/views/view.edit.php');	
	require_once 'include/utils.php';		
	
	class SAMP_RecStorViewEdit extends ViewEdit {
	
		function SAMP_RecStorViewEdit(){
			parent::ViewEdit();
			}
			
		function display() {
		
			//If we are creating new record.
			if(empty($this->bean->id))
			{
				//Only set these Session variables if we are in creating new record mode.			
				$_SESSION['Table_Name']="samp_recstor";
				$_SESSION['Pompt']=true;						
			}
			else
			{
				//Edit existing record.
				$this->ss->assign("NAME", $this->bean->name);
			}		
		
			parent::display();
		}	
	} 
?>