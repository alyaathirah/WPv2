<?php 
session_start();
include_once("db/config.php");

if (isset($_SESSION['id']) && isset($_SESSION['Username'])) {
  
if(isset($_POST['update_photo']))
{	
		$id = mysqli_real_escape_string($mysqli, $_POST['id']);	
		$file_name = $_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
		$file_tmp =$_FILES['image']['tmp_name'];
		$file_type=$_FILES['image']['type'];
		
		$extensions= array("image/jpeg","image/jpg","image/png");
		

		if(!in_array($file_type,$extensions) || $file_size > 2097152 || empty($file_name) ) {	
				
			if(!in_array($file_type,$extensions)) {
				$_SESSION['status'] ="Extension not allowed, please choose a JPEG or PNG file.";
			}
			else if($file_size > 2097152){
				$_SESSION['status'] ='The image size must be excately 2 MB';
			}
			else if(empty($filename)){
				$_SESSION['status'] ='You send empty image';
			}
			header("Location: profile.php");
			exit();
		} 
		else {	
			$records = mysqli_query($mysqli,"SELECT * FROM users2 WHERE id='$id'"); 
			$data = mysqli_fetch_array($records);
			unlink($data['images']);
			
			$target_dir = "user_image/";
			$target_file = $target_dir . $_FILES["image"]["name"];
					
			move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
			mysqli_query($mysqli,"UPDATE users2 SET images='$target_file' WHERE id='$id'");  
			$_SESSION['status_p'] ='Sucessfully updated';
			header("Location: profile.php");
			exit();
		}	
			
			mysqli_close($mysqli);
		
}    
else if (isset($_POST['update'])) {

	//The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);	
	$FName = mysqli_real_escape_string($mysqli, $_POST['FName']);
	$LName = mysqli_real_escape_string($mysqli, $_POST['LName']);
	$UName = mysqli_real_escape_string($mysqli, $_POST['UName']);
	$Email = mysqli_real_escape_string($mysqli, $_POST['Email']);	
	$Bio = mysqli_real_escape_string($mysqli, $_POST['Bio']);
	$PNumber = mysqli_real_escape_string($mysqli, $_POST['PNumber']);
	$Birthday = mysqli_real_escape_string($mysqli, $_POST['Birthday']);
	$Address = mysqli_real_escape_string($mysqli, $_POST['Address']);
	$City = mysqli_real_escape_string($mysqli, $_POST['City']);
	$State = mysqli_real_escape_string($mysqli, $_POST['State']);	
	$Zip = mysqli_real_escape_string($mysqli, $_POST['Zip']);
	$Gender = mysqli_real_escape_string($mysqli, $_POST['Gender']);
	// checking empty fields
	if(empty($FName) || empty($LName) || empty($UName) || empty($Email) || empty($Bio)
		|| empty($PNumber) || empty($Birthday) || empty($Address) || empty($City) 
		|| empty($State) || empty($State) || empty($Zip) || empty($Gender)) {	
			
		if(empty($FName)) {
			$_SESSION['status_pr'] = "Empty field ";
		}
		
		if(empty($LName)) {
			$_SESSION['status_pr'] = "Empty field ";
		}
		
		if(empty($Email)) {
			$_SESSION['status_pr'] = "Empty field ";
		}	
		
		if(empty($Bio)) {
			$_SESSION['status_pr'] = "Empty field ";
		}

		if(empty($PNumber)) {
			$_SESSION['status_pr'] = "Empty field ";
		}
		
		if(empty($Birthday)) {
			$_SESSION['status_pr'] = "Empty field ";
		}
		
		if(empty($Address)) {
			$_SESSION['status_pr'] = "Empty field ";
		}	
		
		if(empty($State)) {
			$_SESSION['status_pr'] = "Empty field ";
		}

		if(empty($City)) {
			$_SESSION['status_pr'] = "Empty field ";
		}	
		
		if(empty($Zip)) {
			$_SESSION['status_pr'] = "Empty field ";
		}	

		if(empty($Gender)) {
			$_SESSION['status_pr'] = "Empty field ";
		}	
		header("Location:profile.php");	
	} else {	
		
		//Step 3. Execute the SQL query.
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users2 SET FirstName='$FName',LastName='$LName',Username='$UName',Email='$Email', Bio='$Bio', PhoneNumber='$PNumber', Birthday='$Birthday', Address1='$Address', City='$City', State1='$State', Zip='$Zip', Gender='$Gender' WHERE id=$id");
		$_SESSION['status_pr1'] = "Updated successfully";
		//redirectig to the display page. In our case, it is index.php
		header("Location: profile.php");
		exit();
		
		//Step 5: Freeing Resources and Closing Connection using mysqli
		mysqli_close($mysqli);
	}
}
else if(isset($_POST['update_p']))
{	
	//The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);	
	$OPassword = mysqli_real_escape_string($mysqli, $_POST['Password_old']);
    $NPassword = mysqli_real_escape_string($mysqli, $_POST['Password_new']);
    $CPassword = mysqli_real_escape_string($mysqli, $_POST['Password_conf']);
	$APassword = mysqli_real_escape_string($mysqli, $_POST['Password1']);
    $result = mysqli_query($mysqli, "SELECT * FROM users2 WHERE id=$id");
	
	while($res = mysqli_fetch_array($result))
	{
		$Password=$res['Password1'];
	}
	
    // checking empty fields
	if(empty($OPassword) || empty($NPassword) || empty($CPassword) || ($NPassword != $CPassword) || ($OPassword != $Password) ) {	
		
		if(empty($OPassword)) {
			$_SESSION['status_ps'] = "Empty field ";
		}
		
		if(empty($NPassword)) {
			$_SESSION['status_ps'] = "Empty field ";
		}
		
		if(empty($CPassword)) {
			$_SESSION['status_ps'] = "Empty field ";
		}	
    
        if($NPassword != $CPassword) {
			$_SESSION['status_ps'] = "Not matching new password";
	    }

        if($OPassword != $Password){
			$_SESSION['status_ps'] = "Not matching current password";
        }
		header("Location:profile.php");
        mysqli_close($mysqli);
	
    }else {	
		//Step 3. Execute the SQL query.
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users2 SET Password1='$NPassword' WHERE id=$id");
		$_SESSION['status_ps1'] = "Updated successfully ";
		//redirectig to the display page. In our case, it is index.php
		header("Location: profile.php");
		
		//Step 5: Freeing Resources and Closing Connection using mysqli
		mysqli_close($mysqli);
	}
}
else{
	header("Location: profile.php?success=not successfully");
	exit();
}

}else{
     header("Location: login.php");
     exit();
}