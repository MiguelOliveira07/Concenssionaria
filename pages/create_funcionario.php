<?php
// CONEXÃO AO BANCO
include 'includes\conexao.php';
// CONSULTA AO BANCO
$stmt = $pdo->query("SELECT Id_funcionarios, Nome, Cpf, matrícula FROM funcionarios");
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Funcionários</title>
    <link rel="stylesheet" href="css\style_funcionarios.css">
</head>
<body>
    <h2>Cadastro de Funcionário</h2>

    <form>
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">Matrícula:</label><br>
        <input type="num" id="matricula" name="matricula" required><br><br>

        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf" minlength="11" maxlength="14" required><br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
