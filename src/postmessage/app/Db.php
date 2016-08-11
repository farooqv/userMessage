<?php
namespace postmessage\app;

//code ref form php the rightway
class Db
{
    static $connection;
   
   
	function connectDb() {      
       
		if(!isset(self::$connection)) {			
			$config = parse_ini_file('../../config/config.ini'); 
			self::$connection = new \mysqli('localhost',$config['USERNAME'],$config['PASSWORD'],$config['DBNAME']);
		}

		// If connection was not successful, handle the error
		if(self::$connection === false) {
			// Handle error - notify administrator, log to a file, show an error screen, etc.
			return mysqli_connect_error(); 
		}
		return self::$connection;
    }

	/**
     * Query the database
     *
     * @param $query The query string
     * @return mixed The result of the mysqli::query() function
     */
    public function query($query) {
        // Connect to the database
        $connection = $this -> connectDb();
        // Query the database
        $result = $connection -> query($query);		
		
        return $result;
    }

    /**
     * Fetch rows from the database (SELECT query)
     *
     * @param $query The query string
     * @return bool False on failure / array Database rows on success
     */
    public function select($query) {
        $rows = array();
        $result = $this -> query($query);
        if($result === false) {
            return false;
        }
        while ($row = $result -> fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * Fetch the last error from the database
     * 
     * @return string Database error message
     */
    public function error() {
        $connection = $this -> connectDb();
        return $connection -> error;
    }

    /**
     * Quote and escape value for use in a database query
     *
     * @param string $value The value to be quoted and escaped
     * @return string The quoted and escaped string
     */
    public function quote($value) {
        $connection = $this -> connectDb();
        return "'" . $connection -> real_escape_string($value) . "'";
    }
}