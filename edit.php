<?php
include "db/config.php"; // Using database connection file here
$id = $_GET['id']; // get id through query string
$qry = mysqli_query($mysqli,"SELECT * FROM item WHERE item_id='$id'"); // select query
$data = mysqli_fetch_array($qry); // fetch data
session_start();

if(isset($_POST['update'])) // when click on Update button
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    $expdate = $_POST['expdate'];
    $stock = $_POST['qty'];
    $origin = $_POST['origin'];
    $desc = $_POST['description'];
    $category = $data['category_name(FK)'];

    if(!empty($_FILES['itemimage']['name']))
    {
      $image = $_FILES['itemimage']['name'];
      $target = "images/".basename($image);
      if (move_uploaded_file($_FILES['itemimage']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }
      $edit = mysqli_query($mysqli,"UPDATE item SET `category_name(FK)`='$category',`image`='$image',`name`='$name',`price`='$price',`weight`='$weight',`expiry_date`='$expdate',`qty`='$stock',`origin`='$origin', `description`='$desc' WHERE `item_id`='$id'");
    }
    else{
      $edit = mysqli_query($mysqli,"UPDATE item SET `category_name(FK)`='$category',`name`='$name',`price`='$price',`weight`='$weight',`expiry_date`='$expdate',`qty`='$stock',`origin`='$origin', `description`='$desc' WHERE `item_id`='$id'");
    }
	
    if($edit)
    {
        $_SESSION['updated'] = $name.' is sucessfully updated!';
        mysqli_close($mysqli); // Close connection 
        header("location:editProduct.php?category=$category"); 
        exit;
    }
    else
    {
        echo "ERROR";
    }    	
}
?>

<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <title><?php echo $data['name']?></title>
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
                        <li class="breadcrumb-item active text-uppercase font-weight-bold" aria-current="page"><?php echo $data['category_name(FK)']?></li>
                        <li class="breadcrumb-item active text-uppercase font-weight-bold"><a class="adminbreadcrumb" href="editProduct.php?category=<?php echo $data['category_name(FK)']?>">Edit</a></li>
                        <li class="breadcrumb-item active text-uppercase font-weight-bold" aria-current="page"><?php echo $data['name']?></li>
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
                        aria-selected="false" href="Add product.php">Add Product</a>
                        
                        <a class="nav-link admin-btn" id="textwhite" type="button" role="tab" aria-controls="v-pills-home" 
                        aria-selected="false" data-toggle="modal" data-target="#LogoutModal">Log out</a>
                      </div>
                    </div>
                </div>
        <!--Start of Main-->
      <main class="col-10 mb-2">
      <form method="post" enctype="multipart/form-data">
        <!-- <div class="page_product "> -->
        <div class="container"><br>
        <div class="row" style="padding-left: 240px;">
            <div class="col col-lg-3" >
            <img id="output_image" src="images/<?php echo $data['image'] ?>" style="width: 250px; height:250px">
            </div>
        </div> 
        <div class="row justify-content-md-center">
        <input accept="images/*" onchange="preview_image(event)" type='file' style="color: black;" name='itemimage' class='justify-content-md-center' id='inputGroupFile02' value="<?php echo $data['image']; ?>">

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
        <div class="row justify-content-md-center">
            <div class="col col-lg-6">
            <h5 class="font-weight-bold"><input type="text" style="width: 70%; padding: 9px 70px; margin: 8px 0; background-color:wheat; border:darkviolet; border-radius: 25px;" name="name" value="<?php echo $data['name'] ?>" placeholder="Enter Name" Required></h5>
            </div>
        </div><hr>
        <div class="row justify-content-md-center">
            <div class="col col-lg-9">
            <textarea name="description" class='form-control col-sm-10' rows='3'><?php echo $data['description']; ?></textarea>
            </div>
        </div><hr>
        <div class="row justify-content-md-center">
         <div class="col">   
        <label class="form-label text-dark" style="padding-right: 10px;">RM</label><input type="text" style="width: 40%; padding: 9px 20px; background-color:wheat; border:darkviolet; border-radius: 25px;" name="price" value="<?php echo $data['price'] ?>" placeholder="Enter Price" Required>
         </div>
         <div class="col">   
        <label class="form-label text-dark" style="padding-right: 10px;">Weight</label><input type="text" style="width: 40%; padding: 9px 20px; background-color:wheat; border:darkviolet; border-radius: 25px;" name="weight" value="<?php echo $data['weight'] ?>" placeholder="Enter Weight" Required>
        </div>
        <div class="col">   
        <label class="form-label text-dark" style="padding-right: 10px;">Stock</label><input type="text" style="width: 40%; padding: 9px 20px; background-color:wheat; border:darkviolet; border-radius: 25px;" name="qty" value="<?php echo $data['qty'] ?>" placeholder="Enter Stock" Required>
        </div>
        </div><hr>
        <div class="row justify-content-md-center">
            <div class="col">
            <label class="form-label text-dark" style="padding-right: 10px; padding-left: 50px;">Expiry Date</label><input type="text" style="width: 20%; padding: 9px 20px; background-color:wheat; border:darkviolet; border-radius: 25px;" name="expdate" value="<?php echo $data['expiry_date'] ?>" placeholder="Enter expiry date" Required>
            <?php if($data['origin']=='Local'){
            echo '<div style="padding-left: 50px;" class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="Local" id="new_Local" name="origin" checked="checked">
                <label class="form-check-label text-dark" for="exampleRadios1">
                  Local
                </label>
              </div>
              <div style="padding-right: 80px;" class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="Imported" id="new_Imported" name="origin">
                <label class="form-check-label text-dark" for="exampleRadios2">
                  Imported
                </label>
              </div>';
            }else{ 
            echo '<div style="padding-left: 50px;" class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="Local" id="new_Local" name="origin">
                <label class="form-check-label text-dark" for="exampleRadios1">
                  Local
                </label>
              </div>
              <div style="padding-right: 80px;" class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="Imported" id="new_Imported" name="origin" checked="checked">
                <label class="form-check-label text-dark" for="exampleRadios2">
                  Imported
                </label>
              </div>';
            } ?>
              <input class='btn admin-btn' type="submit" name="update" value="Update">
              <a  class="btn admin-btn"  href='javascript:self.history.back();'>Cancel</a>
              <!-- <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>'; -->
            </div>
        </div>
    <br></div></form>
            </main>
      </div>
    <!--End of Main--> 
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
              <a href="login.html" type="button" class="btn btn-outline-info">Confirm</a>
            </div>
          </div>
        </div>
      </div>        
    </div>
        <!-- Footer -->
    <footer class="text-center text-lg-start">
      
      <div class="container p-4">

      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2020 Copyright:
        <a class="text-dark" style="font-style: italic" href="#"
          >webprogramming2021@gmail.com</a
        >
      </div></div>
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
