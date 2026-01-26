<?php

$servidor = "localhost";     
$usuario  = "root";        
$senha = "Saramaite2520*"; 
$banco = "estoque_cosmeticos"; 
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
if ($conexao === false) {
    echo "Erro ao conectar com o banco de dados.";
    exit;
}

//acentos
mysqli_set_charset($conexao, "utf8");
