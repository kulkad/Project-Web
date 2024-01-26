<?php
include 'koneksi.php';
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($koneksi, "SELECT * from datapengguna where username='$username' and password='$password'");
    if ($data = mysqli_fetch_array($query)) {
        $_SESSION['username']=$data['username'];
        $_SESSION['password']=$data['password'];
        header("Location: index.php");
    } else {
        header("Location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ceeses/login.css">
    <title>Login Page</title>
</head>

<body>
    <div class="login-container">
        <h2>Sign in</h2>
        <form action="login.php" method="POST">
            <table width="25%" border=0 align="center">

                <label for="username">Username</label>
                <input type="text" name="username">


                <label for="password">Password</label>
                <input type="password" name="password">


                <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember me
                    </label>
                </div>
                <button class="btn btn-primary w-100 py-2" name="login" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>