<?php
require 'functions.php';
$id = $_GET["id_user"];
if (hapus_user($id) > 0 ) {
	echo "
		<script>
			alert('Data berhasil dihapus!');
			document.location.href = 'akun.php';
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
