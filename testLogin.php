<?php
include_once('php_login.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (empty($email) || empty($senha)) {
        header("Location: loginpagina.php?erro=campos");
        exit();
    } else {
        $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
        $result = mysqli_query($conexao, $sql);

        if (!$result) {
            header("Location: loginpagina.php?erro=sql");
            exit();
        } elseif (mysqli_num_rows($result) < 1) {
            header("Location: loginpagina.php?erro=credenciais");
            exit();
        } else {
            header('Location: download.html');
            exit();
        }
    }
} else {
    header("Location: loginpagina.php?erro=acesso");
    exit();
}
?>
