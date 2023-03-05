<?php
session_start();
include_once("koneksi.php");

if (isset($_POST['Tanggapi'])) {
    $id_pengaduan = $_GET['id_pengaduan'];
    $tgl_tanggapan = date('Y-m-d');
    $tanggapan = $_POST['tanggapan'];
    $id_petugas = $_SESSION['user_id'];

    $result = mysqli_query($koneksi, "INSERT INTO tanggapan(id_tanggapan,id_pengaduan,tgl_tanggapan,tanggapan,id_petugas) VALUES (null,'$id_pengaduan','$tgl_tanggapan','$tanggapan','$id_petugas')");
    if ($result) {
        echo "Berhasil Mengirim Tanggapan";
    }
}

if (isset($_POST['Update'])) {
    $id = $_GET['id_pengaduan'];
    $status = "proses";

    $result = mysqli_query($koneksi, "UPDATE pengaduan SET status='$status' WHERE id_pengaduan=$id");
    
}
?>
<?php
include_once("koneksi.php");

$id_pengaduan = $_GET['id_pengaduan'];

$result = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");

while ($data = mysqli_fetch_array($result)) {
    $nik = $data['nik'];
    $laporan = $data['isi_laporan'];
    $foto = $data['foto'];
    $status = $data['status'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keterangan</title>
</head>
<body>
    <h1>Keterangan</h1>
    <a href="petugas.php">Kembali</a><br><br>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <label for="nik">NIK</label>
        <input type="text" name="nik" value="<?= $nik; ?>" id="" disabled><br>
        <label for="laporan">Laporan</label><br>
        <textarea name="isi_laporan" id="" cols="30" rows="10" disabled><?= $laporan; ?></textarea><br>
        <label for="foto">Foto</label><br>
        <img src="gambar/<?= $foto; ?>" width="100"/><br><br>
        <label for="tanggapan">Tanggapan</label><br>
        <textarea name="tanggapan" id="" cols="30" rows="10"></textarea><br>
        <input type="submit" name="Tanggapi" value="Tanggapi"> <input type="submit" name="Update" value="Proses">
    </form>
</body>
</html>