<?php
echo "============================ Experimen ============================<br>";


echo "============================ Latihan ============================<br>";
echo "********** Operator Artitmatika **********<br>";
$a = 5;
$b = 10;
 echo ("5 + 10 = ".$a + $b ."<br>"); //Output 15
 echo ("5 - 10 = ".$a - $b."<br>"); //Output -5
 echo ("5 * 10 = ".$a * $b."<br>"); //Output 50
 echo ("5 / 10 = ".$a / $b."<br>"); //Output 0.5
 echo ("5 % 10 = ".$a % $b."<br>"); //Output 5
 echo ("5 ** 10 = ".$a ** $b."<br>"); //Output 9765625
 echo ("-a = ".-$a ."<br>"); //Output 15

 echo "<br>********** Operator Penugasan **********<br>";
//  $x = 5;
// $x *= 10;
//  echo $x;

// 
$x = 5;
$x *= 3;
var_dump($x);
echo "<br>";
// 
$p = 5;
$p -= 10;
var_dump($p);
echo "<br>";
// 
$y = 5;
$y *= -100;
var_dump($y);
echo "<br>";
// 
$t = 5;
$t *= -10;
var_dump($t);
echo "<br>";
echo "<br>********** Operator Perbandingan **********<br>";
// $x = 9;
// $y = 8;
// $a == $b <=> bool true;
// $a === $b <=> bool false;
// $a != $b <=> bool true;
// $a !== $b <=> bool true;
// $a < $b <=> bool true;
// $a > $b <=> bool false;
// $a <= $b <=> bool true;
// $a >= $b <=> bool false;
$x = 90;
$y = 80;
$z = 3;
$q = 6;
$r = 5;
$o = 'abc';
$a = 'a';
$b = 'b';


echo "90 > 80 != ";
var_dump ($a!=$x);
echo "<br>3 >= 3 = ";
var_dump($z >= $z);
echo "<br>3 < 6 = ";
var_dump($z < $q);
echo "<br>5 <= 3 = ";
var_dump($r <= $z);
echo "<br>'a' < 'b' = ";
var_dump($a < $b);
echo "<br>'abc' < 'b' = ";
var_dump($o < $b);
?>