<?php
$estoque = [];
function exibirMenu() {
    echo "\n SISTEMA DE ESTOQUE \n";
    echo "1 - Adicionar Produto\n";
    echo "2 - Remover Produto\n";
    echo "3 - Verificar Estoque\n";
    echo "4 - Listar Estoque\n";
    echo "5 - Sair\n";
    echo "Escolha uma opção: ";
    $opcao = (int)readline();
    return $opcao;
}
