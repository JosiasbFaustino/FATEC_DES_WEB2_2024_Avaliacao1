<?php
session_start();
$_SESSION['logged_in'] = false;
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Logout</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 600px;
        margin: 100px auto;
        text-align: center;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        margin-bottom: 20px;
        color: #333;
    }
    a {
        text-decoration: none;
        color: #007bff;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Logout realizado com sucesso!</h1>
        <p><a href="index.php">Voltar para o início</a></p>
    </div>
</body>
</html><?php
session_start();
// Encerra a sessão
$_SESSION = array();
session_destroy();
header("location: index.php");
?>

<div class="container">
    <h2>Você saiu da sessão.</h2>
    <a href="index.php" class="button">Voltar para o início</a>
</div>

<link rel="stylesheet" href="styles.css">
