<?php

//==================================== GET ALL EXISTING EVENT SETTING ===========================
//	return an array of array of event setting records in db. 
//	A connection to sugarCRM db should already exist before calling this function.
//	$active_only = true --> return only event settings that are set to active.
//  $SU = sugar util object.
//=================================================================================================
function get_event_setting_array($SU, $event_type = "all", $active_only = true)
{
	$setting_array = array();
	
	$query = "SELECT * FROM auto_eventinfo_setting WHERE 1=1 ";
	
	if($active_only)
		$query .= " AND active=1";
		
	if($event_type != "all")
		$query .= " AND event_cat = '".$event_type."'";
			
	$result = $SU->sugar_query($query);
	
	while($row = $SU->db_fetch_assoc($result))
	{
		$setting_array[] = $row;
	}	
	return $setting_array;	
}

//==================================== GET PRENATAL EVENT SETTING ===========================
//
//=================================================================================================
function get_prenatal_event_setting($SU, $specific_event = "", $active_only = true)
{
	$setting_array = array();
	
	if($specific_event == "") return null;
	
	$query = "SELECT * FROM auto_eventinfo_setting WHERE 1=1 ";
	
	if($active_only)
		$query .= " AND active=1";
	
	if($specific_event == "spi")
		$query .= " AND spi_time_frame > 0 ";
	elseif($specific_event == "bv")
		$query .= " AND bv_time_frame > 0 ";
	elseif($specific_event == "ipi")
		$query .= " AND ipi_time_frame > 0 ";
	else{}
			

	$result = $SU->sugar_query($query);
	
	while($row = $SU->db_fetch_assoc($result))
	{
		$setting_array[] = $row;
	}	
	return $setting_array;	
}



//============================================== UPDATE EVENT SETTING ====================================
//	Update an event setting given an array that contains updated info for an event setting ($ev_setting_arr)
//========================================================================================================
function update_event_setting($SU, $ev_setting_arr)
{
	if(empty($ev_setting_arr)) return false;
	
	$update_query = "UPDATE auto_eventinfo_setting
						SET event_type_code =  '".$ev_setting_arr['event_type_code']."', 
						event_disposition_cat =  '".$ev_setting_arr['event_disposition_cat']."', 
						visit_window_start_month =  '".$ev_setting_arr['visit_window_start_month']."', 
						visit_window_end_month =  '".$ev_setting_arr['visit_window_end_month']."', 
						spi_time_frame =  '".$ev_setting_arr['spi_time_frame']."', 
						bv_time_frame =  '".$ev_setting_arr['bv_time_frame']."', 
						date_modified =  now(), 
						active = '".$ev_setting_arr['active']."'
					WHERE id='".$ev_setting_arr['id']."'";
				
	$result = $SU->sugar_query($update_query);
	
	if($result)
		return true;
	else
		return false;	
}

?>