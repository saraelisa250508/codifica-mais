<?php

function calcularDesconto($valor_original, $desconto_porcentagem) {
    $valor_desconto = $valor_original * ($desconto_porcentagem / 100);
    $valor_final = $valor_original - $valor_desconto;
    return $valor_final;
}

$valor_original = 200;
$desconto = 15;

$valor_final = calcularDesconto($valor_original, $desconto);

$dados = [
    "valor_original" => $valor_original,
    "desconto"       => $desconto,
    "valor_final"    => $valor_final
];

echo "Valor original: R$ " . $dados["valor_original"] . "\n";
echo "Desconto: " . $dados["desconto"] . "%\n";
echo "Valor final com desconto: R$ " . $dados["valor_final"] . "\n";