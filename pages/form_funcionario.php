<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Funcionários</title>
    <link rel="stylesheet" href="../css/style_funcionarios.css">
</head>
<body>
    <h2>Cadastro de Funcionário</h2>

    <form method='POST'>
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf" minlength="11" maxlength="14" required><br><br>
        
        <label for="matri">Matrícula:</label><br>
        <input type="text" id="matricula" name="matricula" required><br><br>
        
        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" minlength="6" maxlength="15" required><br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>

 <?php
 include 'conexao.php';

// prepare sql and bind parameters
$query = "INSERT INTO funcionarios (nome, cpf, matricula, senha) VALUES (:nome, :cpf, :matricula, :senha)";
$stmt = $pdo->prepare($query);
$stmt->execute([
    "nome" => $_POST["nome"],
    "cpf" => $_POST["cpf"], 
    "matricula" => $_POST["matricula"],
    "senha" => $_POST["senha"]
]);
?>