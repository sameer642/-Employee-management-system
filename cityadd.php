<?php
include "config.php";
if(isset($_POST['cityadd'])){
    $cityname = mysqli_real_escape_string($conn, $_POST['cityname']);

    $sql = "INSERT INTO city(city_name)values('{$cityname}')";
    
    if(mysqli_query($conn, $sql)){
        header("location: cityview.php");
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
                <label>City name</label>
                <input type="text" name="cityname" class="form-control">
                </div>
                
            <input type="submit" name="cityadd" class="btn btn-info">
            <a href="cityview.php" onclick="history.back();" class="btn btn-default">Back</a>
        </form>
        
    </div>

</body>
</html>