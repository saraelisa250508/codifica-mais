<?php

function criarConexaoComBancoDeDados() {
    try {
        $conexaoComBanco = new PDO(
            "mysql:host=localhost;dbname=sistema_login;charset=utf8mb4",
            "root",
            "Saramaite2520*"
        );
        return $conexaoComBanco;
    } catch (PDOException $erro) {
        echo "Erro ao conectar com o banco de dados.";
        exit;
    }
}
