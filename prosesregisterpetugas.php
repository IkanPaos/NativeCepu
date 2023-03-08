<?php
session_start();
include 'koneksi.php';


if (isset($_POST['register'])) {
    $name = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $telp = $_POST['telp'];

    $query = mysqli_query($koneksi,"INSERT INTO petugas (id_petugas,nama_petugas,username,password,telp,level) VALUES (null,'$name','$username','$password','$telp','petugas')");
    
    if ($query) {
        $_SESSION['success'] = "Registrasi Berhasi";
        echo "Berhasil Menambahkan Petugas";
    } else {
        $_SESSION['register_error'] = "Registrasi Gagal";
        header("location:register.php");
    }
}
?>