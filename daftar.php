<?php
 include 'koneksi.php';
    if(isset($_POST['daftar'])){
        $nama_pengguna = $_POST['nama_pengguna'];
        $username = $_POST['username'];
        $password = $_POST['password'];
    $query = mysqli_query ($koneksi, "INSERT INTO datapengguna( nama, username, password) VALUES ('$nama_pengguna', '$username', '$password')");
    if($query>0){
        header("Location:login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ceeses/daftar.css">
    <title>Sign Up Page</title>
</head>
<body>
<div class="registration-container">
  <h2>Sign Up</h2>
  <form action="" method="POST">
        <table width="25%" border=0 align="center">
                <label for="nama_pengguna">Nama :</label>
                <input type="text" name="nama_pengguna">
    
                 <label for="username">Username : </label>
                 <label for=""></label><input type="text" name="username"> 
    
                 <label for="password">Password : </label>
                 <label for=""></label><input type="password" name="password"> 
    
                <input type="submit" name="daftar" value="Daftar"> 
    
        </table>
    </form>
</div>  
</body>
</html>