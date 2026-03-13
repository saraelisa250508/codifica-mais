<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Editar Filme</title>



<style>
body { font-family: Arial, sans-serif; margin: 40px; }
.form-group { margin-bottom: 15px; }
label { display: block; margin-bottom: 5px; }
input { width: 250px; padding: 6px; }


button {
padding: 6px 12px;
background: blue;
color: white;
border: none;
cursor: pointer;
}



 </style>
</head>
<body>
<h1>Editar Filme</h1>
<form action="{{ route('filmes.update', $filme->id) }}" method="POST">

@csrf
@method('PUT')





<div class="form-group">
<label>Título:</label>
<input type="text" name="titulo" value="{{ $filme->titulo }}" required>
</div>





<div class="form-group">
<label>Gênero:</label>
<input type="text" name="genero" value="{{ $filme->genero }}">
</div>
<button type="submit">Atualizar Filme</button>



</form>
</body>
</html>