<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $dtnasc = $_POST['dtnasc'];
    $telefone = $_POST['telefone'];
    $dentresp = $_POST['dentresp'];
    $observacao = $_POST['observacao'];

    $sql = "UPDATE clients SET nome='$nome', dtnasc='$dtnasc', telefone='$telefone', dentresp='$dentresp', observacao='$observacao' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso";
    } else {
        echo "Erro ao atualizar registro: " . $conn->error;
    }

    $conn->close();
}
?>
