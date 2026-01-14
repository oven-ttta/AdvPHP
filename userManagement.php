<!DOCTYPE html>
<html lang="en">
<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet' type='text/css'>

<head>
	<title>Admin-User Information</title>
	<link rel="stylesheet" type='text/css' href="style1.css">
	<link rel="icon" type="image/png" href="pic/user.ico" sizes="96x96">
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
		<p align="left"><a href="adminCostume.php"><img src="pic/home2.png" width="50" height="50"></a> </p>
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
				<br />
				<br />
				<p id="h_1">ข้อมูลผู้ใช้</p>
				<br />
			</div>
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4">
				<p align="right"><a href="adminCostume.php">
						<font id="h_3">Back</font>
					</a></p>
			</div>
		</div>
	</div>

	<?PHP
	$sql = "select * from user" or die("Error:" . mysqli_error());
	$result = mysqli_query($conn, $sql);

	?>

	<table width="1150" align="center" border="0">
		<tr bgcolor="#F5B7B1" height="50">
			<th id="th_1">id</th>
			<th id="th_1">name</th>
			<th id="th_1">username</th>
			<th id="th_1">password</th>
			<th id="th_1">email</th>
			<th id="th_1">status</th>
			<th colspan="2"></th>
		</tr>
		<?PHP
		while ($rs = mysqli_fetch_array($result)) {

			?>
			<tr>
				<td>
					<font id="a3">
						<?PHP echo $rs['user_id']; ?>
					</font>
				</td>
				<td>
					<font id="a3">
						<?PHP echo $rs['name']; ?>
					</font>
				</td>
				<td>
					<font id="a3"> <?PHP echo $rs['username']; ?> </font>
				</td>
				<td>
					<font id="a3">
						<?PHP echo $rs['password']; ?>
					</font>
				</td>
				<td>
					<font id="a3"> <?PHP echo $rs['email']; ?> </font>
				</td>
				<td>
					<font id="a3">
						<?PHP echo $rs['status']; ?>
					</font>
				</td>
				<td width="100">
					<form name="edit_form" method="get" action="editFormUser.php">
						<input type="hidden" name="user_id" value=<?PHP echo $rs['user_id']; ?> />
						<button type="submit" class="btn btn-success" />Edit</button>
					</form>
				</td>
				<td width="100" class="tl">
					<form name="del_form" method="get" action="delFormUser.php">
						<input type="hidden" name="user_id" value=<?PHP echo $rs['user_id']; ?> />
						<button type="submit" class="btn btn-danger" />Delete</button>
					</form>
				</td>


			</tr>

			<?PHP
		}
		mysqli_close($conn);
		?>
		</tr>
	</table>
	<br><br>
	<?PHP
	include("include_footer.html");
	?>
</body>

</html>