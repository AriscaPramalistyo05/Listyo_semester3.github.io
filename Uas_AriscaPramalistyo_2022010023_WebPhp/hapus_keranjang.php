<?php
session_start();

$nama = $_GET['nama'];
unset($_SESSION['keranjang'][$nama]);
echo "<script> alert('Produk berhasil dihapus') </script>";
echo "<script> location='keranjang.php'</script>";
