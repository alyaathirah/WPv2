<?php
include("db/config.php");

//getting id of the data from url
$id = $_GET['id'];
$id2 = $_GET['id2'];
$deleteList = mysqli_query($mysqli, "DELETE FROM list WHERE sl_id=$id");


mysqli_close($mysqli);
header("Location:viewList.php?id=$id2");
?>

