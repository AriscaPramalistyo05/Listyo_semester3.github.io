<?php

require "./config.php";

if (isset($_POST['simpan_produk'])) {
    $simpan = mysqli_query($conn, "INSERT INTO produk (kategori_id, nama, harga, foto, detail,ketersedian_stok) VALUES ('$_POST[kategori]', '$_POST[nama]', '$_POST[harga]','$_POST[foto]', '$_POST[detail]',  '$_POST[ketersedian_stok]')");

    //jika simpan sukses
    if ($simpan) {
        echo "<script> alert('Simpan data sukses')
        document.location('produk.php')
        </script>";
    } else {
        echo "<script> alert('Simpan data gagal')
        document.location('produk.php')
        </script>";
    }
}
