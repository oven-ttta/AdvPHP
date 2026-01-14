<!DOCTYPE html>
<html lang="en">
<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet' type='text/css'>

<head>
	<title>Clothing</title>
	<link rel="icon" type="image/png" href="glasses.ico" sizes="96x96">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>

<style type="text/css">
	a {
		color: #CB916F;
		font-family: Kanit, serif;
		font-size: 1.1em;
	}

	p {
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
			?>
		<form name="logout_form" method="get" action="logout.php" align="right">
			<button type="submit">Logout</button>
		</form>
		<div class="row">
			<div class="col-sm-4">
				<h3><a href="userManagement.php">User Management</a></h3>
			</div>
			<div class="col-sm-4">
				<h3><a href="addClothing.php">Add Clothing</a></h3>
			</div>
			<div class="col-sm-4">
				<h3><a href="ordersManagement.php">Orders Management</a></h3>
			</div>
		</div>

		</p>
		<div class="row">
			<div class="col-sm-4">
				<h3><a href="adminClothing.php">เสื้อผ้า</a></h3>
			</div>
			<div class="col-sm-4">
				<h3><a href="jewery.php">เครื่องประดับ</a></h3>
			</div>
			<div class="col-sm-4">
				<h3><a href="shoes.php">รองเท้า</a></h3>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<img src="header5.jpg" height="200" width="300">
				<p></p>
				<p>เติมไฟให้กับตัวเอง บรรเลงเพลงเพื่อชีวิต </p>
				<p>ขายของวันละนิด รับเงินวันล่ะหน่อย</p>
				<p>เชิญลูกค้าแวะมาบ่อย ๆ ร้านเรามีแต่ของดี...</p>
			</div>
			<div class="col-sm-4">
				<img src="header3.jpg" height="200" width="300">
				<p></p>
				<p>จนแล้วสู้อย่างมีเกียรติ อย่านอนขี้เกียจตัวเป็นขน </p>
				<p>เป็นแม่ค้าต้องสู้และอดทน บริการทุกคนด้วยหัวใจ </p>
				<p>วันนี้เปิดร้านอย่างไว ขอยอดขายปังๆ...</p>
			</div>
			<div class="col-sm-4">
				<img src="header4.jpg" height="200" width="300">
				<p></p>
				<p>ถึงวันนี้เป้าหมายยังอยู่อีกไกล.. </p>
				<p>เดินไปพักไป ถ้ายังมีลมหายใจยังไงก็ถึง.</p>
			</div>
		</div>
	</div>
	<?PHP
	include("include_footer.html");
	?>
</body>

</html>