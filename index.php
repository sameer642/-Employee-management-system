<?php
include "config.php";
if(isset($_POST['login'])){
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = md5($_POST['password']);
	
	if($username != "" && $password != ""){
			$sql = "SELECT COUNT(*) as allcount FROM user where username = '{$username}' and password = '{$password}'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			$count = $row['allcount'];
			if($count > 0){
				$_SESSION['username'] = $username;
				header("location: view.php");
			}
		else{
			echo "Invalid username and password";
		}
		

	

}
}


?>




<!DOCTYPE html>
<html>
<head>  
<title> Login</title>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>  
<body>
	<br>
    <br>
	<div class="container" style="width: 500px;">
		<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control">
				</div>
				<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<input type="submit" name="login" class="btn btn-info">
			<a href="register.php" class="btn btn-success">Register</a>
		</form>
		
	</div>

</body>
</html>