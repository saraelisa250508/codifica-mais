<?php
$notasAlunos = [
 [8.5, 6.0, 7.8, 9.2, 5.5], // Aluno 1
 [7.0, 8.0, 6.5, 7.5, 8.5], // Aluno 2
 [6.5, 7.5, 4.5, 5.5, 7.0], // Aluno 3
 [5.0, 4.6, 7.8, 9.0, 6.0] // Aluno 4
];
function calcularMedia($notas) {
    $soma = array_sum($notas); 
    $quantidade = count($notas); 
    return $soma / $quantidade; 
}

$aprovados = 0;
$reprovados = 0;

foreach ($notasAlunos as $indice => $notas) {
    $media = calcularMedia($notas);

    if ($media >= 7.0) {
        echo "Aluno " . ($indice + 1) . " - Média: " . number_format($media, 2) . "Aprovado<br>";
        $aprovados++;
    } else {
        echo "Aluno " . ($indice + 1) . " - Média: " . number_format($media, 2) . "Reprovado<br>";
        $reprovados++;
    }
}

echo "<br>Total de aprovados: $aprovados<br>";
echo "Total de reprovados: $reprovados<br>";
