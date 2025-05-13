<?php
<?php
$host = 'localhost';
$user = 'root';
$password = ''; 
$database = 'tik2032_project';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>