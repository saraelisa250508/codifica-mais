<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Editar Produto</title>
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
    <?php
    // get pega o id 
    $id = $_GET['id'];

    // busca o produto pelo id
    require_once 'conexao.php';
    $conexao = criarConexaoComBancoDeDados();
    
    $sql = $conexao->prepare("SELECT * FROM produtos WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    // transforma o resultado em array(pesquisar +)
    $produto = $sql->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="formulario">
    <h2>Editar Produto</h2>

    <form action="index.php?page=atualizar" method="post">

        <input type="hidden" name="id" value="<?= $produto['id'] ?>">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required>

        <label>Quantidade:</label>
        <input type="number" name="quantidade" value="<?= $produto['quantidade'] ?>" min="0" required>

        <label>Preço:</label>
        <input type="number" name="preco" value="<?= $produto['preco'] ?>" step="0.01" min="0" required>

        <div class="botoes">
        <button type="submit" class="botao">Salvar Alterações</button>
        <a href="index.php?page=home" class="botao botao-cinza">Cancelar</a>

        </div>
        </form>
        </div>
        </main>
        
       <footer>
<p> Sistema de Controle de Estoque - Sara Elisa</p>
</footer>
</body>
</html>


