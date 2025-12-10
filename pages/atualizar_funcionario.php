<?php
include 'conexao.php';

// Verifica se veio um ID na URL
if (!isset($_GET['id'])) {
    die("ID do funcionário não informado!");
}

$id = $_GET['id'];

// BUSCAR DADOS DO FUNCIONÁRIO
$stmt = $pdo->prepare("SELECT * FROM funcionarios WHERE Id_funcionarios = :id");
$stmt->execute(['id' => $id]);
$func = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$func) {
    die("Funcionário não encontrado!");
}

// ATUALIZAR NO BANCO
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $update = $pdo->prepare("
        UPDATE funcionarios SET 
            Nome = :nome,
            Cpf = :cpf,
            Matricula = :matricula,
            Senha = :senha
        WHERE Id_funcionarios = :id
    ");

    $update->execute([
        'nome'      => $_POST['nome'],
        'cpf'       => $_POST['cpf'],
        'matricula' => $_POST['matricula'],
        'senha'     => $_POST['senha'],
        'id'        => $id
    ]);

    echo "<script>alert('Funcionário atualizado!');</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Funcionário</title>
</head>
<body>

    <h2>Editar Funcionário</h2>

    <form method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= $func['Nome']; ?>" required><br><br>

        <label>CPF:</label><br>
        <input type="text" name="cpf" value="<?= $func['Cpf']; ?>" required><br><br>

        <label>Matrícula:</label><br>
        <input type="text" name="matricula" value="<?= $func['Matricula']; ?>" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" value="<?= $func['Senha']; ?>" required><br><br>

        <button type="submit">Salvar Alterações</button>
    </form>

</body>
</html>
