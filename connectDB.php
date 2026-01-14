<?php
$hostName = "45.130.164.190";
$userName = "root";
$passWord = "rootpassword";
$dbName = "clothDB";
$conn = mysqli_connect($hostName, $userName, $passWord, $dbName);
if (mysqli_connect_error()) {
	echo "Connect falied : " . mysqli_connect_error();
} else {
	//echo "Connect Successfully." ;
}
?>