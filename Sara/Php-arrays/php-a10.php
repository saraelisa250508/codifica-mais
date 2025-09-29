<?php
$funcionarios = [
    ["Pedro", 2500.00, 10],
    ["Renata", 3000.00, 5],
    ["Sérgio", 2800.00, 8],
    ["Vanessa", 3200.00, 12],
    ["André", 1700.00, 0] 
];

function calcularSalarioTotal($salarioBase, $horasExtras, $valorHoraExtra) {
    return $salarioBase + ($horasExtras * $valorHoraExtra);
}

function listarFuncionarios($funcionarios) {
    $horasMes = 160;

    foreach ($funcionarios as $f) {
        $nome = $f[0];
        $salarioBase = $f[1];
        $horasExtras = $f[2];

        $valorHoraNormal = $salarioBase / $horasMes;
        $valorHoraExtra = $valorHoraNormal * 1.5;
        $salarioTotal = calcularSalarioTotal($salarioBase, $horasExtras, $valorHoraExtra);

        echo "Funcionário: $nome\n";
        echo "Salário Base: R$ " . number_format($salarioBase, 2, ",", ".") . "\n";
        echo "Horas Extras: $horasExtras\n";
        echo "Salário Total: R$ " . number_format($salarioTotal, 2, ",", ".") . "\n";
        echo "\n";
    }
}
listarFuncionarios($funcionarios);