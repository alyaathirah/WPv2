<?php

    $id = $_GET['item_id'];
    include_once('db\config.php');
    $item_details_query = "SELECT * FROM `item` WHERE `item_id` = '$id'";
    $item_details = $mysqli->query($item_details_query);

    $mysqli->close();

    
?>