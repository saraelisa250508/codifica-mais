<?php
$valordaconta = readline("Digite o valor da conta");
$porcentagem = readline("Digite a porcentagem");

$gorjeta = ($valordaconta * $porcentagem)/100;
$total = ($valordaconta + $gorjeta);

echo "Valor total = ($total)";
