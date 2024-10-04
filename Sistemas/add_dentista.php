<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $contato = $_POST['contato'];
    $clinica = $_POST['clinica'];

    $stmt = $conn->prepare("INSERT INTO dentista (nome, contato, clinica) VALUES (?, ?, ?)");
    if ($stmt === false) {
        echo json_encode(['error' => 'Erro ao preparar a consulta SQL: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("sss", $nome, $contato, $clinica);

    if ($stmt->execute()) {
        $last_id = $conn->insert_id;
        echo json_encode(['id' => $last_id]);
    } else {
        echo json_encode(['error' => 'Erro ao executar a consulta SQL: ' . $stmt->error]);
    }

    $stmt->close();
    
}
?>
