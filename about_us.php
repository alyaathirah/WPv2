<?php
    session_start();
    //Connect to database 
    include_once('db/config.php');

    //For Modal
    if (isset($_SESSION['id']) && isset($_SESSION['Username'])) {
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
        if(empty($FName) || empty($LName) || empty($UName) || empty($Email) || empty($Bio)
		|| empty($PNumber) || empty($Birthday) || empty($Address) || empty($City) 
		|| empty($State) || empty($State) || empty($Zip) || empty($Gender)){
          if(empty($FName)) {
            $FName="Set Now";
          }

          if(empty($LName)) {
            $LName="Set Now";
          }

          if(empty($Bio)) {
            $Bio="Set Now";
          }

          if(empty($Address)) {
            $Address="Set Now";
          }	

          if(empty($State)) {
            $State="";
          }

          if(empty($City)) {
            $City="";
          }	

          if(empty($Zip)) {
            $Zip="";
          }

          if(empty($Gender)) {
            $Gender="Set Now";
          }

          if(empty($PNumber)) {
            $PNumber="Set Now";
          }
        }
      }
       

?>

<!DOCTYPE html>
<html lang="en"><!--alya-->
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title id="page">Products</title>
    <link rel="icon" href="images/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleShoppingList.css">
    <link rel="stylesheet" href="css/styleProfile.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="../WPv2/js/testJS.js"></script>
    <script type="text/javascript" src="../WPv2/js/product_desc.js"></script>   
    

  </head>
  <body class="container">
    <!--Start of header-->
    <header class="blog-header py-3">
      <div class="row flex-itemrap justify-content-between align-items-center">
        <!--User's Account modal button-->
        <div class="col-4 pt-1">
          <a class="account" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
            ><img src="<?php echo $images;?>" alt="profile photo" id="profile photo" style="height: 50px;; width: 50px;; border-radius: 50%;">
               <br />
            My Account</a>

          <br />
        </div>
        <div class="col-4 text-center">
          <a class="blog-header-logo text-dark" href="homepage.html"
            ><img src="images/logo.png" style="width: 200px; height: auto"
          /></a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a
            class="btn btn-sm btn-outline-secondary"
            href="shoppingList.html"
            style="margin-right: 10px;"
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
          <a></a>
        </div>
      </div>
    </header>
    <!--End of header-->
    <!--Start of Navigation Bar-->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="home.php"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-togglekjgg"
              href="#"
              id="navbarDropdownMenuLink"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Categories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" id="allCategoriesNav" href="#">All Categories</a>
              <a class="dropdown-item" id="fruitVegNav" href="#">Fruits and Vegetables</a>
              <a class="dropdown-item" id="snacksNav" href="#">Snacks</a>
              <a class="dropdown-item" id="instantFoodNav" href="#">Instant Food</a>
              <a class="dropdown-item" id="stationeryNav" href="#">Stationeries</a>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="about_us.html">About Us</a>
          </li>
        </ul>
        
        <form class="form-inline my-2 my-lg-0" action = "search.php" method = "get" style="margin-right: 2px;">
          <input class="searchBar form-control mr-sm-2" type="text" placeholder="Search" name = "query">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
    <!--End of Navigation Bar-->

    <section class="about_us">
        <div class="about_us--mask">
            <h2 class="title-about_us">Gro-Sir</h2>
            <h4 class="subtitle-about_us">About Us</h4>
            <p> <strong>Gro-Sir</strong> is an online shopping list that connected directly to our store.
                  It also show the quantity of the stock at the store to ease our customer in planning for the
                  shopping trips. Other than that, the purpose for this shopping list also to ensure that no
                  necessary items are forgotten during the trip and to avoid any money on unneeded item during
                  shopping spree.
            </p>
            <a class="btn btn-outline-light btn-lg" href="homepage.html" role="button">Let's Go!</a>
        </div>
    </section>

    <!--Start of Main-->
    <main class="container1">
    <div class="visionandmision">
        <div class="vision">
              <h4 class="subtitle--vision"><strong>Vision</strong></h4>
              <p> To become the front-runner supermarket of Malaysian in which consumers
                  can obtain great bargain and saving from grocery shopping.  </p>
        </div>

        <div class="mision">
            <h4 class="subtitle--mision"><strong>Mision</strong></h4>
            <p> To provide the customer with a platform that going to make
                the shopping trip much more efficient, time saving and productive
                in order to deliver the full satisfaction to the customer.
            </p>
        </div>
    </div>
                 <!-- End of Vision and Mision-->

                 <!--We are here map-->
    <div class="container p-4">
        <h1 class="text-center" style="color:black">We are here!</h1>
          <hr>
          <div class="row">
             <div class="col-sm-8">
                <div class="map">
                   <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1Dkek1ZL97ImBQsddBmHPFOtU7hqGz4V5"  width="500" height="700" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                 </div>
               </div>
               <div class="col-sm-4" id="contact2">
                  <h4 class="pt-2" style="color:black" >Address</h4>
                   <p style="color:black">PJ Industrial Park, No. 13 Jalan Kemajuan,
                    Petaling Jaya, Selangor Darul Ehsan</p>
                   <h4 class="pt-2" style="color:black">Contact Us</h4>
                   <p style="color:black">03-7957-3959</a></p>
                   <h4 class="pt-2" style="color:black" >Email</h4>
                   <p style="color:black">shoppinglist.com</a></p>
               </div>
              </div>
            </div>
                    <!--End of We are here map-->     
    </main>
    <!--End of Main-->
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
                This is our company policy, which is the policy of our company. This policy is for those who ask what is our policy and not for those that didnt ask.
              </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase text-dark">Customer Support</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a class="text-dark">Call Us: 012-3456789</a>
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
          >webprogramming2021@gmail.com</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
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
       <!----------Shopping List modal -------->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h6 class="modal-title title" id="UserProfileLabel" style="font-size: 25px;">Select List</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                
            <!-- Content in Modal -->
            <div class="modal-body">
                <div class="container-fluid">
                
                <div class = "shoppingList" id = "shoppinglist1">
                <div class="row">
                    <div class="col">
                    <a class = "addToList" href="#" class="close" data-dismiss="modal" style="color: black;" onclick="snack()">
                        <div id = "titleList">Shopping List</div>
                    </a>
                    </div>
                    <div class="col-md-auto">
                    
                    </div>
                </div>
                </div>
        
                <div class = "shoppingList" id = "shoppinglist2">
                <div class="row">
                    <div class="col">
                    <a href="#" style="color: black;"><div id = "titleList">Grocery List</div></a>
                    </div>
                    <div class="col-md-auto">
                    </div>
        
                    <div class="col col-lg-2">
                        <span class="deletebtn" id = "2" onClick = "myFunction2()"></span>
                    </div>
        
                </div>
                </div>
        
                <div id = "newSL"></div>
            
                    <div class = "row">
                    <br><br><br>
                    <button id="btn" class="submit-btn rounded-pill float-sm-end" style = "width: 150px; margin:auto; display:block;" >Add New List</button>
                    
                    <form id="editForm"  action="" method="post" name="editForm" style = "margin:auto; display:block;">
                    
                        <input type="text" id="input" size="20" name="fname">
                        <button type="button" class = "submit-btn rounded-pill float-sm-end" style = "width: 50px;" onClick = 'addSL()'>+</button>
                        <button id="btnClose" class = "submit-btn rounded-pill float-sm-end" style = "width: 150px;" data-dismiss="modal">Cancel</button>
                    </form>
                    </div>
                
                </div>
                </div>
            
            </div>
            </div>
        </div>
        <div id="snackbar">Item was added into Shopping List</div>
        <!------End of Shopping List modal -------->
        <!--Login Alert Modal-->
      <div class="modal fade" id="loginAlrertModal" tabindex="-1" aria-labelledby="loginAlrertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Deletion" style="color: #a82c21;"><strong>Login Alert</strong> </h5>
            </div>
            <div class="modal-body" style="color: black;">
            Please login first before adding item(s) to your list
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="login.html">
                    <button type="button" class="btn" style="background-color:  maroon; color: white;">Login</button>
                </a>    
            </div>
        </div>
        </div>
      </div>
        <!-- Profile Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel" style="color: #a82c21; font-size:40px;">Profile</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times" style="font-size: 35px;"></i></button>
              </div>
                <?php 
                
                require_once('testModal.php');
                getModal($images,$FName,$LName,$UName,$Email,$Bio,$Gender,$PNumber,$Birthday,$Address,$City,$Zip,$State); 
                ?>
            </div>
              <?php 
                }else{
                    header("Location: login.php");
                    exit();
                }
              ?>
              <div class="modal-footer">
                <a href="profile.php">
                    <button type="button" class="btn" style="background-color:  maroon; color: white;">Setting</button>
                </a>
                <a href="logout.php">
                    <button type="button" class="btn btn-secondary">Logout</button>
                </a>
              </div>
            </div>
          </div>
        </div>

                <script>
                  function reset(){
                    localStorage.clear();
                  }
                </script>
              </div>
              </div>
          </div>
          </div> 
        </div>
        <?php
        //Freeing Resource and closing connection
        $pdo = null;
        ?>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/shoppingList.js"></script>
        <script type="text/javascript" src="../WPv2/js/testJS.js"></script>
  </body>
  <?php
        //Freeing Resource and closing connection
        $pdo = null;
  ?>
</html>
