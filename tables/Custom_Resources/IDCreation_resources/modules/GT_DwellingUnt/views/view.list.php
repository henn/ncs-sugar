<?php 

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	require_once('include/MVC/View/views/view.list.php');

	class GT_Dwelling_UntViewList extends ViewList {
		
		function GT_Dwelling_UntViewList(){
			parent::ViewList();
		}

		public function preDisplay() {
        	parent::preDisplay();
        	$this->lv->actionsMenuExtraItems[] = $this->buildMyMenuItem();
	    }
	
		protected function buildMyMenuItem(){
			global $app_strings;

			return "<a href='#' style='width: 150px' class='menuItem' onmouseover='hiliteItem(this,\"yes\");' onmouseout='unhiliteItem(this);' onclick=\"sugarListView.get_checks();if(sugarListView.get_checks_count() < 1) { alert('{$app_strings['LBL_LISTVIEW_NO_SELECTED']}'); return false; } document.MassUpdate.action.value='exportxml'; document.MassUpdate.submit();\">Export XML</a>";
			}

	} 

?>