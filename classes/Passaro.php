<?php
require_once('Animal.php');

class Passaro extends Animal {
    protected string $nome;
    protected string $bico;
    protected bool $filhote;

    public function __construct(string $nome, float $peso, string $cor, string $bico, bool $filhote) {
        $this->nome = $nome;
        $this->peso = $peso;
        $this->cor = $cor;
        $this->bico = $bico;
        $this->filhote = $filhote;
    }

    public function voar(): string {
        return 'Ele voou';
    }
}