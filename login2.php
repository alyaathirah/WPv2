<?php include 'login.php';
?>

<!DOCTYPE html>


<html lang="en">
  <head>
    <meta charset="utf-8" />

    <link rel="icon" href="images/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/styleLogin.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />

    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/userList.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <title>Login Page</title>
  </head>

  <body>
    <?php include 'login.php';
          include 'db/config.php';?>
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

        <form>
          <br />
          <label>Email:</label><br />
          <input id="email" type="mail" placeholder="Email" name='uname'/>
          <br /><br />
          <label>Password:</label><br />
          <input id="password" type="password" placeholder="Password" name='password'/>
          <br /><br />
          <button type="button" onclick="Login()">
            <!-- go to login function -->
            Login</button
          ><!--onclick="window.location.href='homepage.html';               
                     localStorage.setItem('status','logged in');"-->
        </form>
        <!-- Trigger/Open The Modal -->
        <p>
          Need an account?
          <span class="signUp" onclick="openModal(); clearSignUp()"
            >Sign Up</span
          >
        </p>
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
  <div class="modal">
    <!-- Modal content -->
    <div class="modal-box" onclick="closeWindow(window.onclick)">
      <span class="close" onclick="closeModal()">&times;</span>

      <div class="modal-content">
        <p>Sign up to know our latest deals and shop our products!</p>
        <form>
          <label>Username:</label><br />
          <input id="userName" placeholder="Name" /><br />
          <label>Email:</label><br />
          <input id="userEmail" placeholder="Email" /><br />
          <label>Phone Number:</label><br />
          <input id="userPhone" placeholder="Phone Number" /><br />
          <label>Password:</label><br />
          <input
            id="userPassword"
            type="password"
            placeholder="Password"
          /><br />
          <br />
          <button id="myBtn" type="button" onclick="closeModal(); SignUp()">
            Sign Up
          </button>
          <br /><br />
        </form>
      </div>
    </div>
  </div>
</html>


