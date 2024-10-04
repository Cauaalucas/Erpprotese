<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM dentista WHERE id = ?");
    if ($stmt === false) {
        echo json_encode(['error' => 'Erro ao preparar a consulta SQL: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Erro ao executar a consulta SQL: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'Método de requisição inválido.']);
}
?>
