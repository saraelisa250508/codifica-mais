<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
//cria a tabela
public function up(): void
{
Schema::create('produtos', function (Blueprint $table) {
$table->id(); // id automático

//nome do produto
$table->string('nome');

//preço do produto
$table->decimal('preco', 10, 2);

//quantidade em estoque
$table->integer('quantidade');

//pracategoria
$table->unsignedBigInteger('categoria_id')->nullable();

$table->timestamps(); 
});
}

//remover tabela
public function down(): void
{
Schema::dropIfExists('produtos');
}
};
