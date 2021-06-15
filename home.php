<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['Username'])) {
  include_once("config.php");
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
    if(empty($FName) || empty($LName) || empty($UName) || empty($Email) || empty($Bio) || empty($PNumber) || empty($Birthday) || empty($Address) || empty($City) || empty($State) || empty($State) || empty($Zip) || empty($Gender)|| empty($images))
    {
      if(empty($images)) {
        $images="images/default.png";
      }

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
      if(empty($Birthday)) {
        $Birthday="Set Now";
      }
    }
  }
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="user.css">
     <!-- Bootstrap CSS -->
     <link rel="icon" href="images/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleShoppingList.css">
    <link rel="stylesheet" href="css/styleProfile.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="../WPv2/js/testJS.js"></script>
    <title>Homepage</title>
    
  </head>
  <body >
  <header class="container blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <!--User's Account modal button-->
        <div class="col-4 pt-1">
        <?php 
          echo $id;
        ?>
        <img src="<?php echo $images;?>" alt="profile photo" id="profilePhoto" style="height: 50px;; width: 50px;; border-radius: 50%;">
        <script>
          var status = localStorage.getItem("status");
             if(status != "logged in"){
          document.getElementById("profilePhoto").src = "images/default.png";
             }
        </script>  
        <br>
          <a class="account" href="#" data-toggle="modal" data-target="#staticBackdrop" 
            >My Account</a>
          <br />
          <script>
            var status = localStorage.getItem("status");
             if(status != "logged in"){
             account = document.querySelector(".account");
             account.setAttribute("data-toggle","''");
             account.setAttribute("data-target","''")
             account.setAttribute("href","login1.php");
            }
          </script>
        </div>
        <div class="col-4 text-center">
          <a class="blog-header-logo text-dark" href="homepage.html"
            ><img src="images/logo.png" style="width: 200px; height: auto"
          /></a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
        <!-- list button -->
        <a
            class="btn btn-sm btn-outline-secondary"
            data-toggle="modal" 
            data-target="#exampleModal"
            style="margin-right: 10px;"
            ><img
            class="list"
            src="images/list.png"
            style="width: auto; height: 50px"
            
          /><br />My List</a
        >
          <script>
            // function loginFirst(){
            //   if (localStorage.getItem("status") != "logged in"){
            //     if (confirm("Login first to access shopping list!")) {//gi login
            //       location.replace("login1.php")
            //     } 
            //     else{
            //       location.replace("home.php")
            //     }
            //   }
            // }
            var switchImg = document.querySelector(".list");
            switchImg.addEventListener("mouseover", function(){
              switchImg.setAttribute("src","images/listwhite.png")
            })
            switchImg.addEventListener("mouseout",function(){
              switchImg.setAttribute("src","images/list.png")
            })
          </script>
        </div>
      </div>
    </header>
    <!--Start of Navigation Bar-->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" style="margin-left:205px ;">
          <li class="nav-item active">
            <a class="nav-link disabled" href="home.php" style="color: white;"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
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
            <a class="nav-link" href="about_us.php">About Us</a>
          </li>
        </ul>
        
        <form class="form-inline my-2 my-lg-0" action = "search.php" method = "get" style="margin-right:205px ;">
          <input class="searchBar form-control mr-sm-2" type="text" placeholder="Search" name = "query">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <!--Start of Carousel-->
    <div
      id="carouselExampleIndicators"
      class="carousel slide"
      data-ride="carousel"
    >
      <ol class="carousel-indicators">
        <li
          data-target="#carouselExampleIndicators"
          data-slide-to="0"
          class="active"
        ></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/carousel1.jpg" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="images/carousel2.jpg" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="images/carousel3.jpg" class="d-block w-100" alt="..." />
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!--End of Carousel-->
    <main class = "container">
    <?php require('db\homeFetch.php') ?>
        <div class="products">
            <h2 class="page_title" id="page_title">New Items!</h2>
            <div class="container1">
                <div class = "product-items">
                    <!-- single product -->
                    <?php
                        //set the limit for one page
                        if ($result) {
                          if ($result->num_rows>0) {
                            while($res = $result->fetch_assoc()) {       
                    ?>
                   
                    <div class = "product">
                        <div class = "product-content">
                            <div class = "product-img">
                                <img id="prdimg" src="images/<?= $res['image']; ?>" alt="product image">
                            </div>

                            <div class = "product-btns">
                                
                                    <button type = "button" class = "btn-add"
                                    data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $res['item_id']?>"> 
                                    add to list
                                    </button>
                                <a href="#">
                                    <button  type = "button" id="<?= $res['item_id']; ?>" class = "btn-view"> view item
                                    </button>
                                </a>
                                
                            </div>
                        </div>
        
                        <div class = "product-info">
                            <a href = "#" id="prd_name" class = "product-name"><?= $res['name']; ?></a>
                            <p id="prd_price1" class = "product-price">RM <?= $res['price']; ?></p>
                        </div>
                    </div>
                    <?php }}} ?>
                </div> 
            </div>
            
        </div>
    </main>
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

                <!--------Shopping List modal ------------>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h6 class="modal-title title" id="UserProfileLabel" style="font-size: 40px;">My List</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    
                <!-- Content in Modal -->
                <div class="modal-body" id = "modal-body-list">
                </div>

              </div>
            </div>
            </div>
            </div>
            <!--------End Shopping List modal ------------>
        <!-- Profile Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel" style="color: #a82c21; font-size:40px;">Profile</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
              </div>
                <?php 
                
                require_once('testModal.php');
                getModal($images,$FName,$LName,$UName,$Email,$Bio,$Gender,$PNumber,$Birthday,$Address,$City,$Zip,$State); 
                ?>
            </div>
              
              <div class="modal-footer">
                <a href="profile.php">
                    <button type="button" class="btn" style="background-color:  maroon; color: white;">Setting</button>
                </a>
                <a href = "home.php">
                    <button type="button" class="btn btn-secondary" onClick = "Logout()">Logout</button>
                    <script>
                  function Logout(){
                    localStorage.setItem("status","logged out");
                  }
                  </script>
                </a>
              </div>
            </div>
          </div>
        </div>
              </div>
              </div>
          </div>
          </div> 
        </div>
              <?php 
                }else{
                    header("Location: login.php");
                    exit();
                }
              ?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    $('.btn-add').click(function(){
     console.log($(this).data('id'));
     $('.modal-body').load('getModalContent.php?id='+$(this).data('id'),function(){
     });
    })

    $('.list').click(function(){
    $('#modal-body-list').load('getModalContent.php',function(){
    });
    })

    </script>
    <script type="text/javascript" src="../WPv2/js/testJS.js"></script>
  </body>
</html>
