 <?php
include_once ("koneksi.php");
$result = mysqli_query($koneksi, "SELECT * FROM pengaduan order by tgl_pengaduan desc");
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        div.kanan {
            position: relative;
            left: 500px;
        }
        div.kiri{
            position: relative;
            right: 510px;
        }
    </style>
 </head>
 <body>
     <center>
         <h1>Daftar Laporan</h1>
         <div class="kanan">
             <a href="tambah.php"><button>Laporkan</button></a>
         </div>
        <br>
        <table width="80%" border=1>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Tanggal</th>
                <th>Laporan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            while ($user_data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td align='center'>" . $no++ . "</td>";
                echo "<td>" . $user_data['nik'] . "</td>";
                echo "<td>" . $user_data['tgl_pengaduan'] . "</td>";
                echo "<td>" . $user_data['isi_laporan'] . "</td>";
                echo "<td align='center'>" . $user_data['status'] . "</td>";
                echo "<td align='center'><a href='edit.php?id_pengaduan=$user_data[id_pengaduan]'>Edit</a> | <a href='show.php?id_pengaduan=$user_data[id_pengaduan]'>Cek</a> | <a href='delete.php?id_pengaduan=$user_data[id_pengaduan]'>Hapus</a>";
            }
            ?>
        </table>
        <div class="kiri">
            <br>
            <a href="logout.php"><button class="kiri">Logout</button></a>
        </div>
    </center>
 </body>
 </html>