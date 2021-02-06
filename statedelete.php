<?php
include "config.php";
$sid = $_GET['sid'];
$sql = "DELETE from state where sid = {$sid}";
if(mysqli_query($conn, $sql)){
	header("location: stateview.php");
}else{
	echo "<p>Cant delete data</p>";
}
mysqli_close($conn);



?>