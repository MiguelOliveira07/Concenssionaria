<?php
// CONEXÃO AO BANCO
include 'conexao.php';

$stmt = $pdo->query("SELECT 
        cpf,
        nome,
        telefone,
        email,
        senha
    FROM clientes");

$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
