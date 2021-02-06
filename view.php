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
    <a href="add.php" class="btn btn-success">Add New Records</a>
   </div>

    <table class="table table-striped" border="2px;" cellspacing="0">
        <?php
            include "config.php";
            $sql = "SELECT emp.emp_id,emp.emp_code,emp.emp_name,emp.desid, emp.country_fk,emp.state_fk,emp.city_fk, designation.des_name, country.cname, state.sname,city.city_name from emp
        LEFT JOIN designation ON emp.desid = designation.des_id
        LEFT JOIN country ON emp.country_fk = country.cid
        LEFT JOIN state ON emp.state_fk = state.sid
        LEFT JOIN city ON emp.city_fk = city.city_id
        ORDER BY emp.emp_id DESC";
            $result = mysqli_query($conn , $sql);
            if(mysqli_num_rows($result) > 0){
                
            
            ?>
        <thead>
            <tr>
                <th>ID</th>
                <th>Emp_code</th>
                <th>Emp_Name</th>
                <th>Designation</th>
                <th>Country</th>
                <th>State</th>
                <th>City</th>
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
                echo "<td>".$row['emp_id'] . "</td>";
                echo "<td>".$row['emp_code'] . "</td>";
                echo "<td>".$row['emp_name'] . "</td>";
                echo "<td>".$row['des_name'] . "</td>";
                echo "<td>".$row['cname'] . "</td>";
                echo "<td>".$row['sname'] . "</td>";
                echo "<td>".$row['city_name'] . "</td>";


                echo "<td>" . "<a href='update.php?id=".$row['emp_id']."'"." class='glyphicon glyphicon-edit btn btn-info'>Update</a>" . "</td>";

                        echo "<td>" . "<a href='delete.php?id=".$row['emp_id']."'"." class='glyphicon glyphicon-trash btn btn-danger'>Delete</a>" . "</td>";

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
