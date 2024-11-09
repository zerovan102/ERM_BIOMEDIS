<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['name'];
    $tanggal_lahir = $_POST['birthdate'];
    $alamat = $_POST['address'];
    $nomor_hp = $_POST['phone'];
    $gender = $_POST['gender'] == 'Pria' ? 'L' : 'P'; // Konversi gender
    $keluhan = $_POST['complaint'];
    $tanggal_kunjungan = $_POST['visitDate'] . ' ' . date("H:i:s"); // Tambahkan waktu sekarang

    // Query insert data
    $sql = "INSERT INTO pasien (nama, tanggal_lahir, alamat, nomor_hp, gender, keluhan, tanggal_kunjungan)
            VALUES ('$nama', '$tanggal_lahir', '$alamat', '$nomor_hp', '$gender', '$keluhan', '$tanggal_kunjungan')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>