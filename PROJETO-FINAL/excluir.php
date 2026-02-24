<?php
require_once 'conexao.php';


// pega o id enviado pela URL
$id = $_GET['id'];
// deleta produto
$conexao = criarConexaoComBancoDeDados();


$sql = $conexao->prepare("DELETE FROM produtos WHERE id = :id");
$sql->bindValue(':id', $id);
$sql->execute();


// retorna pra home
header("Location: index.php?page=home");
exit;

