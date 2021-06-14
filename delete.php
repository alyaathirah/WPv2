<?php
//Example - MySQLi
//Step 1. Connect to the database.
//Step 2. Handle connection errors
//including the database connection file
session_start();
include_once("db/config.php");

if (isset($_SESSION['id']) && isset($_SESSION['Username'])) {

//getting id of the data from url
$id = $_SESSION['id'];

//3. Execute the SQL query.
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM users2 WHERE id=$id");

//Step 5: Freeing Resources and Closing Connection using mysqli
mysqli_close($mysqli);

//4. Process the results.
//redirecting to the display page (index.php in our case)
header("Location:home.php");
}
?>

