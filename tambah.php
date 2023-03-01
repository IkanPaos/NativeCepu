<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporkan</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <table width="25%" border="0">
            <tr>
                <td>Tanggal</td>
                <td><input type="date" name="tanggal" id=""></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td><input type="text" name="nik" id=""></td>
            </tr>
            <tr>
                <td>Laporan</td>
                <td><textarea name="laporan" id="" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto" id=""></td>
            </tr>
        </table>
        <br>
        <input type="submit" name="Submit" value="Laporkan">
    </form>
    <?php
if (isset($_GET['ber'])) {
    echo "Berhasil melaporkan <a href='indexcrud.php'>Laporan</a>";
}
if (isset($_POST['Submit'])) {
    $nik = $_POST['nik'];
    $laporan = $_POST['laporan'];
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $status = 0;
    
    $img = date('dmYHis').$foto;
    $path = "gambar/".$img;

    include_once("koneksi.php");

    if (move_uploaded_file($tmp,$path)) {
        $result = mysqli_query($koneksi,"INSERT INTO pengaduan (tgl_pengaduan, nik, isi_laporan, foto, status) VALUES (CURRENT_DATE(), '$nik', '$laporan', '$img', '$status')");

        
        header("location:tambah.php?ber");
    }
}
    ?>
</body>
</html>