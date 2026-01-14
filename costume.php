<!DOCTYPE html>
<html lang="en">
<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet' type='text/css'>

<head>
	<title>Costume</title>
	<link rel="stylesheet" type='text/css' href="style1.css">
	<link rel="icon" type="image/png" href="pic/glasses.ico" sizes="96x96">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<script>
	function defaultElements() {
		document.getElementById('ct_id').style.display = "none";

	}

	function selectCategory() {
		var c = document.getElementById('type_search').value;

		if (c == 'ct_id') {
			document.getElementById('ct_id').style.display = "inline";
			document.getElementById('searching').style.display = "none";
		} else {
			document.getElementById('ct_id').style.display = "none";
			document.getElementById('searching').style.display = "inline";

		}
	}
</script>

<body onload="defaultElements()" id="grad1">
	<?PHP
	include("include_banner.html");
	?>
	<form name='search' action="" method="get">
		<table align="center" width="1100" border="0">
			<tr>
				<td width="20">
					<p align="left"> <a href="costume.php"><img src="pic/home2.png" width="50" height="50"></a></p>
				</td>
				<td width="300">
					<p align="right" id="p_1">ค้นหาสินค้าจาก: &nbsp;&nbsp;</p>
				</td>
				<td width="80">
					<p id="p_1"><select name="type_search" id="type_search" class="select-css"
							onchange="selectCategory()">
							<option value="c_name">ชื่อสินค้า</option>
							<option value="ct_id">ประเภทสินค้า</option>
							<option value="color">สี</option>
							<option value="size">ไซส์</option>
							<option value="gender">เพศ</option>
						</select></p>
				</td>
				<td width="130">
					<p id="p_1"><input type="text" id="searching" name="searching" placeholder="Search..." />
						<select name="category" id="ct_id" class="select-css">
							<option value="1">Clothing - เสื้อผ้า</option>
							<option value="2">Accessories - เครื่องประดับ</option>
							<option value="3">Shoes - รองเท้า</option>
						</select>
					</p>
				</td>
				<td width="130">
					<p id="p_1"><select name="type_price" id="type_price" class="select-css">
							<option value="asc">ราคาน้อยไปมาก</option>
							<option value="desc">ราคามากไปน้อย</option>
						</select></p>
				</td>
				<td>
					<p align="left" id="p_1"><button type="submit" />ค้นหา</button></p>
				</td>
			</tr>
		</table>
	</form>
	<div class="container">
		<p align="right" id="p_1">
			<?PHP session_start();
			if (isset($_SESSION['userName']))
				echo "Welcome: " . $_SESSION['userName'];
			if (isset($_SESSION['guest']))
				echo "Welcome: " . $_SESSION['guest'];
			ini_set('display_errors', 0); // hide warning
			include("connectDB.php");
			$cnt_amount = 0;

			if (isset($_SESSION['userName']))
				$username = $_SESSION['userName'];
			if (isset($_SESSION['guest']))
				$username = $_SESSION['guest'];
			$sql2 = "select * from cart WHERE username = '$username'" or die("Error:" . mysqli_error($conn));
			$result2 = mysqli_query($conn, $sql2);

			while ($rs2 = mysqli_fetch_array($result2)) {
				$cnt_amount = $cnt_amount + $rs2['amount'];
			}
			//echo " ". $cnt_amount;
			if (!$result2) {
				echo "Can not Show Data";
			}
			?>


		</p>

		<form name="logout_form" method="get" action="logout.php" align="right">
			<p><button type="submit" class="btn btn-danger">Logout</button></p>

		</form>
		<div class="row">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4">
				<h3 align="center"></h3>
			</div>
			<div>
				<p align="right"><img src="pic/cart1.png" width="50" height="50">
					<font id="a5">( <?PHP echo $cnt_amount; ?> )</font>
				</p>

				<p align="right">
					<a href="cart.php?username=<?PHP echo $username ?>&amount=<?PHP echo $cnt_amount; ?>"
						class="button">ดูสินค้าในตะกร้า</font></a>
					<a href="order.php?username=<?PHP echo $username; ?>" class="button2">ประวัติการสั่งซื้อ</a>
				</p>
			</div>
		</div>
	</div>
	<?PHP
	if (isset($_GET['searching'])) {
		if ($_GET['searching'] != '') { // ช่องค้นหาไม่ว่าง
			if (isset($_GET['type_search'])) {
				$type_price = $_GET['type_price'];
				if ($_GET['type_search'] == 'c_name') {
					$c_name = $_GET['searching'];
					$sql = "SELECT * FROM cloth WHERE c_name LIKE '%" . $c_name . "%' AND stock > 0 ORDER BY price $type_price";
				}
				if ($_GET['type_search'] == 'color') {
					$color = $_GET['searching'];
					$sql = "SELECT * FROM cloth WHERE color LIKE '%" . $color . "%' AND stock > 0 ORDER BY price $type_price";
				}
				if ($_GET['type_search'] == 'size') {
					$size = strtoupper($_GET['searching']);
					$sql = "SELECT * FROM cloth WHERE size LIKE '%" . $size . "%' AND stock > 0 ORDER BY price $type_price";
				}

				if ($_GET['type_search'] == 'gender') {
					if ($_GET['searching'] == "female" or $_GET['searching'] == "Female") {
						$gender = "F";
					}
					if ($_GET['searching'] == "male" or $_GET['searching'] == "Male") {
						$gender = "M";
					}
					if ($_GET['searching'] == "m" or $_GET['searching'] == "f") {
						$gender = strtoupper($_GET['searching']);
					}
					if ($_GET['searching'] == "u") {
						$gender = strtoupper($_GET['searching']);
					}

					if ($_GET['searching'] == "Unisex" or $_GET['searching'] == "unisex") {
						$gender = "U";
						$sql = "SELECT * FROM cloth where gender like '$gender' and stock > 0 ORDER by price $type_price";
					}
					$sql = "SELECT * FROM cloth WHERE gender LIKE '$gender' AND stock > 0 ORDER BY price $type_price";
				}

				//echo $c_name;
			}

		} else if ($_GET['type_price'] != '' and $_GET['searching'] == '') { // ช่องค้นหาว่าง แต่ช่องราคาไม่ว่าง
			$type_price = $_GET['type_price'];
			if ($_GET['type_price'] == 'desc') {
				$sql = "SELECT * FROM cloth Where stock > 0 ORDER by price $type_price";
			} else {
				$sql = "SELECT * FROM cloth Where stock > 0 ORDER by price $type_price";
			}
			//echo $type_price;
		} else { // ลิงก์มาหน้า adminClothing.php ยังไม่มีการส่งค่าใดเลย
			$sql = "select * from cloth";
		}
	}
	if ($_GET['type_search'] == 'ct_id' and $_GET['searching'] == '') {
		if ($_GET['category'] != '') {
			$ct_id = $_GET['category'];
			$type_price = $_GET['type_price'];
			echo $ct_id;
			$sql = "SELECT * FROM cloth WHERE ct_id = '$ct_id' AND stock > 0 ORDER BY price $type_price";
		}
	}

	if (!isset($_GET['searching']) and !isset($_GET['ct_id'])) {
		$sql = "select * from cloth Where stock > 0";
	}
	$result = mysqli_query($conn, $sql);
	?>
	<div class="container">
		<?PHP
		$cnt = 0;
		while ($rs = mysqli_fetch_array($result)) {
			?>
			<div class="col-sm-4">
				<div class="polaroid">
					<p><img src="<?PHP echo "images/" . $rs['pic']; ?>" height="300" width="250"></p>
					<p></p>
					<p>
						<font id="a3">Name: </font>
						<font id="p_1">
							<?PHP echo $rs['c_name']; ?>
						</font>
					</p>
					<p>
						<font id="a3">Size: </font>
						<font id="p_1"><?PHP echo $rs['size']; ?></font>
					</p>
					<p>
						<font id="a3">Gender: </font>
						<font id="p_1">
							<?PHP echo $rs['gender']; ?>
						</font>
					</p>
					<p>
						<font id="a3">Color:</font>
						<font id="p_1"><?PHP echo $rs['color']; ?></font>
					</p>
					<p>
						<font id="a3">Price: </font>
						<font id="p_1">
							<?PHP echo $rs['price']; ?> Bath
						</font>
					</p>
					<p>
						<font id="a3">Stock: </font>
						<font id="p_1">
							<?PHP echo $rs['stock']; ?>
						</font>
					</p>
					<form method="GET" action="addToCart.php">
						<input type="hidden" name="c_id" value="<?PHP echo $rs['c_id']; ?>" />
						<input type="hidden" name="username" value="<?PHP echo $rs['username']; ?>" />
						<input type="hidden" name="size" value="<?PHP echo $rs['size']; ?>" />
						<input type="hidden" name="gender" value="<?PHP echo $rs['gender']; ?>" />
						<input type="hidden" name="color" value="<?PHP echo $rs['color']; ?>" />
						<input type="hidden" name="price" value="<?PHP echo $rs['price']; ?>" />
						<input type="hidden" name="stock" id="stock" value="<?PHP echo $rs['stock']; ?>" />
						<p>
							<font id="a3">Amount: </font>
							<font id="p_1"><input type="number" name="amount" placeholder="1" maxlength="3" required min="1"
									max="100" value="1" /> ea </font>
						</p>
						<p>
							<font id="a3"><button type="submit" id="cart" name="cart" class="btn btn-warning" />Add to
								Cart</button></font>
						</p><br />
					</form>

				</div>
				<br />
			</div>

			<?PHP $cnt++;
		}
		if ($cnt == 0) {
			echo "<p align='center' id='p2'>ไม่พบสินค้าที่ค้นหา !</p>";
		}
		?>
	</div>
	<?PHP
	include("include_footer.html");
	?>
</body>

</html>