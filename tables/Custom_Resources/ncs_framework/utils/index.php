<?php
error_reporting(E_ALL);

session_start();

$sugar_root = "../../";

require_once($sugar_root."ncs_framework/utils/includes/SugarUtils.php");
require_once($sugar_root."ncs_framework/utils/includes/EventHelperFunctions.php");

$SU = new SugarUtils();

//================ Only allow admin user to see this page ================
if(isset($_SESSION['authenticated_user_id']))
{	
	if(!$SU->is_admin($_SESSION['authenticated_user_id']))
	{
		echo "<p>You are not currently logged in as admin user for SugarCRM.</p>";
		die("");
	}	
}
else
{
	echo "<p>You need to log in to sugarCRM in order to view this page.</p>";
	die("");
}
//===================================================================================

$event_disposition_dom = get_dom($sugar_root, 'EVENT_DSPSTN_CAT_CL1');
$event_type_dom = get_dom($sugar_root, 'EVENT_TYPE_CL1');
$event_cat_dom = array(
					'postnatal' => 'Postnatal',
					'prenatal' => 'Prenatal'
				 );				 
								 
//********************************* HANDLE FORM SUBMISSION ******************************************

if(!empty($_POST['spi_update']))
{

	$spi_arr = array();
	$spi_arr['id'] = $_POST['id'];	
	$spi_arr['event_type_code'] = $_POST['ev_type_select'];
	$spi_arr['event_disposition_cat'] = $_POST['ev_disp_select'];
	$spi_arr['visit_window_start_month'] = 0;
	$spi_arr['visit_window_end_month'] = 0;
	$spi_arr['spi_time_frame'] = $_POST['spi_time_frame'];  //the value should be > 0. Check for error here.
	$spi_arr['bv_time_frame'] = 0;
	$spi_arr['date_modified'] = 'now()';
	
	if(!empty($_POST['spi_active']))
		$spi_arr['active'] = 1;
	else
		$spi_arr['active'] = 0;
	
	$result = update_event_setting($SU, $spi_arr);
	
	if($result)
		echo "<div style='background-color:#DEE4F7; border:1px solid #414D72; padding:10px; width:600px''>SPI Event Setting was updated successfully.</div>";
	else
		echo "<div style='background-color:#F1FCBD; border:1px solid #414D72; padding:10px; width:600px'>Event Setting was not updated.</div>";	
		
}
elseif(!empty($_POST['bv_update']))
{
	$bv_arr = array();
	$bv_arr['id'] = $_POST['id'];	
	$bv_arr['event_type_code'] = $_POST['ev_type_select'];
	$bv_arr['event_disposition_cat'] = $_POST['ev_disp_select'];
	$bv_arr['visit_window_start_month'] = 0;
	$bv_arr['visit_window_end_month'] = 0;
	$bv_arr['spi_time_frame'] = 0;
	$bv_arr['bv_time_frame'] = $_POST['bv_time_frame'];
	$bv_arr['date_modified'] = 'now()';
	
	if(!empty($_POST['bv_active']))
		$bv_arr['active'] = 1;
	else
		$bv_arr['active'] = 0;	
		
	$result = update_event_setting($SU, $bv_arr);
	
	if($result)
		echo "<div style='background-color:#DEE4F7; border:1px solid #414D72; padding:10px; width:600px''>Birth Event Setting was updated successfully.</div>";
	else
		echo "<div style='background-color:#F1FCBD; border:1px solid #414D72; padding:10px; width:600px'>Event Setting was not updated.</div>";	
			
}
elseif(isset($_POST['update_ev']))
{
	$ev_arr = array();
	$ev_arr['id'] = $_POST['id'];	
	$ev_arr['event_type_code'] = $_POST['ev_type_select'];
	$ev_arr['event_disposition_cat'] = $_POST['ev_disp_select'];
	$ev_arr['visit_window_start_month'] = $_POST['visit_window_start_month'];
	$ev_arr['visit_window_end_month'] = $_POST['visit_window_end_month'];
	$ev_arr['spi_time_frame'] = 0;
	$ev_arr['bv_time_frame'] = 0;
	$ev_arr['date_modified'] = 'now()';
	
	if(!empty($_POST['ev_active']))
		$ev_arr['active'] = 1;
	else
		$ev_arr['active'] = 0;	
		
	$result = update_event_setting($SU, $ev_arr);
	
	if($result)
		echo "<div style='background-color:#DEE4F7; border:1px solid #414D72; padding:10px; width:600px''>Event Setting was updated successfully.</div>";
	else
		echo "<div style='background-color:#F1FCBD; border:1px solid #414D72; padding:10px; width:600px'>Event Setting was not updated.</div>";	
}
else{}

//**************************************************************************************************

//============================================= NEW FUNCTION ======================================
//	This function returns an associative array of drop down list in language files given a dropdown NAME.
//=================================================================================================
function get_dom($sugar_root_path, $dom_name)
{	
	$include_array = array(
						$sugar_root_path."custom/include/language/en_us.lang.php",
						$sugar_root_path."custom/application/Ext/Language/en_us.lang.ext.php"
						);		
	$tmp_dom = array();	
	
	for($i = 0; $i < count($include_array); $i++)
	{
		if(file_exists($include_array[$i]))
		{
			require_once($include_array[$i]);
			
			if(isset($GLOBALS['app_list_strings']) &&  array_key_exists($dom_name, $GLOBALS['app_list_strings']))
			{	
				$tmp_dom = $GLOBALS['app_list_strings'][$dom_name];
				break;
			}
			elseif(isset($app_list_strings) &&  array_key_exists($dom_name, $app_list_strings))
			{
				$tmp_dom = $app_list_strings[$dom_name];
				break;
			}
			else{}			
		}		
	}
	return $tmp_dom;
}


//===========================================
// return HTML code to show a drop down list.
//===========================================
function show_select_list($dom_array, $list_name, $selected_value = "", $bgcolor = "#FFFFFF")
{
	echo "<select name='".$list_name."' style='background-color:".$bgcolor."'>\n";
	
	echo "<option>-- Select an option --</option>\n";
	
	foreach($dom_array as $key => $value)
	{
		if($selected_value != "" && $selected_value == $key)
			echo "<option value='".$key."' selected>".$value."</option>\n";
		else
			echo "<option value='".$key."'>".$value."</option>\n";
	}	
	echo "</select>\n";
}




//================================ GET EVENT SETTING FOR ALL EVENT TYPES ================================
$postnatal_setting_arr = get_event_setting_array($SU, 'postnatal', false);
$spi_setting_arr = get_prenatal_event_setting($SU, "spi", false);
$bv_setting_arr = get_prenatal_event_setting($SU, "bv", false);

//===============================================================================================


//============================ show list of all POSTNATAL event setting (both active & inactive event settings) ===========
$active_bgcolor = "#F2DDB3";
$inactive_bgcolor = "#C9C3B7";

echo "<h3>List of Existing POSTNATAL Event Settings</h3>";

if(count($postnatal_setting_arr))
{
	//echo "<form name='EventInfoUpdate' method='POST' action='".$_SERVER["PHP_SELF"]."' >";
	echo "<table style='border:1px solid #705F5F; background-color:#E9E8F9;padding:4px'>";
	echo "	<tr><th>Event Type</th><th>Event Disposition</th><th>Visit Start Month</th><th>Visit End Month</th><th>Active</th><th></th></tr>";	

		
	foreach($postnatal_setting_arr as $row)
	{		
		if($row['active'] == 1)
			$current_color = $active_bgcolor;
		else
			$current_color = $inactive_bgcolor;
		
		//echo "<tr style='background-color:".$current_color."'>\n";
		echo "<tr>\n";
		echo "<form name='EventInfoUpdate".$row['id']."' method='POST' action='".$_SERVER["PHP_SELF"]."' >";
		echo "<td>";
			show_select_list($event_type_dom, 'ev_type_select', $row['event_type_code'], $current_color);
		echo "</td>";
		
		echo "<td>";
			show_select_list($event_disposition_dom, 'ev_disp_select', $row['event_disposition_cat'], $current_color);
		echo "</td>";
		
		echo "	<td><input type='text' name='visit_window_start_month' value='".$row['visit_window_start_month']."' style='background-color:".$current_color."' /></td>\n";
		echo "	<td><input type='text' name='visit_window_end_month' value='".$row['visit_window_end_month']."' style='background-color:".$current_color."' /></td>\n";
		
		if($row['active'] == 1)
			echo "	<td><input type='checkbox' name='ev_active' checked='checked' value='1' ></td>\n";
		else
			echo "	<td><input type='checkbox' name='ev_active' value='1' ></td>\n";
			
		echo "	<td nowrap><input type='submit' name='update_ev' value='UPDATE' /><input type='hidden' name='id' value='".$row['id']."' /></td>\n";
		
		echo "</form>\n";	
		
		echo "</tr>\n";		
	}
		
	echo "</table>";
	
}
else
{
	echo "<p>No prenatal event setting is found at this time.</p>";
}

//============================ SPI Event Setting ===========

$active_bgcolor = "#F2DDB3";
$inactive_bgcolor = "#C9C3B7";

echo "<p>&nbsp;</p>";
echo "<h3>SPI Event Setting</h3>";

if(count($spi_setting_arr))
{
	echo "<form name='SPI_UPDATE_FORM' method='POST' action='".$_SERVER["PHP_SELF"]."' >";
	echo "<table style='border:1px solid #705F5F; background-color:#E9E8F9;padding:4px'>";
	echo "	<tr><th>Event Type</th><th>Event Disposition</th><th>SPI Time Frame</th><th>Active</th><th></th></tr>";	
		
	foreach($spi_setting_arr as $row)
	{		
		if($row['active'] == 1)
			$current_color = $active_bgcolor;
		else
			$current_color = $inactive_bgcolor;
		
		//echo "<tr style='background-color:".$current_color."'>\n";
		echo "<tr>\n";
		echo "<td>";
			show_select_list($event_type_dom, 'ev_type_select', $row['event_type_code'], $current_color);
		echo "</td>";
				
		echo "<td>";
			show_select_list($event_disposition_dom, 'ev_disp_select', $row['event_disposition_cat'], $current_color);
		echo "</td>";
		
		echo "	<td><input type='text' name='spi_time_frame' value='".$row['spi_time_frame']."' style='background-color:".$current_color."' /></td>\n";
		
		if($row['active'] == 1)
			echo "	<td><input type='checkbox' name='spi_active' checked='checked' value='1' /></td>\n";
		else
			echo "	<td><input type='checkbox' name='spi_active' value='1' /></td>\n";
			
		echo "	<td nowrap><input type='submit' name='spi_update' value='UPDATE' /><input type='hidden' name='id' value='".$row['id']."' /></td>";
		echo "</tr>\n";		
	}
	
	echo "</table>";
	echo "</form>";
}
else
{
	echo "<p>No record found for SPI event.</p>";
}


//============================ Show Birth Visit Event Setting ===========

$active_bgcolor = "#F2DDB3";
$inactive_bgcolor = "#C9C3B7";

echo "<p>&nbsp;</p>";
echo "<h3>Birth Visit Event Setting</h3>";

if(count($bv_setting_arr))
{
	echo "<form name='BV_UPDATE_FORM' method='POST' action='".$_SERVER["PHP_SELF"]."' >";
	echo "<table style='border:1px solid #705F5F; background-color:#E9E8F9;padding:4px'>";
	echo "	<tr><th>Event Type</th><th>Event Disposition</th><th>BV Time Frame</th><th>Active</th><th></th></tr>";	
		
	foreach($bv_setting_arr as $row)
	{		
		if($row['active'] == 1)
			$current_color = $active_bgcolor;
		else
			$current_color = $inactive_bgcolor;
		
		echo "<tr>\n";
		echo "<td>";
			show_select_list($event_type_dom, 'ev_type_select', $row['event_type_code'], $current_color);
		echo "</td>";
				
		echo "<td>";
			show_select_list($event_disposition_dom, 'ev_disp_select', $row['event_disposition_cat'], $current_color);
		echo "</td>";
		
		echo "	<td><input type='text' name='bv_time_frame' value='".$row['bv_time_frame']."' style='background-color:".$current_color."' /></td>\n";
		
		if($row['active'] == 1)
			echo "	<td><input type='checkbox' name='bv_active' checked='checked'  value='1' ></td>\n";
		else
			echo "	<td><input type='checkbox' name='bv_active' value='1' ></td>\n";
			
		echo "	<td nowrap><input type='submit' name='bv_update' value='UPDATE' /><input type='hidden' name='id' value='".$row['id']."' /></td>";
		echo "</tr>\n";		
	}
	
	echo "</table>";
	echo "</form>";
}
else
{
	echo "<p>No record found for Birth Visit event.</p>";
}

?>




