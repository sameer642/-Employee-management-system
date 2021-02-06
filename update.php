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
        $emp_id = $_GET['id'];
        $sql = "SELECT emp.emp_id,emp.emp_code,emp.emp_name,emp.desid, emp.country_fk, emp.state_fk,emp.city_fk, designation.des_name,country.cname, state.sname, city.city_name from emp
        LEFT JOIN designation ON emp.desid = designation.des_id
        LEFT JOIN country ON emp.country_fk = country.cid
        LEFT JOIN state ON emp.state_fk = state.sid
        LEFT JOIN city ON emp.city_fk = city.city_id
        where emp.emp_id = {$emp_id}";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)){
            while ($row = mysqli_fetch_assoc($result)) {
                

        ?>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
            <input type="hidden" name="emp_id" value="<?php echo $row['emp_id']?>">
            <div class="form-group">
                <label>Employee Code</label>
                <input type="text" name="empcode" class="form-control" value="<?php echo $row['emp_code']?>">
                </div>
            <div class="form-group">
                <label>Employee name</label>
                <input type="text" name="empname" class="form-control" value="<?php echo $row['emp_name']?>">
                </div>
                <div class="form-group">
                          <label for="dropdown">Designation</label>
                          <select name="designation" class="form-control">
                              <option disabled> Select Designation</option>
                              <?php
                              include "config.php";
                              $sql2 = "SELECT * from designation";
                              $result2 = mysqli_query($conn,$sql2);
                              if(mysqli_num_rows($result2) > 0){
                                while($row1 = mysqli_fetch_assoc($result2)){
                                    if($row['desid'] == $row1['des_id']){
                                        $selected = "selected";
                                    }else{
                                        $selected = "";
                                    }
                                  echo "<option {$selected} value='{$row1['des_id']}'>{$row1['des_name']}</option>";
                                  
                                }
                              }

                              ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="dropdown">Country</label>
                          <select name="country" class="form-control">
                              <option disabled> Select Country</option>
                              <?php
                              include "config.php";
                              $sql3 = "SELECT * from country";
                              $result3 = mysqli_query($conn,$sql3);
                              if(mysqli_num_rows($result3) > 0){
                                while($row2 = mysqli_fetch_assoc($result3)){
                                    if($row['country_fk'] == $row2['cid']){
                                        $selected1 = "selected";
                                    }else{
                                        $selected1 = "";
                                    }
                                  echo "<option {$selected1} value='{$row2['cid']}'>{$row2['cname']}</option>";
                                  
                                }
                              }

                              ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="dropdown">State</label>
                          <select name="state" class="form-control">
                              <option disabled> Select State</option>
                              <?php
                              include "config.php";
                              $sql4 = "SELECT * from state";
                              $result4 = mysqli_query($conn,$sql4);
                              if(mysqli_num_rows($result4) > 0){
                                while($row3 = mysqli_fetch_assoc($result4)){
                                    if($row['state_fk'] == $row3['sid']){
                                        $selected2 = "selected";
                                    }else{
                                        $selected2 = "";
                                    }
                                  echo "<option {$selected2} value='{$row3['sid']}'>{$row3['sname']}</option>";
                                  
                                }
                              }

                              ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="dropdown">City</label>
                          <select name="city" class="form-control">
                              <option disabled> Select City</option>
                              <?php
                              include "config.php";
                              $sql5 = "SELECT * from city";
                              $result5 = mysqli_query($conn,$sql5);
                              if(mysqli_num_rows($result5) > 0){
                                while($row4 = mysqli_fetch_assoc($result5)){
                                    if($row['city_fk'] == $row4['city_id']){
                                        $selected3 = "selected";
                                    }else{
                                        $selected3 = "";
                                    }
                                  echo "<option {$selected3} value='{$row4['city_id']}'>{$row4['city_name']}</option>";
                                  
                                }
                              }

                              ?>
                          </select>
                      </div>
                
            <input type="submit" name="update" class="btn btn-info">
            <a href="view.php" onclick="history.back();" class="btn btn-default">Back</a>
        </form>
    <?php }
}
?>
        
    </div>

</body>
</html>
<?php
if(isset($_POST['update'])){
    $id = $_POST['emp_id'];
    $emp_code = $_POST['empcode'];
    $emp_name = $_POST['empname'];
    $designation = $_POST['designation'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $val_code = "SELECT * FROM emp where emp_code = '{$emp_code}'";
    $s_sql = mysqli_query($conn, $val_code);
    if(mysqli_num_rows($s_sql) > 0){
      echo "Emp_code Already taken!.... Choose Another one";
    }
    else{
    $sql1 = "UPDATE emp SET emp_code = '{$emp_code}', emp_name = '{$emp_name}', desid = {$designation}, country_fk = {$country}, state_fk = {$state}, city_fk = {$city} where emp_id = {$id}";
    
    if(mysqli_query($conn, $sql1)){
        header("location: view.php");
    }
  }

}


?>