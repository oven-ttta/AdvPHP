<?php session_start();
ini_set('display_errors', 0); // hide warning
include("connectDB.php");

$userName = $_POST['userName'];
$passWord = $_POST['passWord'];
$guest = $_GET['guest'];
$_SESSION['userName'] = $userName;
$_SESSION['passWord'] = $passWord;
$_SESSION['guest'] = $guest;

$sql = "select * from user Where userName ='$userName' and passWord = '$passWord'";
$rs = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($rs);
$_SESSION['user_type'] = $data['status'];
if (isset($_SESSION['user_type'])) {
	echo "This var is set so I will print.";
	if ($data['status'] == "Admin") {
		header("Location: adminCostume.php");
	} else if ($data['status'] == "Customer") {
		header("Location: costume.php");
	} else {
		//echo "Incorrect UserName or Password. Please Try again or Enter with Guest.";
		echo "<script>alert('Incorrect UserName or Password. Please Try again or Enter with Guest.'); window.location='index.html'</script>";
		exit();
	}
} else {
	if ($_SESSION['guest'] == "Guest") {
		header("Location: costume.php");
	} else {
		echo "Incorrect UserName or Password. Please Try again or Enter with Guest.";
		echo "<script>alert('Incorrect UserName or Password. Please Try again or Enter with Guest.'); window.location='index.html'</script>";
		exit();
	}
}
?>