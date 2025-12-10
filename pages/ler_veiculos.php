<?php
// CONEXÃO AO BANCO
include 'conexao.php';

// LER TABELA veiculos
$stmt = $pdo->query("SELECT 
        id,
        marca,
        modelo,
        ano,
        cor,
        kilometragem,
        preco,
        placa,
        valor_min,
        valor_max,
        descricao,
        desconto,
    origem,
    status
    FROM veiculos");

$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
