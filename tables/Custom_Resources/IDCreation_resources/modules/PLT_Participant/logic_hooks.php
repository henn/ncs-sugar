<?php
	//Logic hook for Participant Summary added by Johnny Lam
	if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	$hook_array = array();
	//$hook_array['after_retrieve'] = array();
	//$hook_array['after_retrieve'][] = array(1, 'pt_person_summary', 'custom/modules/PLT_Participant/PersonSummary.php', 'PersonSummary', 'person_summary');
	//end Logic hook for Participant Summary
	
	//Person to Participant conversion added by Gerry Rohling
	// position, file, function
	$hook_array['after_save'] = Array();
	$hook_array['after_save'][] = Array(1, 'notify', 'custom/modules/PLT_Participant/logic_hooks/PLT_ParticipantLH.php','PLT_ParticipantLH', 'PLT_ParticipantLHProcess'); 
	//end Logic hook for Person to Participant conversion 
?>
