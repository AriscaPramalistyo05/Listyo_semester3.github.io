<?php
require '../config.php';
session_start();

// Cek keberadaan data
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b on a.kategori_id=b.id WHERE a.id='$id'");
if (!$query || mysqli_num_rows($query) == 0) {
    header('location:produk.php');
}

$data = mysqli_fetch_array($query);

// bertujuan ketika mengambil data didatabase tidak ada yang sama + where
$queryKategori = mysqli_query($conn, "SELECT * FROM kategori WHERE id!= '$data[kategori_id]'");

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
    <title>Detail Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php require "navbar.php"; ?>
    <div class="container pt-4">
        <h2>Detail Produk</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="col-12 col-md-6 mb-5">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>">
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="lategori" class="form-control">
                    <option value="<?php echo $data['kategori_id']; ?>"><?php echo $data['nama_kategori']; ?></option>
                    <?php
                    while ($dataKategori = mysqli_fetch_array($queryKategori)) {
                    ?>
                        <option value="<?php echo $dataKategori['id']; ?>"><?php echo $dataKategori['nama']; ?>
                        </option>
                    <?php
                    }
                    ?>

                </select>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $data['harga']; ?>">
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-8">
                        <input type="file" name="foto" id="foto" class="form-control" style="height: 150px;">
                    </div>
                    <div class="col-4">
                        <label for="currentfoto" class="form-label"><b><label for="currentfoto" class="form-label">Foto Produk</label></b></label>
                        <br>
                        <img src="../img/<?php echo $data['foto'] ?>" alt="" width="30%">
                    </div>
                </div>



            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Detail Produk</label>
                <textarea name="detail" id="detail" cols="8" rows="10" class="form-control">
                <?php echo $data['detail']; ?>
                </textarea>
            </div>
            <div class="mb-3">
                <label for="ketersediaan_stok" class="form-label">Ketersedian Stok</label>
                <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                    <option value="<?php echo $data['ketersediaan_stok']; ?>"><?php echo $data['ketersediaan_stok'] ?></option>
                    <?php
                    if ($data['ketersediaan_stok'] == 'tersedia') {
                    ?>
                        <option value="habis">Habis</option>

                    <?php
                    } else {
                    ?>
                        <option value="tersedia">Tersedia</option>

                    <?php
                    }
                    ?>

                </select>
                <div class="mt-3 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="simpan_produk">Simpan</button>
                    <button type="submit" class="btn btn-danger" name="hapus_produk">Hapus</button>
                </div>

            </div>

        </form>
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
                    File Wajib jpg atau jpeg atau png
                </div>
                <?php
            } else {
                $queryUpdate = mysqli_query($conn, "UPDATE produk SET kategori_id = '$kategori',nama = '$nama' ,harga = '$harga' ,detail = '$detail',ketersediaan_stok = '$ketersediaan_stok' WHERE id='$id'");
                if ($nama_file != "") {
                    if ($image_size > 3000000) {
                ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Maksimal Ukuran file 300Mb!
                        </div>
                        <?php
                    } else {
                        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg') {
                        ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                File Wajib jpg atau jpeg atau png
                            </div>

                            <?php
                        } else {
                            move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);

                            $queryUpdate = mysqli_query($conn, "UPDATE produk SET foto = '$new_name' WHERE id='$id'");

                            if ($queryUpdate) {
                            ?>
                                <div class="alert alert-success mt-3" role="alert">
                                    Berhasil diubah
                                </div>
                                <!-- auturefresh html with meta -->
                                <meta http-equiv="refresh" content="0; url=produk.php">

                <?php
                            }
                        }
                    }
                }
            }
        }
        if (isset($_POST['hapus_produk'])) {
            $queryHapus = mysqli_query($conn, "DELETE FROM produk WHERE id='$id'");
            if ($queryHapus) {
                ?>
                <div class="alert alert-danger mt-3" role="alert">
                    Produk Berhasil DiHapus!
                </div>
                <!-- auturefresh html with meta -->
                <meta http-equiv="refresh" content="1; url=produk.php">
        <?php
            } else {
                echo mysqli_error($conn);
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- font awesome logo -->
    <script src="https://kit.fontawesome.com/0b11e1e341.js" crossorigin="anonymous"></script>
</body>

</html>