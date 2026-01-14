<?php
	ini_set('display_errors',0); // hide warning
	include("connectDB.php");
	
	$c_id = $_GET['c_id'];
	$c_name = $_GET['c_name'];
	$color = $_GET['color'];
	$gender = $_GET['gender'];
	$size = $_GET['size'];	
	$file = $_FILES['pic']['name'];
	$tmp_name = $_FILES['pic']['tmp_name'];
	$path = "images/" . $file;
	// file upload and insert to mysqlDB	
	move_uploaded_file($tmp_name, $path);
	/*if(is_uploaded_file($_FILES['pic']['tmp_name'])){
		
        move_uploaded_file($_FILES['pic']['tmp_name'], "images/".$_FILES['pic']['name']);

    }else{ echo "cant uplaod"; }
	*/
	echo $file;
	echo "<img src=\"images/" . $file . "\" />";
	$price = $_GET['price'];
	$stock = $_GET['stock'];
	
	$sql = "Update cloth SET c_name= '$c_name', color='$color', gender = '$gender', size = '$size', 
			pic = '$file', price = $price, stock = $stock
			WHERE c_id = $c_id";
	$rs = mysqli_query($conn, $sql);
	if($rs){
		echo "Update Successful";
		echo"<script>alert('Update Successful'); window.location='adminClothing.php';</script>";
		exit();
	}else{ echo "Can not Update"; }
?>