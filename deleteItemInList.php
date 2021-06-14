<?php
include("config.php");

//getting id of the data from url
$id = $_GET['id'];
$id2 = $_GET['id2'];
$deleteItem = mysqli_query($mysqli, "DELETE FROM itemlist WHERE itemlist_id=$id");


mysqli_close($mysqli);
header("Location:viewList.php?id=$id2");

?>

