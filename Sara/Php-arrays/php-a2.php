<?php
$largura = 5;
$altura  = 3;

$area      = $largura * $altura;
$perimetro = 2 * ($largura + $altura);

$dados = [
    "largura"   => $largura,
    "altura"    => $altura,
    "area"      => $area,
    "perimetro" => $perimetro
];

echo "Largura: " . $dados["largura"] . " metros\n";
echo "Altura: " . $dados["altura"] . " metros\n";
echo "Área: " . $dados["area"] . " m²\n";
echo "Perímetro: " . $dados["perimetro"] . " metros\n";