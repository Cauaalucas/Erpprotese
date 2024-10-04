<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    
    $stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();
    
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();
        
        
        if (password_verify($pass, $hashed_password)) {
            
            $_SESSION['user_id'] = $id;
            header("Location: index.html");
            exit();
        } else {
            $error = "Senha incorreta.";
        }
    } else {
        $error = "Usuário não encontrado.";
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
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required><br>
        
        <button type="submit">Entrar</button>
    </form>
    <p>Não tem uma conta? <a href="register.php">Cadastre-se aqui</a></p>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>
