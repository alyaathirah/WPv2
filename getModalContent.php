<?php 
include_once("db/config.php");


if(!empty($_GET['id'])){
    //for add to list button 
    $id = $_GET['id'];
    require('addList.php');
        if ($try->num_rows > 0) {
        while($rows = $try->fetch_assoc()) {

            $listID=$rows['sl_id'];
            $listName=$rows['sl_name'];
?>

<html>
<div class = "shoppingList" id ="<?php echo $listID?>">
    <div class="row">
        <div class="col">
        <a href="addToList.php?id=<?php echo $listID?>&id2=<?php echo $id?>" style="color: black;">
            <div id = "titleList"><?php echo $listName?></div>
            </a>
            </div>
            <div class="col-md-auto">
                <a href="deleteList.php?id=<?php echo $listID?>">
                <img src = "images/delete-icn.png" alt="" width="13" height="13"/></a>
            </div>
            </div>
    </div>
</div>
</html>

<?php }}}
else{
    //for my list button
    require('addList.php');
    if ($try->num_rows > 0) {
        while($rows = $try->fetch_assoc()) {

            $listID=$rows['sl_id'];
            $listName=$rows['sl_name'];
?>    
<html>
<div class = "shoppingList" id ="<?php echo $listID?>">
    <div class="row">
        <div class="col">
        <a href="viewList.php?id=<?php echo $listID?>" style="color: black;">
            <div id = "titleList"><?php echo $listName?></div>
            </a>
            </div>
            <div class="col-md-auto">
                <a href="deleteList.php?id=<?php echo $listID?>">
                <img src = "images/delete-icn.png" alt="" width="13" height="13"/></a>
            </div>
            </div>
    </div>
</div>
</html>
<?php }}}
?>   

</br>
<html>
     <div class = "row">
       <button id="btn" class="buttonz" style = "width: 150px; margin:auto; display:block;" >Add New List</button>
       
       <form id="editForm"  action="addList.php" method="post" name="editForm" style = "margin:auto; display:block;">
       
         <input type="text" id="input" size="20" name="slname">
         <input type = "submit" name = "Submit" value = "  +  " >
         </input>
       </form>
     </div>

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
</html>



