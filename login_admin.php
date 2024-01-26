<?php
include 'koneksi.php';
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username != "" && $password != "") {
        $mysql = mysqli_query($koneksi, "SELECT * FROM penjual WHERE username = '$username' and password  = '$password'");
        if ($data = mysqli_fetch_array($mysql)) {
            $_SESSION['username'] = $data['username'];
            $_SESSION['password'] = $data['password'];
            header('location: data_laptop.php');
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ceeses/login_admin.css">
    <title>Login Admin</title>
</head>

<body>
    <div class="login-container">
        <h2>Login Admin</h2>
        <form action="" method="POST">
            <table width="25%" border=0 align="center">

                <label for="username">Username</label>
                <input type="text" name="username">


                <label for="password">Password</label>
                <input type="password" name="password">


                <input type="submit" name="login" value="Login">
                </tr>
            </table>
        </form>
    </div>
</body>

</html>