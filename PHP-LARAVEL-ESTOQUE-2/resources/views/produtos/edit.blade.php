<h1>Editar Produto</h1>


<form action="/produtos/{{ $produto->id }}" method="POST">
@csrf
@method('PUT')




Nome: <input type="text" name="nome" value="{{ $produto->nome }}"><br><br>
Preço: <input type="text" name="preco" value="{{ $produto->preco }}"><br><br>
Quantidade: <input type="text" name="quantidade" value="{{ $produto->quantidade }}"><br><br>



<button type="submit">Atualizar</button>
</form>