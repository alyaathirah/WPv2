<?php 
session_start(); 
include "db/config.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	$email = $_POST['email'];
	$passOriginal = $_POST['password'];
	$pass = md5($passOriginal);

	if (empty($email)) {
		header("Location: login1.php?error=Email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: login1.php?error=Password is required");
	    exit();
	}
	else{
		        
		$sql = "SELECT * FROM users2 WHERE Email='$email' AND Password1='$pass'";

		$result = mysqli_query($mysqli, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			//password_verify($_POST['password'], $user->password)
			//if ($row['Email'] === $email && $row['Password1'] === $pass)
			if ($row['Email'] === $email && ($row['Password1'] === $pass)){
				if(empty($row['status'])){
            	$_SESSION['id'] = $row['id'];
                $_SESSION['FirstName'] = $row['FirstName'];
                $_SESSION['LastName'] = $row['LastName'];
                $_SESSION['Username'] = $row['Username'];
            	$_SESSION['Email'] = $row['Email'];
            	$_SESSION['Bio'] = $row['Bio'];
                $_SESSION['PhoneNumber'] = $row['PhoneNumber'];
            	$_SESSION['Birthday'] = $row['Birthday'];
            	$_SESSION['Address1'] = $row['Address1'];
                $_SESSION['City'] = $row['City'];
                $_SESSION['State1'] = $row['State1'];
            	$_SESSION['Zip'] = $row['Zip'];
            	$_SESSION['Password1'] = $row['Password1'];
				$_SESSION['images'] = $row['images'];
				$_SESSION['status'] = $row['status'];
            	header("Location: home.php");
			}else{
				$_SESSION['id'] = $row['id'];
                $_SESSION['FirstName'] = $row['FirstName'];
                $_SESSION['LastName'] = $row['LastName'];
                $_SESSION['Username'] = $row['Username'];
            	$_SESSION['Email'] = $row['Email'];
            	$_SESSION['Bio'] = $row['Bio'];
                $_SESSION['PhoneNumber'] = $row['PhoneNumber'];
            	$_SESSION['Birthday'] = $row['Birthday'];
            	$_SESSION['Address1'] = $row['Address1'];
                $_SESSION['City'] = $row['City'];
                $_SESSION['State1'] = $row['State1'];
            	$_SESSION['Zip'] = $row['Zip'];
            	$_SESSION['Password1'] = $row['Password1'];
				$_SESSION['images'] = $row['images'];
				$_SESSION['status'] = $row['status'];
				header("Location: admin.php");
			}
		        exit();
            }else{
				$_SESSION['fail'] ='Invalid email or password!';
				header("Location: login.php");
		        exit();
			}
		}else{
			$_SESSION['fail'] ='Invalid email or password!';
			header("Location: login.php");
			exit();
		}
	}
	
}else{
	header("Location: login1.php");
	exit();
}
?>