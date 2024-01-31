<?php
require '../config.php';
session_start();

// Cek keberadaan data
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM kategori WHERE id = '$id'");
if (!$query || mysqli_num_rows($query) == 0) {
    header('location:kategori.php');
}

$data = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php require "navbar.php"; ?>
    <div class="container pt-4">
        <h2>Detail Kategori</h2>
        <form action="" method="post">
            <div class="col-12 col-md-6 mt-3">
                <div>
                    <label for="kategori" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" value="<?php echo $data['nama']; ?>">
                </div>
                <div class="mt-3 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="editBtn">Edit</button>
                    <button type="submit" class="btn btn-danger" name="deleteBtn">Hapus</button>
                </div>
            </div>
        </form>
        <?php
        if (isset($_POST['editBtn'])) {
            $kategori = htmlspecialchars($_POST['kategori']);

            if ($data['nama'] == $kategori) {
        ?>
                <!-- auturefresh html with meta -->
                <meta http-equiv="refresh" content="0">
                <?php
            } else {
                $query = mysqli_query($conn, "SELECT * FROM kategori WHERE nama = '$kategori'");
                $jumlahData = mysqli_num_rows($query);

                if ($jumlahData > 0) {
                ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Kategori sudah ada!
                    </div>
                    <?php
                } else {
                    $querySimpan = mysqli_query($conn, "UPDATE kategori SET nama = '$kategori' WHERE id='$id'");
                    if ($querySimpan) {
                    ?>
                        <div class="alert alert-success mt-3" role="alert">
                            Kategori Berhasil Diubah!
                        </div>
                        <!-- auturefresh html with meta -->
                        <meta http-equiv="refresh" content="1;url=kategori.php">

                <?php
                    } else {
                        echo mysqli_error($conn);
                    }
                }
            }
        }
        if (isset($_POST['deleteBtn'])) {
            $queryCheck = mysqli_query($conn, "SELECT * FROM produk WHERE kategori_id = '$id'");
            $dataCount = mysqli_num_rows($queryCheck);
            if ($dataCount > 0) {
                ?>
                <div class="alert alert-warning mt-3" role="alert">
                    Kategori tidak bisa dihapus karena sudah ada produk yang menggunakan!
                </div>

            <?php

            }


            $queryDelete = mysqli_query($conn, "DELETE FROM kategori WHERE id='$id'");
            if ($queryDelete) {
            ?>
                <div class="alert alert-danger mt-3" role="alert">
                    Kategori Berhasil DiHapus!
                </div>
                <!-- auturefresh html with meta -->
                <meta http-equiv="refresh" content="0">
        <?php
            } else {
                echo mysqli_error($conn);
            }
        }
        ?>
    </div>



    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- font awesome logo -->
    <script src="https://kit.fontawesome.com/0b11e1e341.js" crossorigin="anonymous"></script>
</body>

</html>