<?php 
require 'function/functions.php';

if(isset($_POST["login"])) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result =  mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
	// cek username
	if(mysqli_num_rows($result) === 1 ) {
		// cek password
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row["password"])) {
			header("Location: home.php");
			exit;
		}
	}

	$error = true;
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style/login.css">
	<?php if(isset($error)) : ?>
				<script type="text/javascript">alert("Username / Password salah!");
				document.location.href = 'index.php';
			</script>
	<?php endif; ?>
</head>
<body>

<div class="navigation">
	<div class="tmp_nav"></div>
</div>
<div class="form">
	<form action="" method="post">
		<hr width="50%" size="6px">
		<h1>Login</h1>
		<div class="form-register">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" placeholder="Type here" required>
			<!-- password -->
			<label for="password">Password</label>
			<input type="password" name="password" id="password" placeholder="Type here" required>

			<button class="submit" type="submit" name="login">Login</button>
		</div>
	</form>
</div>
<div class="navigation">
	<div class="tmp_nav2"></div>
</div>

</body>
</html>