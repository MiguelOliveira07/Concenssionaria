<?php
// CONEXÃO AO BANCO
include 'conexao.php';
// LER TABELA FUNCIONARIOS.SQL
$stmt = $pdo->query("SELECT Id_funcionarios, Nome, Cpf, matrícula FROM funcionarios");
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>