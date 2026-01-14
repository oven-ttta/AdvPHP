<!DOCTYPE html>
<html lang="en">
<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet' type='text/css'>

<head>
	<title>Admin-Edit Costume</title>
	<link rel="stylesheet" type='text/css' href="style1.css">
	<link rel="icon" type="image/png" href="pic/glasses.ico" sizes="96x96">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body id="grad1">

	<?PHP
	include("include_banner.html");
	?>


	<div class="container">
		<p align="left"> <a href="adminCostume.php"><img src="pic/home2.png" width="50" height="50"></a></p>
		<p align="right" id="p_1">
			<?PHP session_start();
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
				<p id="h_1">แก้ไขข้อมูลสินค้า</p>
			</div>
			<!--<div class="col-sm-4">
					<h3><a href="jewery.php">เครื่องประดับ</a></h3>
					</div>
					<div class="col-sm-4">
					<h3><a href="shoes.php">รองเท้า</a></h3>        
				</div> -->
		</div>
	</div>
	<?PHP session_start();
	if ($_SESSION['userName'] == '' or !$_SESSION['guest'] == '') {
		echo "<script>alert('Please Login before Enter This Shop'); window.location='index.html'</script>";
		exit();
	}
	$c_id = $_GET['c_id'];
	$sql = "select * from cloth Where c_id = $c_id";
	$result = mysqli_query($conn, $sql);
	while ($rs = mysqli_fetch_array($result)) {


		?>
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<table>
						<form name="editCloth_form" method="post" action="editCostume.php" accept-charset="utf-8"
							enctype="multipart/form-data">
							<img src="<?PHP echo "images/" . $rs['pic']; ?>" height="300" width="250">
							<p><input type="hidden" name="c_id" value="<?PHP echo $rs['c_id']; ?>" /></p>
							<p><input type="hidden" name="pic" value="<?PHP echo $rs['pic']; ?>" /></p>
							<tr>
								<td>
									<p align="left">
										<font id="a3">ชื่อสินค้า: </font>
									</p>
								</td>
								<td>
									<p align="left">
										<font id="p_1"><input type="text" name="c_name" Value="<?PHP echo $rs['c_name']; ?>"
												maxlength="20" required /> </font>
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<p align="left">
										<font id="a3">สี: </font>
									</p>
								</td>
								<td>
									<p align="left">
										<font id="p_1"><input type="text" name="color" value="<?PHP echo $rs['color']; ?>"
												required />
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<p align="left">
										<font id="a3">เพศ: </font>
									</p>
								</td>
								<td>
									<p align="left">
										<font id="p_1"><input type="text" name="gender" value="<?PHP echo $rs['gender']; ?>"
												required />
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<p align="left">
										<font id="a3">ไซส์: </font>
									</p>
								</td>
								<td>
									<p align="left">
										<font id="p_1"><input type="text" name="size" value="<?PHP echo $rs['size']; ?>"
												required />
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<p align="left">
										<font id="a3">เลือกรูปภาพ: </font>
									</p>
								</td>
								<td>
									<p align="left">
										<font id="p_1"><input type="file" id="pic" name="pic" value="<?PHP $rs['pic']; ?>"
												accept="image/*" required />
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<p align="left">
										<font id="a3">ราคา: </font>
									</p>
								</td>
								<td>
									<p align="left">
										<font id="p_1"><input type="text" name="price" value="<?PHP echo $rs['price']; ?>"
												required /> Bath
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<p align="left">
										<font id="a3">สต็อก: </font>
									</p>
								</td>
								<td>
									<p align="left">
										<font id="p_1"><input type="number" name="stock" value="<?PHP echo $rs['stock']; ?>"
												required min="1" max="100" /> ea
									</p>
								</td>
							</tr>
							<tr>
								<td width="170">
									<p align="left"><button type="submit" class="btn btn-success btn-lg" />Update
										Product</button></p>
								</td>
								<td>
									<p align="left">&nbsp;&nbsp;<a id="h_3" href="adminCostume.php">Back</a></p>
								</td>
							</tr>
						</form>
					</table>
				</div>

				<?PHP
	}
	?>
		</div>
	</div>
	<br>
	<?PHP
	include("include_footer.html");
	?>
</body>

</html>