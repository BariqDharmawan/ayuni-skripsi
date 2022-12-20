<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "ayuni-skripsi");
function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	};
	return $rows;
};

function registrasi($data)
{
	global $conn;
	$username = mysqli_real_escape_string($conn, $data['username']);
	$password2 = mysqli_real_escape_string($conn, $data['password']);
	$nama = mysqli_real_escape_string($conn, $data['nama']);

	// cek username admin sudah ada atau belum

	$cekusernameuser = "SELECT * FROM user where username='$username'";
	$prosescek = mysqli_query($conn, $cekusernameuser);

	if (mysqli_num_rows($prosescek) > 0) {
		echo "<script>alert('Username Sudah Digunakan!');history.go(-1) </script>";
		exit;
	}


	$password = password_hash($password2, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO user VALUES(NULL,'$username', '$password','$nama', 'user')");


	return mysqli_affected_rows($conn);
}
