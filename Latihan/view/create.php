<!-- Header -->
<?php include "header.php" ?>

<?php
// Jika tombol "create" pada formulir ditekan
if (isset($_POST['create'])) {
    // Mengambil nilai dari input formulir
    $user = $_POST['user'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Query SQL untuk menyisipkan data pengguna ke dalam tabel 'crudphp'
    $query = "INSERT INTO crudphp(username, email, password) VALUES('{$user}','{$email}','{$pass}')";
    
    // Menjalankan query menggunakan koneksi database
    $add_user = mysqli_query($conn, $query);
    
    // Menampilkan pesan yang sesuai kepada pengguna untuk melihat apakah query berhasil dieksekusi atau tidak
    if (!$add_user) {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    } else {
        echo "<script type='text/javascript'>alert('Pengguna berhasil ditambahkan!')</script>";
    }
}
?>

<h1 class="text-center">Tambah Detail Pengguna</h1>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="user" class="form-label">Username</label>
            <input type="text" name="user" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email ID</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="pass" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" required>
        </div>

        <div class="form-group">
            <input type="submit" name="create" class="btn btn-primary mt-2" value="Submit">
        </div>
    </form>
</div>

<!-- Tombol "Kembali" untuk kembali ke halaman utama -->
<div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5"> Kembali
    </a>
</div>

<!-- Footer -->
<?php include "footer.php" ?>
