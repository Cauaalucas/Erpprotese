<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $dtnasc = $_POST['dtnasc'];
    $telefone = $_POST['telefone'];
    $dentresp = $_POST['dentresp'];
    $observacao = $_POST['observacao'];

    $sql = "INSERT INTO clients (nome, dtnasc, telefone, dentresp, observacao ) VALUES ('$nome', '$dtnasc', '$telefone', '$dentresp', '$observacao')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        echo json_encode(['id' => $last_id]);
    } else {
        echo json_encode(['error' => $conn->error]);
    }

    $conn->close();
}
?>
