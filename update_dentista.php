<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "aulamax"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$id = $_POST['id'];
$nome = $_POST['nome'];
$contato = $_POST['contato'];
$clinica = $_POST['clinica'];

$sql = "UPDATE dentistas SET nome='$nome', contato='$contato', clinica='$clinica' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    $response = array("status" => "success");
    echo json_encode($response);
} else {
    $response = array("status" => "error", "message" => "Erro ao atualizar dentista: " . $conn->error);
    echo json_encode($response);
}

$conn->close();
?>
