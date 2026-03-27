<h1>Lista de Produtos</h1>



<a href="/produtos/create">Novo Produto</a>



<ul>
@foreach ($produtos as $produto)
<li>
{{ $produto->nome }} - R$ {{ $produto->preco }} - Qtd: {{ $produto->quantidade }}



<a href="/produtos/{{ $produto->id }}/edit">Editar</a>
<form action="/produtos/{{ $produto->id }}" method="POST">
@csrf
@method('DELETE')


<button type="submit">Excluir</button>
</form>
</li>
@endforeach
</ul>