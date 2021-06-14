<html>
<head>
	<title>Add</title>
</head>

<body>
<?php
include("db/config.php");

//Add List 
if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['slname']);
				
	if(empty($name)) {
		echo "<font color='red'>Name field is empty.</font><br/>";
	}
	else { 
		$listIn = mysqli_query($mysqli, "INSERT INTO `list`(`sl_name`) VALUES ('$name')");
		//echo $name;
		//echo "<font color='green'>Data added successfully.";
        header("Location:shoppinglist.php");
	}
}

 /*$que = "SELECT 
 list.sl_id, itemlist.itemlist_id
 FROM 
 list
 INNER JOIN 
 itemlist
 ON
 itemlist.sl_id = list.sl_id";*/

//View List
$que = "SELECT * from list";
$try = mysqli_query($mysqli, $que);
//mysqli_close($mysqli);

?>
</body>
</html>