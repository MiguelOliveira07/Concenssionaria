<?php
// CONEXÃO COM O BANCO DE DADOS
try {
    $pdo = new PDO("mysql:host=localhost;dbname=concessionaria-db;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (Exception $e) {
    die("Erro: " . $e->getMessage());
}
?>
