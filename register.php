<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//Example - MySQLi procedural
//Step 1. Connect to the database.
//Step 2. Handle connection errors
//including the database connection file
include_once("db/config.php");

if(isset($_POST['Submit']))
{	
	//The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.
	
	$UName = mysqli_real_escape_string($mysqli, $_POST['uname']);
	$Email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	$Password = mysqli_real_escape_string($mysqli, $_POST['Password']);
	// checking empty fields
	if(empty($UName) || empty($Email) || empty($Password) ) {	
			
		if(empty($UName)) {
			echo "<font color='grey'>Empty.</font><br/>";
		}
		
				
		if(empty($Email)) {
			echo "<font color='grey'>Empty.</font><br/>";
		}	
		
		if(empty($Password)) {
			echo "<font color='grey'>Empty.</font><br/>";
		}

	
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
		
		//Step 3. Execute the SQL query.	
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO users2(Username,Email,Password1) 
													VALUES('$UName','$Email','$Password')");
		
		//Step 4. Process the results.
		//display success message & the new data can be viewed on index.php
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='home.php'>View Result</a>";
	
		//Step 5: Freeing Resources and Closing Connection using mysqli
		mysqli_close($mysqli);
	}
}
?>
</body>
</html>
