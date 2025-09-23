<?php
echo "Digite o ano que você nasceu: ";
$ano = (int) readline();

$anoAtual = date(2025);
$idade = $anoAtual - $ano;

echo "Você tem $idade anos.\n";
?>