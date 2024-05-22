<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $jenis_cuti = $_POST['jenis_cuti'];
    $alasan = $_POST['alasan'];

    $status = 'Pending'; 
    $query = "INSERT INTO pengajuan_cuti (nama, tanggal_mulai, tanggal_selesai, jenis_cuti, alasan, status) 
              VALUES ('$nama', '$tanggal_mulai', '$tanggal_selesai', '$jenis_cuti', '$alasan', '$status')";

    if (mysqli_query($conn, $query)) {
        echo "Pengajuan Cuti Anda Berhasil terkirim.";
        echo "<a href='homePegawai.php'>Oke</a>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>