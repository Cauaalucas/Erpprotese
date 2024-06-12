<?php
include 'db.php';

$sql = "SELECT * FROM dentista";
$result = $conn->query($sql);

$dentistas = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $dentistas[] = $row;
    }
}

echo json_encode(['dentista' => $dentistas]);

$conn->close();
?>
