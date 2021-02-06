<?php
include "config.php";
if(isset($_POST['countryadd'])){
    $cname = mysqli_real_escape_string($conn, $_POST['countryname']);

    $sql = "INSERT INTO country(cname)values('{$cname}')";
    
    if(mysqli_query($conn, $sql)){
        header("location: countryview.php");
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
                <label>Country name</label>
                <input type="text" name="countryname" class="form-control">
                </div>
                
            <input type="submit" name="countryadd" class="btn btn-info">
            <a href="countryview.php" onclick="history.back();" class="btn btn-default">Back</a>
        </form>
        
    </div>

</body>
</html>