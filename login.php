<?php
session_start();

// Verificar se o administrador já está logado
if (isset($_SESSION["admin_logged_in"]) && $_SESSION["admin_logged_in"] === true) {
    header("Location: admin_interface.php");
    exit;
}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar as credenciais do administrador (substitua com suas próprias credenciais)
    $admin_username = "Gervasio";
    $admin_password = "Gergerger798";

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verificar se as credenciais são válidas
    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION["admin_logged_in"] = true;
        header("Location: admin_interface.php");
        exit;
    } else {
        $error_message = "Credenciais inválidas.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login Administrativo</title>
</head>
<body>
    <h2>Login Administrativo</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
    <?php if (isset($error_message)) echo "<p>$error_message</p>"; ?>
</body>
</html>
