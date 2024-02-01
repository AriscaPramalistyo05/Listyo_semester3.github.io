<!-- Header -->
<?php include "header.php" ?>

<?php
// Memeriksa apakah variabel sudah diatur atau belum, dan jika diatur, menambahkan nilai data yang diatur ke variabel userid
if (isset($_GET['user_id'])) {
    $userid = $_GET['user_id'];
}

// Query SQL untuk memilih semua data dari tabel di mana ID = $userid
$query = "SELECT * FROM crudphp WHERE ID = $userid ";
$view_users = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($view_users)) {
    $id = $row['ID'];
    $user = $row['username'];
    $email = $row['email'];
    $pass = $row['password'];
}

// Memproses data formulir ketika formulir dikirimkan
if (isset($_POST['update'])) {
    $user = $_POST['user'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Query SQL untuk memperbarui data dalam tabel pengguna di mana ID = $userid
    $query = "UPDATE crudphp SET username = '{$user}' , email = '{$email}' , password = '{$pass}' WHERE id = $userid";
    $update_user = mysqli_query($conn, $query);
    echo "<script type='text/javascript'>alert('Data pengguna berhasil diperbarui!')</script>";
}
?>

<h1 class="text-center">Perbarui Detil Pengguna</h1>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="user">Username</label>
            <input type="text" name="user" class="form-control" value="<?php echo $user ?>">
        </div>

        <div class="form-group">
            <label for="email">Email ID</label>
            <input type="text" name="email" class="form-control" value="<?php echo $email ?>">
        </div>
        <small id="emailHelp" class="form-text text-muted">Kami tidak akan membagikan email Anda kepada siapa pun.</small>

        <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" name="pass" class="form-control" value="<?php echo $pass ?>">
        </div>

        <div class="form-group">
            <input type="submit" name="update" class="btn btn-primary mt-2" value="Perbarui">
        </div>
    </form>
</div>

<!-- Tombol KEMBALI untuk kembali ke halaman utama -->
<div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5"> Kembali </a>
</div>

<!-- Footer -->
<?php include "footer.php" ?>
