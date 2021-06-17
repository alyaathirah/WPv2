    <?php
    session_start();
    include_once("db/config.php");
    $id = $_GET['id'];
    $que = "SELECT 
    itemlist.itemlist_id, item.name, item.price, item.image, itemlist.itemlist_status, itemlist.itemlist_qty, itemlist.subprice, itemlist.sl_id, list.sl_name 
    FROM 
    itemlist
    INNER JOIN 
    item
    ON
    itemlist.item_id = item.item_id
    INNER JOIN
    list
    ON
    itemlist.sl_id = list.sl_id
    WHERE
    itemlist.sl_id = $id";
    $test = mysqli_query($mysqli, $que);

    //$id = $_GET['id'];
    $totalPrice = "SELECT SUM(subprice) FROM itemlist WHERE sl_id = '$id' ";
    $calc = mysqli_query($mysqli, $totalPrice);

    $name = "SELECT sl_name FROM list WHERE sl_id = '$id' ";
    $displayName = mysqli_query($mysqli, $name);
    //mysqli_close($mysqli);

   // session_start();
    //Connect to database 
    //include_once('db/config.php');

    //For Modal
    if (isset($_SESSION['id']) && isset($_SESSION['Username'])) {
      //getting id from url
      $id = $_SESSION['id'];
      
      //selecting data associated with this particular id
      $result = mysqli_query($mysqli, "SELECT * FROM users2 WHERE id=$id"); //id = id?????
      
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
        $status = $res['status'];
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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Grocery List</title>
    <link rel="icon" href="images/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/styleProfile.css">
    <link rel="stylesheet" href="css/styleShoppingList.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="../WPv2/js/testJS.js"></script>

  </head>
  <body class="container">
    <!--Start of header-->
    <header class="container blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <!--User's Account modal button-->
        <div class="col-4 pt-1">
        <?php 
        if(empty($status)){
        ?>
        <img src="<?php echo $images;?>" alt="profile photo" id="profilePhoto" style="height: 50px;; width: 50px;; border-radius: 50%; margin-left: 10px">
        <?php
        }
        ?>
        <br>
        <?php
        if(empty($status)){
        ?>
          <a class="account" href="#" data-toggle="modal" data-target="#profileModal" 
            >My Account</a>
            <?php
          }else{
            ?>
            <a class = "back-to-admin"href = "admin.php">
        <button type = "button" name="login-btn"  class="btn rounded-pill" style="background-image: linear-gradient(125deg,#971006, #a72879); color: white;">Back to Admin Page</button>
          </a>
            <?php
          }
            ?>
          <br />
        </div>
        <div class="col-4 text-center">
          <a class="blog-header-logo text-dark" href="home.php"
            ><img src="images/logo.png" style="width: 200px; height: auto"
          /></a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
        <!-- list button -->
        <a
            class="btn btn-sm btn-outline-secondary"
            data-toggle="modal" 
            data-target="#listModal"
            style="margin-right: 10px;"
            id = "viewList"
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
        </div>
      </div>
      <div class="modal fade" id="loginAlertModal" tabindex="-1" aria-labelledby="loginAlrertModalLabel" aria-hidden="true">
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
                <a href="login1.php">
                    <button type="button" class="btn" style="background-color:  maroon; color: white;">Login</button>
                </a>    
            </div>
        </div>
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
      <br />
 <!---------------------------End------------------------------->
  <div class = "row md"> 
    <!-- Button trigger modal -->
    <div style = "margin-right: 10px;"></div>"
    <button class="buttonz fa fa-bars" data-toggle="modal" data-target="#listModal">
    </button>

     <!--------Shopping List modal ------------>
    <!-- Modal -->
<div class="modal fade" id="listModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a href="viewList.php?id=<?php echo $rows['sl_id'];?>" style="color: black;">
              <div id = "titleList"><?php echo $rows['sl_name'];?></div>
            </a>
          </div>
          <div class="col-md-auto">
          <a href="deleteList.php?id=<?php echo $rows['sl_id'];?>&id2=<?php echo $_GET['id'];?>" onclick="return confirm('Delete this list?')">
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
              <input type="hidden" value =<?php echo $_GET['id']?> name="id">
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
<!------End of Shopping List modal--------->

        <!-- Title --> 
    <?php 
      if ($displayName->num_rows > 0) {
        while($dataName = $displayName->fetch_assoc()) {
      ?>
        <div class = "col-md-9">
        <div class="titleSL">
        <?php echo $dataName['sl_name'];?>
        </div>
      </div>
    <?php 
      }}
    ?>
     

      </div> 
  <!-- End of Title & Navi List row --> 
    <br>
    <div style="border: 2px solid #a7a7a7;">
    <div class = "mainList">
    <div class = "row md">
      <div class = "productHeader">
        <h6 class = "product-title">PRODUCT</h6>
        <h6 class = "price-title">PRICE</h6>
        <h6 class = "quantity-title">QUANTITY</h6>
        <h6 class = "quantity-title">SUBTOTAL</h6>
      </div>
    </div>


 
    <!--Start of Row Product--> 
    <?php 
    if ($test->num_rows > 0) {
        while($row = $test->fetch_assoc()) {
    ?>
  <div class = "row md">
    <div class = "item" id = "<?php echo $row['itemlist_id'];?>">
      <div class = "col-md-1">
            <div class = "buttons">
          <a href="deleteItemInList.php?id=<?php echo $row['itemlist_id'];?>&id2=<?php echo $_GET['id'];?>">
          <img src = "images/delete-icn.png" alt="" width="13" height="13"/></a>

            </div>
        </div>


        <div class = "col-md-2">
          <div class = "images">
          <img src = "images/<?php echo $row['image'];?>" alt="" width="120" height="120"/>
          </div>
        </div>

        <div class = "col-md-2">
          <div class = "description">
            <span id = "name"><?php echo $row['name'];?></span>
          </div>
        </div>

        <div class = "col-md-1">
          <div class="total-price" id ="price">RM <?php echo $row['price'];?>
          </div>
        </div>

        <div class = "col-md-3">
          <div class="quantity">
          
           <form name="quantityForm" method="POST" action="updateQuantity.php">
              <input type='submit' name = 'buttonMin' value='-' class='qtyminus' field='quantity'/>
              <input type="text" name="quantity" value='<?php echo $row['itemlist_qty'];?>' id = "quantity<?php echo $row['itemlist_id'];?>">
              <input type='submit' name = 'buttonAdd' value='+' class='qtyplus' field='quantity'/>
              <input type="hidden" name="id" value=<?php echo $row['itemlist_id'];?>>
              <input type="hidden" name="sl_id" value=<?php echo $row['sl_id'];?>>
              <input type="hidden" name="price" value=<?php echo $row['price'];?>>
          </form>
            
          </div>
        </div>
        

        <div class = "col-md-1">
          <div class="total-price" id ="subprice"> RM <?php echo $row['subprice'];?>
          </div>
        </div>

        <div class = "col-md-1">
          <div class="stock-avail">
          <?php echo $row['itemlist_status'];?>
          </div>
          </div>
      </div>
    </div>
    <?php 
      }
    } else {
      $view = "<div class = \"row md\"><img src=\"images/emptCart.png\" class=\"center\"><br></div>
      <div class = \"row md\"><h5 class=\"center\" style=\"font-family:Candara; color: black;\">Your list is currently empty.
        Start listing your item(s) now!</h5></div><br>
      ";
      echo $view;
    }?>

       <!--End of Row of Product--> 

       <!--Total Price-->
      <?php 
      if ($calc->num_rows > 0) {
        while($data = $calc->fetch_assoc()) {
      ?>
      
     <div class = "row md">
       <div class="productFooter">
         <h6 class = "sumPrice-title">TOTAL PRICE</h6>
         <h6>RM <?php echo $data['SUM(subprice)'];?>
         </h6><h6 class = "sumPrice"></h6>
       </div>
      </div>

    <?php }}?>

    </div>
  </div>
    </div>
  </div>
    
  <br>
  <a href="products.php"><button class = "buttonz">← Continue Shopping</button></a>
      <br><br>
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
      
   <!-- Profile Modal -->
   <<div class="modal fade" id="profileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="profileModalLabel" style="color: #a82c21; font-size:40px;">Profile</h4>
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
                <a href = "logout.php">
                    <button type="button" class="btn btn-secondary">Logout</button>
                    <script>
                  
                  </script>
                </a>
              </div>
            </div>
          </div>
      </div> 
    </div>
    <?php 
                }else{
                    header("Location: home.php");
                    exit();
                }
              ?>
    </div>

  </body>
</html>