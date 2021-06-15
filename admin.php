<?php
include_once("db/config.php");

$result = mysqli_query($mysqli,"SELECT * FROM item");

?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <title>Gro-sir Administrator</title>
        <link rel="icon" href="images/icon.png" type="image/x-icon" />
        <link rel="stylesheet" href="bootstrap.css?v=<?php echo time(); ?>" />
        <link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>"  />
    </head>
    <body class="adminBody">
        <nav class="navbar navbar-expand-lg fixed-top py-0" style="background-color:white;">
            <div class="container">
              <a href="homepage.html">
              <img src="images/logoadmin.png" style="width: auto; height: auto;"/></a>
              </a>
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <nav aria-label="breadcrumb" class="ml-auto"><br>            
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page" aria-disabled="true"><a class="adminbreadcrumb text-uppercase font-weight-bold" href="admin.php">Your Products</a></li>
                        <li class="breadcrumb-item active text-uppercase font-weight-bold" aria-current="page">Categories</li>
                      </ol>
                    </nav>
                </div>
        </nav>
    <div class="container  mb-2"><br><br>
      <div class="text-center pt-5 text-white">
          <h1 class="display-4 font-weight-normal" style="font-family:Times New Roman; color:#660a03;">Manage Your Product</h1><br>
      </div>
    </div>
           
       <div class="container" style="margin-top: -20px;">
            <div class="row">
                <div class="col-2 bg-white  mb-2">
                    <br><div class="d-flex align-items-start">
                      <div class="nav flex-column nav-pills me-3" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active dis" data-bs-toggle="pill" 
                        data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" 
                        aria-selected="true" href="admin.php" disabled>Your Products</a>         
                        
                        <a class="nav-link admin-btn" id="textwhite" data-bs-toggle="pill" 
                        data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" 
                        aria-selected="false" href="add product.php">Add Product</a>
                        
                        <a class="nav-link admin-btn" id="textwhite" type="button" role="tab" aria-controls="v-pills-home" 
                        aria-selected="false" data-toggle="modal" data-target="#LogoutModal">Log out</a>
                      </div>
                    </div>
                </div>
        <main class="col-10 mb-2">
          <br><h5 class="text-dark align-items-center">Categories</h5><hr>
                <?php $row = mysqli_fetch_array($result) ?>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                          <div class="card text-center">
                            <div class="card-body">
                              <img src="images/fruit.jpg" class="rounded-circle" style="width: 100px; height: 100px" alt="...">
                              <h5 class="card-title">Fruits and Vegetables</h5>
                             <?php echo 
                             "<a id='EV' class='admin-btn' href=\"editProduct.php?category=Fruits and Vegetables\">Edit</a>
                              <a id='EV' href=\"allProduct.php?category=Fruits and Vegetables\" class='admin-btn'>View</a>";?>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card text-center">
                            <div class="card-body">
                              <img src="images/instantfood.jpg" class="rounded-circle" style="width: 100px; height: 100px" alt="...">
                              <h5 class="card-title">Instant Food</h5>
                              <?php echo 
                             "<a id='EV' class='admin-btn' href=\"editProduct.php?category=Instant Food\">Edit</a>
                              <a id='EV' href=\"allProduct.php?category=Instant Food\" class='admin-btn'>View</a>";?>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card text-center">
                            <div class="card-body">
                              <img src="images/snacks.jpg" class="rounded-circle" style="width: 100px; height: 100px" alt="...">
                              <h5 class="card-title">Snacks</h5>
                              <?php echo 
                             "<a id='EV' class='admin-btn' href=\"editProduct.php?category=Snacks\">Edit</a>
                              <a id='EV' href=\"allProduct.php?category=Snacks\" class='admin-btn'>View</a>";?>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col">
                          <div class="card text-center">
                            <div class="card-body">
                              <img src="images/meatnseafood.jpg" class="rounded-circle" style="width: 100px; height: 100px" alt="...">
                              <h5 class="card-title">Meat and Seafood</h5>
                              <a id="EV" href="#" class="admin-btn">Edit</a>
                              <a id="EV" href="#" class="admin-btn">View</a>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card text-center">
                            <div class="card-body">
                              <img src="images/bakery.jpg" class="rounded-circle" style="width: 100px; height: 100px" alt="...">
                              <h5 class="card-title">Bakery and Bread</h5>
                              <a id="EV" href="#" class="admin-btn">Edit</a>
                              <a id="EV" href="#" class="admin-btn">View</a>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="mb-3 row"></div>  
        </main>            
              </div>
        </div>

        <!--Modal Confirm Log out-->
        <div class="modal fade" id="LogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header justify-content-center">
                <img src="images/logoadmin.png" style="width: 130px; height: 50px"/>       
              </div>
              <div class="modal-body">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Are you sure to log out?</h5>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                <a href="login1.php" type="button" class="btn btn-outline-info">Confirm</a>
              </div>
            </div>
          </div>
        </div>

        
        <!-- Footer -->
    <footer class="text-center text-lg-start " style="background-color: var(--secondary)">
      
      <div class="container p-4">

      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2020 Copyright:
        <a class="text-dark" style="font-style: italic" href="#"
          >webprogramming2021@gmail.com</a
        >
      </div>
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
    </body>
</html>
