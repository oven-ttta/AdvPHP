<?php
ini_set('display_errors', 0); // hide warning
include("connectDB.php");

$c_name = $_POST['c_name'];
$color = $_POST['color'];
$gender = $_POST['gender'];
if (isset($_POST['size_sh'])){
	$size = $_POST['size_sh'];
}
else if (isset($_POST['size_c'])){
	$size = $_POST['size_c'];
}


	
$file = $_FILES['pic']['name'];

if ($_FILES['pic']['error'] > 0)
	echo "Error:" . $_FILES['pic']['error'] . "<br/>";

// file upload and insert to mysqlDB	
//echo $_FILES['pic']['name'];
//if(file_exists("images/" . $_FILES['pic']['name'])) {
//	echo $_FILES['pic']['name'] . " already exists.<br />";
//	}else {
move_uploaded_file($_FILES['pic']['tmp_name'], "images/" . $_FILES['pic']['name']);
//	echo "Stored in:"."images/" .$_FILES['pic']['name'];

//}

$category = $_POST['category'];
$price = $_POST['price'];
$stock = $_POST['stock'];

if ($_POST['category'] == 2) {
	$size = 'F';
}else if($_POST['category'] == 1){
	$size = $_POST['size_c'];
}else{
	$size = $_POST['size_sh'];
}
$sql = "Insert into cloth (c_name, color, gender, size, pic, ct_id, price, stock) 
	Values('$c_name','$color','$gender','$size','$file', $category, $price, $stock)";
$rs = mysqli_query($conn, $sql);

//echo "Add Product Successful";
echo "<script>alert('Add Product Successful'); window.location='adminCostume.php';</script>";
exit();
?>