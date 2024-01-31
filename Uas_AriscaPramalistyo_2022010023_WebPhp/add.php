<?php
require "config.php";


session_start();

$nama = $_GET['nama'];

if (isset($_SESSION['keranjang'][$nama])) {
    $_SESSION['keranjang'][$nama] += 1;
} else {
    $_SESSION['keranjang'][$nama] = 1;
}
// print_r($_SESSION['keranjang']);
echo "<script> alert('Sukses dimasukkan keranjang') </script>";
 echo "<script> location='keranjang.php'</script>"; ?>

