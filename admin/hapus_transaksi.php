<?php
require 'functions.php';
$id = $_GET["id_transaksi"];
if (hapus_transaksi($id) > 0 ) {
	echo "
		<script>
			alert('Data berhasil dihapus!');
			document.location.href = 'transaksi.php';
		</script>
	";
    } else {
	echo "
		<script>
			alert('Data gagal dihapus!');
		</script>
	";
	}
 ?>
