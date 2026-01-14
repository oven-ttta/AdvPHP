<!DOCTYPE html>
<html lang="en">
<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet' type='text/css'>

<head>
	<title>Admin-Orders Information</title>
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
			if ($_SESSION['userName'] == '' or !$_SESSION['guest'] == '') {
				echo "<script>alert('Please Login before Enter This Shop'); window.location='index.html'</script>";
				exit();
			}
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
		<p>

		<div class="col-sm-4">
			<a href="userManagement.php" class="button">User Management</a>
		</div>
		<div class="col-sm-4">
			<a href="addCostume.php" class="button">Add Costume</a>
		</div>
		<div class="col-sm-4">
			<a href="ordersManagement.php" class="button">Orders Management</a>
		</div>

		</p>

		<div class="row">
			<div class="col-sm-4">
				</br></br>
				<p id="h_1">รายการสั่งซื้อ</p>
			</div>
			<div class="col-sm-4">

			</div>
			<div class="col-sm-4">
				<p align="right"><a href="adminCostume.php">
						<font id="h_3">Back</font>
					</a> </p>
			</div>
		</div>
	</div>

	<?PHP
	include("connectDB.php");
	$sql = "SELECT o_id, date_order, SUM(amount), SUM(total), order_status FROM orders GROUP BY o_id, date_order" or die("Error:" . mysqli_error());

	$result = mysqli_query($conn, $sql);

	?>

	<table width="1150" align="center" border="0">
		<tr bgcolor="#F5B7B1" height="50">
			<th id="th_1">Order id</th>
			<th id="th_1">Date Order</th>
			<th id="th_1">Amount</th>
			<th id="th_1">Total</th>
			<th id="th_1">Order status</th>
			<th id="th_1">Change status</th>
			<th colspan="4"></th>
		</tr>
		<?PHP
		while ($rs = mysqli_fetch_array($result)) {

			?>
			<tr>
				<td>
					<font id="a3">
						<?PHP echo $rs['o_id']; ?>
					</font>
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
					<font id="a3"> <?PHP echo $rs['order_status']; ?> </font>
				</td>
				<form name="editOrder_form" method="get" action="editOrder.php">
					<input type="hidden" name="o_id" value=<?PHP echo $rs['o_id']; ?> />
					<td>
						<font id="a3"> <select name="order_status" id="order_status">
								<option value="Paid">Paid</option>
								<option value="Processing">Processing</option>
								<option value="Sent">Sent</option>
							</select> </font>
					</td>

					<td><button type="submit" class="btn btn-success" />Update</button></td>
				</form>
				<form name="del_form" method="get" action="adminDelOrder.php">
					<input type="hidden" name="o_id" value=<?PHP echo $rs['o_id']; ?> />
					<td class="tl"><button type="submit" class="btn btn-danger" />Delete</button></td>
				</form>

				<td><a href="adminViewOrder.php?o_id=<?PHP echo $rs['o_id']; ?> " id="a2">ดูรายละเอียด</td>
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