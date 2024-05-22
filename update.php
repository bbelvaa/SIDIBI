<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $jabatan = $_POST['jabatan'];
    $gaji = $_POST['gaji'];


    $query = "UPDATE data_pegawai SET nama='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat', jabatan='$jabatan', gaji='$gaji' WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil diperbarui.";
        echo "<a href='pegawai.php'>show</a>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
