<?php
include "navbar.php";

if(isset($_POST['but_logout'])){
    session_destroy();
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>  
           <title>View Data</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
<body>
    <div align="left">
          <form method="post">
    <input type="submit" value="Logout" name="but_logout" class="btn btn-danger">
    </form>
    </div>


    <div align="right">
    <a href="desadd.php" class="btn btn-success">Add New Records</a>
   </div>

    <table class="table table-striped" border="2px;" cellspacing="0">
        <?php
            include "config.php";
            $sql = "SELECT * FROM designation";
            $result = mysqli_query($conn , $sql);
            if(mysqli_num_rows($result) > 0){
                
            
            ?>
        <thead>
            <tr>
                <th>ID</th>
                <th>Designation Name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if(isset($_SESSION['username'])){
          echo "<h3>Welcome - " . $_SESSION['username'] . "</h3>";
               }
               

            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['des_id'] . "</td>";
                echo "<td>".$row['des_name'] . "</td>";

                echo "<td>" . "<a href='desupdate.php?desid=".$row['des_id']."'"." class='glyphicon glyphicon-edit btn btn-info'>Update</a>" . "</td>";
                        echo "<td>" . "<a href='desdelete.php?desid=".$row['des_id']."'"." class='glyphicon glyphicon-trash btn btn-danger'>Delete</a>" . "</td>";

                echo "</tr>";
             
                 ?>
                
            
            
        </tbody>
    <?php }
    ?>
    </table>
<?php 
}

?>

</body>
</html>
