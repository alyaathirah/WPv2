<?php
include_once("db/config.php");
//Update Name List 
if(isset($_POST['Update'])) {	
	$newName = mysqli_real_escape_string($mysqli, $_POST['newName']);
    $listid = mysqli_real_escape_string($mysqli, $_POST['listid']);
			
	$updateName = mysqli_query($mysqli, "UPDATE list SET sl_name='$newName' WHERE sl_id=$listid");
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	
}


?>