<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // Aqui eu defino quais campos podem ser preenchidos pelo formulário
    // Isso é importante pra segurança (evita inserir qualquer coisa no banco)
    protected $fillable = [
        'nome',
        'preco',
        'quantidade',
        'categoria_id'
    ];

    // Relacionamento: um produto pertence a uma categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}