<?php


array_push($job_strings, 'autoGenerateEventInfo'); 
array_push($job_strings, 'autoGeneratePIEventInfo'); 
	

/*
*	Custom job to generate 3 month, 6 month, 9 month, 12 month visit event info.
*/
function autoGenerateEventInfo()
{
	$GLOBALS['log']->info('----->Scheduler job of autoGenerateEventInfo()');
	
	require_once("custom/modules/PLT_Participant/PLT_Participant_Functions.php");
	require_once("custom/modules/PLT_Person/PopulateEventInfo.php");
	
	require_once("modules/PLT_Participant/PLT_Participant.php");
	require_once("modules/PLT_Person/PLT_Person.php");
	
	$ppf = new PLT_Participant_Functions();		
	$pvi = new PopulateEventInfo();		
			
	$query = "SELECT * FROM plt_participant where deleted=0";		
	$result = $GLOBALS['db']->query($query);
					
	while($row = $GLOBALS['db']->fetchByAssoc($result))
	{
		//found NCS Child             		
		if($row["p_type"] == "6")
		{
			$pt = new PLT_Participant();
			$pt->retrieve($row['id']);
			$pinfo = $ppf->get_personinfo_from_participant($pt);	

			if(!empty($pinfo) && $pinfo['deceased'] != "1" && !empty($pinfo['person_dob']))
			{
				$person_bean = new PLT_Person();
				$person_bean->retrieve($pinfo['id']);
				$pvi->populate_visit_eventInfo($person_bean, "", "");								
			}	
		}
	}		
			
	return true;
}


/*
*	Custom job to create IPI, SPI and BirthVisit event info.
*/
function autoGeneratePIEventInfo()
{
	$GLOBALS['log']->info('----->Scheduler job of autoGeneratePIEventInfo()');
	
	require_once("custom/modules/PLT_Person/PopulateEventInfo.php");
		
	//$ppf = new PLT_Participant_Functions();		
	$pvi = new PopulateEventInfo();		
		
	require_once("modules/PLT_PrtcptCnsnt/PLT_PrtcptCnsnt.php");
		
	//Get all general consents that are given by participants.
	$query = "SELECT id FROM plt_prtcptcnsnt where consent_type='1' AND consent_given='1' AND deleted=0";		
	$result = $GLOBALS['db']->query($query);
					
	while($row = $GLOBALS['db']->fetchByAssoc($result))
	{		
		$prtCnsnt = new PLT_PrtcptCnsnt();
		$prtCnsnt->retrieve($row['id']);
		$pvi->populate_pregnancy_interviews($prtCnsnt, "", "");
	}
			
	return true;
}


?>