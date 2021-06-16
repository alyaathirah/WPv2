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
session_start();
if(isset($_POST['Submit']))
{	
	//The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.
	
	$uname = mysqli_real_escape_string($mysqli, $_POST['uname']);
	$Email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	$Password = mysqli_real_escape_string($mysqli, $_POST['password']);
	//check if email exists in database
	$select = mysqli_query($mysqli, "SELECT `Email` FROM `users2` WHERE `Email` = '".$_POST['email']."'"); 
	if(mysqli_num_rows($select)){

    	//exit('Email already exists');
		//header("Location: login1.php");
		echo "<script>window.location.href = 'login1.php'; alert('Email already exists!');</script>";
		
		
	}
	// checking empty fields
	else if(empty($uname) || empty($Email) || empty($Password) ) {	
			
		if(empty($uname)) {
			echo "<font color='grey'>Empty.</font><br/>";
		}
		
				
		if(empty($Email)) {
			echo "<font color='grey'>Empty.</font><br/>";
		}	
		
		if(empty($Password)) {
			echo "<font color='grey'>Empty.</font><br/>";
		}

	
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	}
	
	
	else { 
		// if all the fields are filled (not empty) 
		//Step 3. Execute the SQL query.	
		// hash the password before saving to database
		//$password_hash = password_hash($Password, PASSWORD_BCRYPT);

		//md5
		$password_hash = md5($Password);

		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO users2(Username,Email,Password1) VALUES('$uname','$Email','$password_hash')");
		//Step 4. Process the results.
		//display success message & the new data can be viewed on index.php
		// echo "<font color='green'>Data added successfully.";
		// echo "<br/><a href='home.php'>View Result</a>";
		$_SESSION['success'] ='Registration Successful! <br> Please login to continue.';
		header("Location: login1.php");
		//Step 5: Freeing Resources and Closing Connection using mysqli
		mysqli_close($mysqli);
	}
}
?>
</body>
</html>
