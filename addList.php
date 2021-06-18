<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
include("db/config.php");
if (isset($_SESSION['id']) && isset($_SESSION['Username'])) {
	//getting id from url
	$userid = $_SESSION['id'];


//Add List 
if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['slname']);
				
	if(empty($name)) {
		echo "<font color='red'>Name field is empty.</font><br/>";
	}
	else { 
		$listIn = mysqli_query($mysqli, "INSERT INTO `list`(`sl_name`, `id`) VALUES ('$name','$userid')");
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}


//View List
$que = "SELECT * FROM `list` WHERE `id` = '$userid'";
$try = mysqli_query($mysqli, $que);
//mysqli_close($mysqli);
}
?>