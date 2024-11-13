<?php
include '../koneksi.php';

// Menambah Data Rekam Medis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id_rekam_medis = $_POST['pasienId'];
    $diagnosis = $_POST['diagnosis'];
    $pengobatan = $_POST['treatment'];
    $catatan_dokter = $_POST['doctorNotes'];
    $tanggal_kunjungan = date("Y-m-d H:i:s"); // Waktu saat data dimasukkan

    // Query untuk menambahkan data rekam medis menggunakan prepared statement
    $sql = "INSERT INTO rekam_medis (id_rekam_medis, diagnosis, pengobatan, catatan_dokter, tanggal_kunjungan) 
            VALUES ('$id_rekam_medis', '$diagnosis', '$pengobatan', '$catatan_dokter', '$tanggal_kunjungan')";

    // Menyiapkan prepared statement
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT * FROM rekam_medis"; // Ubah ke tabel yang benar
    $result = $conn->query($sql);

    if (!$result) {
        die("Query Error: " . $conn->error);
    }

    $medicRecord = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $medicRecord[] = $row;
        }
    }

    echo json_encode($medicRecord);
}

$conn->close();
?>
