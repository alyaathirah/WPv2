<?php
include_once('db/config.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $result = mysqli_query($mysqli, "SELECT * FROM item WHERE item_id='$id'");
  $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
          <title id="title_page"><?php echo $row['name'] ?></title>
          <link rel="icon" href="images/icon.png" type="image/x-icon" />
          <link rel="stylesheet" href="bootstrap.css?v=<?php echo time(); ?>" />
          <link rel="stylesheet" href="user.css">
          <link rel="stylesheet" href="css/style.css">
          <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
          <link rel="stylesheet" href="css/styleShoppingList.css">
          <link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>" />
          <script type="text/javascript" src="js/product_page.js"></script>
          <script type="text/javascript" src="js/project_desc.js"></script>
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
                        <li class="breadcrumb-item active text-uppercase font-weight-bold" aria-current="page"><?php echo $row['category_name(FK)']?></li>
                        <li class="breadcrumb-item active text-uppercase font-weight-bold"><a class="adminbreadcrumb" href="allProduct.php?category=<?php echo $row['category_name(FK)']?>">View</a></li>
                        <li class="breadcrumb-item active text-uppercase font-weight-bold" aria-current="page"><?php echo $row['name']?></li>
                      </ol>
                    </nav>
                </div>
        </nav>
    <div class="container mb-2"><br><br>
      <div class="text-center pt-5 text-white">
          <h1 class="display-4 font-weight-normal" style="font-family:Times New Roman; color:#660a03;">Manage Your Product</h1><br>
      </div>
    </div>
           
       <div class="container" style="margin-top: -20px;">
            <div class="row">
                <div class="col-2 bg-white mb-2">
                    <br><div class="d-flex align-items-start">
                      <div class="nav flex-column nav-pills me-3" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active dis" data-bs-toggle="pill" 
                        data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" 
                        aria-selected="true" href="admin.php" disabled>Your Products</a>         
                        
                        <a class="nav-link admin-btn" id="textwhite" data-bs-toggle="pill" 
                        data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" 
                        aria-selected="false" href="Add product.html">Add Product</a>
                        
                        <a class="nav-link admin-btn" id="textwhite" type="button" role="tab" aria-controls="v-pills-home" 
                        aria-selected="false" data-toggle="modal" data-target="#LogoutModal">Log out</a>
                      </div>
                    </div>
                </div>
        <!--Start of Main-->
      <main class="col-10 mb-2">
        <div class="page_product ">

          <div class="product_details">
            <div class="product_details-img">
                <a class="product_img" href="#">
                    <img src="images/<?php echo $row['image'] ?>" style="width: 300px; height: 300px;" >
                </a>
            </div>
            <div class="product_detail">
                <div class="row">
                  <h4 class="font-weight-bold"><?php echo $row['name'] ?></h4>
                </div>
                <div class="row">
                  <h5 class=""><?php echo $row['price'] ?></h5>
                </div>
                <div class="row">
                  <div><p id="localOrImport"><?php echo $row['origin'] ?></p></div>
                </div>
                <div class="row">
                  <div class="col-10" style="padding-left: 0%;"><p id="description"><?php echo $row['description'] ?></p></div>
                </div>
                <div class="row">
                  <p class="product_weight1" id="product_weight">Weight: <?php echo $row['weight'] ?></p>
                </div>
                <div class="row">
                  <div><p class="exp_date" id="exp_date">Expiry Date: <?php echo $row['expiry_date'] ?></p></div>
                </div>
                <div class="row">
                  <div class=""><p class="stock">Stock: <?php echo $row['qty'] ?></p></div>
                </div>  
               </div>
                <?php } mysqli_close($mysqli);?>
            </div>
            </main>
      </div>
    <!--End of Main-->          
    </div>
        
        <!-- Footer -->
    <footer class="text-center text-lg-start">
      
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
