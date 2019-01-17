<!DOCTYPE html>
<?php
/**** DATA CLASS FILE ****/
//Created by Sujeeth,Tanmai and Sarath

class DatabaseClass{
	protected static $connection; //This is a property.
	
	/****** Connect function *******/
	
	public function connect(){//this is a method in DB class.
		//Connecting DB.
		if(! isset(self::$connection)){//if not connection set 
			include ("dbConfiguration.php");
			self::$connection = new mysqli($serverName, $userName, $password, $database);
					
		}//end connection IF
		
		//If connection was not successful, handling the error:
		if(self::$connection === false){
			//Handle error - notify admin
			return false;			
			
		}//end error handling IF
		return self::$connection;
		
	}//end public function connect
	
	/****************** Query function *****************/
	public function Select($query){
		//connect to the database
		$connection = $this->connect();
		
		//Query the database
		$result = $connection->query ($query);
		if(! $result){
			return $connection->error;
		} else {
			return $result; //return the result.
			
		}//end IF/else query DB
		
	}//end public function select
	
	/********Action Query Function*********/
	public function ActionQuery($sql){ //for inserts, updates and deletes
		$connection = $this->connect();
		
		//Query the DB.
		$result = $connection->query($sql);
		//this result would be a true or false because there is no data to return in action queries.
		
		if($result){
			return $result;
		} else {
			//return $connection->error;
			return false;
	
		}//end IF RESULT.
		
	}//end function actionquery
	
	public function error(){
		//gets the last error from the database.
		$connection = $this->connect();
		return $connection->error;
	
	}//end error function
	
}//end database class
?>