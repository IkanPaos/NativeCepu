<?php
session_start();
include_once("koneksi.php");
if ($_SESSION['level'] != "petugas") {
    header("location:index.php");
}
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$result = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$user_id'");
$petugas_data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>Profile</h1>
    <p><strong>ID Petugas:</strong> <?php echo $petugas_data['id_petugas']; ?></p>
    <p><strong>Nama:</strong> <?php echo $petugas_data['nama_petugas']; ?></p>
    <p><strong>Username:</strong> <?php echo $petugas_data['username']; ?></p>
    <p><strong>Telepon:</strong> <?php echo $petugas_data['telp']; ?></p>
    <p><strong>Level:</strong> <?php echo $petugas_data['level']; ?></p>
    <br>
    <a href="petugas.php">Kembali</a>
</body>
</html>
