<?php
	include "../lib/Session.php";
	Session::checkLogin();
?>
<?php include "../config/config.php";?>
<?php include "../lib/Database.php";?>
<?php include "../helpers/Format.php";?>
<?php 

	$db = new Database();
	$fm = new Format();

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$username =	trim(htmlspecialchars(stripslashes( $_POST['username'])));
		$password = trim(htmlspecialchars(stripslashes(md5($_POST['password']))));
		


		$query = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'";
		$result = $db->select($query);

		if($result != false){
			$value = mysqli_fetch_array($result);
				Session::set('login', true);
				Session::set('username', $value['username']);
				Session::set('userId', $value['id']);
				Session::set('userRole', $value['role']);
				header("location: index.php");
		}else{
			echo "<span style='color:red;font-size:18px'>Username or password not match!!.</span>";
		}
	}
?>
		<form action="" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="forgotpass.php">Forgot password</a>
		</div>
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>