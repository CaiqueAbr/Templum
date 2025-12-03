<?php
$dbHost = 'localhost'; // Correção: 'localhost' com 'l' minúsculo
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'Templum';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
?>
