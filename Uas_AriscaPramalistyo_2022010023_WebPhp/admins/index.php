<?php
require "../config.php";
session_start();


$queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);


$queryProduk = mysqli_query($conn, "SELECT * FROM produk");
$jumlahProduk = mysqli_num_rows($queryProduk);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user page</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



</head>

<body>
    <?php require "./navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-house-chimney"></i> Home</li>
            </ol>
        </nav>
        <h2>Halo <?php echo isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'name'; ?></h2>

        <div class="container mt-5">

            <div class="row no-gutters">
                <div class="col-md-6 mb-4">
                    <div class="card w-75">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h3>Kategori</h3>
                                    <h6><?php echo $jumlahKategori; ?> Kategori</h6>
                                </div>
                                <div class="col-4">
                                    <img src="../img/app.png" alt="kategori" width="90%" class="pt-2">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-primary-subtle">
                            <a href="kategori.php" style="text-decoration: none; color:black;">
                                <p class=" m-1 fw-semibold">Lihat detail <i class="fa-solid fa-angles-right"></i></p>

                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card w-75">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h3>Produk</h3>
                                    <h6><?php echo $jumlahProduk; ?> Produk</h6>
                                </div>
                                <div class="col-4">
                                    <img src="../img/pro.png" alt="kategori" width="90%" class="pt-2">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-success-subtle">
                            <a href="produk.php" style="text-decoration: none; color:black;">
                                <p class=" m-1 fw-semibold">Lihat detail <i class="fa-solid fa-angles-right"></i></p>

                            </a>

                        </div>
                    </div>
                </div>
            </div>



        </div>


    </div>
    </div>


    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- font awesome logo -->
    <script src="https://kit.fontawesome.com/0b11e1e341.js" crossorigin="anonymous"></script>




</body>

</html>