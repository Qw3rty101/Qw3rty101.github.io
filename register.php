<?php 
require 'function/functions.php';

if(isset($_POST["submit"])) {
	if(registrasi($_POST) > 0) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
		</script>";
	} else {
		echo mysqli_error($conn);
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="style/register.css">
</head>
<body>

<div class="navigation">
	<div class="tmp_nav"></div>
</div>
<div class="form">
	<form action="" method="post">
		<hr width="50%" size="6px">
		<h1>Sign Up</h1>
		<div class="form-register">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" placeholder="Type here" required>
			<!-- password -->
			<label for="password">Password</label>
			<input type="password" name="password" id="password" placeholder="Type here" required>
			<!-- confirm password -->
			<label for="password2">Confirm Password</label>
			<input type="password" name="password2" id="password2" placeholder="Type here" required>

			<div class="cancel"><a href="index.php">Cancel</a></div>
			<h3>Or</h3>
			<button class="submit" type="submit" name="submit">Submit</button>
		</div>
	</form>
</div>
<div class="navigation">
	<div class="tmp_nav2"></div>
</div>

</body>
</html>