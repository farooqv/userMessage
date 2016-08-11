<?php
namespace postmessage\app;

/**
 * UserMessage class
 * To handle messages
 */
class UserMessage
{
	/**
	 * getMessage to retrieve messages(s)
	 * if $id = 0, retrieve all else retrive the one with $id
	 * @param int $id, 
	 * @return array
	 */
    public function getMessage($id = 0)
    {	
		// Connect to the database
		$dbConnect = new Db(); 		

		//Fetch messages from message table
		$query = "SELECT * FROM test_message";
		$messages = $dbConnect->select($query);
				
		return $messages;	
    }
	
	/**
	 * getMessageJson
	 * @return json
	 */
    public function getMessageJson() 
    {
		$messages = $this->getMessage();			
		echo json_encode($messages);		
		return $messages;
    }
	
	/**
	 * upsertMessage to update or insert
	 * update function to be added later
	 * @param string $message
	 * @param int $id
	 * @return json
	 */
    public function upsertMessage($message=null)
    {        
		// Connect to the database
		$dbConnect = new Db(); 				
		
		if($message != null)
		{		
			$message = $dbConnect->quote($_POST['message']);		
			// Insert the values into the database
			$query = "INSERT INTO `test_message` (`message`) VALUES (".$message.")";
			
			$result = $dbConnect->query($query);				
		}		
		$messages = $this->getMessageJson();				
    }	
	
}