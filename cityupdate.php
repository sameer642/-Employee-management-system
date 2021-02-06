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
        <?php
        include "config.php";
        $cityid = $_GET['cityid'];
        $sql = "SELECT * FROM city where city_id = {$cityid}";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)){
            while ($row = mysqli_fetch_assoc($result)) {
                

        ?>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
            <input type="hidden" name="cityid" value="<?php echo $row['city_id']?>">
            
            <div class="form-group">
                <label>City name</label>
                <input type="text" name="cityname" class="form-control" value="<?php echo $row['city_name']?>">
                </div>
                
            <input type="submit" name="cityupdate" class="btn btn-info">
            <a href="cityview.php" onclick="history.back();" class="btn btn-default">Back</a>
        </form>
    <?php }
}
?>
        
    </div>

</body>
</html>
<?php

if(isset($_POST['cityupdate'])){
    $citid = $_POST['cityid'];
    $citname = $_POST['cityname'];
    $sql1 = "UPDATE city SET city_name = '{$citname}' where city_id = {$citid}";
    
    if(mysqli_query($conn, $sql1)){
        header("location: cityview.php");
    }

}


?>