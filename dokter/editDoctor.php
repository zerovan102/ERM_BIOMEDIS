<?php
// Koneksi database
include '../koneksi.php';

// Ambil data yang dikirim dari client
$data = json_decode(file_get_contents('php://input'), true);

// Ambil data dari JSON
$id_dokter = $data['id_dokter'];
$nama_dokter = $data['nama_dokter'];
$spesialis = $data['spesialis'];
$ruangan = $data['ruangan'];
$nomor_hp = $data['nomor_hp'];
$jenis_kelamin = $data['jenis_kelamin'];
$jam_kerja = $data['jam_kerja'];

// Query untuk memperbarui data dokter
$query = "UPDATE dokter SET 
            nama_dokter = ?, 
            spesialis = ?, 
            ruangan = ?, 
            nomor_hp = ?, 
            jenis_kelamin = ?, 
            jam_kerja = ? 
          WHERE id_dokter = ?";

// Menyiapkan statement
$stmt = $conn->prepare($query);
$stmt->bind_param("ssssssi", $nama_dokter, $spesialis, $ruangan, $nomor_hp, $jenis_kelamin, $jam_kerja, $id_dokter);

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
