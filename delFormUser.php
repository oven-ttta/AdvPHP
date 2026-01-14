<?php session_start();
ini_set('display_errors', 0); // hide warning
include("connectDB.php");

$user_id = $_GET['user_id'];

$sql = "Delete from user WHERE user_id = $user_id";
$rs = mysqli_query($conn, $sql);

//echo "Update Successful";
echo "<script>alert('Delete User Successful');window.location='userManagement.php'</script>";
exit();
?>