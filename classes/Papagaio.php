<?php
require_once('Passaro.php');

class Papagaio extends Passaro {
    // recebendo entrada de valores na construção da classe
    public function __construct(string $nome, float $peso, string $corPredominante, string $corDoBico, bool $filhote) {
        $this->nome = $nome;
        $this->peso = $peso;
        $this->corPredominante = $corPredominante;
        $this->corDoBico = $corDoBico;
        $this->filhote = $filhote;
    }

    // acrescentando método específico do papagaio
    public function falar(): string {
        return 'Alô Ana Maria';
    }

    // reescrevendo método aplicando o conceito de polimorfismo
    public function dormir(): string {
        return 'O papagaio dormiu';
    }
}