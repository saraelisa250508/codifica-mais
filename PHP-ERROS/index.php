<?php
session_start();
include "conexao.php"; 


// get pega informaçoes
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Controle de Estoque</title>
<link rel="stylesheet" href="style.css">
</head>
<body>



<header>
    <h1>Controle de Estoque de Cosméticos</h1>
    <nav>
 <a href="index.php?page=home">Início</a>
<a style="text-decoration: none; color: black;" href="index.php?page=cadastrar">Cadastrar Produto</a>
    </nav>
</header>

<main>
<?php
// decide qual pag carregar com base no get
if ($page == 'home') {
include "home.php";
}
elseif ($page == 'cadastrar') {
include "cadastrar.php";
}
elseif ($page == 'editar') {
include "editar.php";
}
elseif ($page == 'salvo') {
include "salvo.php";
}
elseif ($page == 'atualizar') {
include "atualizar.php";
}
elseif ($page == 'excluir') {
include "excluir.php";
}
else {
    echo "<p>Página não encontrada.</p>";
}
?>
</main>
<footer>

<p>Sistema de Controle de Estoque - Sara Elisa</p>

</footer>
</body>
</html>