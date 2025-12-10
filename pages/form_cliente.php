
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="../css/style_clientes.css">
</head>
<body>
    <h2>Cadastro de Cliente</h2>

    <form method='POST'>
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

<?php
// CONEXÃO AO BANCO
include 'conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Prepara a query usando os campos do formulário
    $query = "INSERT INTO clientes (
                nome, cpf, telefone, email, senha
              ) VALUES (
                :nome, :cpf, :telefone, :email, :senha
              )";

    $stmt = $pdo->prepare($query);

    // Executa a inserção
    $stmt->execute([
        'nome'     => $_POST['nome'],
        'cpf'      => $_POST['cpf'],
        'telefone' => $_POST['telefone'],
        'email'    => $_POST['email'],
        'senha'    => $_POST['senha']
    ]);

    echo "<script>alert('Cliente cadastrado com sucesso!');</script>";
}
?>

