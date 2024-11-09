<?php
include 'koneksi.php';

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
$conn->close();
?>
