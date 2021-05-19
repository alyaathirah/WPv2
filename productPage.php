<?php
    //Connect to database 
    include_once('db\config.php');

?>

<html>
<head>
<title>Product Page</title>
</head>

<body>
    <?php
        //3.foreach ($res = $result->fetch()) Execute the SQL query
        $sql = "SELECT * FROM item";
        $result = $pdo->query($sql);
        while($res = $result->fetch()) {
            /*echo "<option value=\"".$res['image']."\">";*/
        
        
    ?>

    <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="<?= $res['image']; ?>"  alt="<?= $res['name']; ?>">
    <div class="card-body">
        <h5 class="card-title"><?= $res['name']; ?></h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>
<?php } ?>
    <?php
        //5. Freeing Resource and closing connection
        $pdo = null;
    ?>

</body>
</html>