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
    

  </head>
  <body class="container">
    <!--Start of header-->
    <header class="blog-header py-3">
      <div class="row flex-itemrap justify-content-between align-items-center">
        <!--User's Account modal button-->
        <div class="col-4 pt-1">
          <a class="account" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
            ><img src=<?php echo $images;?> alt="profile photo" id="profile photo" style="height: 50px;; width: 50px;; border-radius: 50%;">
               <br />
            My Account</a>

          <br />
        </div>
        <div class="col-4 text-center">
          <a class="blog-header-logo text-dark" href="home.php"
            ><img src="images/logo.png" style="width: 200px; height: auto"
          /></a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a
            class="btn btn-sm btn-outline-secondary"
            data-toggle="modal" 
            data-target="#exampleModal2"
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
            <a class="nav-link" href="about_us.php">About Us</a>
          </li>
        </ul>
        
        <form class="form-inline my-2 my-lg-0" action = "search.php" method = "get" style="margin-right: 2px;">
          <input class="searchBar form-control mr-sm-2" type="text" placeholder="Search" name = "query">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
    <!--End of Navigation Bar-->
    <!--Start of Main-->
    <main class="container">
    <?php require('db\fetchItems.php') ?>
        <div class="products">
            <h2 class="page_title" id="page_title"><?= $category ?></h2>
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
                                
                          <!--  <a href="addToList.php?id=<?php echo $res['item_id'];?>">
                              <button type = "button" class = "btn-add"> add to list
                              </button>
                            </a>-->
               
                          <!--  <button type = "button" class = "btn-add" data-toggle="modal" 
                              data-target="#exampleModal" data-id="<?php echo $res['item_id'];?>"> add to list
                              </button>-->

                              <form method = "POST" name = "hiddenForm" id = "hiddenForm">
                              <input type = "button" class = "btn-add" data-toggle="modal" 
                              data-target="#exampleModal" data-id="<?php echo $res['item_id'];?>"
                              value = "add to list"> 
                              <input name = "hiddenID" type = "hidden" id="feed_id" value="" />
                              </form>

                                                    
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
        
        <!--Pagination-->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
				    <a class="page-link" href="<?= currentPage($CurPageURL,$key) ;?>&page=<?=$previous;?>" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				    </a>
				</li>

            <?php for($i = 1; $i<= $numOfPages; $i++) : ?>
				        <li class="page-item"><a class="page-link" href="<?= currentPage($CurPageURL,$key);?>&page=<?= $i; ?>"><?= $i; ?></a></li>
			      <?php endfor; ?>

                <li class="page-item">
				    <a class="page-link" href="<?= currentPage($CurPageURL,$key) ;?>&page=<?= $next; ?>" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				    </a>
				</li>

            </ul>
        </nav>
         <!--End of Pagination-->

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
    <script>
        $('.btn-add').click(function(){
            var id=$(this).data('id');
            document.getElementById("feed_id").value = $(this).attr('data-id');
            //document.getElementById('hiddenForm').submit();
            console.log(document.getElementById("feed_id").value);
           //document.getElementById('itemid').value = id; 
           //window.location.href = "http://localhost/products.php?id=" + id;
          // window.localStorage.setItem('id', id);
         })
        </script>
   <!-----------------------------------Shopping List modal to ADD ITEM ----------------------------------------->
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
    <div class="modal-body">
      <div class="container-fluid">
      <?php 
      require('addList.php');
      if ($try->num_rows > 0) {
        while($rows = $try->fetch_assoc()) {
      
      ?>
      
        <div class = "shoppingList" id = "<?php echo $rows['sl_id'];?>">
        <div class="row">
          <div class="col">

        <!--  <form method = "POST" name = "hiddenForm" id = "hiddenForm">
          <input name = "hiddenID" type = "hidden" id="feed_id" value="" />
          </form>-->
          <?php 
           echo '<script type="text/javascript">' . 
           'document.getElementById("feed_id").value'.
           '</script>';
          ?>
    
          <a href="addToList.php?id=<?php echo $rows['sl_id']?>&id2=4" style="color: black;">
              <div id = "titleList"><?php echo $rows['sl_name'];?></div>
            </a>
          </div>
          <div class="col-md-auto">
          <a href="deleteList.php?id=<?php echo $rows['sl_id']?>">
          <img src = "images/delete-icn.png" alt="" width="13" height="13"/></a>
          </div>

        </div>
        
      </div>
      <?php
          }} else {
            echo "0 results";
          }?>
     
      <div id = "newSL"></div>
     
          <div class = "row">
            <br><br><br>
            <button id="btn" class="buttonz" style = "width: 150px; margin:auto; display:block;" >Add New List</button>
            
            <form id="editForm"  action="addList.php" method="post" name="editForm" style = "margin:auto; display:block;">
            
              <input type="text" id="input" size="20" name="slname">
              <input type = "submit" name = "Submit" value = "+" >
              </input>
            </form>
          </div>
      
        </div>
      </div>
    </div>
  </div>
</div>
<!-----------------------------------End of Shopping List modal ----------------------------------------->
<!-----------------------------------Shopping List modal to VIEW LIST ----------------------------------------->
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title title" id="UserProfileLabel" style="font-size: 40px;">My List</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
    <!-- Content in Modal -->
    <div class="modal-body">
      <div class="container-fluid">
      <?php 
      require('addList.php');
      if ($try->num_rows > 0) {
        while($rows = $try->fetch_assoc()) {
      
      ?>
      
        <div class = "shoppingList" id = "<?php echo $rows['sl_id'];?>">
        <div class="row">
          <div class="col">

          <a href="viewList.php?id=<?php echo $rows['sl_id']?>" style="color: black;">
              <div id = "titleList"><?php echo $rows['sl_name'];?></div>
            </a>
          </div>
          <div class="col-md-auto">
          <a href="deleteList.php?id=<?php echo $rows['sl_id']?>">
          <img src = "images/delete-icn.png" alt="" width="13" height="13"/></a>
          </div>

        </div>
        
      </div>
      <?php
          }} else {
            echo "0 results";
          }?>
     
      <div id = "newSL"></div>
     
      <div class = "row">
            <br><br><br>
            <button id="btn" class="buttonz" style = "width: 150px; margin:auto; display:block;" >Add New List</button>
            
            <form id="editForm"  action="addList.php" method="post" name="editForm" style = "margin:auto; display:block;">
            
              <input type="text" id="input" size="20" name="slname">
              <input type = "submit" name = "Submit" value = "+" >
              </input>
            </form>
          </div>
      
        </div>
      </div>
    </div>
  </div>
</div>
<!-----------------------------------End of Shopping List modal ----------------------------------------->
        <!--Login Alert Modal-->
<!--      <div class="modal fade" id="loginAlrertModal" tabindex="-1" aria-labelledby="loginAlrertModalLabel" aria-hidden="true">
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
      </div>-->
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
                $pdo = null;
              ?>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../WPv2/js/testJS.js"></script>
        <script>
         //modal addSL
            $(document).ready(function(){
                $("#editForm").hide();
                $("#btn").click(function(e) {
                    $("#editForm").show();
                    $("#btn").hide();
                });
            });
            </script>
  </body>
</html>
