<?php


function getModal($images, $FName, $LName, $UName, $Email, $Bio, $Gender, $PNumber, $Birthday, $Address, $City, $Zip, $State){
  $modal = "

      <div class=\"modal-body container\">
        <img src='$images' class=\"wrapper\" alt=\"profile photo\" id=\"profile photo\">
        <div class=\"row\"   >
            <div class=\"col-sm-4\">
              <label style=\"font-weight:bold; color:maroon; text-indent: 30px;\">First Name</label><br>   
              <label class=\"text-muted\" id=\"FName\" style=\"text-indent: 30px;\"> $FName </label>
            </div>
            <div class=\"col-sm-4\">
              <label style=\"font-weight:bold; color:maroon; text-indent: 30px;\">Last Name</label><br>   
              <label class=\"text-muted\" id=\"LName\" style=\"text-indent: 30px;\"> $LName </label>
            </div>
            <div class=\"col-sm-4\">
              <label style=\"font-weight:bold; color:maroon; text-indent: 30px;\">Username</label><br>   
              <label class=\"text-muted\" id=\"UName\" style=\"text-indent: 30px;\">@ $UName </label>
            </div>
            <div class=\"col-sm-6\">
              <label style=\"font-weight:bold; color:maroon; text-indent: 30px;\">Email</label><br>   
              <label class=\"text-muted\" id=\"Email\" style=\"text-indent: 30px;\"> $Email </label>
            </div>
            <div class=\"col-sm-6\">
              <label style=\"font-weight:bold; color:maroon; text-indent: 30px;\">Bio</label> <br>  
              <label class=\"text-muted\" id=\"Email\" style=\"text-indent: 30px;\"> $Bio </label>
            </div>
            <div class=\"col-sm-3\">
              <label style=\"font-weight:bold; color:maroon; text-indent: 30px;\">Gender</label><br>   
              <label class=\"text-muted\" id=\"Gender\" style=\"text-indent: 30px;\"> $Gender </label>
            </div>
            <div class=\"col-sm-5\">
              <label style=\"font-weight:bold; color:maroon; text-indent: 30px;\">Phone Number</label><br>  
              <label class=\"text-muted\" id=\"PNumber\" style=\"text-indent: 30px;\"> $PNumber </label>
            </div>
            <div class=\"col-sm-4\">
              <label style=\"font-weight:bold; color:maroon; text-indent: 30px;\">Birthday</label><br>   
              <label class=\"text-muted\" id=\"Birthday\" style=\"text-indent: 30px;\"> $Birthday </label>
            </div>
            <div class=\"col-sm-12\">
              <label style=\"font-weight:bold; color:maroon; text-indent: 30px;\">Address</label><br>   
              <label class=\"text-muted\" id=\"Address\" style=\"text-indent: 30px;\"> $Address $City $Zip $State </label>
            </div>
        <div>
      </div>

  ";

  echo $modal;
}