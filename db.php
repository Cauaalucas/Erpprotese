<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "aulamax"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql_clients = "CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    dtnasc DATE,
    telefone VARCHAR(15),
    dentresp VARCHAR(50) NOT NULL,
    observacao varchar(150)
)";

if ($conn->query($sql_clients) === FALSE) {
    echo "Erro ao criar tabela 'clients': " . $conn->error;
}

$sql_dentista = "CREATE TABLE IF NOT EXISTS dentista (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    contato VARCHAR(20) NOT NULL,
    clinica VARCHAR(100) NOT NULL
)";

if ($conn->query($sql_dentista) === FALSE) {
    echo "Erro ao criar tabela 'dentista': " . $conn->error;
}

?>
