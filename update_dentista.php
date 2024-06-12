<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $contato = $_POST['contato'];
    $clinica = $_POST['clinica'];
    
    $sql = "UPDATE dentista SET nome ='$nome', contato='$contato', clinica='$clinica' WHERE id='$id'";

    if($conn->query($sql) === TRUE){
        echo "Registro atualizado com sucesso";
    } else {
        echo "Erro ao atualizar registro: ".$conn->error;
    }

    $conn->close();
}
?>
