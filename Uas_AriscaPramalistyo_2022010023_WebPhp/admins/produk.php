<?php
require "../config.php";

session_start();

$queryProduk = mysqli_query($conn, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b on a.kategori_id=b.id");
$jumlahProduk = mysqli_num_rows($queryProduk);

$queryKategori = mysqli_query($conn, "SELECT * FROM kategori");

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><a href="./index.php" style="text-decoration: none;" class=" text-muted"><i class="fa-solid fa-house-chimney"></i> Home</li></a>
                <li class="breadcrumb-item active fw-semibold" aria-current="page"> Produk</li>
            </ol>
        </nav>
        <div class="pt-3 mb-2 col-12 col-md-6">

            <form method="POST" action="" enctype="multipart/form-data">
                <?php
                if (isset($_POST['simpan_produk'])) {
                    // Proses simpan produk
                    $nama = htmlspecialchars($_POST['nama']);
                    $kategori = htmlspecialchars($_POST['kategori']);
                    $harga = htmlspecialchars($_POST['harga']);
                    $detail = htmlspecialchars($_POST['detail']);
                    $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);

                    $target_dir = "../img/";
                    $nama_file = basename($_FILES["foto"]["name"]);
                    $target_file = $target_dir . $nama_file;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $image_size = $_FILES["foto"]["size"];
                    $random_name = generateRandomString(5);
                    $new_name = $random_name . "." . $imageFileType;




                    if ($nama == '' || $kategori == '' || $harga == '') {

                ?>
                        <div class="alert alert-warning mb-3" role="alert">
                            Nama, Kategori, Harga & Foto wajib diisi!
                        </div>
                        <?php
                    } else {
                        if ($nama_file != '') {
                            // membuat kemungkinan ketika ukuran melebihi 500kb
                            if ($image_size > 300000000) {
                        ?>
                                <div class="alert alert-warning mb-3" role="alert">
                                    Maksimal Ukuran file 300Mb!
                                </div>
                                <?php
                            } else {
                                if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg') {
                                ?>
                                    <div class="alert alert-warning mb-3" role="alert">
                                        File Wajib jpg atau jpeg atau png
                                    </div>
                            <?php
                                } else {
                                    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
                                }
                            }
                        }
                        //query menambahkan produk ke tables database
                        $queryTambah = mysqli_query($conn, "INSERT INTO produk (kategori_id,nama,harga,foto,detail,ketersediaan_stok) VALUES ('$kategori','$nama','$harga','$new_name','$detail','$ketersediaan_stok')");

                        if ($queryTambah) {
                            ?>
                            <div class="alert alert-success mb-3" role="alert">
                                Berhasil ditambahkan
                            </div>
                            <!-- auturefresh html with meta -->
                            <meta http-equiv="refresh" content="0">
                <?php
                        } else {
                            echo mysqli_error($conn);
                        }
                    }
                } ?>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select name="kategori" id="lategori" class="form-control">
                        <option value="">Pilih Kategori</option>
                        <?php
                        while ($data = mysqli_fetch_array($queryKategori)) {
                        ?>
                            <option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?>
                            </option>
                        <?php
                        }
                        ?>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga">
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Produk</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="detail" class="form-label">Detail Produk</label>
                    <textarea name="detail" id="detail" cols="8" rows="10" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="ketersedian_stok" class="form-label">Ketersedian Stok</label>
                    <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                        <option value="tersedia">Tersedia</option>
                        <option value="habis">Habis</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" name="simpan_produk">Simpan</button>
                </div>

            </form>

        </div>

    </div>
    </div>
    </div>
    </div>
    <?php

    ?>
    <div class="alert alert-warning mt-3" role="alert">
        Produk sudah ada!
    </div>
    <?php

    ?>

    </div>




    <?php

    ?>
    </form>



    <div class=" mt-3">
        <h2>Produk AeroStreet</h2>
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Ketersediaan Stok</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                if ($jumlahProduk == 0) {
                ?>
                    <tr>
                        <td colspan="6 text-center">Data Produk Tidak Tersedia</td>
                    </tr>
                    <?php
                } else {
                    $jumlah = 1;
                    while ($data = mysqli_fetch_array($queryProduk)) {
                    ?>
                        <tr>
                            <td> <?php echo $jumlah; ?> </td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['nama_kategori']; ?></td>
                            <td><?php echo $data['harga']; ?></td>
                            <td><?php echo $data['ketersediaan_stok']; ?></td>
                            <td>
                                <a href="produk-detail.php?id=<?php echo $data['id']; ?>" class="btn btn-info"><i class="fas fa-search"></i></a>
                            </td>

                        </tr>
                <?php
                        $jumlah++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>

    </div>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- font awesome logo -->
    <script src="https://kit.fontawesome.com/0b11e1e341.js" crossorigin="anonymous"></script>


</body>

</html>