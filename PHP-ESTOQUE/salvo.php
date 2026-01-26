<?php
include "conexao.php"; 


$nome = $_POST['nome']; // post recebe os dados enviados pelo formulário
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];



// comando sql pra inserir um novo produto
$sql = "INSERT INTO produtos (nome, quantidade, preco) 
        VALUES ('$nome', $quantidade, $preco)";


// executa o comando no banco de dados
mysqli_query($conexao, $sql);


// redireciona pra pag inicial dps de salvar
header("Location: index.php?page=home");
exit;





