<?php session_start();
ini_set('display_errors', 0); // hide warning
include("connectDB.php");

if (isset($_SESSION['userName']))
	$username = $_SESSION['userName'];
if (isset($_SESSION['guest']))
	$username = $_SESSION['guest'];

$sql = "Delete from cart WHERE username = '$username'";
$rs = mysqli_query($conn, $sql);

//echo "Cancel Successful";
echo "<script>('Cancel Successful');window.location='costume.php'</script>";
exit();
?>