<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">



<title>Lista de Filmes - Netflix</title>

<style>
body { font-family: sans-serif; margin: 20px; }
table { width: 100%; border-collapse: collapse; }
th, td { 
padding: 8px; 
border: 1px solid #7a0000; 
text-align: left; 
}

.btn { 
padding: 4px 8px; 
background: #000000; 
color: white;
text-decoration: none; 
}


</style>




</head>
<body>

<h1>Filmes</h1>

<a href="{{ route('filmes.create') }}" class="btn" style="background: green;">+ Adicionar Filme</a>

<br><br>
<table>
<thead>
<tr>



<th>ID</th>
<th>Título</th>
<th>Gênero</th> 
<th>Ações</th>


</tr>
</thead>
<tbody>

@foreach($filmes as $filme)
<tr>
<td>{{ $filme->id }}</td>
<td>{{ $filme->titulo }}</td>
<td>{{ $filme->genero }}</td>
<td>



<a href="{{ route('filmes.edit', $filme->id) }}" class="btn">Editar</a>
<form action="{{ route('filmes.destroy', $filme->id) }}" method="POST" style="display:inline;">
@csrf
@method('DELETE')



<button type="submit" class="btn" style="background:red;border:none;cursor:pointer;">
Excluir
</button>

</form>


</td>
</tr>
@endforeach



</tbody>
</table>
</body>
</html>