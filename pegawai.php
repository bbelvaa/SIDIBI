<?php
include 'koneksi.php';

$query = "SELECT * FROM data_pegawai";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIDIBI</title>
    <style>
        * {
            font-family:Georgia, 'Times New Roman', Times, serif;
            line-height: 20px;
            font-size: 17px;
            scroll-behavior: smooth;
            margin: 0px;
            padding: 0px;
        }
        .navbar {
            width: 1000px;
            margin: auto;
        }
        nav {
            z-index: 100;
            color: white;
            text-align: center;
            position: fixed;
            line-height: 60px;
            width: 100%;
            background-color: rgba(0, 0, 0);
        }
        nav.putih {
            background-color: white;
        }
        nav .brand {
            font-size: 28px;
            float: left;
            position: relative;
            line-height: 60px;
            font-weight:bold;
        }
        nav .menu {
            float: right;
            height: 60px;
            max-width: 600px;
        }
        nav .menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        nav .menu ul li {
            list-style-type: none;
            float: left;
            line-height: 60px;
        }
        nav ul li a {
            color: white;
            text-align: center;
            padding: 0px 16px 0px 16px;
            text-decoration: none;
          }
        nav ul li a:hover {
            text-decoration: underline;
        }
        footer {
            padding: 30px 0px 30px 0px;
            background-color: black;
            color: #fff;
            text-align: center;
        }
        table {
            padding-left: 20px;
            margin: auto;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <nav>
        <div class="navbar">
          <div class="brand">
              SIDIBI
          </div>
          <div class="menu">
            <a href="#" class="tombol-menu">
              <span class="garis"></span>
              <span class="garis"></span>
              <span class="garis"></span>
            </a>
            <ul>
              <li><a href="pegawai.php">Pegawai</a></li>
              <li><a href="shift.php">Shift</a></li>
              <li><a href="pengaduan.html">Pengaduan</a></li>
              <li><a href="status_cuti.php">Cuti</a></li>
              <li><a href="profil.html">Profil</a></li>

            </ul>
          </div>
        </div>
    </nav>
    <br><br><br><br><br>

    <p style="color: #914186; font-size: 35px; font-weight: bold;" align="center">SUPERMARKET DIBI</p><br>
    <p style="color: #914186; font-size: 27px; font-weight: bold;" align="center">DATA PEGAWAI</p>
    <br>
    <a href="tambah.html" style="text-decoration: none; background-color: #514283; color: white; margin-right: 100px; padding: 10px 20px; border-radius: 5px; display: inline-block; float: right;">Tambah Data</a>

    <br><br><br>
<table border="1" cellspacing="0" style="color: black; text-align: center;">
    <tr style="background-color: #221d24; color: white;">
            <th width="100" height="35">ID</th>
            <th width="250">Nama</th>
            <th width="200">Jenis Kelamin</th>
            <th width="200">Alamat</th>
            <th width="200">Jabatan</th>
            <th width="150">Gaji</th>
            <th width="150">Aksi</th>
    </tr>
</body>
</html>


<?php
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td height='35'>" . $row["id"]. "</td>
                <td>" . $row["nama"]. "</td>
                <td>" . $row["jenis_kelamin"]. "</td>
                <td>" . $row["alamat"]. "</td>
                <td>" . $row["jabatan"]. "</td>
                <td>" . $row["gaji"]. "</td>
                <td>
                    <a href=edit.php?id=" . $row["id"] .">Edit</a>|
                    <a href=delete.php?id=" . $row["id"] ."onclick=\"return confirm ('Apakah Anda yakin ingin menghapus data ini?')\">Delete</a>
                </td>
                </tr>";

    }
} else {
    echo "0 results";
}
?>

</table>

