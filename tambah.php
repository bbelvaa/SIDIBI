<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $jabatan = $_POST['jabatan'];
    $gaji = $_POST['gaji'];

    $query = "INSERT INTO data_pegawai (nama, jenis_kelamin, alamat, jabatan, gaji) VALUES ('$nama', '$jenis_kelamin', '$alamat', '$jabatan', '$gaji')";
    if (mysqli_query($conn, $query)) {
        echo "Data baru berhasil ditambahkan.";
        echo "<a href='pegawai.php'>show</a>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>