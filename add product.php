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
        <a href="homeAdmin.php">
          <img src="images/logoadmin.png" style="width: auto; height: auto;"/></a>
          </a>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <nav aria-label="breadcrumb" class="ml-auto"><br>            
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active text-uppercase font-weight-bold" aria-current="page">Add Product</li>
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
                          <a class="nav-link active admin-btn" data-bs-toggle="pill" 
                          data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" 
                          aria-selected="true" href="admin.php" >Your Products</a>         
                          
                          <a class="nav-link dis" id="textwhite" data-bs-toggle="pill" 
                          data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" 
                          aria-selected="true" href="Add product.php" disabled>Add Product</a>
                          
                          <a class="nav-link admin-btn" id="textwhite" type="button" role="tab" aria-controls="v-pills-home" 
                          aria-selected="false" data-toggle="modal" data-target="#LogoutModal">Log out</a>
                        </div>
                    </div>
                </div>
        <main class="col-10 mb-2">
          <div id="product-items">
          <br><form class="form-inline">
            <h5 class="text-dark">Add New Product</h5> 
          </form>      
          <p class="text-muted">Please choose the right category for your product</p><hr>
          <div class="mb-3 row"></div>
          <!-- Start POST Method -->
          <form action="add.php" method="POST" name="form1" enctype="multipart/form-data">
          <div class="row g-3">
            <div class="col-sm-5">
              <input id="new_prod" style="background-color:wheat;" type="text" class="form-control" placeholder="Product Name" aria-label="product name" name="newitem" required>
            </div>
            <select id="new_category" style="background-color:wheat;" class="text-dark form-select col-sm-5 border-black" aria-label="Default select example" name="newcat" required>
              <option value="Select category" selected>Select category</option>
              <option value="Fruits and Vegetables">Fruits and Vegetables</option>
              <option value="Snacks">Snacks</option>
              <option value="Instant Food">Instant Food</option>
              <option value="Meat and Seafood">Meat and Seafood</option>
              <option value="Bakery and Bread">Bakery and Bread</option>
            </select>
          </div>
          <div class="mb-2 row"></div>
          <div class="mb-3">
            <label for="productDescTextarea1" class="form-label text-dark">Product Description</label>
            <textarea class="form-control col-sm-10" style="background-color:wheat;" id="productDesc" rows="3" name="newdesc" required></textarea>
          </div>      
          <div class="mb-3 row">
            <label for="inputPrice" class="col-sm-1 col-form-label text-dark">Price</label>
            <div class="input-group col-sm-2">
              <span class="input-group-text" id="inputGroup-sizing-default">RM</span>
              <input id="new_Price" name="newprice" style="background-color:wheat;" type="text" class="form-control col-sm-10" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
            </div>
            <label for="inputweight" class="col-sm-1 col-form-label text-dark">Weight</label>
            <div class="input-group col-sm-2">
              <input id="new_Weight" name="newweight" style="background-color:wheat;" type="text" class="form-control col-sm-12" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
            </div>
            <label for="inputStock" class="col-sm-1 col-form-label text-dark">Stock</label>
            <div class="col-sm-2">
              <input type="number" style="background-color:wheat;" class="form-control" id="new_Stock" name="newstock" required>
            </div>
          </div>
          <div class="row">
              <label for="inputexpDate" class="col-sm-2 form-label text-dark">Expiry Date</label>
              <div class="col-sm-4">
                <input type="date" style="background-color:wheat;" class="form-control" id="new_expDate" name="newexpdate" required>
              </div>
              <div class="col-sm-1 form-check form-check-inline">
                <input class="form-check-input" type="radio" style="background-color:wheat;" value="Local" id="new_Local" name="neworigin" required>
                <label class="form-check-label text-dark" for="exampleRadios1">
                  Local
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" style="background-color:wheat;" type="radio" value="Imported" id="new_Imported" name="neworigin" required>
                <label class="form-check-label text-dark" for="exampleRadios2">
                  Imported
                </label>
              </div>
          </div>
          <div class="mb-3 row"></div>
          <div class="mb-2 row">
            <div class="form-inline justify-content-center">
            <label for="formGroupExampleInput" class="col-2 form-label text-dark">Product Images</label>
            <input accept="images/*" type="file" style="background-color:wheat;" onchange="preview_image(event)" class="form-control col-sm-4" id="new_Image" name="newimage" required>
            <img id="output_image" src="images/addimageicon.png" style="width: 230px; height: 200px; padding-left: 30px;">
            
            <script type='text/javascript'>
              function preview_image(event) 
              {
               var reader = new FileReader();
               reader.onload = function()
               {
                var output = document.getElementById('output_image');
                output.src = reader.result;
               }
               reader.readAsDataURL(event.target.files[0]);
              }
              </script>

            </div>
          </div><br>
          <div class="row justify-content-end">
            <div class="col-4 text-dark">
              <input type="submit" id="updatebtn" class="admin-btn col-sm-5 text-uppercase" name="Submit" value="Update">
              <button id="delbtn" type="button" class="admin-btn col-sm-5 text-uppercase">Cancel</button>
            </div>
          </div> 

          <div class="mb-3 row"></div>
        </form>
        </div>
        </main>
          </div>  
        </div>

        <!--Modal Update Product-->
        <!-- <div class="modal fade" id="updtModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header justify-content-center">
                <img src="images/logoadmin.png" style="width: 130px; height: 50px"/>       
              </div>
              <div class="modal-body">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Your product is successfully updated.</h5>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                <button onclick="addProduct()" type="button" class="btn btn-outline-info" data-dismiss="modal">Confirm</button>
              </div>
            </div>
          </div>
        </div> -->
        <!--Modal Confirm Log out-->
        <!-- <div class="modal fade" id="LogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="login.html" type="button" class="btn btn-outline-info">Confirm</a>
              </div>
            </div>
          </div>
        </div> -->
        
        
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

<script type="text/javascript" src="adminproduct.js"></script>
    </body>
</html>
