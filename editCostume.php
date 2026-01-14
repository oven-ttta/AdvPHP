<?php
ini_set('display_errors', 0); // hide warning
include("connectDB.php");

$c_id = $_POST['c_id'];
$c_name = $_POST['c_name'];
$color = $_POST['color'];
$gender = $_POST['gender'];
$size = $_POST['size'];

$file = $_FILES['pic']['name'];
if ($_FILES["pic"]["error"] > 0) {
	echo "Error:" . $_FILES["pic"]["error"] . "<br/>";
} else {
	//echo "Upload: ". $_FILES["pic"]["name"]."<br />";
	//echo "Type: " . $_FILES["pic"]["type"]."<br />";
	//echo "Size: " . $_FILES["pic"]["size"]/1024 . " Kb<br />";
	//echo "Stored in: " . $_FILES["pic"]["tmp_name"] . "<br />";

	//if(file_exists("images/" . $_FILES["pic"]["name"])) {
	//echo $_FILES["pic"]["name"] . " already exists.<br />";
	//} else {
	move_uploaded_file($_FILES["pic"]["tmp_name"], "images/" . $_FILES["pic"]["name"]);
	//}

	//echo "Stored in:"."images/" .$_FILES["pic"]["name"];

}
//echo "<img src=\"images/" . $_FILES["pic"]["name"] . "\" />";

$price = $_POST['price'];
$stock = $_POST['stock'];

//echo $c_id;
//echo $file;

$sql = "Update cloth SET c_name= '$c_name', color='$color', gender = '$gender', size = '$size', 
	pic = '$file', price = $price, stock = $stock
	WHERE c_id = $c_id";
$rs = mysqli_query($conn, $sql);
if ($rs) {
	//echo "Update Successful";
	echo "<script>alert('Update Successful'); window.location='adminCostume.php';</script>";
	exit();
} else {
	echo "<script>alert('Can not Update Product'); window.location='adminCostume.php';</script>";
	exit();
}

?>