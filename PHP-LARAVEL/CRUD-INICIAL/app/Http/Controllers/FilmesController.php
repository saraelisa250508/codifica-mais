<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Filme;



class FilmesController
{


//list
public function index()
{
$filmes = Filme::all();
return view('filmes.index', compact('filmes'));
}








//form
public function create()
{
return view('filmes.create');
}







//salva
public function store(Request $request)
{
$request->validate([
'titulo' => 'required',
'genero' => 'required'
]);
Filme::create($request->all());

return redirect()->route('filmes.index')
->with('success', 'Filme criado com sucesso!');
}










//form. edit
public function edit($id)
{
$filme = Filme::findOrFail($id);
return view('filmes.edit', compact('filme'));
}











//atualiza
public function update(Request $request, $id)
{
$filme = Filme::findOrFail($id);

$request->validate([
'titulo' => 'required',
'genero' => 'required'
]);
$filme->update($request->all());

return redirect()->route('filmes.index')
->with('success', 'Filme atualizado!');
}







    
public function destroy($id)
{
$filme = Filme::findOrFail($id);
$filme->delete();

return redirect()->route('filmes.index')
->with('success', 'Filme excluído');
}
}
















