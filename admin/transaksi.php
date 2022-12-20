<?php

session_start();

include 'functions.php';

if (!isset($_SESSION["admin"])) {
  echo "<script>
         window.location.replace('../login.php');
       </script>";
  exit;
}

$transaksi = mysqli_query($conn, "SELECT * FROM transaksi");



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

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">


            <div class="col mb-4">
              <a href="tambah_transaksi.php" class="btn btn-warning">Tambah</a>
            </div>

            <!-- Basic Bootstrap Table -->
            <div class="card">
              <h5 class="card-header bg-primary text-white">Data Transaksi</h5>
              <div class="table-responsive" style="box-shadow: 0 0 4px  gray;">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Produk</th>
                      <th>Jumlah Produk</th>
                      <th>Tanggal Transaksi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    <?php $no = 1; ?>
                    <?php foreach ($transaksi as $td) : ?>
                      <tr>
                        <td><?= $no;
                            $no++;  ?></td>

                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i><?= $td['id_produk']; ?></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i><?= $td['jumlah_produk']; ?></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i><?= date('d M Y', strtotime($td['tgl_transaksi'])); ?></td>

                        <td style="display: block;">
                          <a class="btn btn-primary m-2" href="edit_transaksi.php?id_transaksi=<?= $td['id_transaksi']; ?>">
                            <i class="bx bx-edit-alt me-1 text-white"></i>
                          </a>
                          <a class="btn btn-danger" href="hapus_transaksi.php?id_transaksi=<?= $td['id_transaksi']; ?>" onclick="return confirm('Yakin ingin menghapus transaksi ini ?')">
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