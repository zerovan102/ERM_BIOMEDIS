<?php
// Sertakan file koneksi
include '../koneksi.php'; // Sesuaikan path jika file koneksi berada di folder yang berbeda

// Mengambil data JSON dari request
$data = json_decode(file_get_contents('php://input'), true);

// Cek jika data lengkap
if (isset($data['id_obat'], $data['nama_obat'], $data['dosis'], $data['intruksi'], $data['deskripsi'])) {
    // SQL untuk update data obat
    $sql = "UPDATE obat SET 
            nama_obat = ?, 
            dosis = ?, 
            intruksi = ?, 
            deskripsi = ? 
            WHERE id_obat = ?";

    // Persiapkan statement dan bind parameter
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die(json_encode(['success' => false, 'error' => 'MySQL prepare statement failed: ' . $conn->error]));
    }
    
    // Bind parameter
    $stmt->bind_param('ssssi', 
            $data['nama_obat'], 
            $data['dosis'], 
            $data['intruksi'], 
            $data['deskripsi'], 
            $data['id_obat']);
    
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
