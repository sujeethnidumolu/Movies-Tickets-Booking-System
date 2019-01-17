<?php
/******* Created by Sujeeth, Tanmai and Sarath ********/

//instantiate class.
include("databaseClass.php");
function InsertRow($moviename, $selectedTime, $fullName, $studentId, $phoneNumber){
	$dboInstance = new DatabaseClass;
	$insertQuery = "INSERT INTO theater(selected_time, movie_name) VALUES ('$selectedTime','$moviename');";
	$insertQuery = "INSERT INTO users (full_name, student_id, phone_number) VALUES ('$fullName', '$studentId', '$phoneNumber');";
	
	$result = $dboInstance->ActionQuery($insertQuery);
	if($result){
		return 1;
	} else {
		return $dboInstance->error();
	}//end If.

}//end function insertrow.

?>