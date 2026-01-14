<!DOCTYPE html>
<html lang="en">
<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet' type='text/css'>

<head>
	<title>Orders Information</title>
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
		<p align="left"> <a href="costume.php"><img src="pic/home2.png" width="50" height="50"></a> </p>
		<p align="right" id="p_1">
			<?PHP session_start();
			$username = $_REQUEST['username'];
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
		<div class="row">
			<div class="col-sm-4">
				<p id="h_1">ประวัติการสั่งซื้อสินค้า</p>
			</div>
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4">
				<p align="right"><a href="costume.php?username=<?PHP echo $username; ?>">
						<font id="h_3">Back</font>
					</a> </p>
			</div>
		</div>
	</div>
	<?PHP
	include("connectDB.php");
	$sql = "select o_id, date_order, sum(amount), sum(total), order_status  
					from orders WHERE username = '$username' Group by o_id, date_order" or die("Error:" . mysqli_error($conn));
	$result = mysqli_query($conn, $sql);

	?>
	<table width="1150" align="center" border="0">
		<tr bgcolor="#F5B7B1" height="50">
			<th id="th_1">Order id</th>
			<th id="th_1">Date Order</th>
			<th id="th_1">Amount</th>
			<th id="th_1">Total</th>
			<th id="th_1">Order status</th>
			<th colspan="2"></th>
		</tr>
		<?PHP
		while ($rs = mysqli_fetch_array($result)) {
			?>
			<tr>
				<td>
					<font id="a3"><?PHP echo $rs['o_id']; ?> </font>
				</td>
				<td>
					<font id="a3">
						<?PHP echo $rs['date_order']; ?>
					</font>
				</td>
				<td>
					<font id="a3"> <?PHP echo $rs['sum(amount)']; ?> </font>
				</td>
				<td>
					<font id="a3">
						<?PHP echo $rs['sum(total)']; ?>
					</font>
				</td>
				<td>
					<font id="a4"> <?PHP echo $rs['order_status']; ?> </font>
				</td>
				<td><a href="viewOrder.php?o_id=<?PHP echo $rs['o_id']; ?>&username=<?PHP echo $username; ?>"
						id="a2">ดูรายละเอียด</td>
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