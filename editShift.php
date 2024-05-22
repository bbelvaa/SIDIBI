<?php
include 'koneksi.php';

$query = "SELECT * FROM shift_pegawai";
$result = mysqli_query($conn, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[$row['hari']] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Shift Pegawai</title>
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
            padding: 0px 16px 0px 16px;
            text-decoration: none;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
        .form-container {
            margin: 20px auto;
            padding: 20px;
            max-width: 800px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        fieldset {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 15px;
        }
        fieldset legend {
            padding: 0 10px;
            font-weight: bold;
        }
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
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
    <div class="form-container">
        <form action="updateShift.php" method="post">
            <p style="color: #914186; font-size: 25px; font-weight: bold;" align="center">UPDATE JADWAL SHIFT KERJA SUPERMARKET DIBI</p><br>
            <div class="form-group">
                <label for="periode">Periode (YYYY-MM-DD):</label>
                <input type="date" id="periode" name="periode" required>
            </div>  

            <?php
            $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

            foreach ($days as $day) {
                $shift_pagi = isset($data[$day]['shift_pagi']) ? $data[$day]['shift_pagi'] : '';
                $shift_sore = isset($data[$day]['shift_sore']) ? $data[$day]['shift_sore'] : '';
            ?>
                <fieldset>
                    <legend><?php echo $day; ?></legend>
                    <div class="form-group">
                        <label for="shift_pagi_<?php echo $day; ?>">Shift Pagi:</label>
                        <textarea id="shift_pagi_<?php echo $day; ?>" name="shift_pagi[<?php echo $day; ?>]"><?php echo $shift_pagi; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="shift_sore_<?php echo $day; ?>">Shift Sore:</label>
                        <textarea id="shift_sore_<?php echo $day; ?>" name="shift_sore[<?php echo $day; ?>]"><?php echo $shift_sore; ?></textarea>
                    </div>
                </fieldset>
            <?php
            }
            ?>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
    <?php mysqli_close($conn); ?>
</body>
</html>
