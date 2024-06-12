<?php

include 'db.php';

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    
    
    error_log("ID recebido para exclusão: $id");

    
    $sql = "DELETE FROM clients WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Nenhum cliente encontrado com este ID"]);
        }
    } else {
        echo json_encode(["error" => "Erro ao executar a exclusão: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "ID do cliente não fornecido"]);
}

$conn->close();
?>
