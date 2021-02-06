<?php
include "config.php";
if(isset($_POST['desadd'])){
    $des_name = mysqli_real_escape_string($conn, $_POST['desname']);

    $sql = "INSERT INTO designation(des_name)values('{$des_name}')";
    
    if(mysqli_query($conn, $sql)){
        header("location: desview.php");
    }else{
        echo "query failed";
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
                <label>Designation name</label>
                <input type="text" name="desname" class="form-control">
                </div>
                
            <input type="submit" name="desadd" class="btn btn-info">
            <a href="desview.php" onclick="history.back();" class="btn btn-default">Back</a>
        </form>
        
    </div>

</body>
</html>