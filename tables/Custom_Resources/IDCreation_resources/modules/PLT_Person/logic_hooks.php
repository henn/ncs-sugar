<?php	
	if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	$hook_array = array();
	$hook_array['before_save'] = array();		
	$hook_array['before_save'][] = array(1, 'populate_visit_window', 'custom/modules/PLT_Person/PopulateEventInfo.php', 'PopulateEventInfo', 'populate_visit_eventInfo');	
?>