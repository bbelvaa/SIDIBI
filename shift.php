<?php
include 'koneksi.php';

$query = "SELECT * FROM shift_pegawai ORDER BY periode DESC, FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Shift Pegawai</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
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
    <p style="color: #914186; font-size: 35px; font-weight: bold;" align="center">JADWAL SHIFT KERJA SUPERMARKET DIBI</p><br>
    <a href="editShift.php" style="text-decoration: none; background-color: #4CAF50; color: white; padding: 10px 20px; border-radius: 5px; display: inline-block; float: right; margin-right: 20px;">Update Jadwal</a><br><br>
    <table>
        <tr>
            <th>Periode</th>
            <th>Hari</th>
            <th>Shift Pagi</th>
            <th>Shift Sore</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["periode"] . "</td>
                        <td>" . $row["hari"] . "</td>
                        <td>" . nl2br(str_replace(",", "\n", $row["shift_pagi"])) . "</td>
                        <td>" . nl2br(str_replace(",", "\n", $row["shift_sore"])) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada jadwal shift</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
