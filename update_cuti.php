<?php
include 'koneksi.php'; // Assuming 'koneksi.php' establishes the database connection

// Validate and sanitize input (prevent SQL injection)
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT); // Ensure numerical ID
    $status = filter_var($_GET['status'], FILTER_SANITIZE_STRING); // Basic sanitization for status

    // Construct a prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($conn, "UPDATE pengajuan_cuti SET status=? WHERE id=?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $status, $id); // Bind parameters for status and ID

        if (mysqli_stmt_execute($stmt)) {
            echo "Status cuti berhasil diperbarui."; // Success message (without script)

            // Optional: Redirect using header (more secure than window.location)
            header('Location: status_cuti.php');
            exit; // Prevent further code execution after redirect
        } else {
            echo "Error: " . mysqli_stmt_error($stmt); // Error handling with stmt error
        }

        mysqli_stmt_close($stmt); // Close prepared statement
    } else {
        echo "Error: Failed to prepare statement."; // Handle prepare statement error
    }
} else {
    echo "Invalid request."; // Error message for invalid data
}

mysqli_close($conn); // Close database connection
?>
