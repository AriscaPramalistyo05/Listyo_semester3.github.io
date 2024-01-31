
<?php
$host = "localhost";
$user = "id21845582_aero_user";
$pass = "Aeroshop12#";
$db     ="id21845582_user_db";

// Create connection
$conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$conn) {
    die("Error connecting to the database: " . mysqli_connect_error());
}
?>x