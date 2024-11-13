<?php
// Koneksi database
include '../koneksi.php';

// Ambil data yang dikirim dari client
$data = json_decode(file_get_contents('php://input'), true);

// Ambil ID dokter dari data JSON
$id_dokter = $data['id_dokter'];

// Query untuk menghapus data dokter
$query = "DELETE FROM dokter WHERE id_dokter = ?";

// Menyiapkan statement
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_dokter);

// Eksekusi query
if ($stmt->execute()) {
    // Kirim respons sukses
    echo json_encode(['success' => true]);
} else {
    // Kirim respons error
    echo json_encode(['success' => false]);
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>
