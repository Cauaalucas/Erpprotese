<?php
include 'db.php';

$sql = "SELECT * FROM stock";
$result = $conn->query($sql);

$itensEstoque = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $itensEstoque[] = $row;
    }
}

echo json_encode(['itens' => $itensEstoque]);

$conn->close();
?>
