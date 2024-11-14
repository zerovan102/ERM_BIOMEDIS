<?php
include '../koneksi.php';

// Tampilkan semua kesalahan PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['id_pasien']) && isset($data['id_dokter']) && isset($data['diagnosis']) && isset($data['pengobatan'])) {
        $id_pasien = $data['id_pasien'];
        $id_dokter = $data['id_dokter'];
        $tanggal_kunjungan = date("Y-m-d H:i:s");
        $diagnosis = $data['diagnosis'];
        $pengobatan = $data['pengobatan'];

        $sql = "INSERT INTO rekam_medis (id_pasien, id_dokter, tanggal_kunjungan, diagnosis, pengobatan)
                VALUES (?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("iisss", $id_pasien, $id_dokter, $tanggal_kunjungan, $diagnosis, $pengobatan);

            if ($stmt->execute()) {
                echo json_encode(array("message" => "Data rekam medis berhasil ditambahkan"));
            } else {
                echo json_encode(array("message" => "Error: " . $stmt->error));
            }

            $stmt->close();
        } else {
            echo json_encode(array("message" => "Error: " . $conn->error));
        }
    } else {
        echo json_encode(array("message" => "Data tidak lengkap", "data_received" => $data));
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT rekam_medis.*, pasien.nama AS nama_pasien, dokter.nama_dokter AS nama_dokter 
            FROM rekam_medis
            JOIN pasien ON rekam_medis.id_pasien = pasien.id_pasien
            JOIN dokter ON rekam_medis.id_dokter = dokter.id_dokter";
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

    header('Content-Type: application/json');
    echo json_encode($rekamMedis);
}

$conn->close();


?>
