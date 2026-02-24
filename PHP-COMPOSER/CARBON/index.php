<?php
require 'vendor/autoload.php';

use Carbon\Carbon;

echo "Digite sua data de nascimento (AAAA-MM-DD): ";
$data = trim(readline());

$nascimento = Carbon::createFromFormat('A-m-d', $data);

$hoje = Carbon::now();

$idade = $nascimento->diffInYears($hoje); // diffin é difernça

$diasDeVida = $nascimento->diffInDays($hoje);

$diaSemana = $nascimento->format('l');//o 1 é onome completo do dia semana

$proximoAniversario = $nascimento->year($hoje->year);

if ($proximoAniversario->lessThan($hoje)) { // nao esquecer..o lessthan é pra considerar q é menor q.. 
    $proximoAniversario->addYear();
}

$diasParaAniversario = $hoje->diffInDays($proximoAniversario);

echo "\nRESULTADOS\n";
echo "Idade: $idade\n";
echo "Dias de vida: $diasDeVida\n";
echo "Você nasceu em um(a): $diaSemana\n";
echo "Faltam $diasParaAniversario.\n";


