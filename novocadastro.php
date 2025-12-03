<?php
include_once('php_login.php');

$mensagem = ""; // variável para armazenar a mensagem

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmar = $_POST['confirmar'];

    // Verifica se as senhas coincidem
    if ($senha !== $confirmar) {
        $mensagem = "<p style='color: red;'>As senhas não coincidem.</p>";
    } else {
        // Verifica se o email já está cadastrado
        $sql_verifica = "SELECT id_usuario FROM usuario WHERE email = '$email'";
        $resultado = mysqli_query($conexao, $sql_verifica);

        if (mysqli_num_rows($resultado) > 0) {
            $mensagem = "<p style='color: red;'>Este e-mail já está cadastrado.</p>";
        } else {
            // Insere o novo usuário
            $sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
            $resultado = mysqli_query($conexao, $sql);

            if ($resultado) {
                header("Location: loginpagina.php   ");
            exit();
            } else {
                $mensagem = "<p style='color: red;'>Erro ao cadastrar usuário: " . mysqli_error($conexao) . "</p>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Templum</title>
    <link rel="stylesheet" href="novocadastro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="imagens/favicon-32x32.png" type="image/x-icon">
</head>
<body>

    <div class="menu">
        <a href="index.html"target="_blank">Início</a>
        <a href="conheca.html"target="_blank">Conheça</a>
        <a href="desenvolvedores.html"target="_blank">Desenvolvedores</a>
        <a href="loginpagina.php"target="_blank">Download</a>
        
    </div>

    <div class="logo"><img src="imagens/LogoTexto1.png" alt=""></div>

    <div class="container">
        <div class="cadastro-box">
            <h2>Crie sua Conta</h2>

            <?php if (!empty($mensagem)) echo $mensagem; ?>

            <form action="novocadastro.php" method="POST">

                <div class="icon">
                    <i class="fas fa-user"></i>
                    <input type="text" name="nome" placeholder="Nome completo" required>
                </div>

                <div class="icon">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder=" E-mail" required>
                </div>

                <div class="icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="senha" placeholder="Senha" required>
                </div>

                <div class="icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="confirmar" placeholder="Confirme sua senha" required>
                </div>

                <button type="submit" name="submit">Cadastrar</button>
            </form>
            
            <div class="login-link">
                Já tem uma conta? <a href="loginpagina.php">Fazer login</a>
            </div>
        </div>
    </div>

    <div id="rodape">
        <p>&copy; 2025 Jogo Inc. Todos os direitos reservados.</p>
    </div>

</body>
</html>
