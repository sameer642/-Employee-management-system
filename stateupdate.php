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
        $sd = $_GET['sid'];
        $sql = "SELECT * FROM state where sid = {$sd}";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)){
            while ($row = mysqli_fetch_assoc($result)) {
                

        ?>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
            <input type="hidden" name="stid" value="<?php echo $row['sid']?>">
            
            <div class="form-group">
                <label>State name</label>
                <input type="text" name="sname" class="form-control" value="<?php echo $row['sname']?>">
                </div>
                
            <input type="submit" name="supdate" class="btn btn-info">
            <a href="stateview.php" onclick="history.back();" class="btn btn-default">Back</a>
        </form>
    <?php }
}
?>
        
    </div>

</body>
</html>
<?php

if(isset($_POST['supdate'])){
    $sid = $_POST['stid'];
    $sname = $_POST['sname'];
    $sql1 = "UPDATE state SET sname = '{$sname}' where sid = {$sid}";
    
    if(mysqli_query($conn, $sql1)){
        header("location: stateview.php");
    }

}


?>