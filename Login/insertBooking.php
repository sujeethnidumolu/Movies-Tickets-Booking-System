<!DOCTYPE html>
<html>
	<head>
		<title>Movie Express</title>
		</head>
		
		
<html>
<head>
<style>
body {
    background-color: lightblue;
}
</style>
</head>
<body>

	<center><img src = "logo.jpg" width = "280" height = "125" title = "logo" alt = "logo " />
			<h1>Welcome</h1>
			<h4>Booking tickets to your favorite movies, now on your fingertips.
			</h4>
		</center>
						
			<center><form method = "POST" action = "insertBooking.php">
				
				<label>Select movie Name :</label>
				<select name = "selectmovie" >
				
				<option> Bharat Ane Nenu </option>
				<option> Rangasthalam </option>
				<option> Quiet Place </option>
				<option> Black Panther </option>
				<option> Chal Mohan Ranga </option>
				
				</select> <br/>
				<br><label>Select movie timings :</label>
				<select name = "selectTimings" >
				
				<option> 10.15AM </option>
				<option> 11.30AM </option>
				<option> 1.30PM </option>
				<option> 3.30PM </option>
				<option> 6.30PM </option>
				</select> </br>
				
				<br><label>Enter your full name: </label><input type = "text" name = "fullName"/></br>
				<br><label>Enter your student ID(9 digit studentID): </label><input type = "text" name = "studentId"/></br>
				<br><label>Phone number(10 digit mobile number): </label><input type = "text" name = "phoneNumber"/></br>
				
				<br><input type = "submit" value = "Book Movie" name = "addMovie"/>
                  				
			</form></center>
			
	<p><?php
				
		//check if round trip and do the insert:
		if(isset($_POST['addMovie'])){
		//round trip:
			//setting the conditions for validations:
			include('inc_validate.php');
			include('inc_InsertRow.php');
			$moviename = $_POST['selectmovie'];
			$selectedTime = $_POST['selectTimings'];
			
				if(validateString($_POST['fullName'])){
					$fullName = $_POST['fullName'];
					if(validateNumber($_POST['studentId'])){
						$studentId = $_POST['studentId'];
						if(validateNumber($_POST['phoneNumber'])){
							$phoneNumber = $_POST['phoneNumber'];
							
						
							//all validations done.
						
						$result = InsertRow($moviename, $selectedTime, $fullName, $studentId, $phoneNumber);
						if($result ==1){
							echo " Congrats! You have successfully booked your ticket for " . $moviename . " at " . $selectedTime . ".";
							$_POST[] = array();
						}else {
							echo "Insert Failed: " . $result;
						}//end innermost IF -- displaying results.
						
						}else
						
						{
							echo "Invalid Phone number. Please enter a valid phone number. Ex: 1234567890";
						}//end validate phone number IF.
						
					}else{
					echo "Invalid StudentID. Enter a valid student ID. Ex: 70066xxx3";						
					}//end validate studentId IF.
					
				}else{
						echo "Invalid Full name.";
					
				}//end validate full name IF.
		}
		
			?>
	</body>
</html>