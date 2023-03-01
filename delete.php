<?php
include_once("koneksi.php");

    $id = $_GET['id_pengaduan'];
    $result = mysqli_query($koneksi,"DELETE FROM pengaduan WHERE id_pengaduan=$id");
    header("location:indexcrud.php");

?>