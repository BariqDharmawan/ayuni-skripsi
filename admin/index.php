<?php

session_start();

include 'functions.php';

if (!isset($_SESSION["admin"])) {
  echo "<script>
         window.location.replace('../login.php');
       </script>";
  exit;
}

$produk = mysqli_query($conn, "SELECT * FROM produk");

if (isset($_POST["search"])) {
  $produk = cariProduk($_POST["nama_produk"]);
}


?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>skripsi.</title>

  <meta name="description" content="" />

  <?php include '../include/link.php' ?>

</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      <!-- SIDEBAR -->
      <?php include '../include/sidebar.php'; ?>

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <?php include '../include/navbar.php'; ?>
        <!-- /Navbar -->
        <!-- Search -->
        <form action="" method="POST">
          <div class="container-xxl container-p-y">
            <div class="row">
              <div class="col-4">
                <input type="text" name="nama_produk" class="form-control border-2 mb-2" placeholder="Cari Nama Produk..." />
              </div>
              <div class="col-6">
                <button type="submit" class="btn btn-primary" name="search">Cari</button>
              </div>
              <div class="col">
                <a href="tambah_produk.php" class="btn btn-warning">Tambah</a>
              </div>
            </div>
          </div>
        </form>
        <!-- /Search -->
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">




            <!-- Basic Bootstrap Table -->
            <div class="card">
              <h5 class="card-header bg-primary text-white">Data Produk</h5>
              <div class="table-responsive" style="box-shadow: 0 0 4px  gray;">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Foto</th>
                      <th>Nama Produk</th>
                      <th>Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    <?php $no = 1; ?>
                    <?php foreach ($produk as $td) : ?>
                      <tr>
                        <td><?= $no;
                            $no++;  ?></td>
                        <td><img src="../assets/img/<?= $td['gambar']; ?>" style="width: 100px; height : 100px"></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i><?= $td['nama_produk']; ?></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>Rp <?= number_format($td['harga'], 0); ?></td>
                        <td style="display: block;">
                          <a class="btn btn-primary m-2" href="edit_produk.php?id_produk=<?= $td['id_produk']; ?>">
                            <i class="bx bx-edit-alt me-1 text-white"></i>
                          </a>
                          <a class="btn btn-danger" href="hapus_produk.php?id_produk=<?= $td['id_produk']; ?>" onclick="return confirm('Yakin ingin menghapus <?= $td['nama_produk'] ?> ?')">
                            <i class="bx bx-trash me-1 text-white"></i>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!--/ Basic Bootstrap Table -->
            <hr class="m-5" />


          </div>
          <!-- / Content -->


          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->


      </div>

      <?php include '../include/js.php'; ?>

</body>

</html>