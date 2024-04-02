<?php
session_start();

// Verifica se o usuário está logado
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: index.php');
    exit;
}
?>

<div class="registros-list">
    <h2>Registros de Carros</h2>
    <ul>
        <?php
        // Exibir registros de carros
        $carros = file_get_contents('carros.txt');
        $carros = explode("\n", $carros);
        foreach($carros as $carro) {
            echo "<li><span>Carro:</span>$carro</li>";
        }
        ?>
    </ul>
</div>

<div class="container">
    <input type="button" value="Voltar" onclick="voltar()" class="button1">
</div>

<link rel="stylesheet" href="styles.css">

<script>
function voltar() {
    window.location.href = 'index.php';
}
</script>
