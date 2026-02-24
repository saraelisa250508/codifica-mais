<?php

class Funcionario {

    private $nome;
    private $cargo;
    private $salario;

    public function __construct($nome, $cargo, $salario) {
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->salario = $salario;
    }

    public function alterarCargo($novoCargo) {
        $this->cargo = $novoCargo;
    }

    public function alterarSalario($novoSalario) {
        if ($novoSalario >= 0) {
            $this->salario = $novoSalario;
        } else {
            echo "Salário não pode ser negativo!\n";
     }
    }

    public function exibirDetalhes() {
        echo "Nome: $this->nome\n";
        echo "Cargo: $this->cargo\n";
        echo "Salário: R$ $this->salario\n";
    }
}

//teste
$funcionario = new Funcionario("Sara", "Atendente", 2000);
$funcionario->alterarCargo("Gerente");
$funcionario->alterarSalario(2500);
$funcionario->exibirDetalhes();
