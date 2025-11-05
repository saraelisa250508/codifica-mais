<?php
$peso = readline ("Digite seu peso");
$altura = readline ("Digite sua altura em metros. Exemplo:1.65");
$imc = $peso/($altura*$altura);

$dados = [
    "peso" => $peso,
    "altura" => $altura,
    "IMC" => $imc

];
echo "peso: " . $dados["peso"];
echo "altura: " . $dados["altura"];
echo "IMC: " . $dados["IMC"] . " peso/(altura*altura)";