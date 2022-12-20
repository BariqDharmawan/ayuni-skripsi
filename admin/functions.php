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


function tambah_produk($data)
{
	global $conn;

	$foto = upload();
	$nama_produk = mysqli_real_escape_string($conn, $data["nama_produk"]);
	$harga = mysqli_real_escape_string($conn, $data["harga"]);

	mysqli_query($conn, "INSERT INTO produk 
		VALUES(NULL,'$foto','$nama_produk', '$harga') ");

	return mysqli_affected_rows($conn);
}


function edit_produk($data)
{
	global $conn;

	$id_produk = $data['id_produk'];
	$foto = upload();
	$nama_produk = mysqli_real_escape_string($conn, $data["nama_produk"]);
	$harga = mysqli_real_escape_string($conn, $data["harga"]);

	$query = "UPDATE produk SET 
		gambar = '$foto',
		nama_produk = '$nama_produk',
		harga = '$harga'
		WHERE id_produk = $id_produk
		";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function hapus_produk($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM produk WHERE id_produk = $id");

	return mysqli_affected_rows($conn);
}

function tambah_transaksi($data)
{
	global $conn;

	$id_produk = mysqli_real_escape_string($conn, $data["id_produk"]);
	$jumlah_produk = mysqli_real_escape_string($conn, $data["jumlah_produk"]);
	$tgl_transaksi = mysqli_real_escape_string($conn, $data["tgl_transaksi"]);

	mysqli_query($conn, "INSERT INTO transaksi 
		VALUES(NULL, '$id_produk', '$jumlah_produk', '$tgl_transaksi') ");

	return mysqli_affected_rows($conn);
}



function edit_transaksi($data)
{
	global $conn;

	$id_transaksi = $data['id_transaksi'];
	$id_produk = mysqli_real_escape_string($conn, $data["id_produk"]);
	$jumlah_produk = mysqli_real_escape_string($conn, $data["jumlah_produk"]);
	$tgl_transaksi = mysqli_real_escape_string($conn, $data["tgl_transaksi"]);

	$query = "UPDATE transaksi SET 
		id_produk = '$id_produk',
		jumlah_produk = '$jumlah_produk',
		tgl_transaksi = '$tgl_transaksi'
		WHERE id_transaksi = $id_transaksi
		";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function hapus_transaksi($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi = $id");

	return mysqli_affected_rows($conn);
}



function cariProduk($keyword)
{
	$query = "SELECT * FROM produk
				WHERE
			 nama_produk LIKE '%$keyword%'
		    ";
	return query($query);
}

function edit_admin($data)
{

	global $conn;
	$id_admin = $data['id_admin'];
	$username = mysqli_real_escape_string($conn, $data['username']);
	$password2 = mysqli_real_escape_string($conn, $data['password']);
	$nama = mysqli_real_escape_string($conn, $data['nama']);

	// cek username admin sudah ada atau belum

	$cekusernameadmin = "SELECT * FROM admin where username='$username'";
	$prosescek = mysqli_query($conn, $cekusernameadmin);

	if (mysqli_num_rows($prosescek) > 1) {
		echo "<script>alert('Username Sudah Digunakan!');history.go(-1) </script>";
		exit;
	}

	$password = password_hash($password2, PASSWORD_DEFAULT);

	$query = "UPDATE admin SET 
		username = '$username',
		password = '$password',
		 nama = '$nama'
		WHERE id_admin = $id_admin
		";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function edit_user($data)
{

	global $conn;
	$id_user = $data['id_user'];
	$username = mysqli_real_escape_string($conn, $data['username']);
	$password2 = mysqli_real_escape_string($conn, $data['password']);
	$nama = mysqli_real_escape_string($conn, $data['nama']);

	// cek username user sudah ada atau belum

	$cekusernameuser = "SELECT * FROM user where username='$username'";
	$prosescek = mysqli_query($conn, $cekusernameuser);

	if (mysqli_num_rows($prosescek) > 1) {
		echo "<script>alert('Username Sudah Digunakan!');history.go(-1) </script>";
		exit;
	}

	$password = password_hash($password2, PASSWORD_DEFAULT);

	$query = "UPDATE user SET 
		username = '$username',
		password = '$password',
		 nama = '$nama'
		WHERE id_user = $id_user
		";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus_user($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM user WHERE id_user = $id");

	return mysqli_affected_rows($conn);
}


function upload()
{
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];


	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);

	return $namaFileBaru;
}
