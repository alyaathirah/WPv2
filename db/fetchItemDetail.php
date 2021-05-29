<?php

    $id = $_GET['item_id'];

  
    include_once('db\config.php');
    //$id = $_GET['item_id']; 
    $item_details_query = "SELECT * FROM `item` WHERE `item_id` = '$id'";
    $item_details = $mysqli->query($item_details_query);
    /*if($item_details->num_rows > 0){
        while($res = $item_details->fetch_assoc()) {
                cho $res['image'];
        }
    } else {
        echo "0 result";
    }*/
    $mysqli->close();

    
?>