<?php
include "conexao.php";

// recebe os dados do formulário
$id = $_POST['id'];
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];

// atualiza o produto no banco
$sql = "UPDATE produtos 
 SET nome='$nome', quantidade=$quantidade, preco=$preco 
 WHERE id=$id";

mysqli_query($conexao, $sql);
// volta pra home
header("Location: index.php?page=home");
exit;


