<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "valid";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
  die("Tidak bisa terkoneksi ke database");
}

$nama = "";
$email = "";
$website = "";
$comment = "";
$gender = "";
$sukses = "";
$error = "";

// digunakan untuk memasukkan data
if (isset($_POST['simpan'])) {
  $nama = $_POST['nama']; //menangkap data nim yang telah diinput
  $email = $_POST['email'];
  $website = $_POST['website'];
  $comment = $_POST['comment'];
  $gender = $_POST['gender'];

  //Memastikan operasi akan dijalankan ketika ini terpenuhi /terisi
  if ($nama && $email && $website && $comment && $gender) {
    $sql1 = "insert into form (nama,email,website,comment,gender) values ('$nama','$email','$website','$comment','$gender')";
    $q1 = mysqli_query($koneksi, $sql1);
    // Menampilkan pesan sukses/eror saat tombol ditekan
    if ($q1) {
      $sukses = "Data berhasil di tambahkan";
    } else {
      $error = "Gagal menambahkan data";
    }
  } else {
    $error = "Silahkan masukkan data";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Validation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container pt-4 ">
    <!-- Input data -->
    <div class="card bg">
      <h5 class="card-header bg-warning">PHP Valitation Data</h5>
      <div class="card-body">
        <?php
        if ($error) {
        ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
          </div>
        <?php
        }
        ?>
        <!-- sukses -->
        <?php
        if ($sukses) {
        ?>
          <div class="alert alert-success" role="alert">
            <?php echo $sukses; ?>
          </div>
        <?php
        }
        ?>
        <form action="" method="POST">
          <!--  -->
          <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
            </div>
          </div>

          <!--  -->
          <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="email" name="email" value="<?php echo $email ?>">
            </div>
          </div>
          <!--  -->
          <div class="mb-3 row">
            <label for="website" class="col-sm-2 col-form-label">Website</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="website" name="website" value="<?php echo $website ?>">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="comment" class="col-sm-2 col-form-label">Comment</label>
            <div class="col-sm-10">
              <textarea class="form-control" placeholder="Leave a comment here" id="comment" name="comment" value="<?php echo $comment ?>"></textarea>
            </div>
          </div>
          <!--  -->
          <div class="mb-3 row">
            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
              <select class="form-control" id="gender" name="gender"> <!-- Tambahkan atribut name="gender" di sini -->
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="cowok" <?php if ($gender == "cowok") echo "selected" ?>>Laki-laki</option>
                <option value="cewek" <?php if ($gender == "cewek") echo "selected" ?>>Perempuan</option>
              </select>
            </div>
          </div>

          <div class="col-12">
            <button class="btn btn-success" type="submit" name="simpan" value="Simpan Data">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>