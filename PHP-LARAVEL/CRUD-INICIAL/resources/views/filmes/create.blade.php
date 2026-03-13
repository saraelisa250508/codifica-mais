<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">



<title>Cadastrar Filme</title>


<style>
body { 
font-family: Arial, sans-serif; 
margin: 40px; 
}

.form-group { 
margin-bottom: 15px; 
}

label { 
display: block; 
margin-bottom: 5px;
}

input { 
width: 250px; 
padding: 5px; 
}

button { 
padding: 6px 12px; 
background: green; 
color: white; 
border: none;
}




</style>
</head>
<body>




<h1>Novo Filme</h1>
<form action="{{ route('filmes.store') }}" method="POST"> 
@csrf




<div class="form-group">
<label>Título:</label>
<input type="text" name="titulo" required>
</div>




<div class="form-group">
<label>Gênero:</label>
<input type="text" name="genero">
</div>




<button type="submit">Salva Filme</button>
<a href="{{ route('filmes.index') }}">Voltar</a>
</form>
</body>
 </html>