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
    <title>Catálogo</title>
    <link rel="stylesheet" href="C:\Users\999532\OneDrive - SENAC em Minas - EDU\Projetos_GitHub\Concenssionaria\css\style.css">
</head>

<body>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <header>
        <h1>Clássicos</h1>
        <nav>
            <ul>
                <li>Menu</li>
                <li>Carros</li>
                <li>Saiba mais</li>
                <li>Entre em contato</li>
            </ul>
        </nav>
    </header>
    <main>
        <!-- <div class="card">
            <img src="Imagens/Fiat-147-1.avif" alt="Fiat-147-1">
            <div>
                <h1>147 - 1976</h1>
                <p>Primeiro carro da Fiat produzido no Brasil, conhecido pela economia de combustível e seu tamanho
                    compacto.</p>
                <span>R$ 18.000,00</span>
                <button>Saiba +</button>
            </div>
        </div> -->
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>