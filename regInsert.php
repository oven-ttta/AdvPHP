<?php
ini_set('display_errors', 0); // hide warning
include("connectDB.php");

$userName = $_POST['userName'];
$passWord = $_POST['passWord'];
$name = $_POST['name'];
$email = $_POST['email'];

// check same username
$sql_select = "select * from user where username='$userName'" or die("Error:" . mysqli_error($conn));
$result = mysqli_query($conn, $sql_select);
$cnt = 0;
while ($rs = mysqli_fetch_array($result)) {
	$cnt++;
}
if ($cnt == 0) {
	$sql = "Insert into user (username, password, name, email, status) Values('$userName','$passWord','$name','$email','Customer')";
	$rs = mysqli_query($conn, $sql);

	//echo "Register Successful";
	echo "<script>alert('Register Successful');window.location='index.html'</script>";
	exit();
} else {
	echo "<script>alert('The UserName already exist, Please use another UserName.');window.location='reg.php'</script>";
	exit();
}
?>