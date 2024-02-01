<?php
require "./admins/session.php";
require "header.php";
require "config.php";

// Check if user is not logged in, then redirect to login page
if ($_SESSION['login'] == false) {
    echo '<script>window.location.href = "./admins/login_form.php";</script>';

}
//LIMIT artinya produk akan ditampilkan hanya 6 produk


$queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);


$queryProduk = mysqli_query($conn, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");
$jumlahProduk = mysqli_num_rows($queryProduk);

?>




<!DOCTYPE html>
<html lang="en">



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
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">A</span>eroShop</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="produk.php">
                    <div class="input-group">
                        <!-- serach bar -->
                        <input type="text" class="form-control" placeholder="Search for products" name="keyword">
                        <button class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <?php require "navbar.php" ?>



    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Kategories Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">


            <div class="col-lg-4 col-md-6 pb-1">

                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right"><?php echo $jumlahKategori; ?> Kategori</p>
                    <a href="produk.php?kategori=Hoodie Cowo" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="img/zipper.jpeg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Hoodie Cowo</h5>
                </div>

            </div>

            <div class="col-lg-4 col-md-6 pb-1">

                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right"><?php echo $jumlahKategori; ?> Kategori</p>
                    <a href="produk.php?kategori=Sepatu Cowo" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="img/massive.jpeg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Sepatu Cowo</h5>
                </div>

            </div>
            <div class="col-lg-4 col-md-6 pb-1">

                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right"><?php echo $jumlahKategori; ?> Kategori</p>
                    <a href="produk.php?kategori=Celana Cowo" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="img/jogger.jpeg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Celana Cowo</h5>
                </div>

            </div>

        </div>
    </div>
    <!-- Categories End -->


    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="img/offer-1.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% Sale</h5>
                        <h1 class="mb-4 font-weight-semi-bold">All produk</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Chechout Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="img/offer-2.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">Colaboration</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Limited Edition</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Chechout Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Best Seller Products</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php while ($data = mysqli_fetch_array($queryProduk)) { ?>
                <div class="col-md-3 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="img/<?php echo $data['foto']; ?>" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"><?php echo $data['nama']; ?></h6>
                            <div class="d-flex justify-content-center">
                                <h6><?php echo 'Rp ' . $data['harga']; ?></h6>
                                <h6 class="text-muted ml-2"><del>Rp300000</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="detail.php?nama=<?php echo $data['nama']; ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Lihat Detail</a>
                            <a href="add.php?nama=<?php echo $data['nama']; ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Keranjang</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- Products End -->



    <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Lokal Tak Gentar</span></h2>
                    <p>Cintailah produk lokal, karena dengan kamu membeli produk dapat membantu umkm lokal berkembang</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->


    <?php require "footer.php"; ?>


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

</body>

</html>