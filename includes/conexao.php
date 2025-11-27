<?php
$host = "172.16.16.113";      
$usuario = "root";        
$senha = "root";              
$banco = "nome_do_banco"; 

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

echo "Conectado com sucesso!";

?>
