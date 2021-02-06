<?php
include "config.php";
$cityid = $_GET['cityid'];
$sql = "DELETE from city where city_id = {$cityid}";
if(mysqli_query($conn, $sql)){
	header("location: cityview.php");
}else{
	echo "<p>Cant delete data</p>";
}
mysqli_close($conn);



?>