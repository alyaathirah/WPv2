<?php
    include_once('config.php');

    $limit = 16;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;

    $query = $_GET['query'];

    $itemCountQuery = "SELECT count(item_id) as id FROM item";
    $result1 = $mysqli->query($itemCountQuery); 

    if(empty($query)) {
      $query = "All products";
      $item_query = "SELECT * FROM `item` LIMIT $start, $limit";
      $itemCountQuery =  "SELECT count(item_id) as id FROM item";
    } 
    else {
        $item_query = "SELECT * from item where tags1 like '%$query%' or tags2 like '%$query%' or tags3 like '%$query%' or tags4 like '%$query%' or tags5 like '%$query%' LIMIT $start, $limit";
        $itemCountQuery = "SELECT count(item_id) as id FROM item";
    }

    $result1 = mysqli_query($mysqli,$itemCountQuery);
    $itemCount = mysqli_fetch_row($result1)[0];
    $numOfPages = ceil( $itemCount / $limit);

    $result = $mysqli->query($item_query);
    $previous = $page - 1;
    $next = $page + 1;

    //Get current page
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
    $CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
    $key = 'page';

    function currentPage($currentURL, $key) {
      $filteredURL = preg_replace('~(\?|&)'.$key.'=[^&]*~', '', $currentURL);
      return $filteredURL;
    }

      $mysqli->close();
?>



