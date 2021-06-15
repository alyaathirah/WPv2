
<?php
include_once("db/config.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli,"SELECT * FROM `item` WHERE `item_id`='$id'");
$row = mysqli_fetch_assoc($result);
?>
<html>
<h5 class="modal-title text-dark" id="exampleModalLabel">This product will be deleted.</h5>
<div class="modal-footer">
                      <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>';?>
                        <?php echo $id2;?>
                        <a class='btn btn-outline-info' href="deleteadmin.php?id=<?php echo $id;?>&category=<?php echo $row['category_name(FK)'];?>&name=<?php echo $row['name']?>">Delete</a>
                        </div>

                        </html>