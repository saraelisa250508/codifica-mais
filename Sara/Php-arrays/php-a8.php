<?php
function aplicarDesconto($valorCompra, $percentualDesconto) {
    return $valorCompra - ($valorCompra * $percentualDesconto / 100);
}

function calcularDescontoProgressivo($valorCompra) {
    if ($valorCompra < 100) {
        $desconto = 0;
    } elseif ($valorCompra <= 500) {
        $desconto = 10;
    } else { 
        $desconto = 20;
    }

    return aplicarDesconto($valorCompra, $desconto);
}
$valorCompra = (float)readline("Digite o valor da compra: R$ ");
$valorFinal = calcularDescontoProgressivo($valorCompra);

echo "Valor final após desconto: R$ " . number_format($valorFinal, 2) . "\n";