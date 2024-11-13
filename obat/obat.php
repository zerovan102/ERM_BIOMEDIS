<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama_obat = $_POST['name'];
    $dosis = $_POST['dosis'];
    $deskripsi = $_POST['desc'];
    $instruksi = $_POST['instruksi'];

    // Validasi data untuk memastikan tidak kosong
    if (empty($nama_obat) || empty($dosis) || empty($deskripsi) || empty($instruksi)) {
        echo "Semua field harus diisi!";
        exit;
    }

    try {
        // Gunakan prepared statement untuk menghindari SQL Injection
        $stmt = $conn->prepare("INSERT INTO obat (nama_obat, dosis, deskripsi, instruksi) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama_obat, $dosis, $deskripsi, $instruksi);

        // Eksekusi query
        if ($stmt->execute()) {
            echo "Data obat berhasil ditambahkan";
        } else {
            echo "Error: " . $stmt->error;
        }
    } catch (Exception $e) {
        // Tangani error jika terjadi exception
        echo "Error: " . $e->getMessage();
    }

    $stmt->close();
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Query untuk mengambil semua data obat
    try {
        $sql = "SELECT * FROM obat";
        $result = $conn->query($sql);

        if (!$result) {
            throw new Exception("Query Error: " . $conn->error);
        }

        $obat = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $obat[] = $row;
            }
        }

        echo json_encode($obat);

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conn->close();
?>
