<?php
session_start();

// Verifica se o usuário está logado
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: index.php');
    exit;
}

if(isset($_POST['nome']) && isset($_POST['ra']) && isset($_POST['placa'])) {
    $nome = $_POST['nome'];
    $ra = $_POST['ra'];
    $placa = $_POST['placa'];

    // Verifica se os campos estão preenchidos
    if(!empty($nome) && !empty($ra) && !empty($placa)) {
        // Verifica se é carro ou moto
        if(isset($_POST['tipo']) && $_POST['tipo'] === 'carro') {
            $arquivo = 'carros.txt';
        } else {
            $arquivo = 'motos.txt';
        }

        // Grava os dados no arquivo texto
        $registro = "$nome|$ra|$placa\n";
        file_put_contents($arquivo, $registro, FILE_APPEND);

        echo "<div id='success-message' class='success-message'>";
        echo "Registro adicionado com sucesso.";
        echo "</div>";
    } else {
        echo "<div class='aviso'>";
        echo "Por favor, preencha todos os campos.";
        echo "</div>";
    }
}
?>

<div class="registro-form">
    <h2>Cadastrar Aluno/Veículo</h2>
    <form method="post" action="registro.php">
        <label for="nome">Nome Completo:</label>
        <input type="text" id="nome" name="nome"><br>
        <label for="ra">Registro Acadêmico (R.A.):</label>
        <input type="text" id="ra" name="ra"><br>
        <label for="placa">Placa do Carro ou Moto:</label>
        <input type="text" id="placa" name="placa"><br>
        <label for="tipo">Tipo de Veículo:</label>
        <select name="tipo" id="tipo">
            <option value="carro">Carro</option>
            <option value="moto">Moto</option>
        </select><br>
        <input type="submit" value="Cadastrar" class="button">
        <input type="button" value="Voltar" onclick="voltar()" class="button1">
    </form>
</div>

<link rel="stylesheet" href="styles.css">

<script>
function voltar() {
    window.location.href = 'index.php';
}

setTimeout(function() {
    document.getElementById('success-message').style.display = 'none';
}, 1000);

</script>
