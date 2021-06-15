<?php
include_once("db/config.php");
$category = $_GET['category'];
$result = mysqli_query($mysqli,"SELECT * FROM `item` WHERE `category_name(FK)`='$category'");
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <title><?php echo $row['category_name(FK)']?></title>
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
                        <li class="breadcrumb-item active text-uppercase font-weight-bold" aria-current="page"><?php echo $row['category_name(FK)']?></li>
                        <li class="breadcrumb-item active text-uppercase font-weight-bold" aria-current="page">Edit</li>
                      </ol>
                    </nav>
                </div>
        </nav>
    <div class="container mb-2"><br><br>
      <div class="text-center pt-5 text-white">
          <h1 class="display-4 font-weight-normal" style="font-family:Times New Roman; color:#660a03;">Manage Your Product</h1><br>
          <?php
              session_start(); 
              if (isset($_SESSION['updated'])) {
              ?>  
                <script>
                  alert("<?php echo $_SESSION['updated']; ?>");
                </script>
            <?php    unset ($_SESSION['updated']);
              }
            ?> 
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
        <main class="col-10 mb-2">
          <br><form class="form-inline">
            <h5 class="text-dark align-items-center"><?php echo $row['category_name(FK)']?></h5> 
            <div class="col-5">
                <input
                  class="form-control mr-sm-1"
                  type="search"
                  placeholder="Search..."
                  aria-label="Search"
                />
                <button class="admin-btn my-2 my-sm-0 border-danger" type="submit">
                  Search
                </button>
            </div>
          </form>  

          <br><div id="fruitnvegs1_items"> 
            <?php 
          
            while($row = mysqli_fetch_array($result)){ ?>
            <form class="mb-2" enctype="multipart/form-data" style="padding-bottom: 0%;">
                <?php
                echo "<button type='button' class='collapsible rounded'>".$row["name"]."</button>";
                echo "<div class='content rounded'>";         
                echo  "<div class='row no-gutters overflow-hidden flex-md-row mb-4 h-md-250 position-relative' style='background-color: rgb(255, 255, 255)' >";
                echo    "<div class='col-4 d-none d-lg-block'>"; ?>
                      <br><br><img class="col" src="images/<?php echo $row['image']; ?>" width=250pv; height=250px >;
                <?php        
                echo    "</div>";
                echo  "<div class='price col p-4 d-flex flex-column position-static'>";
                echo    "<div class='mb'>";
                echo      "<form class='form-floating col-sm-10'>";?><?php echo $row['name']; ?>
                        <?php
                echo      "</form><hr>";
                echo    "</div>";
                echo    "<div class='mb-3'> ";
                ?>
                      <?php echo $row['description']; ?>
                      <?php
                echo    "</div>" ;   
                echo    "<div class='mb-3 row form-inline'>";
                echo      "<form class='form-floating form-inline col-sm-4 col-form-label' style='padding-right: 15px;' >";
                echo        "<span class='input-group-text col-4' id='inputGroup-sizing-default'>RM</span>";?>
                        <div class="col-sm-5"><?php echo $row['price']; ?></div>
                        <?php
                echo      "</form>";
                echo      "<form class='form-floating form-inline col-sm-4 col-form-label' style='padding-right: 15px;' >";
                echo      "<span class='input-group-text col-6' id='inputGroup-sizing-default'>Weight</span>";
                echo      "<div class='col-2' style='padding-right: 0;' >"; ?>
                        <?php echo $row['weight']; ?>
                        <?php
                echo      "</div>";
                echo      "</form>";
                echo      "<form class='form-floating form-inline col-sm-4 col-form-label' style='padding-right: 15px;' >";
                echo      "<span style='padding-right: 0px;' class='input-group-text col-5' id='inputGroup-sizing-default'>Stock</span>";
                echo      "<div class='col-sm-2'>";?>
                        <?php echo $row['qty']; ?>
                        <?php
                echo      "</div>";
                echo      "</form>";
                echo    "</div> ";
                echo   " <div class='row'>";
                echo        "<label class='col-sm-2 form-label text-dark'>Expiry Date</label>";
                echo        "<div class='col-sm-4'>";?>
                          <input type='text' name='expdate' class='form-control' value=<?php echo $row['expiry_date']; ?> disabled>
                        <?php
                echo        "</div>";
                if($row['origin']=='Local'){
                  echo '<div class="col-sm-1 form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="origin" id="flexRadioDefault1" checked="checked">
                        <label class="form-check-label text-dark" for="flexRadioDefault1">
                          Local
                        </label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="origin" id="flexRadioDefault2" disabled>
                        <label class="form-check-label text-dark" for="flexRadioDefault2">
                          Imported
                        </label>
                      </div>';
                }else{
                  echo '<div class="col-sm-1 form-check form-check-inline">
                        <input name="origin" id="flexRadioDefault1" class="form-check-input" type="radio" disabled>
                        <label class="form-check-label text-dark" for="flexRadioDefault1" >
                          Local
                        </label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input name="origin" id="flexRadioDefault2" class="form-check-input" type="radio" checked="checked">
                        <label class="form-check-label text-dark" for="flexRadioDefault2">
                          Imported
                        </label>
                      </div>';
                }?>
                <?php
                echo    "</div>";
                echo   " <div class='mb-3 row'></div>";
                echo    "<div class='row justify-content-between'>";
                echo      "<div class='col-5 text-dark'>";?>
                        <a class='btn btn-outline-warning col-sm-4' href="edit.php?id=<?php echo $row['item_id']; ?>&category=<?php echo $row['category_name(FK)']; ?>">Edit</a>
                <?php
                echo           "<button type='button' class='btn btn-outline-danger' data-toggle='modal' data-target='#exampleModal'>";
                echo          "Delete";
                echo        "</button>";
                echo      "</div>";
                echo    "</div> ";   
                echo  "</div>";            
                echo  "</div>";
                echo "</div>";


                echo '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header justify-content-center">
                      <img src="images/logoadmin.png" style="width: 130px; height: 50px"/>       
                    </div>
                    <div class="modal-body">
                      <h5 class="modal-title text-dark" id="exampleModalLabel">This product will be deleted.</h5>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>';?>
                        <a class='btn btn-outline-info' href="deleteadmin.php?id=<?php echo $row['item_id'];?>&category=<?php echo $row['category_name(FK)'];?>&name=<?php echo $row['name']?>">Delete</a>
                        <?php
                   echo ' </div>
                  </div>
                 </div>
              </div>';
                ?>
                </form> 
                <?php 
              }

              mysqli_close($mysqli);
              ?>
              <script type="text/Javascript">   
                  var coll = document.getElementsByClassName('collapsible');
                  var i;
                  for (i = 0; i < coll.length; i++) {
                    coll[i].addEventListener("click", function() {
                      this.classList.toggle("descactive");
                      var content = this.nextElementSibling;
                      if (content.style.display === "block") {
                        content.style.display = "none";
                      } else {
                        content.style.display = "block";
                      }
                    });
                  } 
              </script>       
           </div>

          
          <!--Modal Updated Product-->
          <div class="modal fade update_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">               
                <div class="modal-header justify-content-center">
                  <img src="images/logoadmin.png" style="width: 130px; height: 50px"/>
                </div>
                <div class="modal-body">
                  <h5 class="modal-title text-dark" id="exampleModalLabel">Your product is updated successfully!</h5>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                  
                </div>
              </div>
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
                <a href="login.html" type="button" class="btn btn-outline-info">Confirm</a>
              </div>
            </div>
          </div>
        </div>
                <br>
        </main> 
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
