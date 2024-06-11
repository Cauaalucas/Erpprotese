<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aulamax";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o ID do cliente foi fornecido
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    
    // Mensagem de depuração
    error_log("ID recebido para exclusão: $id");

    // Preparar a declaração SQL para excluir o cliente
    $sql = "DELETE FROM clients WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    // Executar a declaração
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
