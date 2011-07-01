<?php

/*
*	National Children Study at UCI
*/

class SugarUtils{
			
	public $db_link = null;		
			
	
	/*
	*	constructor for SugarUtils class.
	*/	
    public function __construct()
    {
		$this->db_link = $this->sugar_connect();
    }	
				
	/*
	*	sugar_connect(): connect to sugarCRM database using the currrent setting in config.php file.
	*/
	function sugar_connect()
	{
		$config_file_path = "/var/www/sugar/config.php"; //need to fix this.
		
		require_once($config_file_path);
		
		if(file_exists($config_file_path))
		{
			//echo "Found config file";		
			$link = mysql_connect($sugar_config['dbconfig']['db_host_name'], $sugar_config['dbconfig']['db_user_name'], $sugar_config['dbconfig']['db_password']);
			
			if (!$link) {
				die('Could not connect: ' . mysql_error());
				return false;
			}
			else
			{
				//select db
				$db_selected = mysql_select_db($sugar_config['dbconfig']['db_name'], $link);

				if(!$db_selected) 
				{			
					//echo "Couldn't select db";
					return false;
				}		
				else
				{
					//echo "Connected to sugar db";
					//return true;
					return $link;
				}	
			}		
		}
		else
		{
			//echo "Couldn't connect to sugar";
			return false;
		}
	}
	
	
	/*
	*	Execute a sugar query and return the results.
	*/
	function sugar_query($query)
	{
		$results = null;	
		$results = mysql_query($query, $this->db_link) or die(mysql_error());			
		return $results;
	}
	
	
	/*
	*	return the config array.
	*/
	function get_config()
	{
		return $this->main_config;
	}
	
	/*
	*	Check if a user is an admin user.
	*/
	function is_admin($user_id)
	{
		$result = $this->sugar_query("SELECT id, user_name FROM users WHERE id='".$user_id."' and is_admin='1'");
		
		if(!empty($result) && mysql_num_rows($result) > 0)
			return true;
		else
			return false;			
	}
	
}

?>