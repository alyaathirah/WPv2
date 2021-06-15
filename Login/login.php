<?php
// core configuration
include_once "Login/config/config.php";

// set page title
$page_title = "Login";

// include login checker
$require_login=false;
include_once "Login/login_checker.php";

// default to false
$access_denied=false;

// if the login form was submitted
if($_POST){

	// include classes
	include_once "Login/config/database.php";
	include_once "Login/objects/user.php";

	// get database connection
	$database = new Database();
	$db = $database->getConnection();

	// initialize objects
	$user = new User($db);
	
	// check if email and password are in the database
	$user->email=$_POST['email'];

	// check if email exists, also get user details using this emailExists() method
	$email_exists = $user->emailExists();

	// validate login
	if ($email_exists && password_verify($_POST['password'], $user->password) && $user->status==1){

		// if it is, set the session value to true
		$_SESSION['logged_in'] = true;
		$_SESSION['user_id'] = $user->id;
		$_SESSION['access_level'] = $user->access_level;
		$_SESSION['firstname'] = htmlspecialchars($user->firstname, ENT_QUOTES, 'UTF-8') ;
		$_SESSION['lastname'] = $user->lastname;

		// if access level is 'Admin', redirect to admin section
		if($user->access_level=='Admin'){
			header("Location: {$home_url}admin/index.php?action=login_success");
		}

		// else, redirect only to 'Customer' section
		else{
			header("Location: {$home_url}index.php?action=login_success");
		}
	}

	// if username does not exist or password is wrong
	else{
		$access_denied=true;
	}
}

// include page header HTML
//include_once "layout_head.php";

//echo "<div class='col-sm-6 col-md-4 col-md-offset-4'>";

	// get 'action' value in url parameter to display corresponding prompt messages
	$action=isset($_GET['action']) ? $_GET['action'] : "";

	// tell the user he is not yet logged in
	if($action =='not_yet_logged_in'){
		echo "<div class='alert alert-danger margin-top-40' role='alert'>Please login.</div>";
	}

	// tell the user to login
	else if($action=='please_login'){
		echo "<div class='alert alert-info'>";
			echo "<strong>Please login to access that page.</strong>";
		echo "</div>";
	}

	// tell the user if access denied
	if($access_denied){
		echo "<div class='alert alert-danger margin-top-40' role=\"alert\">";
			echo "Access Denied.<br /><br />";
			echo "Your username or password maybe incorrect";
		echo "</div>";
	}

	// actual HTML login form
	

//echo "</div>";

// footer HTML and JavaScript codes
//include_once "layout_foot.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />

    <link rel="icon" href="images/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="libs/css/styleLogin.css" />
    <link rel="stylesheet" href="libs/css/bootstrap.css" />

    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/userList.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <title>Login Page</title>
  </head>

  <body>
    <!-- Float an Image Without Text Wrapping -->
    <div class="box">
      <div class="imgBx">
        <img src="images/pizza.jpg" />
        <!-- no need to set size here -->
      </div>
      <div class="content">
        <h2>Welcome to Gro-Sir</h2>
        <br />
        <p>Sign In</p>
		<!-- SIGN IN -->
        <form class='form-signin' action='login' method='post'>
          <br />
          <label>Email:</label><br />
          <input type="text" name="email" class="form-control" placeholder="Email" required="" autofocus="">
          <br />
          <label>Password:</label><br />
          <input type="password" name="password" class="form-control" placeholder="Password" required="">
          <br />
          <input type="submit" class="btn btn-lg btn-primary btn-block" value="Log In" >
            
          <!--onclick="window.location.href='homepage.html';               
                     localStorage.setItem('status','logged in');"-->
        </form>
        <!-- Trigger/Open The Modal -->
        <p>
          Need an account?
          <span class="signUp" onclick="openModal(); clearSignUp()"
            >Sign Up</span>
        </p>
        <!-- <?php echo $page_title=="Register" ? "class='active'" : ""; ?>>
					<a href="<?php echo $home_url; ?>register">
						<span class="glyphicon glyphicon-check"></span> Register
					</a> -->
      </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start">
      <!-- Grid container -->
      <div class="container p-4">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase text-dark">Company Policy</h5>

            <p class="text-dark">
              This is our company policy, which is the policy of our company.
              This policy is for those who ask what is our policy and not for
              those that didnt ask.
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase text-dark">Customer Support</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-dark">Call Us: 012-3456789</a>
              </li>
              <li>
                <a href="#!" class="text-dark">Mail Us</a>
              </li>
              <li>
                <a class="address text-dark" style="text-decoration: none">
                  Address: <br />
                  Alamat, Jalan, Daerah, Poskod, Negeri, Negara.
                </a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-0 text-dark">Social Media</h5>

            <ul class="list-unstyled">
              <li>
                <a href="#!" class="text-dark mb-5"
                  ><img
                    src="images/Facebook-logo.png"
                    style="width: auto; height: 30px"
                /></a>
              </li>
              <li>
                <a href="#!" class="text-dark mb-5"
                  ><img
                    src="images/ig logo.png"
                    style="width: auto; height: 30px"
                /></a>
              </li>
              <li>
                <a href="#!" class="text-dark mb-5"
                  ><img
                    src="images/twitter-logo-4.png"
                    style="width: auto; height: 30px"
                /></a>
              </li>
              <li>
                <a href="#!" class="text-dark"
                  ><img
                    src="images/tiktok logo.png"
                    style="width: auto; height: 30px"
                /></a>
              </li>
            </ul>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2020 Copyright:
        <a class="text-dark" style="font-style: italic" href="#"
          >webprogramming2021@gmail.com</a
        >
      </div>
      <!-- Copyright -->
    </footer>
  </body>
  <!-- The Modal -->
  <!-- <div class="modal"> -->
    <!-- Modal content -->
    <!-- <div class="modal-box" onclick="closeWindow(window.onclick)" style="height: 90%;">
      <span class="close" onclick="closeModal()">&times;</span>

      <div class="modal-content" style="box-shadow: none !important; ">
        <p>Sign up to know our latest deals and shop our products!</p>
        <form>
			<table class='table table-responsive'>
				<tr>
					<td class='width-30-percent'>Firstname</td>
					<td><input type='text' name='firstname' class='form-control' required value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname'], ENT_QUOTES) : "";  ?>" /></td>
				</tr>

				<tr>
					<td>Lastname</td>
					<td><input type='text' name='lastname' class='form-control' required value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname'], ENT_QUOTES) : "";  ?>" /></td>
				</tr>

				<tr>
					<td>Contact Number</td>
					<td><input type='text' name='contact_number' class='form-control' required value="<?php echo isset($_POST['contact_number']) ? htmlspecialchars($_POST['contact_number'], ENT_QUOTES) : "";  ?>" /></td>
				</tr>

				<tr>
					<td>Address</td>
					<td><textarea name='address' class='form-control' required><?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address'], ENT_QUOTES) : "";  ?></textarea></td>
				</tr>

				<tr>
					<td>Email</td>
					<td><input type='email' name='email' class='form-control' required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" /></td>
				</tr>

				<tr>
					<td>Password</td>
					<td><input type='password' name='password' class='form-control' required id='passwordInput'></td>
				</tr>

			</table>	
				<td></td>
				<td>
						<button type="submit" class="btn btn-primary"  onclick="closeModal();" >
							<span></span> Sign Up
						</button>
					</td>	
				

			
        


        </form>
      </div>
    </div> -->
    
  <!-- </div> -->

  <div class='modal'>
    <!-- Modal content -->
    <div class="modal-box" onclick="closeWindow(window.onclick)" style="height: 90%;">
      <span class="close" onclick="closeModal()">&times;</span>

      <div class="modal-content" style="box-shadow: none !important; ">
        <p>Sign up to know our latest deals and shop our products!</p>
        <form action='register.php' method='post' id='register'>
			<table class='table table-responsive'>
				<tr>
					<td class='width-30-percent'>Firstname</td>
					<td><input type='text' name='firstname' class='form-control' required value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname'], ENT_QUOTES) : "";  ?>" /></td>
				</tr>

				<tr>
					<td>Lastname</td>
					<td><input type='text' name='lastname' class='form-control' required value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname'], ENT_QUOTES) : "";  ?>" /></td>
				</tr>

				<tr>
					<td>Contact Number</td>
					<td><input type='text' name='contact_number' class='form-control' required value="<?php echo isset($_POST['contact_number']) ? htmlspecialchars($_POST['contact_number'], ENT_QUOTES) : "";  ?>" /></td>
				</tr>

				<tr>
					<td>Address</td>
					<td><textarea name='address' class='form-control' required><?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address'], ENT_QUOTES) : "";  ?></textarea></td>
				</tr>

				<tr>
					<td>Email</td>
					<td><input type='email' name='email' class='form-control' required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" /></td>
				</tr>

				<tr>
					<td>Password</td>
					<td><input type='password' name='password' class='form-control' required id='passwordInput'></td>
				</tr>

			</table>	
				<td></td>
				<td>
						<button type="submit" class="btn btn-primary"  onclick="closeModal();" >
							<span></span> Sign Up
						</button>
					</td>	
				

			
        


        </form>
      </div>
    </div>
    </div>  



<!-- // include page footer HTML -->
<!-- include_once "Login/layout_foot.php"; -->


</html>

