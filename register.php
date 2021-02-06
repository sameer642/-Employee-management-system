
<?php 
  $conn = mysqli_connect('localhost', 'root', '', 'app_test');

  $name = "";
  $username = "";
  if (isset($_POST['register'])) {
  	$name = $_POST['name'];
  	$username = $_POST['username'];
  	$password = $_POST['password'];
    $sql_n = "SELECT * FROM user WHERE name ='$name'";
  	$sql_u = "SELECT * FROM user WHERE username ='$username'";
  	$res_n = mysqli_query($conn, $sql_n);
  	$res_u = mysqli_query($conn, $sql_u);
     
  	if (mysqli_num_rows($res_n) > 0) {
  	  echo  "Sorry... name already taken"; 	
  	}else if(mysqli_num_rows($res_u) > 0){
  	  echo  "Sorry... username already taken"; 	
  	}else{
           $query = "INSERT INTO user (name, username, password) 
      	    	  VALUES ('$name', '$username', '".md5($password)."')";
           $results = mysqli_query($conn, $query);
           echo 'Saved!';
           exit();
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
				<label>Name</label>
				<input type="text" name="name" class="form-control">
				</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control">
				</div>
				<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<input type="submit" name="register" class="btn btn-info">
			<a href="index.php" onclick="history.back();" class="btn btn-default">Back</a>
		</form>
		
	</div>

</body>
</html>