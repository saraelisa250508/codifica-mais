<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    // LISTAR produtos
    public function index()
    {
        $produtos = Produto::all();

        return view('produtos.index', compact('produtos'));
    }

    // MOSTRAR FORMULÁRIO
    public function create()
    {
        return view('produtos.create');
    }

    // SALVAR no banco
    public function store(Request $request)
    {
        Produto::create($request->all());

        return redirect('/produtos');
    }

    // FORMULÁRIO DE EDITAR
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);

        return view('produtos.edit', compact('produto'));
    }

    // ATUALIZAR
    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $produto->update($request->all());

        return redirect('/produtos');
    }

    // EXCLUIR
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect('/produtos');
    }
}
