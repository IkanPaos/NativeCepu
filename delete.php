<?php
include_once("koneksi.php");

$id = $_GET['id_pengaduan'];
$result = mysqli_query($koneksi, "SELECT status FROM pengaduan WHERE id_pengaduan=$id");
$data = mysqli_fetch_array($result);

if ($data['status'] == 'diproses' || $data['status'] == 'selesai') {
    echo "Maaf, pengaduan sedang diproses atau sudah selesai. <a href='indexcrud.php'>Kembali</a>";
} else {
    mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan=$id");
    header("location:indexcrud.php");
}
?>
