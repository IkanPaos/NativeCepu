<?php
session_start();
if ($_SESSION['level'] != "admin") {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<style>
    div.kanan {
    position: relative;
    left: 500px;
    }
</style>
<body>
    <center>
    <h1>Halaman Admin</h1>
    <div class="kanan">
            <a href="registerpetugas.php"><button>Tambah Petugas</button></a> <a href="logout.php"><button class="kiri">Logout</button></a>
        </div>
    <a href="admin/masyarakat.php">Data Masyarakat</a> | <a href="admin/laporan.php">Data Laporan</a> | <a href="admin/petugas.php">Data Petugas</a>
    </center>
</body>
</html>