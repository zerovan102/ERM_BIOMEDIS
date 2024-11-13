<?php
include '../koneksi.php';

// Menambah Data Rekam Medis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id_pasien = $_POST['pasienId'];
    $diagnosis = $_POST['diagnosis'];
    $pengobatan = $_POST['treatment'];
    $catatan_dokter = $_POST['doctorNotes'];
    $tanggal_kunjungan = date("Y-m-d H:i:s"); // Waktu saat data dimasukkan

    // Query untuk menambahkan data rekam medis menggunakan prepared statement
    $sql = "INSERT INTO rekam_medis (pasien_id, diagnosis, treatment, doctor_notes, tanggal) 
            VALUES (?, ?, ?, ?, ?)";

    // Menyiapkan prepared statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameter
        $stmt->bind_param("sssss", $id_pasien, $diagnosis, $pengobatan, $catatan_dokter, $tanggal_kunjungan);

        // Eksekusi query
        if ($stmt->execute()) {
            echo "Data rekam medis berhasil ditambahkan";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Menutup prepared statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
} 

// Mengambil Semua Data Rekam Medis
else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Query untuk mengambil semua data rekam medis dan data pasien
    $sql = "SELECT rm.id, p.nama AS pasien, rm.diagnosis, rm.treatment, rm.doctor_notes, rm.tanggal 
            FROM rekam_medis rm
            JOIN pasien p ON rm.pasien_id = p.id";
    $result = $conn->query($sql);

    if (!$result) {
        die("Query Error: " . $conn->error);
    }

    $rekamMedis = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rekamMedis[] = $row;
        }
    }

    echo json_encode($rekamMedis);
}

$conn->close();
?>
