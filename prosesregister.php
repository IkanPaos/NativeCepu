<?php
session_start();
include 'koneksi.php';


if (isset($_POST['register'])) {
    $nik = $_POST['nik'];
    $name = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $telp = $_POST['telp'];

    $query = mysqli_query($koneksi,"INSERT INTO masyarakat (nik,nama,username,password,telp) VALUES ('$nik','$name','$username','$password','$telp')");
    
    if ($query) {
        $_SESSION['success'] = "Registrasi Berhasi";
        header("location:index.php");
    } else {
        $_SESSION['register_error'] = "Registrasi Gagal";
        header("location:register.php");
    }
}
?>