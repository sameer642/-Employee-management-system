<?php
include "config.php";
$emp_code = "";
if(isset($_POST['add'])){
    $emp_code = mysqli_real_escape_string($conn, $_POST['empcode']);
    $emp_name = mysqli_real_escape_string($conn, $_POST['empname']);
    $des = mysqli_real_escape_string($conn, $_POST['designation']);
    $country_fk = mysqli_real_escape_string($conn, $_POST['country']);
    $state_fk = mysqli_real_escape_string($conn, $_POST['state']);
    $city_fk = mysqli_real_escape_string($conn, $_POST['city']);


    $sql_e = "SELECT * FROM emp WHERE emp_code = '{$emp_code}'";
    $inside = mysqli_query($conn, $sql_e);
    if(mysqli_num_rows($inside) > 0){
      echo "Emp_code Already taken";
    }
    else{
    $sql = "INSERT INTO emp(emp_code, emp_name, desid, country_fk, state_fk, city_fk)values('{$emp_code}','{$emp_name}',{$des}, {$country_fk}, {$state_fk}, {$city_fk});";    
    if(mysqli_query($conn, $sql)){
        header("location: view.php");
    }else{
        echo "query failed";
    }
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
                <label>Employee Code</label>
                <input type="text" name="empcode" class="form-control">
                </div>
            <div class="form-group">
                <label>Employee name</label>
                <input type="text" name="empname" class="form-control">
                </div>
            <div class="form-group">
                          <label for="dropdown">Designation</label>
                          <select name="designation" class="form-control">
                              <option> Select Designation</option>
                              <?php
                              include "config.php";
                              $sql1 = "SELECT * from designation";
                              $result1 = mysqli_query($conn,$sql1);
                              if(mysqli_num_rows($result1) > 0){
                                while($row = mysqli_fetch_assoc($result1)){
                                  echo "<option value='{$row['des_id']}'>{$row['des_name']}</option>";
                                  
                                }
                              }

                              ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="dropdown">Country</label>
                          <select name="country" class="form-control">
                              <option> Select country</option>
                              <?php
                              include "config.php";
                              $sql2 = "SELECT * from country";
                              $result2 = mysqli_query($conn,$sql2);
                              if(mysqli_num_rows($result2) > 0){
                                while($row1 = mysqli_fetch_assoc($result2)){
                                  echo "<option value='{$row1['cid']}'>{$row1['cname']}</option>";
                                  
                                }
                              }

                              ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="dropdown">State</label>
                          <select name="state" class="form-control">
                              <option> Select State</option>
                              <?php
                              include "config.php";
                              $sql3 = "SELECT * from state";
                              $result3 = mysqli_query($conn,$sql3);
                              if(mysqli_num_rows($result3) > 0){
                                while($row2 = mysqli_fetch_assoc($result3)){
                                  echo "<option value='{$row2['sid']}'>{$row2['sname']}</option>";
                                  
                                }
                              }

                              ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="dropdown">City</label>
                          <select name="city" class="form-control">
                              <option> Select State</option>
                              <?php
                              include "config.php";
                              $sql4 = "SELECT * from city";
                              $result4 = mysqli_query($conn, $sql4);
                              if(mysqli_num_rows($result4) > 0){
                                while($row3 = mysqli_fetch_assoc($result4)){
                                  echo "<option value='{$row3['city_id']}'>{$row3['city_name']}</option>";
                                  
                                }
                              }

                              ?>
                          </select>
                      </div>
                
            <input type="submit" name="add" class="btn btn-info">
            <a href="view.php" onclick="history.back();" class="btn btn-default">Back</a>
        </form>
        
    </div>

</body>
</html>