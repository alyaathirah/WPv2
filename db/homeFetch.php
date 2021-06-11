<?php
    include_once('config.php');

    $limit = 8;
    
    $start = 0;


    $itemCountQuery = "SELECT count(item_id) as id FROM item";
    $result1 = $mysqli->query($itemCountQuery); 

   
    $item_query = "SELECT * FROM item ORDER BY item_id DESC LIMIT $start,$limit";
    $itemCountQuery =  "SELECT count(item_id) as id FROM item";
   

    $result1 = mysqli_query($mysqli,$itemCountQuery);
    $itemCount = mysqli_fetch_row($result1)[0];

    $result = $mysqli->query($item_query);
    

    

      $mysqli->close();
?>



