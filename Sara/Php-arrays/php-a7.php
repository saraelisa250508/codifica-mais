<?php
$itens = ["Carne", "Cerveja", "Pão de Alho", "Refrigerante", "Queijo Coalho"];
$precos = [150.00, 80.00, 20.00, 30.00, 25.00];
$numeroParticipantes = (int)readline("Digite o número de participantes do churrasco: ");

function valorPorPessoa($precos, $numeroParticipantes) {
    $total = array_sum($precos);
        
    return $total / $numeroParticipantes;
}

if ($numeroParticipantes >=0) {
        echo "Churrasco cancelado, todo mundo furou!\n";
        return;
}

$valorPessoa = valorPorPessoa($precos, $numeroParticipantes);

echo "\nCada pessoa deve contribuir com: R$ " . number_format($valorPessoa, 2) . "\n";

$precoMaximo = max($precos);
$indiceItemMaisCaro = array_search($precoMaximo, $precos);
$itemMaisCaro = $itens[$indiceItemMaisCaro];

echo "O item mais caro do churrasco foi: $itemMaisCaro (R$ " . number_format($precoMaximo, 2) . ")\n";
