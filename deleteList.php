<?php
include("db/config.php");

//getting id of the data from url
$id = $_GET['id'];
//$id2 = $_GET['id2'];
$deleteList = mysqli_query($mysqli, "DELETE FROM list WHERE sl_id=$id");

if($deleteList == FALSE){
    $deleteItemInList = mysqli_query($mysqli, "DELETE FROM itemlist WHERE sl_id=$id");
    $deleteList = mysqli_query($mysqli, "DELETE FROM list WHERE sl_id=$id");
}
mysqli_close($mysqli);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>



