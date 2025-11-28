<?php
// CONEXÃO AO BANCO
include "C:\Users\999532\OneDrive - SENAC em Minas - EDU\Projetos_GitHub\Concenssionaria\includes\conexao.php";
// CONSULTA AO BANCO
$stmt = $pdo->query("SELECT Id_funcionarios, Nome, Cpf, matrícula FROM funcionarios");
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela com Bootstrap</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>