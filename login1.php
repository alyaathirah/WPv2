<!--<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	
</head>
<body>
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
          <a href="signup.php" class="ca">Create an account</a>
     </form>
</body>
</html>-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />

    <link rel="icon" href="images/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/styleLogin.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/userList.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <title>Login Page</title>
  </head>

  <body>
    <!-- Float an Image Without Text Wrapping -->
    <div class="box">
      <div class="imgBx">
        <img src="images/pizza.jpg" id = "pizza"/>
        <!-- no need to set size here -->
      </div>
      <div class="content">
        
        <h2>Welcome to GroSir</h2>

        
        <br />
        <p>Sign In</p>
		<!-- SIGN IN -->
    <?php 
     session_start();
      if (isset($_SESSION['fail'])) {
      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px; margin-bottom: 0px;">
          <strong><?php echo $_SESSION['fail'];?></strong>
          
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <script>
          document.getElementById("profilePhoto").style = " height: 100%";
        </script>
      <?php
        unset ($_SESSION['fail']);
      }
      else if (isset($_SESSION['success'])) {
      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px; margin-bottom: 0px;">
          <strong><?php echo $_SESSION['success'];?></strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
        unset ($_SESSION['success']);
      }
    ?>
    
      <form class='form-signin' action='login.php' method='post'>
          <br />
          <label>Email:</label><br />
          <input type="text" name="email" class="form-control" placeholder="Email" required="" autofocus="">
          <br />
          <label>Password:</label><br />
          <input type="password" name="password" class="form-control" placeholder="Password" required="">
          <br />
          <input type="submit" class="btn btn-lg btn-primary btn-block" value="Log In" onClick = "Login()" >
		  <script>
			  function Login(){
				localStorage.setItem("status","logged in");
			  }
			  </script>
            
          <!--onclick="window.location.href='homepage.html';               
                     localStorage.setItem('status','logged in');"-->
        </form>
        <!-- Trigger/Open The Modal -->
        <p>
          Need an account?
          <span type = "button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Register</span>
        </p>
      </div>
    </div>
	
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style = "color: black">Register an account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action = "register.php" method = "POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label" style = "color: black">Username</label>
            <input type="text" class="form-control" name="uname" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label" style = "color: black">Email</label>
            <input type="email" class="form-control" name = "email" required>
          </div>
		  <div class="form-group">
            <label for="message-text" class="col-form-label" style = "color: black">Password</label>
            <input type="password" class="form-control" name="password" required>
          </div>
		<button type="button" class="btn btn-secondary" data-dismiss="modal" style = "align: right">Cancel</button>
        <button type="submit" class="btn btn-primary" name = "Submit" style = "align: right" onClick = "Login()">Submit</button>

        </form>
      </div>
      
    </div>
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

  <!-- <div class='modal'>
    
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
    </div>   -->



<!-- // include page footer HTML -->
<!-- include_once "Login/layout_foot.php"; -->

<script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
      crossorigin="anonymous"
    ></script>
    
    <script type="text/javascript" src="../WPv2/js/testJS.js"></script>

</html>