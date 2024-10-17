<?php
$dsn = 'mysql:host=localhost;dbname=petsitter;charset=utf8';//Data Source Name
$username = 'root'; // Usuário
$password = ''; // Senha

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conectado com sucesso!";
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}