<?php
include 'db.php';

$data = json_decode(file_get_contents('php://input'), true);

$nome = $data['nome'];
$quantidade = $data['quantidade'];

$sql = "INSERT INTO stock (item, quantidade) VALUES ('$nome', '$quantidade')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['message' => 'Item adicionado ao estoque com sucesso!']);
} else {
    echo json_encode(['error' => 'Erro ao adicionar item ao estoque: ' . $conn->error]);
}

$conn->close();
?>
