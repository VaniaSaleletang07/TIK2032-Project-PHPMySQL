<?php
include 'dbKoneksi.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

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
    header('Location: contact.html');
    exit;
}
?>