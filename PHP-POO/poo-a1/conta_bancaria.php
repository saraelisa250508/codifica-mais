
<?php

class ContaBancaria {

    private $numeroConta;
    private $nomeTitular;
    private $saldo;

    public function __construct($numeroConta, $nomeTitular) {
        $this->numeroConta = $numeroConta;
        $this->nomeTitular = $nomeTitular;
        $this->saldo = 0; //esseé o saldo inicial
    }

    public function depositar($quantia) {
        $this->saldo = $this->saldo + $quantia;
    }

    public function sacar($quantia) {
        if ($quantia <= $this->saldo) { //aq que vai impedir saldo negativo
            $this->saldo = $this->saldo - $quantia;
        } else {
            echo "Saldo insuficiente para sacar R$ $quantia\n";
        }
    }

    public function exibirSaldo() {
        echo "Saldo: R$ " . $this->saldo . "\n"; //o . pra separar
    }
}

//teste saldo

$conta = new ContaBancaria("12345", "Sara Coser");

$conta->depositar(500);
$conta->sacar(200); 
$conta->sacar(400);  
$conta->exibirSaldo(); 



