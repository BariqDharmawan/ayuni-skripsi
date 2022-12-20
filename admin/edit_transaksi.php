<?php  

session_start();

include 'functions.php';

if (!isset($_SESSION["admin"])) {
  echo "<script>
         window.location.replace('../login.php');
       </script>";
  exit;
}

$id_transaksi = $_GET['id_transaksi'];
$transaksi = query("SELECT * FROM transaksi WHERE id_transaksi = $id_transaksi")[0];

if (isset($_POST['edit'])) {
  if (edit_transaksi($_POST) > 0) {
    echo"
      <script>
       alert('Transaksi Berhasil Diedit!');
       window.location.href='transaksi.php';
     </script>
     ";
  }
}

?>

<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>skripsi</title>
    <meta name="description" content="" />
    <?php include '../include/link.php' ?>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar" style="margin-top: -20px;">
      <div class="layout-container container-p-y">
        
        <!-- SIDEBAR -->
        <?php include '../include/sidebar.php'; ?>

        <!-- Layout container -->
        <div class="layout-page">
          <?php include '../include/navbar.php'; ?>

          <!-- FORM -->
            <!-- Basic Layout -->
            <div class="container-xl flex-grow-1 container-p-y container-p-x mx-1">
              <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tambah Peserta/</span> Horizontal Layouts</h4> -->
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0"></h5>
                      <a href="transaksi.php"><span class="text-white float-end btn btn-primary fs-22">Kembali</span></a> 
                    </div>
                    <div class="card-body">

                      <form action="" method="POST">
                        <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">ID Produk</label>
                          <select name="id_produk" class="form-control" >
                              <option value="<?= $transaksi['id_produk']; ?>"><?= $transaksi['id_produk']; ?></option>
                              <?php $produk = mysqli_query($conn, "SELECT * FROM produk"); ?>
                              <?php foreach ($produk as $pd) : ?>
                                  <option  value="<?= $pd['id_produk'];?>"><?= $pd['id_produk'];?> (<?= $pd['nama_produk'];?>)</option>
                              <?php endforeach; ?>
                          </select>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Jumlah Produk</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" name="jumlah_produk" value="<?= $transaksi['jumlah_produk']  ?>" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" name="tgl_transaksi"  value="<?= $transaksi['tgl_transaksi']  ?>" required>
                          </div>
                        </div>


                        
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                          </div>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
              </div>
          <!-- /FORM -->


          

        
    </div>

    <?php include '../include/js.php'; ?>

  </body>
</html>
