<?php
session_start();

// Verifica se o usuário está logado
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    echo "<div class='container'>";
    echo "Você está logado como Portaria. <input type='button' value='Sair' onclick='logout()' class='button1'><br>";
    echo "<form method='get' action='registro.php'><input type='submit' value='Cadastrar Aluno/Veículo' class='button'></form><br>";
    echo "<form method='get' action='visualizar_registros.php'><input type='submit' value='Visualizar Registros' class='button'></form>";
    echo "</div>";
} else {
    // Se não estiver logado, exibir o formulário de login
    if(isset($_POST['login']) && isset($_POST['senha'])) {
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        // Verifica se o login e senha são válidos
        if($login === 'portaria' && $senha === 'FatecAraras') {
            $_SESSION['logged_in'] = true;
            echo "<div class='container'>";
            echo "Login bem-sucedido. <br>";
            echo "<br><input type='button' value='Continuar' onclick='continuar()' class='button'>";
            echo "</div>";
        } else {
            echo "<div class='container'>";
            echo "Login ou senha inválidos.<br>";
            echo "<br><input type='button' value='Voltar' onclick='voltar()' class='button1'>";
            echo "</div>";
        }
    } else {
        // Exibe o formulário de login
        ?>
        <div class="container">
            <form method="post" action="index.php">
                <label for="login">Login:</label>
                <input type="text" id="login" name="login" class="input-text"><br>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" class="input-text"><br>
                <input type="submit" value="Login" class="button">
            </form>
        </div>
        <?php
    }
}
?>

<link rel="stylesheet" href="styles.css">

<script>
function logout() {
    window.location.href = 'logout.php';
}

function continuar() {
    window.location.href = 'index.php';
}

function voltar() {
    window.location.href = 'index.php';
}
</script>
