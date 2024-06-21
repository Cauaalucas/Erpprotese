<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aulamax";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'adicionar') {
        $item = $_POST['item'];
        $sql = "INSERT INTO estoque (item, quantidade) VALUES ('$item', 0)";
        $conn->query($sql);
    } elseif ($action === 'alterar') {
        $item = $_POST['item'];
        $quantidade = $_POST['quantidade'];
        $sql = "UPDATE estoque SET quantidade = $quantidade WHERE item = '$item'";
        $conn->query($sql);
    } elseif ($action === 'excluir') {
        $item = $_POST['item'];
        $sql = "DELETE FROM estoque WHERE item = '$item'";
        $conn->query($sql);
    }
}

$sql = "SELECT * FROM estoque";
$result = $conn->query($sql);

$estoque = array();
while ($row = $result->fetch_assoc()) {
    $estoque[] = $row;
}

$conn->close();


echo json_encode($estoque);
?>
