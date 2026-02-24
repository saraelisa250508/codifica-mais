<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cadastrar Produto</title>
<link rel="stylesheet" href="style-estoque.css">
</head>
<body class="estoque">

<header>
<h1>Controle de Estoque de Cosméticos</h1>
    <nav>
    <a href="index.php?page=home">Início</a>
  <a href="index.php?page=cadastrar">Cadastrar Produto</a>
</nav>
</header>

<main>
<div class="formulario">
<h2>Cadastrar Produto</h2>

<form action="index.php?page=salvo" method="post">

    <label>Nome:</label>
    <input type="text" name="nome" required>

    <label>Quantidade:</label>
    <input type="number" name="quantidade" min="0" required>

    <label>Preço:</label>
    <input type="number" name="preco" step="0.01" min="0" required>

    <div class="botoes">
    <button type="submit" class="botao">Salvar</button>
     <a href="index.php?page=home" class="botao botao-cinza">Voltar</a>

    </div>
    </form>
    </div>
    </main>

<footer>
<p> Sistema de Controle de Estoque - Sara Elisa</p>
</footer>
</body>
</html>







