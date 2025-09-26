<?php
$estoque = [
    ["Bermuda", 59.9, 6],   // Produto 1
    ["Camisa", 89.9, 5],    // Produto 2
    ["Sapato", 179.9, 10],  // Produto 3
    ["Calça", 99.9, 7]      // Produto 4
];

$valorTotalEstoque = 0;

foreach ($estoque as $produto) {
    $nome = $produto[0];
    $preco = $produto[1];
    $quantidade = $produto[2];

    $valorProduto = $preco * $quantidade;
    $valorTotalEstoque += $valorProduto;
}

echo "Valor total do estoque: R$ " . number_format($valorTotalEstoque, 2, ",", ".") . "\n";