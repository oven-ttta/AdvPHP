<?php session_start();
ini_set('display_errors', 0); // hide warning
include("connectDB.php");

if (isset($_SESSION['userName']))
	$username = $_SESSION['userName'];
if (isset($_SESSION['guest']))
	$username = $_SESSION['guest'];


$c_id = $_REQUEST['c_id'];
$price = $_REQUEST['price'];
$size = $_REQUEST['size'];
$amount = $_REQUEST['amount'];
$total = $price * $amount;


$sql = "Insert into cart (c_id, username, price, size, amount, total) 
	Values($c_id,'$username', $price,'$size', $amount, $total)";
$rs = mysqli_query($conn, $sql);

//echo "Add to Cart Successful";
echo "<script>alert('Add to Cart Successful'); window.location='costume.php'</script>";
exit();
?>