<!-- Header -->
<?php include "header.php" ?>

<!-- Konten Utama -->
<div class="container">
    <h1 class="text-center">Data untuk Melakukan Operasi CRUD</h1>
    <a href="create.php" class='btn btn-outline-dark mb-2'>
        <i class="bi bi-person-plus"></i> Tambah Pengguna Baru</a>

    <!-- Tabel Data Pengguna -->
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col" colspan="3" class="text-center">Operasi CRUD</th>
            </tr>
        </thead>
        <tbody>
            <!-- Baris Data Pengguna -->
            <?php
            $query = "SELECT * FROM crudphp"; // Query SQL untuk mengambil semua data dari tabel
            $result = $conn->query($query); // Mengirimkan query ke database

            // Menampilkan semua data yang diambil dari database menggunakan perulangan while
            while ($row = $result->fetch_row()) {
                $id = $row[0];
                $user = $row[1];
                $email = $row[2];
                $pass = $row[3];

                echo "<tr>";
                echo "<th scope='row'>{$id}</th>";
                echo "<td>{$user}</td>";
                echo "<td>{$email}</td>";
                echo "<td>{$pass}</td>";
                echo "<td class='text-center'><a href='read.php?user_id={$id}' class='btn btn-primary'><i class='bi bi-eye'></i> Lihat</a></td>";
                echo "<td class='text-center'><a href='update.php?edit&user_id={$id}' class='btn btn-secondary'><i class='bi bi-pencil'></i> EDIT</a></td>";
                echo "<td class='text-center'><a href='delete.php?delete={$id}' class='btn btn-danger'><i class='bi bi-trash'></i> HAPUS</a></td>";
                echo "</tr>";
            }
            ?>
            <!-- Akhir Baris Data Pengguna -->
        </tbody>
    </table>
</div>

<!-- Tombol Kembali ke Halaman Utama -->
<div class="container text-center mt-5">
    <a href="../index.php" class="btn btn-warning mt-5"> Kembali </a>
</div>

<!-- Footer -->
<?php include "footer.php" ?>
