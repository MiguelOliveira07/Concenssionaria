<?php
include 'conexao.php';

// PEGAR ID DO CARRO
if (!isset($_GET['id'])) {
    die("ID do veículo não informado!");
}

$id = $_GET['id'];

// BUSCA DADOS DO VEÍCULO
$stmt = $pdo->prepare("SELECT * FROM veiculos WHERE id = :id");
$stmt->execute(['id' => $id]);
$carro = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$carro) {
    die("Veículo não encontrado!");
}

// ATUALIZAR
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $update = $pdo->prepare("
        UPDATE veiculos SET
            marca = :marca,
            modelo = :modelo,
            ano = :ano,
            cor = :cor,
            kilometragem = :km,
            preco = :preco,
            placa = :placa,
            valor_min = :valor_min,
            valor_max = :valor_max,
            descricao = :descricao,
            desconto = :desconto,
            origem = :origem,
            status = :status
        WHERE id = :id
    ");

    $update->execute([
        'marca'      => $_POST['marca'],
        'modelo'     => $_POST['modelo'],
        'ano'        => $_POST['ano'],
        'cor'        => $_POST['cor'],
        'km'         => $_POST['kilometragem'],
        'preco'      => $_POST['preco'],
        'placa'      => $_POST['placa'],
        'valor_min'  => $_POST['valor_min'],
        'valor_max'  => $_POST['valor_max'],
        'descricao'  => $_POST['descricao'],
        'desconto'   => $_POST['desconto'],
        'origem'     => $_POST['origem'],
        'status'     => $_POST['status'],
        'id'         => $id
    ]);

    echo "<script>alert('Veículo atualizado com sucesso!');</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Veículo</title>
</head>
<body>

    <h2>Editar Veículo</h2>

    <form method="POST">

        <label>Marca:</label><br>
        <input type="text" name="marca" value="<?= $carro['marca']; ?>" required><br><br>

        <label>Modelo:</label><br>
        <input type="text" name="modelo" value="<?= $carro['modelo']; ?>" required><br><br>

        <label>Ano:</label><br>
        <input type="number" name="ano" value="<?= $carro['ano']; ?>" required><br><br>

        <label>Cor:</label><br>
        <input type="text" name="cor" value="<?= $carro['cor']; ?>" required><br><br>

        <label>Kilometragem:</label><br>
        <input type="number" name="kilometragem" value="<?= $carro['kilometragem']; ?>" required><br><br>

        <label>Preço:</label><br>
        <input type="number" name="preco" value="<?= $carro['preco']; ?>" step="0.01" required><br><br>

        <label>Placa:</label><br>
        <input type="text" name="placa" value="<?= $carro['placa']; ?>" required><br><br>

        <label>Valor mínimo:</label><br>
        <input type="number" name="valor_min" value="<?= $carro['valor_min']; ?>" step="0.01"><br><br>

        <label>Valor máximo:</label><br>
        <input type="number" name="valor_max" value="<?= $carro['valor_max']; ?>" step="0.01"><br><br>

        <label>Descrição:</label><br>
        <textarea name="descricao"><?= $carro['descricao']; ?></textarea><br><br>

        <label>Desconto:</label><br>
        <input type="number" name="desconto" value="<?= $carro['desconto']; ?>" step="0.01"><br><br>

        <label>Origem:</label><br>
        <select name="origem">
            <option value="repasse" <?= $carro['origem']=='repasse'?'selected':'' ?>>Repasse</option>
            <option value="concessionaria" <?= $carro['origem']=='concessionaria'?'selected':'' ?>>Concessionária</option>
        </select><br><br>

        <label>Status:</label><br>
        <select name="status">
            <option value="disponivel" <?= $carro['status']=='disponivel'?'selected':'' ?>>Disponível</option>
            <option value="vendido" <?= $carro['status']=='vendido'?'selected':'' ?>>Vendido</option>
            <option value="avaliacao" <?= $carro['status']=='avaliacao'?'selected':'' ?>>Em avaliação</option>
        </select><br><br>

        <button type="submit">Salvar Alterações</button>
    </form>

</body>
</html>
