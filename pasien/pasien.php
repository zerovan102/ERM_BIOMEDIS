<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['name'];
    $tanggal_lahir = $_POST['birthdate'];
    $alamat = $_POST['address'];
    $nomor_hp = $_POST['phone'];
    $gender = $_POST['gender']; // Ambil nilai langsung dari form
    $keluhan = $_POST['complaint'];
    $tanggal_kunjungan = $_POST['visitDate'] . ' ' . date("H:i:s");

    // Query untuk menambahkan data pasien
    $sql = "INSERT INTO pasien (nama, tanggal_lahir, alamat, nomor_hp, gender, keluhan, tanggal_kunjungan)
            VALUES ('$nama', '$tanggal_lahir', '$alamat', '$nomor_hp', '$gender', '$keluhan', '$tanggal_kunjungan')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Query untuk mengambil semua data pasien
    $sql = "SELECT * FROM pasien";
    $result = $conn->query($sql);

    if (!$result) {
        die("Query Error: " . $conn->error);
    }

    $patients = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $patients[] = $row;
        }
    }

    echo json_encode($patients);
}

$conn->close();
?>
