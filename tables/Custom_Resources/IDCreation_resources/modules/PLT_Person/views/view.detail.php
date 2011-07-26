<?php 

		if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

		require_once('include/MVC/View/views/view.detail.php');

		class PLT_PersonViewDetail extends ViewDetail {

		    function ViewDetail(){
		    	parent::ViewDetail();
		    }

			function display() {   
				global $current_user;
														
				$old_admin_flag = $current_user->is_admin;
				
				//temp allow user to be admin
				$current_user->is_admin = 1;
				
				$checkID = '';				
				
				$p2p = $this->bean->get_linked_beans("plt_lkprsprcpt_plt_person", "PLT_LkPrsPrtcpt");
				
				if(isset($p2p[0]->id) && trim($p2p[0]->id) != '') {

						require_once('modules/Administration/QuickRepairAndRebuild.php'); 
						$clear_cache=new RepairAndClear(); 
						$clear_cache->repairAndClearAll(array('clearTpls'),array('PLT_Person'),false,false);

				} else {
					
					$maxButtons = sizeof($this->dv->defs['templateMeta']['form']['buttons']);  
									
					$this->dv->defs['templateMeta']['form']['buttons'][$maxButtons++] = array(
						'customCode' => 
						'<input title="Convert to Participant" 
						type="button" class="button" 
						onclick="document.location=\'index.php?module=PLT_Participant&amp;action=EditView&amp;person_id=' . 
						$this->bean->name . '&amp;person_record=' . $this->bean->id . '\' " 
						id="convertParticipant" 
						name="convertParticipant" 
						value="Convert to Participant">'
					);
					
					//-------------------------------------------------
					// Such a messy way of doing this to get pass the 
					// "cached" tpl files. Otherwise, the button doesn't show up
					// since it is cached. If anyone knows of a different
					// way for DetailViews (other than just echoing out something)
					// let me know. This *only* runs a super quick repair
					// isolated to just the detail view of the PLT_Person.
					//-------------------------------------------------
					
					require_once('modules/Administration/QuickRepairAndRebuild.php'); 
					$clear_cache=new RepairAndClear(); 
					$clear_cache->repairAndClearAll(array('clearTpls'),array('PLT_Person'),false,false);
					
					$this->dv->process();					
				}
				
				//set user back to regular user
				if($current_user->is_admin != $old_admin_flag)
				{
					$current_user->is_admin = $old_admin_flag;
				}
										
				parent::display();
			}
		} 

?>