<?php
require_once 'conexao.php';

// recebe os dados do formulário
$id = $_POST['id'];//post recebe info.
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];



// atualiza o produto no banco
$conexao = criarConexaoComBancoDeDados();
$sql = $conexao->prepare(
    "UPDATE produtos 
     SET nome = :nome, quantidade = :quantidade, preco = :preco 
     WHERE id = :id"
);





$sql->bindValue(':id', $id);
$sql->bindValue(':nome', $nome);
$sql->bindValue(':quantidade', $quantidade);
$sql->bindValue(':preco', $preco);

$sql->execute();

// volta pra home
header("Location: index.php?page=home");
exit;


