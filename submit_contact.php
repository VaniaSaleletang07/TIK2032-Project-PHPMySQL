<?php
include 'dbKoneksi.php'; // Include database connection

// Allow only POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? $conn->real_escape_string($_POST['name']) : '';
    $email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';
    $message = isset($_POST['message']) ? $conn->real_escape_string($_POST['message']) : '';

    // Check if all fields are filled
    if (!empty($name) && !empty($email) && !empty($message)) {
        $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Pesan berhasil dikirim!'); window.location.href = 'contact.html';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan: " . $conn->error . "'); window.location.href = 'contact.html';</script>";
        }
    } else {
        echo "<script>alert('Semua field harus diisi!'); window.location.href = 'contact.html';</script>";
    }

    $conn->close();
} else {
    // Return 405 Method Not Allowed for unsupported methods
    header('HTTP/1.1 405 Method Not Allowed');
    echo "<h1>405 Method Not Allowed</h1>";
    exit;
}
?>