<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "aulamax"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$contato = $_POST['contato'];
$clinica = $_POST['clinica'];

$sql = "INSERT INTO dentistas (nome, contato, clinica)
VALUES ('$nome', '$contato', '$clinica')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $response = array("status" => "success", "id" => $last_id);
    echo json_encode($response);
} else {
    $response = array("status" => "error", "message" => "Erro ao cadastrar dentista: " . $conn->error);
    echo json_encode($response);
}

$conn->close();
?>
