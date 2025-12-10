<?php
include 'conexao.php';

// PEGAR CPF PELA URL
if (!isset($_GET['cpf'])) {
    die("CPF não informado!");
}

$cpf = $_GET['cpf'];

// BUSCA DADOS DO CLIENTE
$stmt = $pdo->prepare("SELECT * FROM clientes WHERE cpf = :cpf");
$stmt->execute(['cpf' => $cpf]);
$cli = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$cli) {
    die("Cliente não encontrado!");
}

// ATUALIZAR CLIENTE
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $update = $pdo->prepare("
        UPDATE clientes SET
            nome = :nome,
            telefone = :telefone,
            email = :email,
            senha = :senha
        WHERE cpf = :cpf
    ");

    $update->execute([
        'nome'     => $_POST['nome'],
        'telefone' => $_POST['telefone'],
        'email'    => $_POST['email'],
        'senha'    => $_POST['senha'],
        'cpf'      => $cpf
    ]);

    echo "<script>alert('Cliente atualizado com sucesso!');</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>

    <h2>Editar Cliente</h2>

    <form method="POST">

        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= $cli['nome']; ?>" required><br><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone" value="<?= $cli['telefone']; ?>" required><br><br>

        <label>E-mail:</label><br>
        <input type="email" name="email" value="<?= $cli['email']; ?>" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" value="<?= $cli['senha']; ?>" required><br><br>

        <button type="submit">Salvar Alterações</button>
    </form>

</body>
</html>
