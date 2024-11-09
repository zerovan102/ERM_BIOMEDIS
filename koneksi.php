<?php
// Konfigurasi database
$host = 'localhost'; // Server database, defaultnya localhost di XAMPP
$user = 'root';      // Username default XAMPP
$pass = '';          // Password kosong untuk XAMPP
$dbname = 'emr';     // Nama database

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $dbname);


?>
