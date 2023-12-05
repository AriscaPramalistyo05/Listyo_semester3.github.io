<!-- Contoh Variabel Global -->
<h1>Lingkup Variabel</h1>
<h3>Variabel Global,Local,Static</h3>
<?php
    // Variabel
    $nomor = 121902;
    echo "================================================================================================================================================<br>";
    echo "Variabel global dapat diakses dari kapan pun dan di mana pun dalam skrip, 
    sementara variabel lokal hanya dapat diakses di dalam fungsi atau blok kode di mana deklarasinya<br>";
    echo "========================================================================<br><br>";
    echo "Contoh Lingkup Global<br>";
    function ujian() {
        global $nomor;
        echo "Nomor Ujian saya adalah $nomor<br>";
    }
    ujian();
    echo "================================================================================================================================================<br><br>";
    echo "Contoh Lingkup Local<br>";
    function hp(){
        $localVar = "Samsung <br>";
        echo $localVar;
    }
    hp();
    echo "================================================================================================================================================<br><br>";
    echo "Contoh Lingkup Static<br>";
    function countVisits() {
        static $counter = 0;
        $counter++;
        echo "Jumlah kunjungan: $counter<br>";
    }
    
    countVisits();
    countVisits();
    echo "Kegunaan: Variabel statis tetap ada di dalam fungsi bahkan setelah fungsi selesai dieksekusi.
    <br>";

    
?>
