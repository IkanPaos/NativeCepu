<?php
include_once ("koneksi.php");
$id = $_GET['id_pengaduan'];
$result = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE id_pengaduan='$id'");

while ($data = mysqli_fetch_array($result))
    {
    $nik = $data['nik'];
    $laporan = $data['isi_laporan'];
    $foto = $data['foto'];
    $status = $data['status'];
    }
?>
<?php
$id = $_GET['id_pengaduan'];
$result = mysqli_query($koneksi,"SELECT * FROM tanggapan WHERE id_pengaduan='$id'");
$data = mysqli_fetch_array($result);
if ($data) {
    $tanggapan = $data['tanggapan'];
} else {
    $tanggapan = "Belum ada Tanggapan";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>
<body>
    <h1>Detail Laporan</h1>
    <a href="indexcrud.php">Kembali</a><br><br>
    <input type="hidden" name="id" value="<?= $id; ?>">
        <label for="nik">NIK</label>
        <input type="text" name="nik" value="<?= $nik; ?>" id="" disabled><br>
        <label for="laporan">Laporan</label><br>
        <textarea name="isi_laporan" id="" cols="30" rows="10" disabled><?= $laporan; ?></textarea><br>
        <label for="foto">Foto</label><br>
        <img src="gambar/<?= $foto; ?>" width="100"/><br><br>
        <label for="status">Status</label> <input type="text" value="<?= $status; ?>" disabled><br>
        <label for="tanggapan">Tanggapan</label><br>
        <textarea name="tanggapan" id="" cols="30" rows="10" disabled><?= $tanggapan; ?></textarea>
</body>
</html>