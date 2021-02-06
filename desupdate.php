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
        $des_id = $_GET['desid'];
        $sql = "SELECT * FROM designation where des_id = {$des_id}";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)){
            while ($row = mysqli_fetch_assoc($result)) {
                

        ?>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
            <input type="hidden" name="des_id" value="<?php echo $row['des_id']?>">
            
            <div class="form-group">
                <label>Designation name</label>
                <input type="text" name="desname" class="form-control" value="<?php echo $row['des_name']?>">
                </div>
                
            <input type="submit" name="desupdate" class="btn btn-info">
            <a href="desview.php" onclick="history.back();" class="btn btn-default">Back</a>
        </form>
    <?php }
}
?>
        
    </div>

</body>
</html>
<?php
if(isset($_POST['desupdate'])){
    $desid = $_POST['des_id'];
    $des_name = $_POST['desname'];
    $sql1 = "UPDATE designation SET  des_name = '{$des_name}' where des_id = {$desid}";
    
    if(mysqli_query($conn, $sql1)){
        header("location: desview.php");
    }

}


?>