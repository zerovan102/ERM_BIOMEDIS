<?php
// Sertakan file koneksi
include '../koneksi.php'; // Sesuaikan dengan path file koneksi Anda

// Mengambil data pasien
$pasienQuery = "SELECT id_pasien, nama FROM pasien";
$pasienResult = $conn->query($pasienQuery);

// Periksa jika query gagal
if (!$pasienResult) {
    die("Query failed: " . $conn->error);
}

// Mengambil data dokter
$dokterQuery = "SELECT id_dokter, nama_dokter FROM dokter";
$dokterResult = $conn->query($dokterQuery);

// Periksa jika query gagal
if (!$dokterResult) {
    die("Query failed: " . $conn->error);
}

$pasienData = [];
$dokterData = [];

// Menyusun data pasien ke dalam array
while ($row = $pasienResult->fetch_assoc()) {
    $pasienData[] = $row;
}

// Menyusun data dokter ke dalam array
while ($row = $dokterResult->fetch_assoc()) {
    $dokterData[] = $row;
}

// Menutup koneksi
$conn->close();

// Mengembalikan data dalam format JSON
echo json_encode([
    'pasienData' => $pasienData,
    'dokterData' => $dokterData
]);
?>
