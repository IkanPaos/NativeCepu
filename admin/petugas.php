<?php
include_once ("../koneksi.php");

$result = mysqli_query($koneksi, "SELECT * FROM petugas WHERE level='petugas' order by id_petugas asc");
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
            left: 483px;
        }
        @media print{
            button#print-button{
                display: none;
            }
        }
    </style>
 </head>
 <body>
     <center>
         <h1>Daftar Petugas</h1>
         <div class="kanan">
            <button id="print-button" onclick="window.print()">Print</button>
            <a href="../admin.php"><button id="print-button">Kembali</button></a>
         </div>
        <br>
        <table width="80%" border=1>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Username</th>
                <th>No. Hp</th>
            </tr>
            <?php
            $no = 1;
            while ($user_data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td align='center'>" . $no++ . "</td>";
                echo "<td align='center'>" . $user_data['id_petugas'] . "</td>";
                echo "<td>" . $user_data['nama_petugas'] . "</td>";
                echo "<td>" . $user_data['username'] . "</td>";
                echo "<td>" . $user_data['telp'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </center>
 </body>
 </html>