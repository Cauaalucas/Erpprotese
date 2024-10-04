<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

   
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $error = "Nome de usuário já existe.";
    } else {
        
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT); 
        $sql = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $user, $hashed_password);

        if ($stmt->execute()) {
            header("Location: login.php");
            exit();
        } else {
            $error = "Erro ao cadastrar usuário: " . $stmt->error;
        }
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<link rel="stylesheet" href="login.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h2>Cadastrar Usuário</h2>
    <form action="register.php" method="post">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required><br>
        
        <button type="submit">Cadastrar</button>
    </form>
    <p>Já tem uma conta? <a href="login.php">Faça login aqui</a></p>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>
