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
    <button type="submit">Salvar</button>
    <a href="index.php?page=home" class="botao botao-cinza">Voltar</a>
    </div>
</form>
</div>














