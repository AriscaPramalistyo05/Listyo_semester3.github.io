<?php
require '../config.php';

session_start();

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);

    // Check if user exists with the provided email and password
    $select = "SELECT * FROM user_form WHERE email = '$email' AND password = '$pass'";
    $result = mysqli_query($conn, $select);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'admin') {
            // Admin user, set session and redirect to admin page
            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['login'] = true;  // Set session for login
            header('location:./index.php'); // Redirect to admin page
            exit;
        } elseif ($row['user_type'] == 'user') {
            // Regular user, set session and redirect to user page
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['login'] = true;  // Set session for login
            header('location:../index.php'); // Redirect to user page
            exit;
        }
    } else {
        // User not found with provided email and password
        $error = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Email or password is incorrect.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 p-5 shadow p-3 mb-5 bg-body-tertiary rounded ">
        <form action="" method="post">
            <h3 class="text-center">Login</h3>
            <?php
            if (isset($error)) {
                echo $error;
            }
            ?>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" name="submit" value="login now" class="btn btn-primary mb-3">Login</button>
            <p class="fs-5 text text-center">Don't have an account? <a href="register_form.php">Register Now</a></p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-eEFe1jAte8l/IoLJF1s0e6nQ87RFA8K3xZ9gh7jtvIzUf4T1e3U3HxO8TmoN/TZ" crossorigin="anonymous"></script>
</body>

</html>