<?php
session_start();
require "config.php";

if (empty($_SESSION['keranjang']) or !isset($_SESSION['keranjang'])) {
    echo "<script> alert('Keranjang anda kosong silahkan belanja'); </script>";
    echo "<script> location='produk.php'; </script>";
}
// Query SQL untuk mengambil data dari tabel keranjang
$sql = "SELECT * FROM keranjang";
$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Aero Shop | Lokal Pride</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!--  -->
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
            </div>


        </div>
    </div>
    <!-- Topbar End -->

    <!-- Cart Start -->
    <div class="shadow-sm container-fluid pt-3">
        <div class="row px-xl-5">

            <div class="col-lg-9 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0" id="example">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>No</th>
                            <th>Foto Produk</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                        $no = 1;

                        // Check if keranjang is not empty
                        if (!empty($_SESSION['keranjang'])) {
                            foreach ($_SESSION['keranjang'] as $nama => $jumlah) :
                                $ambil = $conn->query("SELECT * FROM produk WHERE nama='$nama'");

                                if ($ambil->num_rows > 0) {  // Check if results exist
                                    $pecah = $ambil->fetch_assoc();
                                    $subTotal = $pecah['harga'] * $jumlah;

                                    var_dump($subTotal);


                        ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td width="100px" height="80px"><img src="./img/<?php echo $pecah['foto']; ?>" alt="" srcset="" width="100%"></td>
                                        <td><?php echo $pecah['nama']; ?></td>
                                        <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                                        <td><?php echo $jumlah; ?></td>
                                        <td>Rp. <?php echo number_format($subTotal); ?></td>
                                        <td>
                                            <a href="hapus_keranjang.php?nama=<?php echo $pecah['nama'] ?>" type="submit" class="btn btn-danger" name="hapus_keranjang">Hapus</a>
                                            <a href="produk.php" type="submit" class="btn btn-primary" name="hapus_keranjang">Lanjut Belanja</a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            endforeach;
                        } else {
                            // Keranjang kosong, tampilkan pesan
                            ?>
                            <tr>
                                <td colspan="7" class="text-center">Keranjang Anda kosong.</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                    <script>
                        let table = new DataTable('#example');
                    </script>

                </table>
                <a href="checkout.php" class="btn btn-block btn-success my-3 py-3 w-25" id="buat_pesanan" name="buat_pesanan">Buat Pesanan</a>
            </div>
            <!-- <div class="col-lg-3">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-3" placeholder="Kode Kupon">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Ok</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Rincian Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        // Menghitung subtotal produk (asumsi Anda sudah memiliki variabel $subTotal)
                        $subTotalProduk = $jumlah * $subTotal;
                        // Biaya ongkir
                        $biayaOngkir = 20000;
                        // Biaya layanan tetap
                        $biayaLayanan = 3000;
                        // Menghitung total biaya
                        $totalBiaya = $subTotalProduk + $biayaOngkir + $biayaLayanan;
                        ?>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal Produk</h6>
                            <h6 class="font-weight-medium">Rp. <?php echo $subTotalProduk; ?></h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <h6 class="font-weight-medium">Biaya Ongkir</h6>
                            <h6 class="font-weight-medium">Rp. <?php echo number_format($biayaOngkir); ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Biaya Layanan</h6>
                            <h6 class="font-weight-medium">Rp. <?php echo number_format($biayaLayanan); ?></h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">Rp. <?php echo number_format($totalBiaya); ?></h5>
                        </div>
                    </div>

                    <a href="checkout.php" class="btn btn-block btn-success my-3 py-3" id="buat_pesanan" name="buat_pesanan">Buat Pesanan</a>



                </div>
            </div> -->
        </div>
    </div>
    </div>
    <!-- Cart End -->


    <!-- Footer Start -->
    <?= require "footer.php"; ?> <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
</body>

</html>