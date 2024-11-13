<?php
// Sertakan file koneksi
include '../koneksi.php'; // Sesuaikan path jika file koneksi berada di folder yang berbeda

// Mengambil data JSON dari request
$data = json_decode(file_get_contents('php://input'), true);

// Cek jika data lengkap
if (isset($data['id_pasien'], $data['nama'], $data['tanggal_lahir'], $data['alamat'], $data['nomor_hp'], $data['gender'], $data['keluhan'], $data['tanggal_kunjungan'])) {
    // SQL untuk update data pasien
    $sql = "UPDATE pasien SET 
            nama = ?, 
            tanggal_lahir = ?, 
            alamat = ?, 
            nomor_hp = ?, 
            gender = ?, 
            keluhan = ?, 
            tanggal_kunjungan = ? 
            WHERE id_pasien = ?";

    // Persiapkan statement dan bind parameter
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die(json_encode(['success' => false, 'error' => 'MySQL prepare statement failed: ' . $conn->error]));
    }
    
    // Bind parameter
    $stmt->bind_param('sssssssi', 
            $data['nama'], 
            $data['tanggal_lahir'], 
            $data['alamat'], 
            $data['nomor_hp'], 
            $data['gender'], 
            $data['keluhan'], 
            $data['tanggal_kunjungan'], 
            $data['id_pasien']);
    
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
