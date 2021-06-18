<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['Username'])) {

  include_once("db/config.php");
  //getting id from url
  $id = $_SESSION['id'];
  
  //selecting data associated with this particular id
  $result = mysqli_query($mysqli, "SELECT * FROM users2 WHERE id=$id");
  
  while($res = mysqli_fetch_array($result))
  {
    
    $FName=$res['FirstName'];
    $LName=$res['LastName'];
    $UName=$res['Username'];	
    $Email=$res['Email'];
    $Bio=$res['Bio'];
    $PNumber=$res['PhoneNumber'];	
    $Birthday=$res['Birthday'];	
    $Address=$res['Address1'];
    $City=$res['City'];
    $State=$res['State1'];
    $Zip=$res['Zip'];
    $Password=$res['Password1'];
    $images=$res['images'];
    $Gender=$res['Gender'];
    if(empty($images)) {
        $images="images/default.png";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Setting</title>
    <link rel="icon" href="images/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="images/setting.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/path/to/jquery.cookie.js"></script>
    <script>
      window.onload = function(){
        console.log(status)
      }
      window.addEventListener('scroll', function() {
        document.getElementById('submit').innerHTML = window.pageYOffset + 'px';
      })
    </script>
    <style>
      .center{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 0px;
      }
      .profile-pic {
        height: 250px;
        width: 250px;
        position: relative;
        border-radius: 50%;
        border: 1px solid maroon;
        background-size: 100% 100%;
        margin-top: 0px;
        margin-left: auto;
        margin-right: auto;
        overflow: hidden;
        display: block;
      }
      img{
        height: 100%;
        width: 100%;
        margin:0px;
        margin-left: auto;
        margin-right: auto;
      }
      
      #uploadBtn{
        height: 30px;
        width: 100%;
        position: absolute;
        bottom:0;
        left:50%;
        transform: translateX(-50%);
        text-align: center;
        background: rgba(143,1,27,0.7);
        color: white;
        line-height: 30px;
        font-family: sans-serif;
        font-size: 15px;
        cursor: pointer;
      }
      .set{
        
        color: maroon;
        font-weight: bold;
      }
      
      .title{
        text-transform:capitalize;
        text-align: center;
        letter-spacing: 3px;
        font-size: 48px;
        line-height: 48px;
        padding-bottom: 20px;
        color:#bb4166f5;
        background: linear-gradient(to right, rgb(87, 14, 14) 30%,#8d1a3cf5 50%);
        -webkit-background-clip: text;
        -webkit-text-fill-color:transparent;
      }

    </style>
    <script> 
      function myFunction(){
            $('#collapseExample').toggle(); 
      };
      
    </script>
  </head>

  <body class="container">
    <!--Start of header-->
    <header class="container blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <!--User's Account modal button-->
        <div class="col-4 pt-1" style="color: black; font-size: medium;">
          <a href = "logout.php">
            <button type = "button" name="login-btn"  class="btn rounded-pill" style="background-image: linear-gradient(125deg,#971006, #a72879); color: white;">Log Out</button>
          </a>
        </div>
        <div class="col-4 text-center"> 
          <a class="blog-header-logo text-dark" href="homepage.html"
            ><img src="images/logo.png" style="width: 200px; height: auto"
          /></a>
        </div>
        <!--list button-->
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a
              class="btn btn-sm btn-outline-secondary"
              data-toggle="modal" 
              data-target="#listModal"
              style="margin-right: 10px;"
              id = "viewList"
              ><img
              class="list"
              src="images/list.png"
              style="width: auto; height: 50px"
            /><br />My List</a
          >
          <script>
            var switchImg = document.querySelector(".list");
            switchImg.addEventListener("mouseover", function(){
              switchImg.setAttribute("src","images/listwhite.png")
            })
            switchImg.addEventListener("mouseout",function(){
              switchImg.setAttribute("src","images/list.png")
            })
          </script>
        </div>
        <div class="modal fade" id="listModal" tabindex="-1" role="dialog" aria-labelledby="listModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h6 class="modal-title title" id="UserProfileLabel" style="font-size: 40px;">My List</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body" id = "modal-body-list">
            </div>

          </div>
        </div>
      </div>
      <script>
        $('.list').click(function(){
        $('#modal-body-list').load('getModalContent.php',function(){
        });
        })
      </script>
    </header>
    <!--End of header-->
    <!--Start of Navigation Bar-->
    <nav class="navbar sticky-top navbar-expand-lg" style="margin-top: -1px">
            <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="home.php">
                    Home</a>
                </li>
                <li class="nav-item dropdown">
                <a
                    class="nav-link dropdown-toggle Categories"
                    href="#"
                    id="navbarDropdownMenuLink"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" method="GET">
                  <a class="dropdown-item" id="allCategoriesNav" href="#">All Categories</a>
                  <a class="dropdown-item" id="fruitVegNav" href="#">Fruits and Vegetables</a>
                  <a class="dropdown-item" id="snacksNav" href="#">Snacks</a>
                  <a class="dropdown-item" id="instantFoodNav" href="#">Instant Food</a>
                  <a class="dropdown-item" id="stationeryNav" href="#">Stationeries</a>
                </div>
                </li>
               
                <li class="nav-item">
                <a class="nav-link" href="about_us.php">About Us</a>
                </li>
            </ul>
            </div>
            <form class="form-inline my-2 my-lg-0" action = "/search.html">
              <input class="searchBar form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="getQuery()">Search</button>
            </form>
          </div>
          <script>
            function getQuery(){
              var query = document.querySelector(".searchBar").value;
              localStorage.setItem("query",query)
            }
          </script>
        </nav>
    <!--End of Navigation Bar-->
    <!--notification-->
    <!--Starts Update-->
    <main class="container" style="border-style: solid; border-width: thin; border-color: #C4C4C4;">
      <br><h2 class="title">Update Your Account</h2>
      <!--Change photo-->  
        <p class="text-center">
        <a class="btn btn-warning rounded-pill rounded-pill" data-bs-toggle="collapse" href="#collapseExample" role="button" style="width: 100%">
          Profile Picture
        </a>
        </p>
        <div class="collapse show" id="collapseExample">
          <div class="card card-body-1">
            <?php 
              if (isset($_SESSION['status'])) {
              ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: 25px 50px">
                <strong>Hey!</strong><?php echo $_SESSION['status'];?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                unset ($_SESSION['status']);
              }
              else if (isset($_SESSION['status_p'])) {
                ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 25px 50px">
                  <strong>Hey!</strong><?php echo $_SESSION['status_p'];?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php
                  unset ($_SESSION['status_p']);
              }
            ?>
            <form action="edit2.php" method="POST" enctype="multipart/form-data">
            <br><div class="profile-pic">
                  <img src="<?php echo $images;?>" onclick="triggerClick()" id="profileDisplay">
                  <input type="file" name="image" onchange="displayImage(this)" id="image" style="display: none;" >
                  <label for="image" id="uploadBtn">Click me!</label>
              </div>
                  <input type="hidden" name="id" value=<?php echo $_SESSION['id'];?>>
                  <br><div class="center"><button type="submit" name="update_photo" class="center btn rounded-pill" style="background-image: linear-gradient(125deg,#971006, #a72879); color: white;" >Update</button></div>
              <br>
            </form>
          </div>
        </div>
        <!--Change profile-->  
        <p class="text-center"><br>
        <a class="btn btn-warning rounded-pill" data-bs-toggle="collapse" href="#collapseExample1" role="button" style="width: 100%">
        Profile
        </a>
        </p>
        <div class="collapse show" id="collapseExample1">
          <div class="card card-body">
            <?php 
              if (isset($_SESSION['status_pr1'])) {
                ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 25px 50px">
                  <strong>Hey!</strong><?php echo $_SESSION['status_pr1'];?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php
                  unset ($_SESSION['status_pr1']);
              }
            ?>            
            <form action="edit2.php" method="POST" id="myform" name="form1">
              <div class="row g-3 set" >
                <div class="col-md-6">
                  <label for="FName" class="form-label">First Name</label>
                  <input type="text" class="form-control" name="FName"  value="<?php echo ucfirst($FName);?>">
                </div>
                <div class="col-md-6">
                  <label for="LName" class="form-label">Last Name</label>
                  <input type="text" class="form-control" name="LName" value="<?php echo ucfirst($LName);?>">
                </div>
                <div class="col-md-6">
                  <label for="Username" class="form-label">Username</label>
                  <input type="text" class="form-control" name="UName" value="<?php echo $UName;?>" required>
                </div>
                <div class="col-md-6">
                  <label for="Email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="Email" value="<?php echo $Email;?>" required>
                </div>
                <div class="col-12">
                  <label for="Bio" class="form-label">Bio</label>
                  <input type="text" class="form-control" name="Bio" value="<?php echo ucfirst($Bio);?>">
                </div>
                <div class="col-md-4">
                  <label for="PNumber" class="form-label">Phone Number</label>
                  <input type="text" class="form-control" name="PNumber" value="<?php echo $PNumber;?>">
                </div>
                <div class="col-md-4">
                  <label for="Birthday" class="form-label">Birthday</label>
                  <input type="date" class="form-control" name="Birthday" value="<?php echo $Birthday;?>" style="left:30%">
                </div>
                <div class="col-md-4">
                <label for="inputGender" class="form-label" id="Gender" >Gender</label>
                  <select name="Gender" class="form-select" >
                      <option value="Male"<?php if($Gender=="Male") echo 'selected="selected"';?>>Male</option>
                      <option value="Female"<?php if($Gender=="Female") echo 'selected="selected"';?>>Female</option>
                      <option value="Other"<?php if($Gender=="Other") echo 'selected="selected"';?>>Other</option>
                  </select>
                </div>
                <div class="col-12">
                  <label for="Address" class="form-label">Address</label>
                  <input type="text" class="form-control" name="Address" value="<?php echo ucwords(strtolower($Address));?>">
                </div>
                <div class="col-md-4">
                  <label for="City" class="form-label">City</label>
                  <input type="text" class="form-control" name="City" value="<?php echo ucwords(strtolower($City));?>">
                </div>
                <div class=" col-md-4">
                  <label for="State" class="form-label">State</label>
                  <input type="text" class="form-control" name="State" value="<?php echo ucwords(strtolower($State));?>">
                </div>
                <div class="col-md-4">
                  <label for="Zip" class="form-label">Zip</label>
                  <input type="text" class="form-control" name="Zip" value="<?php echo $Zip;?>">
                </div>
                <div class="col-md-1">
                    <td><input type="hidden" name="id" value=<?php echo $_SESSION['id'];?>></td>
                    <button type="submit" name="update"  class="btn rounded-pill" style="background-image: linear-gradient(125deg,#971006, #a72879); color: white;">Update</button></div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!--Change password-->  
        <p class="text-center"><br>
        <a class="btn btn-warning rounded-pill" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample" style="width: 100%">
          Passsword
        </a>
        </p>
        <div class="collapse show" id="collapseExample2">
          <div class="card card-body">
            <?php 
              if (isset($_SESSION['status_ps'])) {
              ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: 0px 50px">
                <strong>Hey!</strong><?php echo $_SESSION['status_ps'];?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                unset ($_SESSION['status_ps']);
              }
              else if (isset($_SESSION['status_ps1'])) {
                ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 25px 50px">
                  <strong>Hey!</strong><?php echo $_SESSION['status_ps1'];?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php
                  unset ($_SESSION['status_ps1']);
              }
            ?>
            <form action="edit2.php" method="POST"  onSubmit="this.scrollPosition.value=document.body.scrollTop">
              <div class="row g-3 set" name="form2">
                <div class="col-md-6">
                  <label for="Password1" class="form-label">Password</label>
                  <input type="password" class="form-control" name="Password1" disabled >
                </div>
                  <div class="col-md-6">
                  <label for="Password2" class="form-label">Old Password</label>
                  <input type="password" class="form-control"  name="Password_old" required>
                </div>
                <div class="col-md-6">
                  <label for="Password1" class="form-label">New Password</label>
                  <input type="password" class="form-control" name="Password_new" required>
                </div>
                <div class="col-md-6">
                  <label for="Password2" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control" name="Password_conf" required>
                </div>
                <div class="col-md-1">
                  <td><input type="hidden" name="id" value=<?php echo $_SESSION['id'];?>></td>
                  <button type="submit" class="btn rounded-pill" name="update_p" style="background-image: linear-gradient(125deg,#971006, #a72879); color: white;" >Update</button></div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!--Delete account--> 
        <p class="text-center"><br>
        <a class="btn btn-warning rounded-pill" data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample" style="width: 100%">
          Delete Account
        </a>
        </p>
        <div class="collapse show" id="collapseExample3">
          <div class="card card-body">
              <div class="row mb-3" style="color: maroon; font-weight:bold"><p>Delete Account?
              <buttton  class="col-md-1 btn rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-image: linear-gradient(125deg,#971006, #a72879); color: white;"> Delete</button></p></div>
          </div>
        </div><br>
      <!--Modal Delete-->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="Deletion" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Deletion" style="color: #a82c21;"><strong>Confirm Deletion</strong> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="color: black;">
            We are sad that you want to leave us, but please note that account deletion is irreversible.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="delete.php">
                    <button type="button" class="btn" style="background-color:  maroon; color: white; ">Delete</button>
                </a>
            </div>
        </div>
        </div>
      </div>
    </main><br>
      <!--Start of Footer-->
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
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste
              atque ea quis molestias. Fugiat pariatur maxime quis culpa
              corporis vitae repudiandae aliquam voluptatem veniam, est atque
              cumque eum delectus sint!
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase text-dark">Customer Support</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a class="text-dark">Call Us: 014-tekan2 x dpt</a>
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
    <!-- Footer -->
    <!--script-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="../WPv2/js/testJS.js"></script>
    <!--manually script-->
    <script>
      function triggerClick(){
        document.querySelector('#image').click();
      }
      function displayImage(e){
        if (e.files[0]){
          var reader = new FileReader();
          reader.onload = function (e) {
            document.querySelector('#profileDisplay').setAttribute('src',e.target.result);
          }
          reader.readAsDataURL(e.files[0]);
        }
        
      }
      
    </script>
    
  </body>

<?php 
  }
else{
     header("Location: login.php");
     exit();
}
 ?>
</html>
