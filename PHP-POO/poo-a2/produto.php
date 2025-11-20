<?php

class Produto {

    private $nome;
    private $preco;
    private $quantidade;

    public function __construct($nome, $preco, $quantidade) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
    }

    public function alterarPreco($novoPreco) { //pra alterar o preço
        $this->preco = $novoPreco;
    }

    public function alterarQuantidade($novaQuantidade) {
        if ($novaQuantidade >= 0) {
            $this->quantidade = $novaQuantidade;
        } else {
            echo "Quantidade não pode ser negativa!\n";
        }
    }

    public function exibirDetalhes() {
        echo "Nome: " . $this->nome . "\n";
        echo "Preço: R$ " . $this->preco . "\n";
        echo "Quantidade: " . $this->quantidade . "\n";
    }
}

//teste

$produto = new Produto("Celular", 800, 10);

$produto->alterarPreco(900);
$produto->alterarQuantidade(4);

$produto->exibirDetalhes();
