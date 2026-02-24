<?php
function criarConexaoComBancoDeDados() {
    $host = "localhost";
    $usuario = "root";
    $senha = "Saramaite2520*";
    $banco = "sistema_cosmeticos";

    return new PDO(
        "mysql:host=$host;dbname=$banco;charset=utf8",
        $usuario,
        $senha,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] //tive q adicionar pq tava dando erro
    );
}








