<?php
    error_reporting(E_ALL ^ E_DEPRECATED);
	class dataservice_mysql
	{
		private $server		= 'localhost';
		private $username	= 'root';
		private $password	= '';
		private $database	= 'gsdb';
		private $m_link		= false;
		
		// Hàm dựng tự thực thi, dùng để mở 1 kết nối đến server
		public function __construct()
		{
			@$this->Connect($this->server, $this->username, $this->password, $this->database);
		}
		
		// Hàm hủy tự thực thi
	   	public function __destruct()
		{
	   		if($this->m_link)
				@mysql_close();
	   	}
		
	    private function Connect($i_server, $i_username, $i_password, $i_dbname)
		{
	   		@$this->m_link = mysql_pconnect($i_server, $i_username, $i_password) or die('Unable to establish a DB connection: '. mysql_error());
			
	   		if($this->m_link)
	   			return mysql_select_db($i_dbname, $this->m_link) or die('Unable to select DB: '. mysql_error());
			
	   		return false;
	   	}
		
	   	public static function QuoteSmart($i_value)
		{
	   		// Stripslashes
	    	if (get_magic_quotes_gpc())
	            $i_value = stripslashes($i_value);
	        
			// Quote if not integer
	    	if (!is_numeric($i_value))
		        $i_value =  "'".htmlspecialchars($i_value)."'" ;
		    
			return $i_value;
	   	}
		
	   	public function Execute($i_sql)
		{
	        mysql_query("SET NAMES 'utf8'");
			
			$result = mysql_query($i_sql);
			if (!$result){
                echo 'Could not successfully run query: '. mysql_error();
            }
	   		return $result;
	   	}
		
		// INSERT, UPDATE, DELETE
	   	public function ExecuteNonQuery($i_sql, &$r_affected_records = 0)
		{
	   		$resource = $this->Execute($i_sql);
	        
	        if($resource)
	   			return true;
	        else
	    		return false;
	   	}
	   	
		// SELECT
	   	public function ExecuteQuery($i_sql)
		{
	   		$resource = $this->Execute($i_sql);
			
			$result_array = array();
			
	   		if($resource)
			{
				$num_rec = 0;
				
				while($row = mysql_fetch_array($resource))
				{
					$result_array[$num_rec] = $row;
					$num_rec++;
				}
				
				mysql_free_result($resource);
	   			
				if ($num_rec > 0)
	   				return $result_array;
			}
			return false;
	   	}
		
		// Trả về số dòng
		public function ReturnNumRows($i_sql)
		{
	   		$resource = $this->Execute($i_sql);
			
			return mysql_num_rows($resource);
	   	}
	}
?>