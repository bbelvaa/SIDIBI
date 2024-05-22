<?php
include 'koneksi.php';

// Tentukan ID pegawai yang akan melihat status cutinya (misalnya, didapatkan dari sesi login)
$id_pegawai = 1; // Ganti dengan mekanisme mendapatkan ID pegawai dari sesi login

$query = "SELECT * FROM pengajuan_cuti ORDER BY tanggal_mulai DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIDIBI</title>
    <style>
        * {
            font-family: Georgia, 'Times New Roman', Times, serif;
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
            font-weight: bold;
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
            padding: 0px 16px;
            text-decoration: none;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
        footer {
            padding: 30px 0;
            background-color: black;
            color: #fff;
            text-align: center;
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
            <div class="brand">SIDIBI</div>
            <div class="menu">
                <a href="#" class="tombol-menu">
                    <span class="garis"></span>
                    <span class="garis"></span>
                    <span class="garis"></span>
                </a>
                <ul>
                    <li><a href="pengaduan.html">Pengaduan</a></li>
                    <li><a href="ajukan_cuti.html">Cuti</a></li>
                    <li><a href="profil.html">Profil</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br><br>
    <header id="home">
        <div class="overlay"></div>
        <div class="intro">
            <h3>ArtistryAvenue</h3><br>
            <p>ArtistryAvenue adalah galeri seni yang menghubungkan keindahan dan kreativitas.
                ArtistryAvenue menjadi tempat bagi komunitas seni yang dinamis dengan acara pameran, lokakarya seni, dan diskusi budaya untuk menginspirasi pertukaran ide dan mengembangkan apresiasi terhadap seni.
                Kami menawarkan beragam lukisan, patung, dan karya seni visual lainnya yang dipilih dengan hati-hati untuk memukau dan memikat imajinasi Anda.
                Bergabunglah dengan kami di ArtistryAvenue dan temukan keajaiban seni yang tak terbatas!
                Terima kasih atas kunjungan Anda.
            </p>
        </div>
    </header>
    <br><br><br><br>
    
    <div our_achievements>
        <p style="font-size: 35px; text-align: center; font-weight: bold;">Our Achievements</p><br>
        <p style="border-bottom: 5px solid rgb(188, 23, 23); width: 360px; margin-left: 535px;"></p><br><br>
    </div>

    <div>
    <h2>JADWAL KERJA SUPERMARKET DIBI</h2>
    <table>
        <tr>
            <th>Hari</th>
            <th>Shift Pagi</th>
            <th>Shift Sore</th>
        </tr>
        <?php
        // Mendapatkan data jadwal kerja terbaru dari database setelah pembaruan
        $query = "SELECT * FROM shift_pegawai";
        $result = mysqli_query($conn, $query);

        // Menampilkan jadwal kerja
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Memisahkan shift pagi menjadi array
                $shift_pagi = explode(',', $row["shift_pagi"]);
                // Memisahkan shift sore menjadi array
                $shift_sore = explode(',', $row["shift_sore"]);
                
                // Menggabungkan setiap elemen array menjadi baris baru
                $shift_pagi_text = implode('<br>', $shift_pagi);
                $shift_sore_text = implode('<br>', $shift_sore);
                
                echo "<tr>
                        <td>" . $row["hari"] . "</td>
                        <td>" . $shift_pagi_text . "</td>
                        <td>" . $shift_sore_text . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Tidak ada jadwal kerja tersedia</td></tr>";
        }
        ?>
    </table>
    </div>

    
<div>
        <h2>Status Pengajuan Cuti</h2>
        <table>
            <tr>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Jenis Cuti</th>
                <th>Alasan</th>
                <th>Status</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["tanggal_mulai"] . "</td>
                            <td>" . $row["tanggal_selesai"] . "</td>
                            <td>" . $row["jenis_cuti"] . "</td>
                            <td>" . $row["alasan"] . "</td>
                            <td>" . $row["status"] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada pengajuan cuti</td></tr>";
            }
            ?>
        </table>
    </div>

    <table>
        <tr>
            <td style="font-size: 50px; line-height: 1; text-align: center; font-weight: bold;">Become a Member</td>
            <td>Enjoy exclusive events, unlimited access to exhibitions and the Members' Room, plus discounts in the Museum shops, cafés and restaurants.<br><br>
                <button onclick="window.location.href='member.html'" style="background-color: rgb(188, 23, 23); color: white; border: 0px; width: 100px; height: 35px; border-radius: 5px;">Register</button>
            </td>
        </tr>
    </table>
    <br><br><br>

    <footer id="copyright">
        <p>&copy; 2024 Sistem Informasi Pegawai SIDIBI. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
