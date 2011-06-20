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
			
			$ppf = new PLT_Participant_Functions();
			
			$ptInfo = $ppf->get_participantinfo_from_person($bean);										
									
			//If this participant/person is a NCS Child (p_type = 6), then auto-generate Birth Visit Event info.
			if(is_array($ptInfo) && $ptInfo["p_type"] == 6)
			{		
				//parent participant ids.
			
				if($bean->person_dob != "")				
				{								
					//Check to see if visit windows were generated. If not, auto-generate event info.	
					$all_visit_events = $ppf->get_all_visitwindow_events_for_participant($ptInfo["id"]);																
												
					if(!empty($all_visit_events) && count($all_visit_events) > 0)
					{
						//echo "<font color='red' size='+5'>Found events. No need to generate visit events for participant [".$ptInfo['id']."]</font>";
					}
					else
					{								
						$vw_arr = $ppf->get_visitwindow_datetime($bean->person_dob);						
																				
						if(!empty($vw_arr) && count($vw_arr))
						{												
							$visit_keys = array_keys($vw_arr);
																								
							for($i = 0; $i < count($visit_keys);$i++)
							{
								$event_type = $visit_keys[$i]; 
								
								//NCS child participant id.
								$ptid = $ptInfo["id"];																	
								
								$assigned_user_id = $ptInfo["assigned_user_id"];
								$visit_window_starttime = $vw_arr[$visit_keys[$i]][0];
								$visit_window_endtime = $vw_arr[$visit_keys[$i]][1];;	
								$event_disp_cat = "2";    //Pregnancy Screening Events
																	
								//Log in auto_event_log file.
								$event_id = $ppf->insert_event_info($event_type, $event_disp_cat, $ptid, $assigned_user_id, $visit_window_starttime, $visit_window_endtime);																							
							}
						}												
					}																		
				}				
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
						
			//For multiple Pregnancies (i.e There are multiple PPG records associated with this participant)
			// + A complete pregnancy should have a) general consent b) consent for child participant
			// + A miscarrige might happen, then the participant status becomes "Enrolled, pregnancy loss..." (participant status) stored in PPG Details. In this case
			//  	Consent for the child participant doesn't exist for this particular PPG.					
			
			//If the Participant Consent is "Genereal Consent", Consent Withdraw is NO, Consent Given = YES			
			if($bean->consent_type == "1" && $bean->consent_withdraw != "1" && $bean->consent_given == "1" && !empty($bean->field_name_map['plt_particitcptcnsnt_name']))
			{																
				// relationship name in array is = plt_particilt_prtcptcnsnt ->		plt_participant_plt_prtcptcnsnt  (in db)		
				$participant_field_name = $bean->field_name_map['plt_particitcptcnsnt_name']['id_name'];				
				$ptid = $bean->$participant_field_name;
					
				//*********************************************************************
				$pt = new PLT_Participant();
				$pt->retrieve($ptid);
				
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
							elseif(!empty($ppgs[$i]["org_due_date"]))
							{
								$tmp_due_date = $ppgs[$i]["org_due_date"];
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
								
								if(!empty($pregnancy_visits[$k]["event_end_date"]))
								{
									$num_of_completed_ipi += 1;
									
									//first time populating last_ipi_completed_date
									if($pregnancy_visits[$k]["event_end_date"] == "")
										$last_ipi_completed_date = $pregnancy_visits[$k]["event_end_date"];
									else
									{										
										if($dtc->compare_dates($pregnancy_visits[$k]["event_end_date"], $last_ipi_completed_date) > 0 )
										{
											$last_ipi_completed_date = $pregnancy_visits[$k]["event_end_date"];
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
							//Generate IPI event 
																																													
							$event_type = constant("PLT_Participant_Functions::CIPI");							
							$assigned_user_id = $pinfo["assigned_user_id"];
							$event_disp_cat = "3";  //
							
							//Visit window starttime = current date time.
							$visit_window_starttime = date("Y-m-d");
							
							//visit window endtime = Child's Daate of Birth (CDOB)							
							if($due_date != "")
								$visit_window_endtime = date("Y-m-d", strtotime($due_date));
							else
								$visit_window_endtime = date("Y-m-d", strtotime("+30 days", strtotime($visit_window_starttime)));																					
																												
							$event_id = $ppf->insert_event_info($event_type, $event_disp_cat, $ptid, $assigned_user_id, $visit_window_starttime, $visit_window_endtime, true);								
						}
						
						//******** Generate SPI. Check if IPI was completed or not.
						if($num_of_spi < $num_of_pregnancies - $num_of_miscarriage)
						{
							echo "IN SPI IF<BR>";
							if($num_of_completed_ipi == $num_of_pregnancies)
							{
								//Generate SPI
								$event_type = constant("PLT_Participant_Functions::CSPI");							
								$assigned_user_id = $pinfo["assigned_user_id"];
								
								//visit window starttime = IPI's end date + 60 days
								$visit_window_starttime = date("Y-m-d", strtotime("+60 days", strtotime($last_ipi_completed_date)));
								
								//visit window endtime = child's date of birth (CDOB)
								$visit_window_endtime = date("Y-m-d", strtotime($due_date));
									
								$event_disp_cat = "3";
																	
								$event_id = $ppf->insert_event_info($event_type, $event_disp_cat, $ptid, $assigned_user_id, $visit_window_starttime, $visit_window_endtime, true);																																
							}							
						}
						
						//********** Generate Birth Visit (BV)						
						if($num_of_bv < $num_of_pregnancies - $num_of_miscarriage)
						{																					
							$event_type = constant("PLT_Participant_Functions::CBIRTH_VISIT");							
							$assigned_user_id = $pinfo["assigned_user_id"];
							
							//start time = CDOB
							$visit_window_starttime = date("Y-m-d", strtotime($due_date));
							
							//visit window endtime = CDOB + 30 days
							$visit_window_endtime = date("Y-m-d", strtotime("+30 days", strtotime($due_date)));																																					
							
							$event_disp_cat = "3";
							
							$event_id = $ppf->insert_event_info($event_type, $event_disp_cat, $ptid, $assigned_user_id, $visit_window_starttime, $visit_window_endtime, true);																														
						}
																																				
						//Check to see if events (ipi, spi, and "consent for the child participant") were generated.											
					}
				}
				else
				{
					//echo "participant id not found";
				}						
			}													
		}		
	}
?>
