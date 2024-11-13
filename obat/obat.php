<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_obat = $_POST['name'];
    $dosis = $_POST['dosis'];
    $deskripsi = $_POST['deskripsi'];
    $intruksi = $_POST['intruksi'];

    $sql = "INSERT INTO obat (nama_obat, dosis, deskripsi,  intruksi)
            VALUES ('$nama_obat', '$dosis', '$deskripsi', '$intruksi')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT * FROM obat";
    $result = $conn->query($sql);

    if (!$result) {
        die("Query Error: " . $conn->error);
    }

    $obat = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $obat[] = $row;
        }
    }

    echo json_encode($obat);
}

$conn->close();
?>
