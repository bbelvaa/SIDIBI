<?php 
	include "koneksi.php";
	$id = $_GET['id'];
	$query = "delete FROM data_pegawai where id='$id'";
    mysqli_query($conn, $query);
    echo "Data baru berhasil dihapus. ";
    echo "<a href='pegawai.php'>Oke</a>";
    
?>