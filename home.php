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
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <title>Homepage</title>
    <style>
      .wrapper{
        height: 250px;
        width: 250px;
        position: relative;
        border: 5px solid #fff;
        border-radius: 50%;
        background-size: 100% 100%;
        margin-top: 0px;
        margin-left: auto;
        margin-right: auto;
        overflow: hidden;
        display: block;
        border-color:#bb4166f5;
      }
      #row{
        left:50%;
      }
    </style>

    
  </head>
  <body>
        <h1>Hello, <?php echo $_SESSION['FirstName']; ?></h1>
        <img src="<?php echo $images;?>" alt="profile photo" id="profile photo" style="height:100px; weight:100px; border-radius: 50%;">
                 
        
        <!-- Button trigger modal -->
        <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          Click me!
        </a>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel" style="color: #a82c21; font-size:40px;">Profile</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body container">
                <img src="<?php echo $images;?>" class="wrapper" alt="profile photo" id="profile photo">
                <div class="row"   >
                    <div class="col-sm-4">
                      <label style="font-weight:bold; color:maroon; text-indent: 30px;">First Name</label><br>   
                      <label class="text-muted" id="FName" style="text-indent: 30px;"><?php echo $FName; ?></label>
                    </div>
                    <div class="col-sm-4">
                      <label style="font-weight:bold; color:maroon; text-indent: 30px;">Last Name</label><br>   
                      <label class="text-muted" id="LName" style="text-indent: 30px;"><?php echo $LName; ?></label>
                    </div>
                    <div class="col-sm-4">
                      <label style="font-weight:bold; color:maroon; text-indent: 30px;">Username</label><br>   
                      <label class="text-muted" id="UName" style="text-indent: 30px;">@<?php echo $UName; ?></label>
                    </div>
                    <div class="col-sm-6">
                      <label style="font-weight:bold; color:maroon; text-indent: 30px;">Email</label><br>   
                      <label class="text-muted" id="Email" style="text-indent: 30px;"><?php echo $Email; ?></label>
                    </div>
                    <div class="col-sm-6">
                      <label style="font-weight:bold; color:maroon; text-indent: 30px;">Bio</label> <br>  
                      <label class="text-muted" id="Email" style="text-indent: 30px;"><?php echo $Bio; ?></label>
                    </div>
                    <div class="col-sm-3">
                      <label style="font-weight:bold; color:maroon; text-indent: 30px;">Gender</label><br>   
                      <label class="text-muted" id="Gender" style="text-indent: 30px;"><?php echo $Gender; ?></label>
                    </div>
                    <div class="col-sm-5">
                      <label style="font-weight:bold; color:maroon; text-indent: 30px;">Phone Number</label><br>  
                      <label class="text-muted" id="PNumber" style="text-indent: 30px;"><?php echo $PNumber; ?></label>
                    </div>
                    <div class="col-sm-4">
                      <label style="font-weight:bold; color:maroon; text-indent: 30px;">Birthday</label><br>   
                      <label class="text-muted" id="Birthday" style="text-indent: 30px;"><?php echo $Birthday; ?></label>
                    </div>
                    <div class="col-sm-12">
                      <label style="font-weight:bold; color:maroon; text-indent: 30px;">Address</label><br>   
                      <label class="text-muted" id="Address" style="text-indent: 30px;"><?php echo $Address," ",$City," ",$Zip," ",$State; ?></label>
                    </div>
                <div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="profile.php">
                    <button type="button" class="btn" style="background-color:  maroon; color: white;">Setting</button>
                </a>
              </div>
            </div>
          </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
}else{
     header("Location: login1.php");
     exit();
}
 ?>