<?php
require_once 'conexao.php';

// cria a conexão PDO
$conexao = criarConexaoComBancoDeDados();

// recebe os dados do formulário
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];

// prepara o insert
$sql = $conexao->prepare(
    "INSERT INTO produtos (nome, quantidade, preco)
     VALUES (:nome, :quantidade, :preco)"
);

// liga os valores
$sql->bindValue(':nome', $nome);
$sql->bindValue(':quantidade', $quantidade);
$sql->bindValue(':preco', $preco);

// executa
$sql->execute();

// volta pra home
header("Location: index.php?page=home");
exit;



