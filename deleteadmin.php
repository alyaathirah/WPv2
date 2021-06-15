<?php
//Example - MySQLi
//Step 1. Connect to the database.
//Step 2. Handle connection errors
//including the database connection file
include("db/config.php");
session_start();

//getting id of the data from url
if(isset($_GET['id']) && isset($_GET['category']) && isset($_GET['name'])){
    $id = $_GET['id'];
    $cat = $_GET['category'];
    $name = $_GET['name'];
}

//3. Execute the SQL query.
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM item WHERE item_id=$id");

//4. Process the results.
//redirecting to the display page (index.php in our case)
$_SESSION['updated'] = $name.' is sucessfully deleted!';
header("location:editProduct.php?category='$cat'");

//Step 5: Freeing Resources and Closing Connection using mysqli
mysqli_close($mysqli);

?>