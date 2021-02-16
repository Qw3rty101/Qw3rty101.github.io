<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "bbudb");


// register
function registrasi($data) {
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
	if(mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('username sudah ada!');
		</script>";
		return false;
	}

		// cek konfirmasi
	if($password !== $password2) {
		echo "<script>
			alert('password tidak sesuai');
		</script>";
		return false;
	}
	// enkripsi pw
	$password = password_hash($password, PASSWORD_DEFAULT);
	// Tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);
}


 ?>