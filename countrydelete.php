<?php
include "config.php";
$coid = $_GET['coid'];
$sql = "DELETE from country where cid = {$coid}";
if(mysqli_query($conn, $sql)){
	header("location: countryview.php");
}else{
	echo "<p>Cant delete data</p>";
}
mysqli_close($conn);



?>