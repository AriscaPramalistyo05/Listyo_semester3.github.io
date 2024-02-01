<?php
//server with default setting (user 'root ' with no password)
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'crudphp';

// establishung connection
$conn = mysqli_connect($host, $user, $pass, $database);

// for displaying an eror msg in case th connection is not estaglished
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
