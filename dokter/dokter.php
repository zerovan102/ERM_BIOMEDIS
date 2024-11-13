<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['name'];
    $spesialis = $_POST['speciality'];
    $ruangan = $_POST['room'];
    $nomor_hp = $_POST['phone'];
    $gender = $_POST['gender'];
    $jam_kerja = $_POST['work_time'];

    // Query untuk menambahkan data dokter
    $sql = "INSERT INTO dokter (nama_dokter, spesialis, ruangan, nomor_hp, jenis_kelamin, jam_kerja)
            VALUES ('$nama', '$spesialis', '$ruangan', '$nomor_hp', '$gender', '$jam_kerja')";

    if ($conn->query($sql) === TRUE) {
        echo "Data dokter berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Query untuk mengambil semua data dokter
    $sql = "SELECT * FROM dokter";
    $result = $conn->query($sql);

    if (!$result) {
        die("Query Error: " . $conn->error);
    }

    $doctors = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $doctors[] = $row;
        }
    }

    echo json_encode($doctors);
}

$conn->close();
?>
