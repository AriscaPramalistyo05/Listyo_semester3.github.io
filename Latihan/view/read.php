<!-- Header -->
<?php include 'header.php' ?>
<h1 class="text-center">Detail Pengguna</h1>
<div class="container">
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
            </tr>
        </thead>
        <tbody>
            <tr>

                <?php
                // Pertama, kita cek menggunakan fungsi 'isset()' apakah variabel sudah diatur atau tidak
                // Memproses data formulir ketika formulir dikirimkan

                if (isset($_GET['user_id'])) {
                    $userid = $_GET['user_id'];
                    // Kueri SQL untuk mengambil data di mana id=$userid & menyimpan data di view_user
                    $query = "SELECT * FROM crudphp WHERE ID = {$userid} ";
                    $view_users = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($view_users)) {
                        $id = $row['ID'];
                        $user = $row['username'];
                        $email = $row['email'];
                        $pass = $row['password'];

                        echo "<tr >";
                        echo " <td >{$id}</td>";
                        echo " <td > {$user}</td>";
                        echo " <td > {$email}</td>";
                        echo " <td >{$pass} </td>";
                        echo " </tr> ";
                    }
                }
                ?>
            </tr>
        </tbody>
    </table>
</div>

<!-- Tombol KEMBALI untuk kembali ke halaman sebelumnya -->
<div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5"> Kembali
    </a>
    <div>

        <!-- Footer -->
        <?php include "footer.php" ?>
