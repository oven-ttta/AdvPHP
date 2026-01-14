<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin-Add Costume</title>
	<link rel="stylesheet" type='text/css' href="style1.css">
	<link rel="icon" type="image/png" href="pic/glasses.ico" sizes="96x96">
	<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="form_add_cloth.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<script>
	function defaultElements() {
		document.getElementById('size_sh').style.display = "none";
		document.getElementById('size_c').style.display = "inline";
		document.getElementById('size').style.display = "inline";
	}
	function selectCategory() {
		var c = document.getElementById('category').value;

		if (c == 1) {
			document.getElementById('size_c').style.display = "inline";
			document.getElementById('size_sh').style.display = "none";
			document.getElementById('size').style.display = "inline";
		} else if (c == 3) {
			document.getElementById('size_sh').style.display = "inline";
			document.getElementById('size_c').style.display = "none";
			document.getElementById('size').style.display = "inline";
		} else {
			document.getElementById('size_sh').style.display = "none";
			document.getElementById('size_c').style.display = "none";
			document.getElementById('size').style.display = "none";
		}
	}
</script>

<body onload="defaultElements()" id="grad1">

	<?PHP
	include("include_banner.html");
	?>


	<div class="container">
		<p align="left"><a href="adminCostume.php"><img src="pic/home2.png" width="50" height="50"></a> </p>
		<p align="right" id="p_1">
			<?PHP session_start();
			if ($_SESSION['userName'] == '' or !$_SESSION['guest'] == '') {
				echo "<script>alert('Please Login before Enter This Shop'); window.location='index.html'</script>";
				exit();
			}
			if (isset($_SESSION['userName']))
				echo "Welcome: " . $_SESSION['userName'];
			if (isset($_SESSION['guest']))
				echo "Welcome: " . $_SESSION['guest'];
			ini_set('display_errors', 0); // hide warning
			include("connectDB.php");
			?>
		<form name="logout_form" method="get" action="logout.php" align="right">
			<button type="submit" class="btn btn-danger">Logout</button>
		</form>
		</p>
		<div class="row">
			<div class="col-sm-4">
				<p id="h_1">&nbsp;เพิ่มสินค้า</p>
			</div>
		</div>
	</div>
	<div class="container">
		<form name="addCloth_form" method="post" action="costumeInsert.php" enctype="multipart/form-data">
			<div class="row">
				<div class="col-75">
					<font id="font1"><input type="text" id="ip" name="c_name" placeholder="ชื่อสินค้า" maxlength="20"
							required /></font>
				</div>
			</div>
			<div class="row">
				<div class="col-75">
					<font id="font1"><input type="text" id="ip" name="color" placeholder="สี" required /></font>
				</div>
			</div>
			<div class="row">
				<div class="col-75">
					<label id="font1">&nbsp;เพศ: &nbsp;&nbsp;</label>
					<input type="radio" id="male" name="gender" value="M" checked> <label id="font2">Male</label>
					<input type="radio" id="female" name="gender" value="F"> <label id="font2">Female</label>
					<input type="radio" id="unisex" name="gender" value="U"> <label id="font2">Unisex</label>

				</div>
			</div>
			<div class="row">
				<div class="col-75">
					<label id="font1">&nbsp;ประเภทสินค้า: </label>
					<p id="font2"><select name="category" id="category" class="select-css" onchange="selectCategory()">
							<option value="1">1 - Clothing</option>
							<option value="2">2 - Accessories</option>
							<option value="3">3 - Shoes</option>
						</select></p>
				</div>
			</div>
			<div class="row">
				<div class="col-75">
					<label id="size">
						<font id="font1">&nbsp;ไซส์: &nbsp;&nbsp; </font>
					</label>
					<p id="font2"><select name="size_c" id="size_c" class="select-css">
							<option value="F">F</option>
							<option value="XS">XS</option>
							<option value="S">S</option>
							<option value="M">M</option>
							<option value="L">L</option>
							<option value="XL">XL</option>
							<option value="XXL">XXL</option>
						</select></p>
				</div>
			</div>
			<div class="row">
				<div class="col-75">

					<font id="font2"><select name="size_sh" id="size_sh" class="select-css">
							<option value="35">35</option>
							<option value="36">36</option>
							<option value="37">37</option>
							<option value="38">38</option>
							<option value="39">39</option>
							<option value="40">40</option>
						</select></font>
				</div>
			</div>
			<div class="row">
				<div class="col-75">
					<label id="font1">&nbsp;เลือกรูปภาพ: </label><input type="file" name="pic" id="ip" placeholder="รูป"
						accept="image/*" required />
				</div>
			</div>

			<div class="row">
				<div class="col-75">
					<font id="font1"><input type="text" id="ip" name="price" placeholder="ราคา (บาท)" required /></font>
					<br>
				</div>
			</div>
			<div class="row">
				<div class="col-75">
					<label id="font1">&nbsp;สินค้าคงเหลือ (ชิ้น): </label><input type="number" id="font2" name="stock"
						placeholder="1" maxlength="20" required min="1" max="100" /><br>
				</div>
			</div>
			<div class="row">
				<div class="col-75">
					<p align="left"><button type="submit" class="btn btn-success btn-lg" />Add
						Product</button>&nbsp;&nbsp;&nbsp;<a href="adminCostume.php">
							<font id="h_3">Back</font>
						</a></p>
				</div>
			</div>
		</form>

	</div>
	</div>
</body>
<?PHP
include("include_footer.html");
?>

</html>