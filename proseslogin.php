<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = mysqli_query($koneksi, "SELECT * FROM masyarakat where username='$username'");
    $cek = mysqli_num_rows($login);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($login);
        if (password_verify($password, $data['password'])) {
            $_SESSION['id_user'] = $data['nik'];
            $_SESSION['status'] = "login";
            $_SESSION['username'] = $data['username'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['telp'] = $data['telp'];

            header ("location: indexcrud.php");
        } else {
            $_SESSION['login_error'] = "Data tidak Ditemukan";
            header("location: index.php");
        }
    } else {
        $login = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username = '$username'");
        $cek = mysqli_num_rows($login);

        if ($cek > 0) {
            $data = mysqli_fetch_assoc($login);
            if (password_verify($password, $data['password'])) {
                $_SESSION['user_id'] = $data['id_petugas'];
                $_SESSION['status'] = "login";
                $_SESSION['username'] = $data['username'];
                $_SESSION['name'] = $data['nama_petugas'];
                $_SESSION['level'] = $data['level'];

                header("location:petugas.php");
            } else {
                $_SESSION['login_error'] = "Data tidak Ditemukan";
                header("location: index.php");
            }
        } else {
            $_SESSION['login_error'] = "Data tidak Ditemukan";
            header("location:login.php");
        }
    }
}
?>