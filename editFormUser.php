<!DOCTYPE html>
<html lang="en">
<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet' type='text/css'>

<head>
	<title>Admin-Edit User</title>
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
		<p align="left"> <a href="adminCostume.php"><img src="pic/home2.png" width="50" height="50"></a> </p>
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
				<p id="h_1">แก้ไขข้อมูลผู้ใช้</p>
			</div>

		</div>
	</div>
	<?PHP
	$user_id = $_GET['user_id'];
	echo $user_id;
	$sql = "SELECT * FROM user WHERE user_id = $user_id";
	$result = mysqli_query($conn, $sql);
	while ($rs = mysqli_fetch_array($result)) {

		?>


		<table width="800" align="center">
			<form name="editUser_form" method="get" action="editUser.php">
				<tr>
					<td>
						<p align="left">
							<font id="p_1">User ID:
					</td>
					<td>
						<p align="left">
							<font id="p_1"><input type="text" name="user_id" Value="<?PHP echo $rs['user_id']; ?>"
									required />
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<p align="left">
							<font id="p_1">Name:
					</td>
					<td>
						<p align="left">
							<font id="p_1"><input type="text" name="name" Value="<?PHP echo $rs['name']; ?>" required />
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<p align="left">
							<font id="p_1">UserName:
					</td>
					<td>
						<p align="left">
							<font id="p_1"><input type="text" name="username" Value="<?PHP echo $rs['username']; ?>"
									required />
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<p align="left">
							<font id="p_1">Password:
					</td>
					<td>
						<p align="left">
							<font id="p_1"><input type="password" name="password" Value="<?PHP echo $rs['password']; ?>"
									required />
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<p align="left">
							<font id="p_1">Email:
					</td>
					<td>
						<p align="left">
							<font id="p_1"><input type="text" name="email" Value="<?PHP echo $rs['email']; ?>" required />
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<p align="left">
							<font id="p_1">Status:
					</td>
					<td>
						<p align="left">
							<font id="p_1"><select name="status" id="status">
									<option value="Admin">Admin</option>
									<option value="Customer">Customer</option>
								</select></font>
						</p>
					</td>
				</tr>
				<br>
				<tr>
					<td width="150">
						<p align="left"><button type="submit" class="btn btn-success btn-lg" />Update User</button>
					</td>
					<td>
						<p align="left">&nbsp;&nbsp;<a href="userManagement.php">
								<font id="h_3">Back</font>
							</a></p>
					</td>
			</form>
		</table>
		<br>

		<?PHP
	}
	mysqli_close($conn);
	?>


	<?PHP
	include("include_footer.html");
	?>
</body>

</html>