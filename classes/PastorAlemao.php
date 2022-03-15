<?php
require_once('Cachorro.php');

class PastorAlemao extends Cachorro {
    // recebendo entrada de valores na construção da classe
    public function __construct(string $nome, float $peso, string $corPredominante, string $corDoRosto, bool $filhote) {
        $this->nome = $nome;
        $this->peso = $peso;
        $this->corPredominante = $corPredominante;
        $this->corDoRosto = $corDoRosto;
        $this->filhote = $filhote;
    }

    // acrescentando método específico do pastor alemão
    public function latir(): string {
        return 'AuAu AuAu!';
    }

    // reescrevendo método aplicando o conceito de polimorfismo
    public function dormir(): string {
        return 'O pastor alemão dormiu';
    }
}