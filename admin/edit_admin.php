<?php  

session_start();

include 'functions.php';

if (!isset($_SESSION["admin"])) {
  echo "<script>
         window.location.replace('../login.php');
       </script>";
  exit;
}

$id_admin = $_GET['id_admin'];
$admin = query("SELECT * FROM admin WHERE id_admin = '$id_admin'")[0];

if (isset($_POST['edit'])) {
  if (edit_admin($_POST) > 0) {
    echo"
      <script>
       alert('Data Admin Berhasil Diedit!');
       window.location.href='akun.php';
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
    <title>skripsi.</title>
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
                      <p><i class="text-muted">Edit Data Admin</i></p>
                      <a href="akun.php"><span class="text-white float-end btn btn-primary fs-22">Kembali</span></a> 
                    </div>
                    <div class="card-body">

                      <form action="" method="POST">
                        
                        <input type="hidden" name="id_admin" value="<?= $admin['id_admin'];?>">

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Username</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" value="<?= $admin['username'];  ?>" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" value="<?= $admin['password'];  ?>" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Nama</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="<?= $admin['nama'];  ?>" required>
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
