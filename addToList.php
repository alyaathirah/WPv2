<?php
include_once("db/config.php");

//Add item in List 	
$id = $_GET['id'];
$itemid = $_GET['id2'];
echo "You are trying to add this product ID to cart: " . $_GET['id'];


//check status 
$data = mysqli_query($mysqli, "SELECT * FROM `item` WHERE `item_id` = '$itemid'");
$check = mysqli_query($mysqli, "SELECT `item_id` FROM `itemlist` WHERE `item_id` = '$itemid'");

if($check->num_rows == 0){
while($row = $data->fetch_assoc()) {
$price = $row['price'];
	if($row['qty']>0){
		$in = mysqli_query($mysqli, "INSERT INTO `itemlist`(`item_id`, `itemlist_qty`, `itemlist_status`, `sl_id`, `subprice`)  VALUES('$itemid','1','Available', '$id', '$price')");
		
	}
	else{
		$in = mysqli_query($mysqli, "INSERT INTO `itemlist`(`item_id`, `itemlist_qty`, `itemlist_status`, `sl_id`, `subprice`)  VALUES('$itemid','1','Out of Stock', '$id', '$price')");
	}
}
}
if($check->num_rows > 0){
	$message = "wrong answer";
	echo "<script type='text/javascript'>alert('$message');</script>";	
}
//header("Location: " $_SERVER('HTTP_HOST') . $location);
header("Location:viewList.php?id=$id");
//$in = mysqli_query($mysqli, "INSERT INTO `itemlist`(`item_id`, `itemlist_qty`)  VALUES('$id','1')");
mysqli_close($mysqli);
?>

