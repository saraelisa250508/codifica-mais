<?php
include "conexao.php";

// pega o id enviado pela URL
$id = $_GET['id'];

// deleta produto
$sql = "DELETE FROM produtos WHERE id=$id";
mysqli_query($conexao, $sql);

// retorna para a home
header("Location: index.php?page=home");
exit;





