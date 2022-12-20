<?php
session_start();
require 'functions.php';

if (isset($_SESSION["admin"])) {
    header("Location: admin");
    exit;
}

if (isset($_SESSION["user"])) {
    header("Location: user");
    exit;
}

 if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $admin = query("SELECT * FROM admin");
  $user = query("SELECT * FROM user");
  foreach ($admin as $k) {}
  foreach ($user as $us) {}

// Login Admin
  if ($username == $k["username"]) {
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");


  if (mysqli_num_rows($result) === 1 ) {


    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {

            $_SESSION["login"] = true;
            $_SESSION["admin"] = true;
            $_SESSION["username"] = $username;

      header("Location: admin");
      exit;
    }

  }

} // Login User
else if ($username == $us["username"] || $us["level"] == "user") {
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");


  if (mysqli_num_rows($result) === 1 ) {
    

    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {

            $_SESSION["login"] = true;
            $_SESSION["user"] = true;
            $_SESSION["username"] = $username;
      
      header("Location: user");
      exit;
    }
  }
}

$error = true;

}

?>

<!DOCTYPE html>
<html lang="en"class="light-style customizer-hide"dir="ltr"data-theme="theme-default"data-assets-path="assets/"data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>Login Administrator</title>
    <meta name="description" content="" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.php" class="app-brand-link gap-2">
                  <span class="app-brand-text demo fw-bolder">Sign in - skripsi.</span>
                </a>
              </div>

              <?php if (isset($error)) : ?>
                  <p style="color : red; text-align: center;">Username/password salah!</p>
              <?php endif; ?>

              <form class="mb-3" action="" method="POST">
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text"class="form-control" id="username" name="username" placeholder="Username" autofocus/>
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit" name="login">Sign in</button>
                </div>
                <div class="mb-3">
                  <a href="registrasi.php" class="text-center">Registrasi sebagai User</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- CORE JS -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/js/menu.js"></script>
    <script src="assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
