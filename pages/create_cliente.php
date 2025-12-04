<?php
// CONEXÃO AO BANCO
include 'conexao.php';
// CONSULTA AO BANCO
$stmt = $pdo->query("SELECT Id_funcionarios, Nome, Cpf, matrícula FROM funcionarios");
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="../css/style_clientes.css">
</head>
<body>
    <h2>Cadastro de Cliente</h2>

    <form>
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="cpf">CPF (PK):</label><br>
        <input type="text" id="cpf" name="cpf" minlength="11" maxlength="14" required><br><br>

        <label for="telefone">Telefone:</label><br>
        <input type="tel" id="telefone" name="telefone" required><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
