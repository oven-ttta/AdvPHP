<!DOCTYPE html>
<html lang="en">
<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet' type='text/css'>

<head>
	<link rel="stylesheet" type='text/css' href="style1.css">
	<title>Place Order</title>
	<link rel="icon" type="image/png" href="pic/glasses.ico" sizes="96x96">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<?PHP session_start();
	include("include_banner.html");
	ini_set('display_errors', 0); // hide warning
	include("connectDB.php");

	?>
	<div class="container">
		<p align="left"><a href="costume.php"><img src="pic/home2.png" width="50" height="50"></a> </p>
		<p align="right" id="p_1">
			<?PHP session_start();
			$_SESSION['refresh'] = 0;
			if (isset($_SESSION['userName']))
				echo "Welcome: " . $_SESSION['userName'];
			if (isset($_SESSION['guest']))
				echo "Welcome: " . $_SESSION['guest'];

			if (isset($_SESSION['userName']))
				$username = $_SESSION['userName'];
			if (isset($_SESSION['guest']))
				$username = $_SESSION['guest'];
			?>
		<form name="logout_form" method="get" action="logout.php" align="right">
			<button type="submit" class="btn btn-danger">Logout</button>
		</form>
		</p>
		<div class="row">
			<div class="col-sm-4">
				<p id="h_1">สรุปข้อมูลการสั่งซื้อสินค้า</p>
			</div>
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4">
				<h3 align="right" id="h_3"><a id="h_3" href="costume.php?username=<?PHP echo $username; ?>">Back</a>
				</h3>
			</div>
		</div>
	</div>
	<?php

	$c_id = $_REQUEST['c_id'];
	$date_order = $_REQUEST['date_order'];
	$amount = $_REQUEST['amount'];
	$total = $_REQUEST['total'];
	$order_status = $_REQUEST['order_status'];
	$card_number = $_REQUEST['card_number'];

	$i = 0;
	$j = 0;
	$array_c_name = array();
	$array_amount = array();
	$array_total = array();
	$array_price = array();

	$sql = "select * from cart inner join cloth on cart.c_id = cloth.c_id and cart.username = '$username'" or die("Error:" . mysqli_error());
	$result = mysqli_query($conn, $sql);
	if (!$result) {
		echo "Can not Show Data";
	}

	$total = 0;
	?>
	<br>
	<table width="1150" align="center">
		<tr bgcolor="#F5B7B1" height="50">
			<th></th>
			<th id="th_1">ชื่อสินค้า</th>
			<th id="th_1">เพศ</th>
			<th id="th_1">สี</th>
			<th id="th_1">จำนวน</th>
			<th id="th_1">ราคา</th>
			<th id="th_1">ราคารวม</th>
		</tr>
		<?PHP
		while ($rs = mysqli_fetch_array($result)) {
			?>
			<tr height="190">
				<td>
					<font id="a3"> <img src="<?PHP echo "images/" . $rs['pic']; ?>" height="180" width="150"> </font>
				</td>
				<td>
					<font id="a3">
						<?PHP echo $rs['c_name']; ?>
					</font>
				</td>
				<td>
					<font id="a3"> <?PHP echo $rs['gender']; ?> </font>
				</td>
				<td>
					<font id="a3">
						<?PHP echo $rs['color']; ?>
					</font>
				</td>
				<td>
					<font id="a3"> <?PHP echo $rs['amount']; ?> </font>
				</td>
				<td>
					<font id="a3">
						<?PHP echo $rs['price']; ?>
					</font>
				</td>
				<td>
					<font id="a3"> <?PHP echo $rs['total']; ?> </font>
				</td>
			</tr>
			<?PHP
			$array_c_id[$i] = $rs['c_id'];
			$array_c_name[$i] = $rs['c_name'];
			$array_amount[$i] = $rs['amount'];
			$array_total[$i] = $rs['total'];
			$array_price[$i] = $rs['price'];
			$array_stock[$i] = $rs['stock'];
			$total = $total + $rs['total'];
			$i++;
		}
		?>
		<tr>
			<td colspan="4" style="text-align:right;" id="font3">
				<?PHP echo "Total Price: "; ?>
			</td>
			<td id="font4">
				<?PHP echo number_format($total) . " Bath"; ?>
			</td>
		</tr>
	</table>
	<br><br>
	<?PHP
	// select the last order id from orders			
	$sql_statement = "SELECT * FROM orders where username='$username' order by o_id desc LIMIT 1";
	$result2 = mysqli_query($conn, $sql_statement);
	if ($result2)
		echo $o_id;
	while ($r2 = mysqli_fetch_array($result2)) {
		$o_id = $r2['o_id'];
		echo $r2['o_id'];
	}
	// insert to orders 
	if ($i > 0) {
		for ($j = 0; $j < $i; $j++) {
			$sql_insert = "Insert into orders (o_id, c_id, c_name, username, date_order, price, amount, total, card_number, order_status) 
					Values($o_id+1, $array_c_id[$j], '$array_c_name[$j]', '$username', '$date_order', $array_price[$j], $array_amount[$j], $array_total[$j], '$card_number', 'Placed')";
			$rs2 = mysqli_query($conn, $sql_insert);
			if (!$rs2)
				echo "can not add: $o_id";

			// update clothing cal amount of stock
			$sql_Update = "Update cloth SET stock=$array_stock[$j]-$array_amount[$j] WHERE c_id = $array_c_id[$j]";
			$rs_Update = mysqli_query($conn, $sql_Update);
			//if($rs_Update){
			//	echo "<script>alert('Update Successful'); </script>";
			//}
		}
		echo "<script>alert('Update Successful'); </script>";
		// delete on cart where username = $username after placed orders
		$sql_delete = "Delete from cart WHERE username = '$username'";
		if ($j > 0) {
			$rs3 = mysqli_query($conn, $sql_delete);
			if (!$rs3)
				echo "can not delete";
		}
	}
	?>
	<br><br>
	<?PHP
	include("include_footer.html");
	?>
</body>

</html>