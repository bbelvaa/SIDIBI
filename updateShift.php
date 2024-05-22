<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $periode = $_POST["periode"];
    $shiftPagi = $_POST["shift_pagi"];
    $shiftSore = $_POST["shift_sore"];

    foreach ($shiftPagi as $hari => $shift) {
        $updateQuery = "UPDATE shift_pegawai 
                        SET shift_pagi='$shift', periode='$periode' 
                        WHERE hari='$hari'";
        if ($conn->query($updateQuery) === TRUE) {
            echo "Record updated successfully for shift pagi $hari<br>";
        } else {
            echo "Error updating record for shift pagi $hari: " . $conn->error . "<br>";
        }
    }

    foreach ($shiftSore as $hari => $shift) {
        $updateQuery = "UPDATE shift_pegawai 
                        SET shift_sore='$shift', periode='$periode' 
                        WHERE hari='$hari'";
        if ($conn->query($updateQuery) === TRUE) {
            echo "Record updated successfully for shift sore $hari<br>";
        } else {
            echo "Error updating record for shift sore $hari: " . $conn->error . "<br>";
        }
    }

    header("Location: shift.php");
    exit();
}

$conn->close();
?>
