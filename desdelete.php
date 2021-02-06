<?php
include "config.php";
$des_id = $_GET['desid'];
$sql = "DELETE from designation where des_id = {$des_id}";
if(mysqli_query($conn, $sql)){
	header("location: desview.php");
}else{
	echo "<p>Cant delete data</p>";
}
mysqli_close($conn);



?>