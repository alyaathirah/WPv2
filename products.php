<?php
    //Connect to database 
    include_once('db\config.php');
    
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
    <title id="page"></title>
    <link rel="icon" href="images/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleShoppingList.css">
    <script type="text/javascript" src="js/product_des.js"></script>
    <script type="text/javascript" src="js/test.js"></script>
  </head>
  <body class="container">
    <!--Start of header-->
    <header class="blog-header py-3">
      <div class="row flex-itemrap justify-content-between align-items-center">
        <!--User's Account modal button-->
        <div class="col-4 pt-1">
          <a class="account" href="#" data-toggle="modal" data-target="#staticBackdrop" 
            ><img src="images/abstract-user-flat-4.png" style="height: 50px; width: 50px; margin-left: 12px"alt="profile photo" id="profile"/>
               <br />
            My Account</a>
            <script>
                var status = localStorage.getItem("status");
                 if(status != "logged in"){
                 account = document.querySelector(".account");
                 account.setAttribute("data-toggle","''");
                 account.setAttribute("data-target","''")
                 account.setAttribute("href","login.html");
                }
                </script>
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
            <a class="nav-link" href="homepage.html"
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
              <a class="dropdown-item" id="allCategoriesNav" href="products.php">All Categories</a>
              <a class="dropdown-item" id="fruitVegNav" href="products.php">Fruits and Vegetables</a>
              <a class="dropdown-item" id="snacksNav" href="products.php">Snacks</a>
              <a class="dropdown-item" id="instantFoodNav" href="products.php">Instant Food</a>
              <a class="dropdown-item" id="stationeryNav" href="products.php">Stationeries</a>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="about_us.html">About Us</a>
          </li>
        </ul>
        
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
    <!--Start of Main-->
    <main class="container">

        <div class="products">
            <h2 class="page_title" id="page_title"></h2>
            <div class="container1">
                <div class = "product-items">
                    <!-- single product -->
                    <?php
                        //set the limit for one page
                        $limit = 16;
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $start = ($page - 1) * $limit;
                        $item = "SELECT * FROM item LIMIT $start, $limit";
                        $result = $pdo->query($item);
                       
                        //count number of items/rows in the database
                        $itemCountQuery = "SELECT count(*) FROM item";
                        $itemCount = $pdo->query($itemCountQuery)->fetchColumn(); 
                        $numOfPages = ceil( $itemCount / $limit);
                        $previous = $page - 1;
                        $next = $page + 1;

                        while($res = $result->fetch()) {        
            
                    ?>
                   
                    <div class = "product">
                        <div class = "product-content">
                            <div class = "product-img">
                                <img id="prdimg" src="<?= $res['image']; ?>" alt="product image">
                            </div>
                            <div class = "product-btns">
                                
                                    <button type = "button" class = "btn-add"> add to list
                                    </button>
                                <a href="product_des.html" onclick="clickFunc()">
                                    <button type = "button" class = "btn-view"> view item
                                    </button>
                                </a>
                            </div>
                        </div>
        
                        <div class = "product-info">
                            <a href = "#" id="prd_name" class = "product-name"><?= $res['name']; ?></a>
                            <p id="prd_price1" class = "product-price"><?= $res['price']; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div> 
            </div>
            
        </div>
        
        <!--Pagination-->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                
                <li class="page-item">
				    <a class="page-link" href="products.php?page=<?= $previous; ?>" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				    </a>
				</li>

                <?php for($i = 1; $i<= $numOfPages; $i++) : ?>
				    <li class="page-item"><a class="page-link" href="products.php?page=<?= $i; ?>"><?= $i; ?></a></li>
			    <?php endfor; ?>

                <li class="page-item">
				    <a class="page-link" href="products.php?page=<?= $next; ?>" aria-label="Previous">
				        <span aria-hidden="true">&raquo;</span>
				    </a>
				</li>

            </ul>
        </nav>

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
          >webprogramming2021@gmail.com</a
        >
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
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="UserProfileLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="UserProfileLabel" style="font-weight: bold; color:#bb4166f5; background: linear-gradient(to right, rgb(87, 14, 14) 30%,#8d1a3cf5 50%); -webkit-background-clip: text; -webkit-text-fill-color:transparent;">My Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                  <img src="images/abstract-user-flat-4.png" class="wrapper2" alt="profile photo" id="profile photo">
                  <div class="row" >
                  <div class="col-sm-4 label">First Name</div>
                  <div class="col-sm-4 label">Last Name</div>
                  <div class="col-sm-4 label">Username</div>
                  <div class="col-sm-4 text-muted" id="FName">Maria</div>
                  <div class="col-sm-4 text-muted" id="LName">Mariam</div>
                  <div class="col-sm-4 text-muted" id="Username">@marry</div>
                  <div class="col-sm-6 label">Email</div>
                  <div class="col-sm-6 label">Bio</div>
                  <div class="col-sm-6 text-muted" id="LName">Mariamariam@gmail.com</div>
                  <div class="col-sm-6 text-muted" id="LName">Shopping is my cardio ;)</div>
                  <div class="col-sm-4 label">Gender</div>
                  <div class="col-sm-4" style="color:maroon; font-size:15px; font-weight:bold;">Phone Number</div>
                  <div class="col-sm-4 label">Birthday</div>
                  <div class="col-sm-4 text-muted" id="Gender">Female</div>
                  <div class="col-sm-4 text-muted" id="PNumber">+6012345789</div>
                  <div class="col-sm-4 text-muted" id="Birthday">01-01-01</div>
                  <div class="col-sm-12 label">Address</div>
                  <div class="col-sm-12 text-muted" id="Address">121 Blue Hill Rd Hopewell Junction 12533 New York</div>
                  </div>
                </div>
              <div class="modal-footer">
                <a href="setting.html"><button type="submit" class="setting-btn rounded-pill float-end" id="Setting">Setting</button></a>
                <a href="homepage.html" onclick="reset()"><button type="submit" class="logout setting-btn rounded-pill" id="Logout">Logout</button>
                

                <script type="text/javascript" src="js/shoppingList.js"></script>
                <script type="text/javascript" src="js/products.js"></script>
                <script type="text/javascript" src="js/data.js"></script>
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
  </body>
</html>
