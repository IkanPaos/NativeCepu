<?php
include_once ("koneksi.php");
session_start();
if ($_SESSION['level'] != "petugas") {
    header("location:index.php");
}
$result = mysqli_query($koneksi, "SELECT * FROM masyarakat order by nik desc");
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
    </style>
 </head>
 <body>
     <center>
         <h1>Daftar Masyarakat</h1>
         <div class="kanan">
            <a href="petugas.php"><button>Kembali</button></a>
         </div>
        <br>
        <table width="80%" border=1>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Username</th>
                <th>No. Hp</th>
            </tr>
            <?php
            $no = 1;
            while ($user_data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td align='center'>" . $no++ . "</td>";
                echo "<td>" . $user_data['nik'] . "</td>";
                echo "<td>" . $user_data['nama'] . "</td>";
                echo "<td>" . $user_data['username'] . "</td>";
                echo "<td>" . $user_data['telp'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </center>
 </body>
 </html>