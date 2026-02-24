<?php

class ContaBancaria {

    protected $numeroConta;
    protected $titular;
    protected $saldo; //os protect que estao no exercicio

    public function __construct($titular, $saldoInicial = 0) { //aq é o construtor do exerc

        if ($saldoInicial < 0) {
            echo "Erro:o saldo inicial não pode ser negativo, saldo foi para 0.\n";
            $saldoInicial = 0; // não deixa criar com saldo menor que 0
        }

        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    public function getNumeroConta() { //tem q usar get
        return $this->numeroConta;
    }

    public function getTitular() {
        return $this->titular;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function depositar($valor) { //até aq, é oq tava no exercicio de get
        if ($valor < 0) {
            echo "Erro: depósito inválido, valor é negativo.\n";
            return;
        }

        $this->saldo += $valor; //soma
        echo "Depósito de R$ $valor foi realizado\n";
    }

    public function sacar($valor) { //validar com echo se $valor menor 0 (exercicio)
 
        if ($valor < 0) {
            echo "Erro: o valor não pode ser negativo.\n";
            return false;
        }

        if ($valor > $this->saldo) {
            echo "Erro: saldo insuficiente para sacar.\n";
            return false;
        }

        $this->saldo -= $valor; //menos
        echo "Saque de R$ $valor realizado.\n";
        return true;
    }

    public function exibirSaldo() {
        echo "Conta: $this->numeroConta  Titular: $this->titular  Saldo: R$ $this->saldo\n"; //tbm especificado no exerciicio
    }
}





class ContaCorrente extends ContaBancaria {
    private const TAXA_SAQUE = 3.50;
    private const TAXA_TRANSFERENCIA = 1.50;

    public function __construct($titular, $saldoInicial = 0)
{
    parent::__construct($titular, $saldoInicial);
    $this->numeroConta = self::gerarNumeroConta();
}

public static function gerarNumeroConta()
{
    $numero = rand(10000000, 99999999); // 8 díg
    $digito = rand(0, 9);
    return $numero . "-" . $digito; //deu certo os n° com a - !!
}


 public function sacar($valor) {
        $valorTotal = $valor + self::TAXA_SAQUE; //self= essa classe..
        echo "Sacar R$ $valor com taxa de R$ " . self::TAXA_SAQUE . " (Total: R$ $valorTotal)...\n";
        return parent::sacar($valorTotal);
    }



    public function transferirDinheiro($contaDestino, $valor) {
        $valorComTaxa = $valor + self::TAXA_TRANSFERENCIA; //nao sao 2 +, só 1
        echo "Transferindo R$ $valor (Taxa: R$ " . self::TAXA_TRANSFERENCIA. ", Total: R$ $valorComTaxa)\n";

        if (parent::sacar($valorComTaxa)) { //parent é pra chamar método da pai
     return parent::depositar($valor); 

    } else {
    echo "Transferência cancelada pois o saldo insuficiente.\n";
    return false;
}


    $contaDestino->depositar($valor);
        echo "Transferência de R$ $valor realizada com sucesso!\n";
        return true;
    }
}



class ContaPoupanca extends ContaBancaria {
    protected $porcentagemRendimento = 0.01; //pra ser 1%

    public function __construct($titular, $saldoInicial = 0) {
        parent::__construct($titular, $saldoInicial);
        $this->numeroConta = self::gerarNumeroConta();
    }

    public static function gerarNumeroConta() {
    $numero = rand(100000, 999999); //6 dig
    $digito = rand(0, 9);

    return $numero . "-" . $digito; //que nem o professor disse
}


    public function getPorcentagemRendimento() { //get pega
        return $this->porcentagemRendimento;
    }

    public function setPorcentagemRendimento($novoValor) { //set altera
        if ($novoValor < 0) {
            echo "Erro:não pode usar um rendimento negativo.\n";
            return;                                            //acho q aqui n tem mais nada depois??
        }
        $this->porcentagemRendimento = $novoValor;
    }


    public function aplicarRendimento() {
        $rendimento = $this->saldo * $this->porcentagemRendimento; //um pouco de duvida aq, errei  muitas vezes!!
        $this->saldo += $rendimento;

        echo "Rendimento aplicado: R$ $rendimento\n";
    }
}



echo "\nTeste 1: Criar contas\n";
$contaCorrente = new ContaCorrente("Nubia", 1000);
$contaPoupanca = new ContaPoupanca("Sara", -50); // é pra ser 0



echo "\n Teste 2: n° das contas\n";
echo "Conta Corrente: " . $contaCorrente->getNumeroConta()."\n";
echo "Conta Poupança: " . $contaPoupanca->getNumeroConta()."\n";





echo "\n Teste 3: Movimentações na poupança\n";
$contaPoupanca->depositar(300);
$contaPoupanca->sacar(50);
$contaPoupanca->exibirSaldo();




echo "\n Teste 4: Saque e transferência na corrente\n";
$contaCorrente->sacar(100);
$contaCorrente->transferirDinheiro($contaPoupanca, 200);


echo "\n Teste 5: Testando rendimento da poupança\n";
$contaPoupanca->exibirSaldo();
$contaPoupanca->setPorcentagemRendimento(0.05);
$contaPoupanca->aplicarRendimento();
$contaPoupanca->exibirSaldo();
