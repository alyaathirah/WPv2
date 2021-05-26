<?php
    include_once('db\config.php');
    $category = 'Fruits and Vegetables';
    $item_query = "SELECT * FROM `item` WHERE `category_name(FK)`= '$category'";
    $result = $mysqli->query($item_query);
    //$result->fetch_all(MYSQLI_ASSOC);

    if ($result) {
      if ($result->num_rows>0) {
        // output data of each row
        while($res = $result->fetch_assoc()) {
          echo $res["name"] . "<br>";
        }
      } else {
        echo "0 results";
      }
    }
    

      $mysqli->close();
?>