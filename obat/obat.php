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

} else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    parse_str(file_get_contents("php://input"), $_PUT);  // Parse data untuk HTTP PUT
    $id_obat = $_PUT['id'];
    $nama_obat = $_PUT['name'];
    $dosis = $_PUT['dosis'];
    $deskripsi = $_PUT['deskripsi'];
    $intruksi = $_PUT['intruksi'];

    $sql = "UPDATE obat SET nama_obat = '$nama_obat', dosis = '$dosis', deskripsi = '$deskripsi', intruksi = '$intruksi' WHERE id = '$id_obat'";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diupdate";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

} else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    parse_str(file_get_contents("php://input"), $_DELETE);  // Parse data untuk HTTP DELETE
    $id_obat = $_DELETE['id'];

    $sql = "DELETE FROM obat WHERE id = '$id_obat'";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
