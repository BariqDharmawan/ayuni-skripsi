<?php
require 'functions.php';
$id = $_GET["id_produk"];
if (hapus_produk($id) > 0 ) {
	echo "
		<script>
			alert('Data berhasil dihapus!');
			document.location.href = 'index.php';
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
