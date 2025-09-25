<?php
$temperatura = 25;    
$unidade = "C";   

if ($unidade == "C") {
    $convertida = ($temperatura * 9/5) + 32;
    $nova_unidade = "F";
} else {
    $convertida = ($temperatura -32) *5/9;
    $nova_unidade = "C";
}

$dados = [
    "temperatura_original" => $temperatura,
    "unidade_original"     => $unidade,
    "temperatura_convertida" => $convertida,
    "nova_unidade"         => $nova_unidade
];

echo "Temperatura: " . $dados["temperatura_original"] . "°" . $dados["unidade_original"] . "\n";
echo "Temperatura convertida: " . $dados["temperatura_convertida"] . "°" . $dados["nova_unidade"] . "\n";