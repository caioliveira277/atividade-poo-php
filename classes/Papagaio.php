<?php
require_once('Passaro.php');

class Papagaio extends Passaro {
    public function __construct(string $nome, float $peso, string $cor, string $bico, bool $filhote) {
        $this->nome = $nome;
        $this->peso = $peso;
        $this->cor = $cor;
        $this->bico = $bico;
        $this->filhote = $filhote;
    }

    public function saberFalar(): string {
        return 'Ele sabe falar';
    }

    public function dormir(): string {
        return 'O papagaio dormiu';
    }
}