<?php
echo "============================ Latihan ============================<br>";
echo "1. String (karakter): <br>";
$a = "Hello World";
echo $a;
echo "<br>";

$b = "This PHP language";
echo $b;
echo "<br>";
echo "============================<br>";

echo "2. Integer (bil bulat tanpa titik): <br>";
$c = 102938;
echo $c;
echo "<br>";

$d = 0X1A; //hexadecimal
echo $d;
echo "<br>";
echo "============================<br>";

echo "3. Float (bil des / pecahan): <br>";
$e = 10.2e5;
echo $e;
echo "<br>";

$f = 5e-4;
echo $f;
echo "<br>";
echo "============================<br>";

echo "4. Boolean (true/false): <br>";
$show_error = true;
var_dump($show_error);
echo "<br>";
echo "============================<br>";

echo "5. Array (Wadah banyak variabel): <br>";
$prodi = array("RPL","ABI","AKP");
var_dump($prodi);
echo "<br>";

$color_prodi = array(
    "RPL" => "#ff0000",
"ABI" => "#00ff00",
"AKP" => "#0000ff");
var_dump ($color_prodi);
echo "============================<br>";


echo "6. Resource (Referensi ke SD Eksternal): <br>";
$prodi = array("RPL","ABI","AKP");
var_dump($prodi);
echo "<br><br>";

echo "============================ Praktik ============================<br>";
$nama = "Arisca Pramalistyo";
$nim = 20220100023;
$tinggi = 1.82;
$mahasiswa = true;

var_dump($nama,$nim,$tinggi,$mahasiswa);
echo("<br>".$nama." ".$nim." ".$tinggi." ".$mahasiswa);


?>