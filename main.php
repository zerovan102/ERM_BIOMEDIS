<?php
include 'koneksi.php';

// Query contoh untuk menampilkan data
$sql = "SELECT * FROM dokter";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Data: " . $row["nama_kolom"] . "<br>";
    }
} else {
    echo "Data tidak ditemukan.";
}
?>
