<?php

/*
*	National Children Study at UCI
*/
class SugarUtils{
			
	public $db_link = null;		
	public $db_type = null;		
	
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
		$config_file_path = "../../config.php"; 
				
		if(file_exists($config_file_path))
		{		
			require_once($config_file_path);
			
			if(isset($sugar_config['dbconfig']['db_type']))
			{
				$this->db_type = $sugar_config['dbconfig']['db_type'];
			}
			else
			{
				die("Unknown DB type");
			}		
						
			$link = $this->sugar_db_connect($sugar_config['dbconfig']['db_host_name'], $sugar_config['dbconfig']['db_user_name'], $sugar_config['dbconfig']['db_password']);
			
			if (!$link) {
				die('Could not connect to sugarCRM database');
				return false;
			}
			else
			{
				//select db
				$db_selected = $this->select_sugar_db($sugar_config['dbconfig']['db_name'], $link);

				if(!$db_selected) 
				{			
					return false;
				}		
				else
				{
					return $link;
				}	
			}		
		}
		else
		{
			echo "Couldn't connect to sugar. Please check the config file path.";
			return false;
		}
	}
	
	/*
	*	Helper Function: connect to sugarCRM db
	*/
	function sugar_db_connect($host_name, $user_name, $user_password)
	{
		if($this->db_type == "mysql")
		{
			return mysql_connect($host_name, $user_name, $user_password);
		}
		elseif($this->db_type == "mssql")
		{
			return mssql_connect($host_name, $user_name, $user_password);
		}
		else
		{
			return null;
		}		
	}
	
	
	/*
	*	Execute a sugar query and return the results.
	*/
	function sugar_query($query)
	{
		$results = null;

		if($this->db_type == "mysql")
		{
			$results = mysql_query($query, $this->db_link) or die(mysql_error());			
		}
		elseif($this->db_type == "mssql")
		{
			$results = mssql_query($query, $this->db_link);
		}
		else
		{
			die("Unsupported db query");
		}
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
		
		if(!empty($result) && $this->result_num_rows($result) > 0)
			return true;
		else
			return false;			
	}
	
	/*
	*	Helper function: return a number of rows of a result set 
	*/
	function result_num_rows($result_set)
	{
		if($this->db_type == "mysql")
		{
			return mysql_num_rows($result_set);
		}
		if($this->db_type == "mssql")
		{
			return mssql_num_rows($result_set);
		}
	}
	
	/*
	*	Select a database from sugar.
	*/
	function select_sugar_db($db_name, $db_link)
	{
		if($this->db_type == "mysql")
		{
			return mysql_select_db($db_name, $db_link);
		}
		elseif($this->db_type == "mssql")
		{
			return mssql_select_db($db_name, $db_link);
		}
		else
			return false;
	}
	
	/*
	*	fetch a row in the result set as an associative array.
	*/
	function db_fetch_assoc($result)
	{
		if($this->db_type == "mysql")
		{
			return mysql_fetch_assoc($result);
		}
		elseif($this->db_type == "mssql")
		{
			return mssql_fetch_assoc($result);
		}
		else
			return false;	
	}
}

?>