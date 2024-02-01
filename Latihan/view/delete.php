<!-- Footer -->
<?php include "header.php" ?>
<?php
// Cek apakah parameter 'delete' ada dalam URL
if (isset($_GET['delete'])) {
    // Ambil nilai dari parameter 'delete'
    $userid = $_GET['delete'];

    // Query SQL untuk menghapus data dari tabel user dengan id = $userid
    $query = "DELETE FROM crudphp WHERE id = {$userid}";
    
    // Eksekusi query penghapusan
    $delete_query = mysqli_query($conn, $query);

    // Redirect ke halaman home setelah penghapusan
    header("Location: home.php");
}
?>
<!-- Footer -->
<?php include "footer.php" ?>
