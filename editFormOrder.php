<!DOCTYPE html>
<html lang="en">
<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet' type='text/css'>

<head>
	<title>Edit User</title>
	<link rel="icon" type="image/png" href="cart.ico" sizes="96x96">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style type="text/css">
	a {
		color: #C8BEA1;
		font-family: Kanit, serif;
		font-size: 1.1em;
	}

	p,
	td {
		color: #CBAA96;
		font-family: Kanit, serif;
		font-size: 1.3em;
	}

	h1 {
		color: #CBAA96;
		font-family: Kanit, serif;
		font-size: 2em;
		font-weight: bold;
	}

	#font {
		color: #CBAA96;
		font-family: Kanit, serif;
		font-size: 1.3em;
	}
</style>

<body>

	<?PHP
	include("include_banner.html");
	?>


	<div class="container">
		<p align="right">
			<?PHP session_start();
			if (isset($_SESSION['userName']))
				echo "Welcome: " . $_SESSION['userName'];
			if (isset($_SESSION['guest']))
				echo "Welcome: " . $_SESSION['guest'];
			ini_set('display_errors', 0); // hide warning
			include("connectDB.php");
			?>
		<form name="logout_form" method="get" action="logout.php" align="right">
			<button type="submit">Logout</button>
		</form>
		</p>
		<div class="row">
			<div class="col-sm-4">
				<h1>แก้ไขข้อมูลรายการสั่งซื้อ</h1>
			</div>

		</div>
	</div>
	<?PHP
	include(connectDB . php);
	$o_id = $_GET['o_id'];
	$sql = "select * from orders Where o_id = $o_id";
	$result = mysqli_query($conn, $sql);
	while ($rs = mysqli_fetch_array($result)) {

		?>
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<table width="800">
						<form name="editOrder_form" method="get" action="edit_order.php">
							<input type="hidden" readonly name="no" value="<?PHP echo $rs['no']; ?>" required />
							<tr>
								<td>
									<p>Order ID:
								</td>
								<td><input type="text" readonly name="o_id" value="<?PHP echo $rs['o_id']; ?>" required />
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<p>User Name:
								</td>
								<td><input type="text" name="username" value="<?PHP echo $rs['username']; ?>" required />
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Date order:
								</td>
								<td><input type="text" name="date_order" Value="<?PHP echo $rs['date_order']; ?>"
										required /></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Amount:
								</td>
								<td><input type="text" name="amount" value="<?PHP echo $rs['amount']; ?>" required /></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Price:
								</td>
								<td><input type="text" name="price" value="<?PHP echo $rs['price']; ?>" required /></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Total:
								</td>
								<td><input type="text" name="total" value="<?PHP echo $rs['total']; ?>" required /></p>
								</td>
							</tr>
							<tr>
								<td>
									<p>Status:
								</td>
								<td>
									<select name="order_status" id="order_status">
										<option value="paid">paid</option>
										<option value="processing">processing</option>
										<option value="sent">sent</option>
									</select></p>
								</td>
							</tr>
							<br>
							<tr>
								<td width="150"><button type="submit" class="btn btn-success btn-lg" />Update Order</button>
								</td>
								<td><a href="ordersManagement.php">
										<font>Back</font>
									</a></td>
							</tr>
						</form>
					</table>
					<br>
				</div>

				<?PHP
	}
	mysqli_close($conn);
	?>
		</div>
	</div>
	<?PHP
	include("include_footer.html");
	?>
</body>

</html>