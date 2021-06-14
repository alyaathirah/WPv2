<?php
include_once("db/config.php");
//$id = $_GET['id'];
//echo "You are trying to update this product ID to cart: " . $_GET['id'];
//echo "Quantity: " . $_GET['quantity'];

if(isset($_POST['buttonAdd']) || isset($_POST['buttonMin']) ){	
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);	
	$quantity = mysqli_real_escape_string($mysqli, $_POST['quantity']);
	$sl_id = mysqli_real_escape_string($mysqli, $_POST['sl_id']);
	$price = mysqli_real_escape_string($mysqli, $_POST['price']);
	$const = 1;	

	
	if(isset($_POST['buttonAdd'])) {
		$quantity = $quantity + 1;
	}

	if(isset($_POST['buttonMin'])) {
		if($quantity>1){
			$quantity = $quantity - 1;
			}
		else{
			$quantity = 1;
			}
	}
$update = mysqli_query($mysqli, "UPDATE itemlist SET itemlist_qty='$quantity' WHERE itemlist_id=$id");
$updatePrice = mysqli_query($mysqli, "UPDATE itemlist SET subprice = ROUND('$quantity' * '$price', 2) WHERE itemlist_id=$id");
header("Location: viewlist.php?id=$sl_id");
//mysqli_close($mysqli);
}

//$totalPrice = mysql_query("SELECT SUM(subprice) FROM itemlist");
//$row = mysql_fetch_array($sql);
//$sum = $row['total'];
?>
