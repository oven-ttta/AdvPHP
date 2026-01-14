<?php session_start();
ini_set('display_errors', 0); // hide warning
include("connectDB.php");

$user_id = $_GET['user_id'];
$name = $_GET['name'];
$username = $_GET['username'];
$password = $_GET['password'];
$email = $_GET['email'];
$status = $_GET['status'];

$sql = "Update user SET name= '$name', username='$username', password = '$password', 
			email = '$email', status = '$status'
			WHERE user_id = $user_id";
$rs = mysqli_query($conn, $sql);
if ($rs) {
	//echo "Update User Successful";
	echo "<script>alert('Update Successful'); window.location='userManagement.php';</script>";
	exit();
} else {
	echo "<script>alert('Can not Update'); window.location='userManagement.php';</script>";
	exit();
}
?>