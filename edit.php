<?php
include "koneksi.php";
$id = $_GET['id'];
$query = "SELECT * FROM data_pegawai where id='$id'";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
?>
<form action="update.php" method="post">		
    <table>
        <tr>
            <td>Nama:</td>
            <td>
                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                <input type="text" name="nama" value="<?php echo $row['nama'] ?>">
            </td>					
        </tr>	
        <tr>
            <td>Alamat:</td>
            <td><input type="text" name="alamat" value="<?php echo $row['alamat'] ?>"></td>					
        </tr>
        <tr>
            <td>Jenis Kelamin:</td>
            <td>
                <input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? 'checked' : ''; ?>>Laki-laki
                <input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($row['jenis_kelamin'] == 'Perempuan') ? 'checked' : ''; ?>>Perempuan
            </td>
        </tr>
        <tr>
            <td>Jabatan:</td>
            <td>
                <select name="jabatan">
                    <option value="Staf Kasir" <?php echo ($row['jabatan'] == 'Staf Kasir') ? 'selected' : ''; ?>>Staf Kasir</option>
                    <option value="Staf Gudang" <?php echo ($row['jabatan'] == 'Staf Gudang') ? 'selected' : ''; ?>>Staf Gudang</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Gaji:</td>
            <td><input type="text" name="gaji" value="<?php echo $row['gaji'] ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Update"></td>					
        </tr>	
    </table>
</form>
<?php
}
?>
