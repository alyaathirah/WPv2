<?php
include_once("db/config.php");
$category = $_GET['category'];
$result = mysqli_query($mysqli,"SELECT * FROM item WHERE `category_name(FK)`='$category'");
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
        <title><?php echo $row['category_name(FK)']?></title>
        <link rel="icon" href="images/icon.png" type="image/x-icon" />
        <link rel="stylesheet" href="bootstrap.css?v=<?php echo time(); ?>" />
        <link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>"  />
    </head>
    <body class="adminBody">
        <nav class="navbar navbar-expand-lg fixed-top py-0" style="background-color:white;">
            <div class="container">
              <a href="home.php">
              <img src="images/logoadmin.png" style="width: auto; height: auto;"/></a>
              </a>
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <nav aria-label="breadcrumb" class="ml-auto"><br>            
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page" aria-disabled="true"><a class="adminbreadcrumb text-uppercase font-weight-bold" href="admin.php">Your Products</a></li>
                        <li class="breadcrumb-item active text-uppercase font-weight-bold" aria-current="page">Categories</li>
                        <li class="breadcrumb-item active text-uppercase font-weight-bold" aria-current="page"><?php echo $row['category_name(FK)']?></li>
                        <li class="breadcrumb-item active text-uppercase font-weight-bold" aria-current="page">View</li>
                      </ol>
                    </nav>
                </div>
        </nav>
    <div class="container mb-2"><br><br>
      <div class="text-center pt-5 text-white">
          <h1 class="display-4 font-weight-normal" style="font-family:Times New Roman; color:#660a03;">Manage Your Product</h1><br>
          <?php
              session_start(); 
              if (isset($_SESSION['status'])) {
              ?>  
                <script>
                  alert("<?php echo $_SESSION['status']; ?>");
                </script>
            <?php    unset ($_SESSION['status']);
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
        <!--Start of Main-->
    <main class="col-10 mb-2">
      <form class="form-inline">
        <h5 style="color: black; font: 21 em sans-serif;" class="pb-4 pt-4"><?php echo $row['category_name(FK)']?></h5>
        <div class="col-5">
          <input
            class="form-control mr-sm-1"
            type="search"
            placeholder="Search..."
            aria-label="Search"
          />
          <button class="admin-btn my-2 my-sm-0 border-info" type="submit">
            Search
          </button>
        </div>
      </form>
  
        <div class="row md-0">

        <?php 
        $i=1;
        while($row = mysqli_fetch_array($result)){
          echo "<br><div class='col-md-3'>";
          echo "<div class='row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative' style='background-color: white' >";
          echo    "<div class='col-auto d-none d-lg-block'>";
          echo "<img src='images/".$row['image']."' width=100%; height=250px >"; 
      
          // echo     ' style="width: 100%; height: 250px" />';
          echo    "</div>";
          echo    "<div class='price col p-4 d-flex flex-column position-static'>";
          echo      "<h3 class='mb-0'>".$row["name"];
          echo      "</h3>";
          echo      "<div class='mb-1'>".$row["price"];
          echo      "</div>";
          echo      "<div class='row'>";
          echo        "<div class='col-md-7'>";
          echo          "<a id='link' href=\"viewItem.php?id=$row[item_id]\" class='stretched-link'>View Item</a>";
          echo        "</div>";
          echo     " </div>";
          echo    "</div>";
          echo   "</div>";
          echo "</div>";
            if($i>3){
              echo "<br>";
              $i=1;
              //$id++;
            }else{
            $i++;
            //$id++; 
            }
          }

          mysqli_close($mysqli);
        ?>

        </div>
                </div>
                
          </div>
      </main>
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
              <a href="login1.php" type="button" class="btn btn-outline-info" onClick = "Logout()">Confirm</a>
              <script>
                  function Logout(){
                    localStorage.setItem("status","logged out");
                  }
                  </script>
            </div>
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


