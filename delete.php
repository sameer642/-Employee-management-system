<?php
include "config.php";
$emp_id = $_GET['id'];
$sql = "DELETE from emp where emp_id = {$emp_id}";
if(mysqli_query($conn, $sql)){
	header("location: view.php");
}else{
	echo "<p>Cant delete data</p>";
}
mysqli_close($conn);



?>