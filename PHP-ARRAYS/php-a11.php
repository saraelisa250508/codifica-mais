<?php

$estoque = [];

$estoque[] = [
    'nome' => 'Calça',
    'tamanho' => 'P',
    'cor' => 'Preta',
    'quantidade' => 1
];





function exibirMenu(&$estoque) {
    $opcao = 0;   
    do {
       echo "\nMenu do Estoque\n";
        echo "1 - Adicionar produto\n";
      echo "2 - Vender produto\n";
        echo "3 - Verificar estoque\n";
        echo "4 - Listar estoque\n";
        echo "5 - Sair\n";
        $opcao = readline("Escolha um número de 1 a 5: ");
        if ($opcao == 1) {
            adicionarProduto($estoque);
        }
       if ($opcao == 2) {
            $codigo = readline("Digite o código do produto: ");
            $quantidade = readline("Digite a quantidade vendida: ");
            venderProduto($estoque, $codigo, $quantidade);
        }
        if ($opcao == 3) {
            $codigo = readline("Digite o código do produto que deseja verificar: ");
            verificarEstoque($estoque, $codigo);
        }
        if ($opcao == 4) {
            listarEstoque($estoque);
        }
       if ($opcao == 5) {
            echo "Saindo do sistema... Até logo!\n";
       } elseif ($opcao < 1 or $opcao > 5) {
            echo "Opção inválida! Tente novamente.\n";
        }
    } while ($opcao != 5);
}

exibirMenu($estoque);






function adicionarProduto(&$estoque) {
   $codigo = readline("Digite o código: ");
  $nomeProduto = readline("Digite o nome do produto: ");
    $tamanho = readline("Digite o tamanho que deseja: ");
    $cor = readline("Digite a cor que deseja: ");
    $quantidade = readline("Digite a quantidade que deseja: ");
    $produto = [
      'nome' => $nomeProduto,
      'tamanho' => $tamanho,
        'cor' => $cor,
        'quantidade' => $quantidade
    ];
    $estoque[$codigo] = $produto;
    echo "Produto adicionado com sucesso!\n";
}
function venderProduto(&$estoque, $codigo, $quantidade) {
    if (!isset($estoque[$codigo])) {
        echo "Produto não encontrado no estoque.";
        return;
    }
    if ($estoque[$codigo]['quantidade'] < $quantidade) {
        echo "Quantidade indisponível.";
        return;
    }
    $estoque[$codigo]['quantidade'] -= $quantidade;
    if ($estoque[$codigo]['quantidade'] == 0) { 
        unset($estoque[$codigo]);
        echo "Produto esgotado e removido do estoque.\n";
    } else {
        echo "Venda realizada com sucesso!\n";
    }
}






function verificarEstoque($estoque, $codigo) {
    if (isset($estoque[$codigo])) {
        $quantidade = $estoque[$codigo]['quantidade'];

        if ($quantidade > 0) {
            echo "O produto " . $estoque[$codigo]['nome'] . " está disponível.\n"; //aula 03 do primeiro curso de php: o pontinho serve pra juntar strings em só uma. (anotar no caderno)
            echo "Quantidade em estoque: " . $quantidade . "\n";
        } else {
            echo "O produto " . $estoque[$codigo]['nome'] . " está esgotado no momento.\n";
        }
    } else {
        echo "Produto não encontrado no estoque.\n";
    }
}




function listarEstoque($estoque) {
  if (empty($estoque)) {
  echo "O estoque está vazio.\n";
        return;
    }
  echo "Lista de produtos no estoque:\n";
  foreach ($estoque as $codigo => $produto) {
  echo "Código: " . $codigo . " | Nome: " . $produto['nome'] . 

 " | Quantidade: " . $produto['quantidade'] . "\n";
    };
}

