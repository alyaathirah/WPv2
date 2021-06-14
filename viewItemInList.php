<?php
include_once("db/config.php");

//$id = $_GET['id'];

//View List
//$in2 = mysqli_query($mysqli, "SELECT `item_id` FROM `itemlist`");
$que = "SELECT 
itemlist.itemlist_id, item.name, item.price, item.image, itemlist.itemlist_status, itemlist.itemlist_qty, itemlist.sl_id 
FROM 
itemlist
INNER JOIN 
item
ON
itemlist.item_id = item.item_id";
$test = mysqli_query($mysqli, $que);


mysqli_close($mysqli);
?>

