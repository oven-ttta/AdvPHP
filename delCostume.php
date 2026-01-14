<?php session_start();
ini_set('display_errors', 0); // hide warning
include("connectDB.php");

$c_id = $_GET['c_id'];

$sql1 = "Delete from cloth WHERE c_id = $c_id";
$rs1 = mysqli_query($conn, $sql1);
if (!$rs1) {
	echo "<script>alert('can not, because this costume is in a cart'); window.location='adminCostume.php';</script>";
}
//echo "Delete Successful";
else {
	echo "<script>alert('Delete Successful'); window.location='adminCostume.php';</script>";
	exit();
}
?>