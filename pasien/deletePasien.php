<?php
// Sertakan file koneksi
include '../koneksi.php'; // Sesuaikan path jika file koneksi berada di folder yang berbeda

// Mengambil data JSON dari request
$data = json_decode(file_get_contents('php://input'), true);

// Cek apakah id_pasien ada
if (isset($data['id_pasien'])) {
    $id_pasien = $data['id_pasien'];

    // SQL untuk menghapus data pasien berdasarkan id_pasien
    $sql = "DELETE FROM pasien WHERE id_pasien = ?";

    // Persiapkan statement dan bind parameter
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die(json_encode(['success' => false, 'error' => 'MySQL prepare statement failed: ' . $conn->error]));
    }

    // Bind parameter
    $stmt->bind_param('i', $id_pasien);

    // Eksekusi query
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'MySQL Error: ' . $stmt->error]);
    }

    // Tutup koneksi
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Data tidak lengkap']);
}
?>
