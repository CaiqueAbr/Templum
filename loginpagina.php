<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Templum</title>
    <link rel="stylesheet" href="loginpagina.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="imagens/favicon-32x32.png" type="image/x-icon">
</head>
<body>

    <div class="menu">
        <a href="index.html"target="_blank">Início</a>
        <a href="conheca.html"target="_blank">Conheça</a>
        <a href="desenvolvedores.html"target="_blank">Desenvolvedores</a>
        <a href="loginpagina.php"target="_blank">Download</a>
        
    </div class="img">
    <div class="logo"><img src="imagens/LogoTexto1.png" alt="">
    </div>
    </div>

    <div class="container">
        <div class="login-box">
            <h2>Login para Download</h2>

<?php
    if (isset($_GET['erro'])) {
        switch ($_GET['erro']) {
            case 'campos':
                echo "<p style='color: red; text-align: center;'>Preencha todos os campos.</p>";
                break;
            case 'sql':
                echo "<p style='color: red; text-align: center;'>Erro no servidor. Tente novamente.</p>";
                break;
            case 'credenciais':
                echo "<p style='color: red; text-align: center;'>Email ou senha incorretos.</p>";
                break;
            case 'acesso':
                echo "<p style='color: red; text-align: center;'>Acesso inválido ao login.</p>";
                break;
            }
}
?>
            <form action="testLogin.php" method="POST">

                <div class="icon">
                    <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Seu e-mail" required>
                </div>

                <div class="icon">
                    <i class="fas fa-lock"></i>
                        <input type="password" name="senha" placeholder="Sua senha" required>
                </div>

                <button type="submit" name="submit">Entrar</button>
            </form>
            <div class="register-link">
                Não tem uma conta? <a href="novocadastro.php">Cadastre-se aqui</a>
            </div>
        </div>
    </div>

    <div id="rodape">
        <p>&copy; 2025 Jogo Inc. Todos os direitos reservados.</p>
    </div>
</body>
</html>
