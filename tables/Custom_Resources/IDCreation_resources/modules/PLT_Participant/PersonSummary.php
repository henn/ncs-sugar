<?php

/*
	National Children Study at UCI
	This class is used for quick summary page in a participant record.
*/

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


class PersonSummary{

	function person_summary(&$bean, $event, $arguments)
	{			
		require_once("custom/modules/PLT_Participant/PLT_Participant_Functions.php");
			
		$ppf = new PLT_Participant_Functions();			
		$ppl = $ppf->get_related_person_list_info_from_participant($bean);
				
		$this_participant_html = "";
		$other_persons_html = "";
				
		
		if(!empty($ppl))
		{
			for($i = 0; $i < count($ppl); $i++)
			{
				//Participant/self
				if($ppl[$i]['person']['relation'] == "1")
				{					
					$this_participant_html .= $this->get_full_person_summary($ppl[$i]['person'], $ppl[$i]['participant'], $ppl[$i]['eventinfo']); 					
				}	
				else
				{
					$other_persons_html .= $this->get_full_person_summary($ppl[$i]['person'], $ppl[$i]['participant'], $ppl[$i]['eventinfo']); 
					$other_persons_html .= "<br/><br/>";
				}
			}											
		}
						
		if(!empty($this_participant_html))
			$bean->person_info_c .= $this_participant_html;
										
		if(!empty($other_persons_html))
		{
			$bean->person_info_c .= "<br><b>OTHER PERSON(S) RELATED TO THIS PARTICIPANT</b><br>";
			$bean->person_info_c .= $other_persons_html;
		}				
	}	
	
	
	/*
	*	get_full_person_summary(): return a html string contains a full summary of a person including
	*	person record, participant record associated with this person (if exists), and event info list (if exists)
	*/
	function get_full_person_summary($person_record, $participant_record=array(), $event_info_list=array())
	{
		$full_summary = "";
		
		if(empty($person_record)) return "";
	
		$full_summary .= "<table style='width:1000px;background-color:#ffffff'><tr>";
		
		$full_summary .= "<td style='width:350px'>".$this->get_person_html($person_record)."</td>";
		
		if(!empty($participant_record))
			$full_summary .= "<td style='width:350px'>".$this->get_participant_html_summary($participant_record)."</td>";
		
		if(!empty($event_info_list))
			$full_summary .= "<td>".$this->get_eventinfo_html($event_info_list)."</td>";
		else
			$full_summary .= "<td>&nbsp;</td>";
		
		$full_summary .= "</tr></table>";
		
		return $full_summary;
	}	
	
	
	/*
	*	Returns a html string contains a quick summary of a person given a person record.
	*/
	function get_person_html($person_record)
	{	
		global $app_list_strings;	
		$person_summary = "";
				
		if(empty($person_record)) return "";		
	
		//Drop down list
		$ethnicity_dropdown = $app_list_strings["ETHNICITY_CL1"]; 		
		$gender_dropdown = $app_list_strings["GENDER_CL1"];			
		$person_language_dropdown = $app_list_strings["LANGUAGE_CL2"];			
		$martial_status_dropdown = $app_list_strings["MARITAL_STATUS_CL1"];	
		$preferred_contact_dropdown = $app_list_strings["CONTACT_TYPE_CL1"];
		$person_information_source = $app_list_strings["INFORMATION_SOURCE_CL4"];
		$pp_relation_dropdown = $app_list_strings["PERSON_PARTCPNT_RELTNSHP_CL1"]; //person participant relation drop down 
					
		//Link to view this person record.	 $person_record["name"]
		$person_link = "<a href='http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']."?module=PLT_Person&action=DetailView&record=".$person_record["id"]."'>".$person_record["name"]."</a>";	
			
		$person_edit_link = "<a href='http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']."?module=PLT_Person&action=EditView&record=".$person_record["id"]."'>Edit</a>";		
												
		$person_summary .= "<table class='q_summary'>";
		$person_summary .= "<tr><td width='30%'>Person ID</td><td>".$person_link."&nbsp;&nbsp;&nbsp;".$person_edit_link."</td></tr>";		
		$person_summary .= "<tr><td>First Name</td><td>".$person_record["first_name"]."</td></tr>";		
		$person_summary .= "<tr><td>Last Name</td><td>".$person_record["last_name"]."</td></tr>";		

		if(!empty($person_record["sex"]))
			$person_summary .= "<tr><td>Gender</td><td>".$gender_dropdown[$person_record["sex"]]."</td></tr>";		
		else
			$person_summary .= "<tr><td>Gender</td><td></td></tr>";		
			
		if(!empty($person_record["relation"]))
			$person_summary .= "<tr><td>Relation</td><td nowrap='nowrap'>".$pp_relation_dropdown[$person_record["relation"]]."</td></tr>";		
		else			
			$person_summary .= "<tr><td>Relation</td><td></td></tr>";		
		
		if(!empty($person_record["person_dob"]))
			$person_summary .= "<tr><td>DOB</td><td>".date("m/d/Y", strtotime($person_record["person_dob"]))."</td></tr>";	
		else
			$person_summary .= "<tr><td>DOB</td><td></td></tr>";	
		
		if(!empty($person_record["ethnic_group"]))
			$person_summary .= "<tr><td>Ethnicity</td><td>".$ethnicity_dropdown[$person_record["ethnic_group"]]."</td></tr>";				
		else
			$person_summary .= "<tr><td>Ethnicity</td><td></td></tr>";				
		
		
		if(!empty($person_record["person_lang_other"]))
			$person_summary .= "<tr><td nowrap='nowrap'>Person Language Other</td><td>".$person_record["person_lang_other"]."</td></tr>";				
		elseif(!empty($person_record["person_lang"]))
			$person_summary .= "<tr><td nowrap='nowrap'>Person Language</td><td>".$person_language_dropdown[$person_record["person_lang"]]."</td></tr>";				
		else
			$person_summary .= "<tr><td>Person Language</td><td></td></tr>";				
			
		
		if($person_record["maristat_oth"] != "")
			$person_summary .= "<tr><td>Martial Status Other</td><td>".$person_record["maristat_oth"]."</td></tr>";
		else
			$person_summary .= "<tr><td>Martial Status</td><td>".$martial_status_dropdown[$person_record["maristat"]]."</td></tr>";
												
		if(!empty($person_record["pref_contact"]))			
			$person_summary .= "<tr><td>Preferred Contact</td><td>".$preferred_contact_dropdown[$person_record["pref_contact"]]."</td></tr>";						
		else
			$person_summary .= "<tr><td>Preferred Contact</td><td></td></tr>";						
						
		//Person Information Source				
		if(!empty($person_record["p_info_source_oth"]))
			$person_summary .= "<tr><td nowrap='nowrap'>Person Information Source Other</td><td nowrap='nowrap'>".$person_record["p_info_source_oth"]."</td></tr>";												
		elseif(!empty($person_record["p_info_source"]))				
			$person_summary .= "<tr><td nowrap='nowrap'>Person Information Source</td><td nowrap='nowrap'>".$person_information_source[$person_record["p_info_source"]]."</td></tr>";										
		else
			$person_summary .= "<tr><td>Person Information Source</td><td></td></tr>";										
							
		//Person Information Date
		if(!empty($person_record["p_info_date"]))
			$person_summary .= "<tr><td>Person Information Date</td><td>".date("m/d/Y", strtotime($person_record["p_info_date"]))."</td></tr>";													
		else
			$person_summary .= "<tr><td>Person Information Date</td><td></td></tr>";																					
				
		$person_summary .= "<tr><td valign='top'>Person Comment</td><td>".$person_record["person_comment"]."</td></tr>";
		$person_summary .= "</table>";
				
		return $person_summary;
	}

	/*
	*	get_participant_html_summary(): return a html string contains a participant record.
	*	$participant_record = a sql record for a participant retrieving from plt_participant table.
	*/
	function get_participant_html_summary($participant_record)
	{
		global $app_list_strings;
		
		$p_type_dropdown = $app_list_strings['PARTICIPANT_TYPE_CL1'];
		$p_status_info_source_dropdown = $app_list_strings['INFORMATION_SOURCE_CL4'];
		$p_enroll_status_dropdown = $app_list_strings['CONFIRM_TYPE_CL2'];
		$p_id_entry_dropdown = $app_list_strings['STUDY_ENTRY_METHOD_CL1'];
				
		$p_html = "";
		
		if(empty($participant_record)) return "";	
		
		$participant_detailview_link = "<a href='http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']."?module=PLT_Participant&action=DetailView&record=".$participant_record["id"]."'>".$participant_record["name"]."</a>";
		$participant_editview_link = "<a href='http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']."?module=PLT_Participant&action=EditView&record=".$participant_record["id"]."'>Edit</a>";
		
		//Begin html string generation.										
		$p_html .= "<table>";				
		$p_html .= "<tr><td>Participant ID</td><td>".$participant_detailview_link."&nbsp;&nbsp;&nbsp;".$participant_editview_link."</td></tr>";	
						
		if(!empty($participant_record["p_type"]))
			$p_html .= "<tr><td nowrap='nowrap'>Participant Type</td><td nowrap='nowrap'>".$p_type_dropdown[$participant_record["p_type"]]."</td></tr>";												
		else
			$p_html .= "<tr><td nowrap='nowrap'>Participant Type</td><td nowrap='nowrap'>".$participant_record["p_type_oth"]."</td></tr>";												
				
		if(!empty($participant_record["status_info_source"]))
			$p_html .= "<tr><td nowrap='nowrap'>Status Information Source</td><td nowrap='nowrap'>".$p_status_info_source_dropdown[$participant_record["status_info_source"]]."</td></tr>";												
		else
			$p_html .= "<tr><td nowrap='nowrap'>Status Information Source</td><td nowrap='nowrap'>".$participant_record["status_info_source_oth"]."</td></tr>";												
				
		$p_html .= "<tr><td nowrap='nowrap'>Status Information Date</td><td>".$participant_record["status_info_date"]."</td></tr>";	
				
		if(!empty($participant_record["enroll_status"]))
			$p_html .= "<tr><td>Enroll Status</td><td nowrap='nowrap'>".$p_enroll_status_dropdown[$participant_record["enroll_status"]]."</td></tr>";														
				
		if(!empty($participant_record["pid_entry"]))
			$p_html .= "<tr><td nowrap='nowrap'>PID Entry</td><td nowrap='nowrap'>".$p_id_entry_dropdown[$participant_record["pid_entry"]]."</td></tr>";
		else
			$p_html .= "<tr><td nowrap='nowrap'>PID Entry</td><td nowrap='nowrap'>".$participant_record["pid_entry_other"]."</td></tr>";
			
		$p_html .= "</table>";
	
		return $p_html;
	}
	
	/*
	*	 get_eventinfo_html(): returns html string contains event info list for a participant.
	*/
	function get_eventinfo_html($event_info_list)
	{
		global $app_list_strings;
		
		$event_type_dropdown = $app_list_strings['EVENT_TYPE_CL1'];
		
		$eventinfo_html = "";
		
		if(empty($event_info_list)) return "";
		
		$eventinfo_html .= "<table width='300px'>";
		$eventinfo_html .= "<tr><th nowrap='nowrap'>Event Name</th><th nowrap='nowrap'>Event Type</th><th nowrap='nowrap'>Start Date</th><th nowrap='nowrap'>End Date</th></tr>";
		
		foreach($event_info_list as $event)
		{
			$event_start_date = "";
			$event_end_date = "";
			
			if(!empty($event["event_start_date"]))
				$event_start_date = date("m/d/Y", strtotime($event["event_start_date"]));
				
			if(!empty($event["event_end_date"]))
				$event_end_date = date("m/d/Y", strtotime($event["event_end_date"]));				
				
			$event_link = "<a href='http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']."?module=NCSDC_EventInfo&action=DetailView&record=".$event["id"]."'>".$event["name"]."</a>";
			
			$eventinfo_html .= "<tr><td>".$event_link."</td><td>".$event_type_dropdown[$event['event_type']]."</td><td>".$event_start_date."</td><td>".$event_end_date."</td></tr>";
		}
		
		$eventinfo_html .= "</table>";
		
		return $eventinfo_html;	
	}
	
}


?>