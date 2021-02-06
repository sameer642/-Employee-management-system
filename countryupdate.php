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
        $coid = $_GET['coid'];
        $sql = "SELECT * FROM country where cid = {$coid}";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)){
            while ($row = mysqli_fetch_assoc($result)) {
                

        ?>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
            <input type="hidden" name="cid" value="<?php echo $row['cid']?>">
            
            <div class="form-group">
                <label>Designation name</label>
                <input type="text" name="cname" class="form-control" value="<?php echo $row['cname']?>">
                </div>
                
            <input type="submit" name="countryupdate" class="btn btn-info">
            <a href="countryview.php" onclick="history.back();" class="btn btn-default">Back</a>
        </form>
    <?php }
}
?>
        
    </div>

</body>
</html>
<?php
if(isset($_POST['countryupdate'])){
    $cid = $_POST['cid'];
    $cname = $_POST['cname'];
    $sql1 = "UPDATE country SET  cname = '{$cname}' where cid = {$cid}";
    
    if(mysqli_query($conn, $sql1)){
        header("location: countryview.php");
    }

}


?>