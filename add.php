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
include("db/config.php");
session_start();

if(isset($_POST['Submit'])) {	
	//The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.
	$name = mysqli_real_escape_string($mysqli, $_POST['newitem']);
	$category = mysqli_real_escape_string($mysqli, $_POST['newcat']);
	$desc = mysqli_real_escape_string($mysqli, $_POST['newdesc']);
    $price = mysqli_real_escape_string($mysqli, $_POST['newprice']);
    $weight = mysqli_real_escape_string($mysqli, $_POST['newweight']);
    $stock = mysqli_real_escape_string($mysqli, $_POST['newstock']);
    $expdate = mysqli_real_escape_string($mysqli, $_POST['newexpdate']);
    $origin = mysqli_real_escape_string($mysqli, $_POST['neworigin']);
		
	// // checking empty fields
	if(empty($name) || empty($category) || empty($desc) || empty($price) || empty($weight) || empty($stock)|| 
	 empty($expdate) || empty($origin) ){
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($category)) {
			echo "<font color='red'>Category field is empty.</font><br/>";
		}
		
		if(empty($desc)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}

        if(empty($price)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}

        if(empty($weight)) {
			echo "<font color='red'>Weight field is empty.</font><br/>";
		}

        if(empty($stock)) {
			echo "<font color='red'>Stock field is empty.</font><br/>";
		}

        if(empty($expdate)) {
			echo "<font color='red'>Expiry date field is empty.</font><br/>";
		}

        if(empty($origin) ) {
			echo "<font color='red'>Origin field is empty.</font><br/>";
		}
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
		
		//Step 3. Execute the SQL query.	
		//insert data to database	
		$image = $_FILES['newimage']['name'];
	
		// image file directory
		$target = "images/".basename($image);

		if (move_uploaded_file($_FILES['newimage']['tmp_name'], $target)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
		}
		  
		$sql = "INSERT INTO `item`(`image`, `name`, `price`, `weight`, `expiry_date`, `qty`, `origin`, `category_name(FK)`, `description`) VALUES ('$image','$name','$price','$weight','$expdate','$stock','$origin','$category','$desc')";
	
		if ($mysqli->query($sql) === TRUE) {
			echo "Successfully added!";
		  } else {
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		  }

		//Step 4. Process the results.
		//display success message & the new data can be viewed on index.php
		$_SESSION['status'] = $name.' is sucessfully added!';
		header("location:allProduct.php?category=$category");
	
		//Step 5: Freeing Resources and Closing Connection using mysqli
	}
	mysqli_close($mysqli);
}
?>
</body>
</html>
