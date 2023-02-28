<?php
include 'prosesregister.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <center>
    <h1>Daftar Masyarakat</h1>
    <form action="" method="post">
    NIK :<br>
    <input type="text" name="nik" id=""><br>
    Nama :<br>
    <input type="text" name="nama" id=""><br>
    Username :<br>
    <input type="text" name="username"><br>
    Password : <br>
    <input type="password" name="password"><br>
    No. Telepon : <br>
    <input type="text" name="telp"><br><br>
    <input type="submit" name="register" value="Daftar">
    </form>
    <br>
    <a href="index.php"><button>Kembali</button></a>
    </center>
</body>
</html>