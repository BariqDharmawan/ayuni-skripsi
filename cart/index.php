<?php

session_start();

include 'function.php';

if (!isset($_SESSION["user"])) {
    echo "<script>
        window.location.replace('../login.php');
    </script>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <?php include '../include/head.php' ?>
    <?php include '../include/link.php' ?>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include '../include/sidebar2.php'; ?>
            <div class="layout-page">
                <?php include '../include/navbar2.php'; ?>

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="alert alert-success mb-3" role="alert">
                            A simple success alert—check it out!
                        </div>

                        <div class="card mb-4">
                            <h5 class="card-header bg-primary text-white">Product yang telah ditambahkan</h5>
                            <div class="table-responsive" style="box-shadow: 0 0 4px  gray;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Quantity</th>
                                            <th>Foto</th>
                                            <th>Nama Produk</th>
                                            <th class="text-end">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <td>1</td>
                                        <td>
                                            <img src="../assets/img/639ef857bcee5.png" style="width: 100px; height : 100px">
                                        </td>
                                        <td>
                                            <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            Test nama
                                        </td>
                                        <td class="text-end">Rp. 30000</td>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <h5 class="card-header bg-primary text-white">Rekomendasi Produk berdasarkan Algoritma Apriori</h5>
                            <div class="table-responsive" style="box-shadow: 0 0 4px  gray;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Quantity</th>
                                            <th>Foto</th>
                                            <th>Nama Produk</th>
                                            <th class="text-end">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <td>1</td>
                                        <td>
                                            <img src="../assets/img/639ef857bcee5.png" style="width: 100px; height : 100px">
                                        </td>
                                        <td>
                                            <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            Test nama
                                        </td>
                                        <td class="text-end">
                                            <p>Rp. 30.000</p>
                                            <a href="" class="btn btn-success">Add to cart</a>
                                        </td>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <h5 class="card-header bg-primary text-white">Rekomendasi Produk berdasarkan Algoritma FP Growth</h5>
                            <div class="table-responsive" style="box-shadow: 0 0 4px  gray;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Quantity</th>
                                            <th>Foto</th>
                                            <th>Nama Produk</th>
                                            <th class="text-end">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <td>1</td>
                                        <td>
                                            <img src="../assets/img/639ef857bcee5.png" style="width: 100px; height : 100px">
                                        </td>
                                        <td>
                                            <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            Test nama
                                        </td>
                                        <td class="text-end">
                                            <p>Rp. 30.000</p>
                                            <a href="" class="btn btn-success">Add to cart</a>
                                        </td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="meeting-alert">
        <span class="text-white">Discord is sharing your screen</span>
        <a href="#1" class="btn btn-stop">Stop sharing</a>
        <a href="#1" class="btn btn-link">Hide</a>
    </div>

    <?php include '../include/js.php'; ?>
</body>

</html>