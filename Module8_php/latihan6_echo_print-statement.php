<h1>Echo Statement & Print Statement</h1>
<hr>
<p>Echo dan print digunakan untuk menampilkan data ke layar.</p><p>Perbedaannya adalah ECHO tidak memiliki nilai kembalian sedangkan print memiliki nilai kembalian 1.  <i>Echo sedikit lebih cepat daripada print</i></p>
<?php
$wel = "Selamat datang di kampus<br>";
$kampus = "Politeknik Balekambang Jepara<br>";
$tgl = "8 Agustus 2017<br>";
$kampus = "Politeknik Balekambang Jepara<br>";
$prodi = "1. Rekayasa Perangkat Lunak<br>2. Akutansi Keuangan Publik<br>3. Administrasi Bisnis Internasional<br>";
$bea = "1. Beasiswa KIP-K 
<br>2. Beasiswa Tafidz
 <br>3. Beasiswa Alumni Balekambang 
 <br>4. Beasiswa Kitab Kuning 
 <br>5. Beasiswa Prestasi Akademik 
 <br>6. Beasiswa Prestasi Non-Akademik 
 <br>7. Beasiswa Prestasi Kelas <br>";
// Menampilkan
echo "==========================================<br>";
echo "1. Echo Statement : <br>";
echo "+++++++++++++++++++++++++++++++++++++<br>";
echo $wel;
echo "+++++++++++++++++++++++++++++++++++++<br>";
echo $kampus;
echo "+++++++++++++++++++++++++++++++++++++<br>";
echo "Didirikan pada tanggal $tgl";
echo "+++++++++++++++++++++++++++++++++++++<br>";
echo "Kampus ini memiliki 3 Prodi :<br> $prodi";
echo"<br>###################################################<br><br>";

// Print Statement
print "<br>==========================================<br>";

print "2. Print Statement : <br>";
print "+++++++++++++++++++++++++++++++++++++<br>";
print "Kampus ini memiliki banyak sekali beasiswa :<br> $bea";
print "+++++++++++++++++++++++++++++++++++++<br>";
print "<br>==========================================<br>";

?>