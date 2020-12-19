<?php include '../classes/AdminLogin.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../config/config.php'; ?>
<?php include '../helpers/helper.php'; ?>
<?php include '../lib/Session.php';
Session::init();
 ?>
<?php 
	//$al = new AdminLogin();
	$fm = new helper();
	$db = new Database();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// echo "string".$adminName.$adminPass;
		// echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 
		$adminName = $fm->validation($_POST['adminName']);
		$adminPass = md5($_POST['adminPass']);


		$query = "select * from tbl_admin where adminName = '$adminName' and adminPass = '$adminPass'";
		$result = $db->select($query);



		if ($result != false) {
					$value = mysqli_fetch_array($result);
					$row = mysqli_num_rows($result);
					if ($row > 0) {
						Session::set("login", true);
						Session::set("adminName", $value['adminName']);
						Session::set("adminId", $value['adminId']);
						header("Location:index.php");
					} else {
						echo "Not match";
					}
					
				} else {
					echo "Not found";
				}
	}
 ?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Admin Name" required="" name="adminName"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>