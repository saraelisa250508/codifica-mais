<?php
// get pega o id 
$id = $_GET['id'];

// busca o produto pelo id
$sql = "SELECT * FROM produtos WHERE id = $id";
$resultado = mysqli_query($conexao, $sql);

// transforma o resultado em array(pesquisar +)
$produto = mysqli_fetch_assoc($resultado);
?>

<div class="formulario">
<h2>Editar Produto</h2>

<form action="index.php?page=atualizar" method="post">


<input type="hidden" name="id" value="<?= $produto['id'] ?>">



<label>Nome:</label>
<input type="text" name="nome" value="<?= $produto['nome'] ?>" required>



<label>Quantidade:</label>
<input type="number" name="quantidade" value="<?= $produto['quantidade'] ?>" required>



<label>Preço:</label>
<input type="number" name="preco" step="0.01" value="<?= $produto['preco'] ?>" required>

    <div class="botoes">
        <button type="submit">Atualizar</button>
        <a href="index.php?page=home" class="botao botao-cinza">Cancelar</a>
    </div>
</form>
</div>






