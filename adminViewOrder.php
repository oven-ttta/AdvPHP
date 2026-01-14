<!DOCTYPE html>
<html lang="en">
<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet' type='text/css'>

<head>
	<title>Admin-Order Details</title>
	<link rel="stylesheet" type='text/css' href="style1.css">
	<link rel="icon" type="image/png" href="pic/cart.ico" sizes="96x96">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<?PHP
	include("include_banner.html");
	?>
	<div class="container">
		<p align="left"> <a href="adminCostume.php"><img src="pic/home2.png" width="50" height="50"></a> </p>
		<p align="right" id="p_1">
			<?PHP session_start();
			if (isset($_SESSION['userName']))
				$username = $_SESSION['userName'];
			if (isset($_SESSION['guest']))
				$username = $_SESSION['guest'];
			if (isset($_SESSION['userName']))
				echo "Welcome: " . $_SESSION['userName'];
			if (isset($_SESSION['guest']))
				echo "Welcome: " . $_SESSION['guest'];
			ini_set('display_errors', 0); // hide warning
			
			?>
		<form name="logout_form" method="get" action="logout.php" align="right">
			<button type="submit" class="btn btn-danger">Logout</button>
		</form>
		</p>
		<?PHP
		$o_id = $_REQUEST['o_id'];
		?>
		<div class="row">
			<div class="col-sm-4">
				<p id="h_1">ประวัติการสั่งซื้อสินค้า </p>
			</div>
			<div class="col-sm-4">
				<p id="h_1">รายการสินค้า [ #<?PHP echo $o_id; ?> ]</p>
			</div>
			<div class="col-sm-4">
				<p align="right"><a href="ordersManagement.php">
						<font id="h_3">Back</font>
					</a> </p>
			</div>
		</div>
	</div>
	</br>
	<?PHP
	include("connectDB.php");
	$o_id = $_REQUEST['o_id'];
	$sql = "select * from orders Where o_id = $o_id" or die("Error:" . mysqli_error());
	$result = mysqli_query($conn, $sql);
	?>
	<table width="1150" align="center">
		<tr bgcolor="#F5B7B1" height="50">
			<th id="th_1">Product Name</th>
			<th id="th_1">Date Order</th>
			<th id="th_1">Price</th>
			<th id="th_1">Amount</th>
			<th id="th_1">Total</th>
		</tr>
		<?PHP
		while ($rs = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td>
					<font id="a3"> <?PHP echo $rs['c_name']; ?> </font>
				</td>
				<td>
					<font id="a3">
						<?PHP echo $rs['date_order']; ?>
					</font>
				</td>
				<td>
					<font id="a3"> <?PHP echo $rs['price']; ?> </font>
				</td>
				<td>
					<font id="a3">
						<?PHP echo $rs['amount']; ?>
					</font>
				</td>
				<td>
					<font id="a3"> <?PHP echo $rs['total']; ?> </font>
				</td>
			</tr>
			<?PHP
		}
		mysqli_close($conn);
		?>
	</table>
	<br><br>
	<?PHP
	include("include_footer.html");
	?>
</body>

</html>