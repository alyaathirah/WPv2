<?php
// core configuration
include_once "config/core.php";

// set page title
$page_title = "Register";

// include login checker
include_once "login_checker.php";

// include classes
include_once 'config/database.php';
include_once 'objects/user.php';
include_once "libs/php/utils.php";

// include page header HTML
include_once "layout_head.php";

//echo "<div class='col-md-12'>";
//echo "<div class='modal'>";
	// if form was posted
	if($_POST){

		// get database connection
		$database = new Database();
		$db = $database->getConnection();

		// initialize objects
		$user = new User($db);
		$utils = new Utils();

		// set user email to detect if it already exists
		$user->email=$_POST['email'];

		// check if email already exists
		if($user->emailExists()){
			echo "<div class='alert alert-danger'>";
				echo "The email you specified is already registered. Please try again or <a href='{$home_url}login'>login.</a>";
			echo "</div>";
		}

		else{

			// set values to object properties
			$user->firstname=$_POST['firstname'];
			$user->lastname=$_POST['lastname'];
			$user->contact_number=$_POST['contact_number'];
			$user->address=$_POST['address'];
			$user->password=$_POST['password'];
			$user->access_level='Customer';
			$user->status=1;

			// access code for email verification
			$access_code=$utils->getToken();
			$user->access_code=$access_code;

			// create the user
			if($user->create()){

				echo "<div class='alert alert-info'>";
					echo "Successfully registered. <a href='{$home_url}login'>Please login</a>.";
				echo "</div>";

				// empty posted values
				$_POST=array();

			}else{
				echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
			}
		}
	}

?>

<!-- //echo "</div>"; -->

// include page footer HTML
include_once "layout_foot.php";
?>
