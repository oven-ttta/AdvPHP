<?php session_start();
ini_set('display_errors', 0); // hide warning
include("connectDB.php");

$o_id = $_GET['o_id'];

$sql = "Delete from orders WHERE o_id = $o_id";
$rs = mysqli_query($conn, $sql);

//echo "Delete Successful";
echo "<script>alert('Delete Order Successful');window.location='ordersManagement.php'</script>";
exit();
?>