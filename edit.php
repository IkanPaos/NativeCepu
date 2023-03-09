<?php
include_once("koneksi.php");

if (isset($_POST['Update'])) {
    $id= $_POST['id_pengaduan'];
    $laporan = $_POST['isi_laporan'];
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $oldfoto = $_POST['oldfoto'];
    if (!empty($foto)) {
        $img = date('dmYHis').$foto;
        $path = "gambar/".$img;
        move_uploaded_file($tmp,$path);
        if (!empty($oldfoto)) {
            unlink("gambar/".$oldfoto);
        }
    } else {
        $img = $oldfoto;
        $path = "gambar/".$img;
    }

    include_once("koneksi.php");

    $result = mysqli_query($koneksi, "UPDATE pengaduan SET isi_laporan='$laporan', foto='$img' WHERE id_pengaduan='$id'");

    if ($result) {
        header("location: indexcrud.php");
    } else {
        echo "Gagal Update: " . mysqli_error($koneksi);
    }
}
?>
<?php
        $id = $_GET['id_pengaduan'];
        
        $result = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='$id'");
    
    while ($data = mysqli_fetch_array($result))
    {
    $nik = $data['nik'];
    $laporan = $data['isi_laporan'];
    $foto = $data['foto'];
    $oldfoto = $foto;
    $status = $data['status'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Laporan</title>
</head>
<body>
    <h1>Ubah Laporan</h1>
    <a href="indexcrud.php">Kembali</a><br><br>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_pengaduan" value="<?= $id; ?>">
        <label for="nik">NIK</label>
        <input type="text" name="nik" value="<?= $nik; ?>" id="" disabled><br>
        <label for="laporan">Laporan</label><br>
        <textarea name="isi_laporan" id="" cols="30" rows="10"><?= $laporan; ?></textarea><br>
        <label for="foto">Foto</label><br>
        <img src="gambar/<?= (!empty($foto) ? $foto : $oldfoto); ?>" width="100"/><br><br>
        <input type="file" name="foto"><br><br>
        <input type="hidden" name="oldfoto" value="<?= $foto; ?>">
        <?php
            if ($status == "diproses" || $status == "selesai") {
                echo "<button disabled>Update</button> Laporan Sudah ".$status;
            } else {
                echo "<input type='submit' name='Update' value='Update'>";
            }
        ?>
    </form>
</body>
</html>