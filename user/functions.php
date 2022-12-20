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





function cariProduk($keyword)
{
	$query = "SELECT * FROM produk
				WHERE
			 nama_produk LIKE '%$keyword%'
		    ";
	return query($query);
}
