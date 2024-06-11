<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "aulamax"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT * FROM dentistas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    $response = array("status" => "success", "dentistas" => $rows);
    echo json_encode($response);
} else {
    $response = array("status" => "error", "message" => "Nenhum dentista encontrado");
    echo json_encode($response);
}

$conn->close();
?>
