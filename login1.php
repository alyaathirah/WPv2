<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	
</head>
<body>
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit" onclick="Login()">Login</button>
          <a href="signup.php" class="ca">Create an account</a>
     </form>
	 <script>
	 	
        function Login(){
			localStorage.setItem('status','logged in');
		}	
   

	 </script>
</body>
</html>