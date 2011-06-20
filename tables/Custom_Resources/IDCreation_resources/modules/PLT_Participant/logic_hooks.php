<?php
	//Logic hook for Participant
	
	if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	$hook_array = array();
	$hook_array['after_retrieve'] = array();
	$hook_array['after_retrieve'][] = array(1, 'pt_person_summary', 'custom/modules/PLT_Participant/PersonSummary.php', 'PersonSummary', 'person_summary');
					
?>
