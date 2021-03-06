<?php

/*
	National Children Study at UCI
	This PHP class is used to generate visit window event and prenancy visits.
*/

	if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	class PopulateEventInfo{

		/*
		*	Populate visit event info if the DOB of a NCS child is entered. Make sure we don't generate dupe entries for visit event info.	
		*   $bean = Person bean
		*/		
		function populate_visit_eventInfo(&$bean, $event, $arguments){
			
			require_once("custom/modules/PLT_Participant/PLT_Participant_Functions.php");			
			
			//check for dob 
			if(empty($bean->person_dob))				
			{			
				//echo "PERSON DOB is BLANK<BR>";
				return;
			}
			
			$ppf = new PLT_Participant_Functions();
			
			//get participant bean
			$ptInfo = $ppf->get_participantinfo_from_person($bean, true);										
									
			//If this participant/person is a NCS Child (p_type = 6), then auto-generate visit event info (3 month, 6 month, 9 month visits ....)
			if(!empty($ptInfo) && $ptInfo->p_type == "6")
			{									
				//Find the mom's participant record.
				$mom_id = null;			
				$foster_mom_id = null;
				$final_mom_id = null;
				
				$related_records = $ppf->get_related_person_list_info_from_participant($ptInfo, true, false);
						
				if(!empty($related_records))
				{
					foreach($related_records as $p_record)
					{						
						if(!empty($mom_id))
						{
							break;
						}								
							
						//found bio mom.
						if(!empty($p_record['person']) && !empty($p_record['participant']) && $p_record['person']['relation'] == "2" && $p_record['person']['is_rel_active'] == "1" && $p_record['participant']['enroll_status'] == "1")
						{
							$mom_id = $p_record['participant']['id'];
						}
						elseif(!empty($p_record['person']) && !empty($p_record['participant']) && $p_record['person']['relation'] == "3" && $p_record['person']['is_rel_active'] == "1")
						{						
							$foster_mom_id = $p_record['participant']['id'];							
						}else{}
					}				
				}
			
				//do not generate event info if bio mom && foster mom are not found.	
				if(empty($mom_id) && empty($foster_mom_id))
				{
					return;
				}
				
					$vw_arr = $ppf->get_visitwindow_datetime($bean->person_dob);						
															
					//Check to see if visit windows were generated. If not, auto-generate event info.					
				if(!empty($mom_id))
					$all_visit_events = $ppf->get_all_visitwindow_events_for_participant($mom_id);																
				else
					$all_visit_events = $ppf->get_all_visitwindow_events_for_participant($foster_mom_id);																	
												
					//****************************************************************************************	
					//Determine which events were generated, which are not, then generate missing events.	
					$missing_events_arr = array();
					$visit_keys = array_keys($vw_arr);
				
					if(empty($all_visit_events))
					{						
					//debug
					//echo "<b>All visit events missing</b><br>";					
						$missing_events_arr = $vw_arr;							
					}
					else
					{
						foreach($visit_keys as $index => $key)
						{
							if(!array_key_exists($key, $all_visit_events))
							{
								$missing_events_arr[$key] = $vw_arr[$key];
							}	
						}
					}
									
					//Generate events if needed.
					foreach($missing_events_arr as $event_type => $event_setting)
					{												
						$assigned_user_id = $ptInfo->assigned_user_id;
						$visit_window_starttime = $event_setting[0];
						$visit_window_endtime = $event_setting[1];								
						$event_disp_cat = $event_setting['event_disposition_cat'];						
													
					//Create and log event info.
					if(!empty($mom_id))
						$event_id = $ppf->insert_event_info($event_type, $event_disp_cat, $mom_id, $assigned_user_id, $visit_window_starttime, $visit_window_endtime, true);																							
					else
						$event_id = $ppf->insert_event_info($event_type, $event_disp_cat, $foster_mom_id, $assigned_user_id, $visit_window_starttime, $visit_window_endtime, true);																							
					}					
				}
			else
			{
				//debug
				//echo "<h4>NCS child didn't satisfy condidtions for auto-EV</h4>";
			}
		}


		
		/*
		* 	Need to figure out household information and schedule the interview with the right person/participants (not with a NCS Child)
		*   Populate IPI, SPI, Birth visit/Birth Interview. This function is called in logic_hooks.php under PTL_PrtcptCnsnt module.
		*/				
		function populate_pregnancy_interviews(&$bean, $event, $arguments)		
		{			
			//*****************************************************************************
			//Make sure to count the number of consent/general consents this participant have given before generating IPI, SPI.
			//Number of General Consent must be the same as number of PPG Detail records.
		
			require_once("custom/modules/PLT_Participant/PLT_Participant_Functions.php");
			require_once("ncs_framework/utils/DateTimeClass.php");

			$dtc = new DateTimeClass();
				
			$ppf = new PLT_Participant_Functions();
						
			$IPI_arr = $ppf->get_prenatal_event_setting("ipi", false);
			$SPI_arr = $ppf->get_prenatal_event_setting("spi", false);
			$BV_arr = $ppf->get_prenatal_event_setting("bv", false);						
				
							
			if(empty($IPI_arr) || empty($SPI_arr) || empty($BV_arr)) return false;		
						
			//For multiple Pregnancies (i.e There are multiple PPG records associated with this participant)
			// + A complete pregnancy should have a) general consent b) consent for child participant
			// + A miscarrige might happen, then the participant status becomes "Enrolled, pregnancy loss..." (participant status) stored in PPG Details. In this case
			//  	Consent for the child participant doesn't exist for this particular PPG.					
			
			//If the Participant Consent is "Genereal Consent", Consent Withdraw is NO, Consent Given = YES			
			if($bean->consent_type == "1" && $bean->consent_withdraw != "1" && $bean->consent_given == "1" && !empty($bean->field_name_map['plt_particitcptcnsnt_name']))
			{					
				//debug
				//echo "first pass";

			
				// relationship name in array is = plt_particilt_prtcptcnsnt ->		plt_participant_plt_prtcptcnsnt  (in db)		
				$participant_field_name = $bean->field_name_map['plt_particitcptcnsnt_name']['id_name'];				
				$ptid = $bean->$participant_field_name;
					
				//*********************************************************************
				$pt = new PLT_Participant();
				$pt->retrieve($ptid);
								
				//Check enroll status
				if($pt->enroll_status !=  "1")
				{
					return;
				}
				
				//$ppg_details = $ppf->get_participant_ppg_details($pt);
				$pcst = $ppf->get_participant_consents($pt);		
										
				if($ptid != "")
				{														
					//get person info associated with this participant.
					$person_info = $ppf->get_personinfo_from_participant($pt);
															
					//First the participant has to be female and 'Pregnant eligible'													
					if(is_array($person_info) && $person_info["sex"] == "2" && $pt->p_type == "3")
					{		
						//Get PPG records. Top record is the current ppg.
						$ppgs = $ppf->get_participant_ppg_details($pt);
				
						$num_of_pregnancies = count($ppgs);
						$num_of_miscarriage = 0;
						$num_of_ipi = 0;
						$num_of_completed_ipi = 0;
						$last_ipi_completed_date = '';
						$num_of_spi = 0;
						$num_of_bv = 0; //number of birth visits found.
						$due_date =  ''; //the due date of the current pregnancy.

						//For each ppg record, check for miscarriage if exist.
						for($i = 0; $i < $num_of_pregnancies; $i++)
						{						
							//found miscarriage (PPG PID Status = 'Enrolled pregnancy loss or stillbirth')
							if($ppgs[$i]["ppg_pid_status"] == "4")
							{
								//$num_of_complete_pregnancies = $num_of_complete_pregnancies - 1;
								$num_of_miscarriage += 1;
							}
							
							//figure out the right due date.
							$tmp_due_date = "";
							
							if(!empty($ppgs[$i]["due_date_3"]))
							{
								$tmp_due_date = $ppgs[$i]["due_date_3"];
							}
							elseif(!empty($ppgs[$i]["due_date_2"]))
							{
								$tmp_due_date = $ppgs[$i]["due_date_2"];
							}
							elseif(!empty($ppgs[$i]["orig_due_date"]))
							{
								$tmp_due_date = $ppgs[$i]["orig_due_date"];
							}
							else{}														
							
							if($tmp_due_date != "")
							{

								if($due_date = "")
									$due_date = $tmp_due_date;
								else
								{
									if($dtc->compare_dates($tmp_due_date, $due_date) > 0)
										$due_date = $tmp_due_date;
								}								
							}
						}
														
						//Get all pregnancy visit events.
						$pregnancy_visits = $ppf->get_pregnancy_visits_for_participant($pt);													
																		
						for($k = 0; $k < count($pregnancy_visits); $k++)
						{						
							if(trim($pregnancy_visits[$k]["event_type"]) == "13")   //Preg Visit 1
							{
								$num_of_ipi += 1;

								//************************* Problem found right here ************************************************
								//if(!empty($pregnancy_visits[$k]["event_end_date"]))
								if(!empty($pregnancy_visits[$k]["event_end_date_time"]))								
								{
									$num_of_completed_ipi += 1;
									
									//first time populating last_ipi_completed_date
									//if($pregnancy_visits[$k]["event_end_date"] == "")
									if($pregnancy_visits[$k]["event_end_date_time"] == "")
										$last_ipi_completed_date = $pregnancy_visits[$k]["event_end_date_time"];
									else
									{										
										if($dtc->compare_dates($pregnancy_visits[$k]["event_end_date_time"], $last_ipi_completed_date) > 0 )
										{
											$last_ipi_completed_date = $pregnancy_visits[$k]["event_end_date_time"];
										}										
									}			
								}
							}
							elseif($pregnancy_visits[$k]["event_type"] == "15")  //Preg Visit 2
								$num_of_spi += 1;
							elseif($pregnancy_visits[$k]["event_type"] == "18")  //Birth Visit
								$num_of_bv += 1;
							else{}										
						}
									
						if($num_of_ipi < $num_of_pregnancies)
						{
							//only generate IPI if due date exist.
							if(!empty($due_date))
							{
							$event_type = $IPI_arr[0]['event_type_code'];
							$assigned_user_id = $pinfo["assigned_user_id"];
								
							$event_disp_cat = $IPI_arr[0]['event_disposition_cat'];
								
							//Visit window starttime = current date time.
							$visit_window_starttime = date("Y-m-d");
																
							if(!empty($visit_window_starttime))
								$visit_window_endtime = date("Y-m-d", strtotime("+30 days", strtotime($visit_window_starttime)));
																				
							if(!empty($visit_window_endtime ))			
							$event_id = $ppf->insert_event_info($event_type, $event_disp_cat, $ptid, $assigned_user_id, $visit_window_starttime, $visit_window_endtime, true);																
						}
						
						}
						//******** Generate SPI. Check if IPI was completed or not.
						if($num_of_spi < $num_of_pregnancies - $num_of_miscarriage)
						{
							if($num_of_completed_ipi == $num_of_pregnancies)
							{
								//Generate SPI
								//$event_type = constant("PLT_Participant_Functions::CSPI");							
								$event_type = $SPI_arr[0]['event_type_code'];
								$assigned_user_id = $pinfo["assigned_user_id"];
								
								$spi_time_frame = $SPI_arr[0]['spi_time_frame'];
								
								//visit window starttime = IPI's end date + 60 days
								//$visit_window_starttime = date("Y-m-d", strtotime("+60 days", strtotime($last_ipi_completed_date)));
								$visit_window_starttime = date("Y-m-d", strtotime("+".$spi_time_frame." days", strtotime($last_ipi_completed_date)));
																								
								//visit window endtime = child's date of birth (CDOB)
								$visit_window_endtime = date("Y-m-d", strtotime($due_date));
									
								//$event_disp_cat = "3";
								$event_disp_cat = $SPI_arr[0]['event_disposition_cat'];
																	
								$event_id = $ppf->insert_event_info($event_type, $event_disp_cat, $ptid, $assigned_user_id, $visit_window_starttime, $visit_window_endtime, true);																																
							}							
						}
						
						//********** Generate Birth Visit (BV)						
						if($num_of_bv < $num_of_pregnancies - $num_of_miscarriage)
						{																					
							//$event_type = constant("PLT_Participant_Functions::CBIRTH_VISIT");							
							$event_type = $BV_arr[0]['event_type_code'];
							$assigned_user_id = $pinfo["assigned_user_id"];
							
							$bv_time_frame = $BV_arr[0]['bv_time_frame'];
							
							//start time = CDOB
							$visit_window_starttime = date("Y-m-d", strtotime($due_date));
							
							//visit window endtime = CDOB + 30 days
							//$visit_window_endtime = date("Y-m-d", strtotime("+30 days", strtotime($due_date)));																																					
							$visit_window_endtime = date("Y-m-d", strtotime("+".$bv_time_frame." days", strtotime($due_date)));																																					
							
							//$event_disp_cat = "3";
							$event_disp_cat = $BV_arr[0]['event_disposition_cat'];
							
							$event_id = $ppf->insert_event_info($event_type, $event_disp_cat, $ptid, $assigned_user_id, $visit_window_starttime, $visit_window_endtime, true);																														
						}
																																				
						//Check to see if events (ipi, spi, and "consent for the child participant") were generated.											
					}
				}
				else
				{
					//debug
					//echo "participant id not found";
				}						
			}													
		}
	}
?>
