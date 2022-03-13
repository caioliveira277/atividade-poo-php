<?php
require_once('Passaro.php');

class Avestruz extends Passaro {
    public function __construct(string $nome, float $peso, string $cor, string $bico, bool $filhote) {
        $this->nome = $nome;
        $this->peso = $peso;
        $this->cor = $cor;
        $this->bico = $bico;
        $this->filhote = $filhote;
    }

    public function saberFalar(): string {
        return 'Ele não sabe falar';
    }

    public function voar(): string {
        return 'ele não sabe voar';
    }

    public function enterrarCabeca(): string {
        return 'Ele enterrou a cabeça no chão';
    }
}