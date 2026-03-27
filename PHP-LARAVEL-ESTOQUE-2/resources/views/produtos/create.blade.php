<h1>Cadastrar Produto</h1>
<form action="/produtos" method="POST">
@csrf



Nome: <input type="text" name="nome"><br><br>
Preço: <input type="text" name="preco"><br><br>
Quantidade: <input type="text" name="quantidade"><br><br>



<button type="submit">Salvar</button>
</form>