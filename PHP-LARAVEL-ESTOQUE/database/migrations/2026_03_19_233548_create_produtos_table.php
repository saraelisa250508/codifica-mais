<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration //o migation aq
{






public function up(): void
{
Schema::create('produtos', function (Blueprint $table) { //blueprint é a planta da tabela
$table->id();
$table->string('nome');
$table->decimal('preco', 10, 2);
$table->integer('quantidade');
$table->unsignedBigInteger('categoria_id'); //unsigned..= número int grande positivo
$table->timestamps();





//chave estrangeira
$table->foreign('categoria_id')
->references('id')
->on('categorias')
->onDelete('cascade'); //cascade apaga prod. junto com categoria
});
}



public function down(): void
{
Schema::dropIfExists('produtos'); // deleta tabela
}
};
