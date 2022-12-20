<?php
session_start();

if (!isset($_SESSION["admin"])) {
  echo "<script>
         window.location.replace('login.php');
       </script>";
  exit;
} else {
  echo "<script>
         window.location.replace('admin');
       </script>";
  exit;
}

?>
