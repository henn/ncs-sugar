<?PHP
/*
	National Children Study at UCI
	Functions to manipulate participant's record.
*/

require_once("ncs_framework/utils/DateTimeClass.php");

class PLT_Participant_Functions extends SugarBean {

	const C3M_VISIT = '23';
	const C6M_VISIT = '24';
	const C9M_VISIT = '26';
	const C12M_VISIT = '27';	

	// 18 and 24 month visits are not defined yet by the Program Office.	
	//const C18M_VISIT = '30';  
	//const C24M_VISIT = '31';  

	//Birth Visit Events
	const CBIRTH_VISIT = '18'; 
	const CIPI = '13';  //Pregnancy Visit 1
	const CSPI = '15';  //Pregnancy Visit 2
		
	function PLT_Participant_Functions(){	
		parent::SugarBean();
	}

	
	/*
	*	Return a person info associated with the participant (with ptid)
	*	$bean = participant bean	
	*/
	function get_personinfo_from_participant($bean)
	{		
		$linkage_id;	
		$person_info_arr = array();	
		$load_result = $bean->load_relationship("plt_lkprsprlt_participant");
		
		if($load_result)
		{	
			$query_array = $bean->plt_lkprsprlt_participant->getQuery($return_as_array=true);
			$query_array['select'] = "SELECT plt_lkprsprtcpt.*";	
			$query = implode(" ", $query_array);						
			$result = $bean->db->query($query);		
		
			while($row = $bean->db->fetchByAssoc($result))
			{
				if($row['relation'] == "1")
				{
					$linkage_id = $row['id'];
					break;
				}
			}			
			@mysql_free_result($result);		
		
			if(!empty($linkage_id))
			{			
				require_once("modules/PLT_LkPrsPrtcpt/PLT_LkPrsPrtcpt.php");
				
				$pp_linkage = new PLT_LkPrsPrtcpt();
				$pp_linkage->id = $linkage_id;	
				
				//[plt_lkprsprcpt_plt_person] => plt_lkprsprtcpt_plt_person				
				$load_result2 = $pp_linkage->load_relationship('plt_lkprsprcpt_plt_person');
				
				if($load_result2)
				{
					$query_array2 = $pp_linkage->plt_lkprsprcpt_plt_person->getQuery($return_as_array=true); 														
					$query_array2['select'] = "SELECT plt_person.*";	
					$query2 = implode(" ", $query_array2);
					
					$result2 = $bean->db->query($query2);
					
					if($result2)
					{
						$row = $bean->db->fetchByAssoc($result2);						
						if(!empty($row))
						{
							$person_info_arr = $row;
						}
					}					
				}												
			}					
		}								
		return $person_info_arr;
	}
	
	
	
	/*
	*	Return a list of all person(s) associated with this participant
	*	$bean = participant bean	
	*	NOTE: person-participant linkage is person centric. *********************
	*/
	function get_person_list_from_participant($bean)
	{
		require_once("modules/PLT_LkPrsPrtcpt/PLT_LkPrsPrtcpt.php");
		$linkage_id;
	
		$person_list = array();
		//[plt_lkprsprlt_participant] => plt_lkprsprtcpt_plt_participant
	
		$load_result = $bean->load_relationship("plt_lkprsprlt_participant");
		
		if($load_result)
		{	
			$query_array = $bean->plt_lkprsprlt_participant->getQuery($return_as_array=true);
			$query_array['select'] = "SELECT plt_lkprsprtcpt.*";	
			$query = implode(" ", $query_array);						
			$result = $bean->db->query($query);		
		
			while($row = $bean->db->fetchByAssoc($result))
			{
				$linkage_id = $row['id'];
				
				if(!empty($linkage_id))
				{													
					$pp_linkage = new PLT_LkPrsPrtcpt();
					$pp_linkage->id = $linkage_id;	
					
					//[plt_lkprsprcpt_plt_person] => plt_lkprsprtcpt_plt_person				
					$load_result2 = $pp_linkage->load_relationship('plt_lkprsprcpt_plt_person');
					
					if($load_result2)
					{
						$query_array2 = $pp_linkage->plt_lkprsprcpt_plt_person->getQuery($return_as_array=true); 				
												
						$query_array2['select'] = "SELECT plt_person.*";	
						$query2 = implode(" ", $query_array2);
												
						$result2 = $bean->db->query($query2);
						
						if($result2)
						{
							$row2 = $bean->db->fetchByAssoc($result2);						
							if(!empty($row2))
							{
								$row2['relation'] = $row['relation'];
								$row2['relation_oth'] = $row['relation_oth'];
								$person_list[] = $row2;									
							}
						}					
					}												
				}													
			}			
			@mysql_free_result($result);				
		}						
		
		return $person_list;
	}	
	
	
	/*  *********************************************** FOR SUMMARY ******************************
	*	Return a list records that are related to this participant. 
	* 	Related records include
	*		+ list of person records associated with their participant info and event info.
	*	$bean = participant bean	
	*	NOTE: person-participant linkage is person centric. *********************
	*/
	function get_related_person_list_info_from_participant($bean, $get_participant_records=true, $get_event_info=true)
	{	
		require_once("modules/PLT_LkPrsPrtcpt/PLT_LkPrsPrtcpt.php");
		require_once("modules/PLT_Person/PLT_Person.php");
		
		$linkage_id;
		$counter = 0;	
		$person_list = array();
		
		$load_result = $bean->load_relationship("plt_lkprsprlt_participant");
		
		if($load_result)
		{	
			$query_array = $bean->plt_lkprsprlt_participant->getQuery($return_as_array=true);
			$query_array['select'] = "SELECT plt_lkprsprtcpt.*";	
			$query = implode(" ", $query_array);						
			$result = $bean->db->query($query);		
										
			while($row = $bean->db->fetchByAssoc($result))
			{			
				$linkage_id = $row['id'];
				
				if(!empty($linkage_id))
				{													
					$pp_linkage = new PLT_LkPrsPrtcpt();
					$pp_linkage->id = $linkage_id;	
					
					//[plt_lkprsprcpt_plt_person] => plt_lkprsprtcpt_plt_person				
					$load_result2 = $pp_linkage->load_relationship('plt_lkprsprcpt_plt_person');
					
					if($load_result2)
					{
						$query_array2 = $pp_linkage->plt_lkprsprcpt_plt_person->getQuery($return_as_array=true); 				
												
						$query_array2['select'] = "SELECT plt_person.*";	
						$query2 = implode(" ", $query_array2);
																												
						$result2 = $bean->db->query($query2);
						
						if($result2)
						{
							$row2 = $bean->db->fetchByAssoc($result2);	

							if(!empty($row2))
							{
								$row2['relation'] = $row['relation'];
								$row2['relation_oth'] = $row['relation_oth'];								
								$person_list[$counter]['person'] = $row2;									
																
								if($get_participant_records)
								{		
								
									//echo "<font size='+5' color='red'>GET PART RECORD</font><br>";
								
									//get participant info associated with the retrieved person if exists.							
									$person = new PLT_Person();
									$person->id = $row2['id'];								
									$participant_record = $this->get_participantinfo_from_person($person);																
																																													
									$person_list[$counter]['participant'] = $participant_record;
									
									//get event info for this person/participant if there are any.
									if(!empty($participant_record) && $get_event_info)
									{
										$event_info_records = $this->get_all_visitwindow_events_for_participant($participant_record['id']);
										$person_list[$counter]['eventinfo'] = $event_info_records;									
									}
									else
									{
										$person_list[$counter]['eventinfo'] = array();
									}
								}		

								$counter++;
							}//end if(!empty(row2))
						}					
					}												
				}
				//$counter++;
				
			}//end while
			
			@mysql_free_result($result);				
		}						
		return $person_list;
	}	
		
			
	//Returns an associative array that contains the participant info given a person id. (guid) 	
	//Returns an empty array if no record found.
	function get_participantinfo_from_person(&$person_bean)
	{			
		$participant_info_array = array();
		$linkage_id = "";
		$load_result = $person_bean->load_relationship('plt_lkprsprcpt_plt_person');
		
		if($load_result)
		{	
			//debug
			//echo "load rel OK";		
		
			$query_array = $person_bean->plt_lkprsprcpt_plt_person->getQuery($return_as_array=true);
			$query_array['select'] = "SELECT plt_lkprsprtcpt.*";	
			$query = implode(" ", $query_array);						
			$result = $GLOBALS['db']->query($query);				
						
			while($row = $person_bean->db->fetchByAssoc($result))
			{
				if($row['relation'] == "1")
				{
					$linkage_id = $row['id'];
					
					//debug
					//echo "<BR>".$linkage_id."<BR>";
					
					break;
				}
			}			
			@mysql_free_result($result);
			
			if(!empty($linkage_id))
			{			
				require_once("modules/PLT_LkPrsPrtcpt/PLT_LkPrsPrtcpt.php");
				
				$pp_linkage = new PLT_LkPrsPrtcpt();
				$pp_linkage->id = $linkage_id;				
				$load_result2 = $pp_linkage->load_relationship('plt_lkprsprlt_participant');
				
				if($load_result2)
				{
				
					$query_array2 = $pp_linkage->plt_lkprsprlt_participant->getQuery($return_as_array=true); 				
					$query_array2['select'] = "SELECT plt_participant.*";	
					$query2 = implode(" ", $query_array2);													
					$result2 = $GLOBALS['db']->query($query2);
						
					if($result2)
					{
						$participant_info_array = $pp_linkage->db->fetchByAssoc($result2);
						@mysql_free_result($result2);
					}									
				}												
			}
		}
		return $participant_info_array;
	}	
	
	
	//Returns a list of existing active (not deleted) event info associated with the given participant (guid)
	function get_all_visitwindow_events_for_participant($ptid)
	{	
		$all_visit_events = array();
		$pt = new PLT_Participant();
		$pt->id = $ptid;
	
		$load_result = $pt->load_relationship("ncsdc_eventlt_participant");
	
		if($load_result)
		{
			$query_array = $pt->ncsdc_eventlt_participant->getQuery($return_as_array=true);				
			$query_array['select'] = "SELECT ncsdc_eventinfo.*";
			$query = implode(" ", $query_array);
												
			$result = $GLOBALS['db']->query($query);
			
			while($row = $GLOBALS['db']->fetchByAssoc($result)) {	
				
				switch($row["event_type"])
				{								
					case $this::C3M_VISIT:
					case $this::C6M_VISIT:
					case $this::C9M_VISIT:
					case $this::C12M_VISIT:
					 					 
					case $this::CBIRTH_VISIT:
					case $this::CIPI:
					case $this::CSPI:
										 
					 //case $this::C18M_VISIT:
					 //case $this::C24M_VISIT:	
					 
						$all_visit_events[$row["event_type"]] = $row;
						break;
				}												
			}																		
		}						
		return $all_visit_events;		
	}

	
	//Returns a list of existing active (not deleted) event info associated with the given participant (guid)
	//$bean = participant bean
	function get_pregnancy_visits_for_participant(&$bean)
	{	
		$all_visit_events = array();

		//look at this relationship
		//	ncsdc_eventlt_participant ==> ncsdc_eventinfo_plt_participant
	
		$load_result = $bean->load_relationship("ncsdc_eventlt_participant");
				
		if($load_result)
		{	
			$query_array = $bean->ncsdc_eventlt_participant->getQuery($return_as_array=true);			
			$query_array['select'] = "SELECT ncsdc_eventinfo.*";	
			$query = implode(" ", $query_array);						
			$result = $bean->db->query($query);				
			
			while($row = $bean->db->fetchByAssoc($result))
			{
				if($row['event_type'] == $this::CBIRTH_VISIT || $row['event_type'] == $this::CIPI || $row['event_type'] == $this::CSPI)
				{
					$all_visit_events[] = $row;
				}											
			}
		}	
		return $all_visit_events;
	}
	
	
	
	//***********************************************************************************
	//$ptid = participant_id
	//function insert_event_info($event_param_array)  //USE an array of param would be a better method.		
	function insert_event_info($event_type, $event_disp_cat, $ptid, $assigned_user_id, $visit_window_starttime, $visit_window_endtime, $log_event=false)	
	{		
		require_once("modules/NCSDC_EventInfo/NCSDC_EventInfo.php");
		
		$ev = new NCSDC_EventInfo();	
								
		$ev->date_entered = date("Y-m-d H:i:s");
		$ev->date_modified = date("Y-m-d H:i:s");
		$ev->modified_user_id = 1;  //admin user is 1
		$ev->created_by = 1;  //admin user
		$ev->description = 'auto-generated event info.';
		$ev->deleted = 0;
		$ev->assigned_user_id = $assigned_user_id;
		$ev->event_disp_cat = $event_disp_cat;
		$ev->event_breakoff = 1;
		$ev->event_comment = 'This is an auto-generated event info.';
		$ev->event_type = $event_type;
		$ev->visit_window_starttime_c = $visit_window_starttime;
		$ev->visit_window_endtime_c = $visit_window_endtime;				
		$ev->event_incentive_type = "4";
				
		$participant_ida = $ev->field_name_map['ncsdc_eventrticipant_name']['id_name'];
		$ev->$participant_ida = $ptid;																							
		$event_guid = $ev->save();
		
		//Log the auto-generated event.
		if($log_event)
		{
			$query = "INSERT INTO auto_event_log(event_guid, date_created, participant_id)
					  VALUES('".$event_guid."', now(), '".$ptid."')";
			$r = $ev->db->query($query);
		}
	
		return $event_guid;
	}
			
	
	//Return a list of date time (visit_window_start time and visit window end time) for all events (birth_visit, 3 month visit, 6 month visit, 9, 12, 18, and 24 ...)
	function get_visitwindow_datetime($dob)
	{			
		$dtc = new DateTimeClass();
	
		//visit window array contains the list of visit dates.
		$vw_arr = array();			
	
		//9 am = 15;
		//Birth Visit
		//$vw_arr[$this::CBIRTH_VISIT] = array($this->add_date_to_date($dob, 10, 15), $this->add_date_to_date($dob, 10, 20));
		
		//3 Month visit
		$vw_arr[$this::C3M_VISIT] = array($dtc->add_month_to_date($dob,2), $dtc->add_month_to_date($dob,4));

		//6 Month visit
		$vw_arr[$this::C6M_VISIT] = array($dtc->add_month_to_date($dob,5), $dtc->add_month_to_date($dob,7));
		
		//9 Month visit
		$vw_arr[$this::C9M_VISIT] = array($dtc->add_month_to_date($dob,8), $dtc->add_month_to_date($dob,10));

		//12 Month visit
		$vw_arr[$this::C12M_VISIT] = array($dtc->add_month_to_date($dob,11), $dtc->add_month_to_date($dob,15));

		//18 Month visit
		//$vw_arr[$this::C18M_VISIT] = array($dtc->add_month_to_date($dob,16, 1), $dtc->add_month_to_date($dob,22, 17));
				
		//24 Month visit
		//$vw_arr[$this::C24M_VISIT] = array($dtc->add_month_to_date($dob,23, 1), $dtc->add_month_to_date($dob,28, 17));
				
		return $vw_arr;
	}
			
	
	
	/*
	*	Return a list that contains a participant's ppg details or empty array if record is not found.
	*   $bean = participant's bean
	*/
	function get_participant_ppg_details(&$bean)
	{	
		//from participant bean, look at this relationship "plt_participlt_ppgdetails" => plt_participant_plt_ppgdetails
		$ppg_details_arr = array();	
		$load_result = $bean->load_relationship("plt_participlt_ppgdetails");
				
		if($load_result)
		{
			$query_array = $bean->plt_participlt_ppgdetails->getQuery($return_as_array=true);
			
			if(!empty($query_array))
			{
				$query_array['select'] = "SELECT plt_ppgdetails.*";
				$query = implode(" ", $query_array);												
				$result = $bean->db->query($query);
			
				while($row = $bean->db->fetchByAssoc($result))
				{
					$ppg_details_arr[] = $row;
				}			
			}						
		}							
		return $ppg_details_arr;						
	}	
		
	
	//Get a participant consent record given a participant record.
	//$bean = participant's bean
	function get_participant_consents(&$bean)
	{
		//look at this relationship "plt_particilt_prtcptcnsnt"=>plt_participant_plt_prtcptcnsnt
		//for participant - eventinfo relationship: look at  [ncsdc_eventlt_participant] =>ncsdc_eventinfo_plt_participant 				
		$pc_array = array(); 
	
		$load_result = $bean->load_relationship("plt_particilt_prtcptcnsnt");
		
		if($load_result)
		{
			$query_array = $bean->plt_particilt_prtcptcnsnt->getQuery($return_as_array=true);
			
			if(!empty($query_array))
			{			
				$query_array['select'] = "SELECT plt_prtcptcnsnt.*";
				$query = implode(" ", $query_array);			
				
				$result = $bean->db->query($query);
			
				while($row = $bean->db->fetchByAssoc($result))
				{
					$pc_array[] = $row;
				}									
			}
		}		
		return $pc_array;			
	}	
		
}
?>