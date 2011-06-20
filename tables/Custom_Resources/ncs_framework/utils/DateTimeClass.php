<?php

/*
	National Children Study at UCI
	Helper class to handle datetime in addition to SugarCRM dateTime class.
*/


class DateTimeClass{

//*********************************************************** HELPER FUNCTIONS (Should be moved to a util file) ***************************************************
//Add an additional month(s) to the given date. Add n hours to the final date if nhours > 0
//@date_str = a string representation of a date '3/12/2011'. If nhours > 0, then the returned date is in "Y-m-d H:i:s" format.
//@nmonth = 3 (integer)
//$nhours (optional, integer)
function add_month_to_date($date_str, $nmonth, $nhours=0, $return_format="m/d/Y")
{
	$date_timestamp = strtotime($date_str);
	$date_nmonth = strtotime("+".$nmonth." months", $date_timestamp); 

	if($nhours > 0)
	{
		$date_nmonth = strtotime("+".$nhours." hours", $date_nmonth);
		$return_format = "Y-m-d H:i:s";
	}
	return date($return_format, $date_nmonth);
}

// Add an additional hours and minutes to the given datetime.
// Returns a new date time object. (i.e "2011-03-02 19:23:40")
// $datetime should NOT be unixtimestamp
function add_time_to_datetime($datetime, $hours, $minutes, $return_datetimeformat="Y-m-d H:i:s")
{
	$d = strtotime($datetime);

	if(is_numeric($hours))
	{
		$d = strtotime("+".$hours." hours", $d);
	}
	if(is_numeric($minutes))
	{
		$d = strtotime("+".$minutes." minutes", $d);
	}
	return date($return_datetimeformat, $d);
}



/*
* Compare two dates.
* If date1(d1) > date2(d2), function returns 1
* If date1(d1) < date2(d2), function returns -1
* date1(d1) = date2(d2), function returns 0
*/
function compare_dates($d1, $d2) {
	$dt1 = strtotime($d1);
	$dt2 = strtotime($d2);

	if($dt1 - $dt2 > 0)
		return 1;
	elseif($dt1 - $dt2 < 0)
		return -1;
	else
		return 0;
}


}



?>