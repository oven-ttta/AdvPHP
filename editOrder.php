<?php session_start();
ini_set('display_errors', 0); // hide warning
include("connectDB.php");

$o_id = $_REQUEST['o_id'];
$order_status = $_REQUEST['order_status'];

$sql = "UPDATE orders SET order_status = '$order_status' WHERE o_id = $o_id";

$rs = mysqli_query($conn, $sql);
if ($rs) {
	//echo "Update Successful";
	echo "<script>alert('Update Successful'); window.location='ordersManagement.php';</script>";
	exit();
} else {
	echo "<script>alert('Can not Update'); window.location='ordersManagement.php';</script>";
	exit();
}
?>
