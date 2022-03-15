<?php

// classe abstrata aplicando o conceito de abstração
abstract class Animal {
    // métodos protegidos aplicando o conceito de encapsulamento (somente classes derivdadas têm acesso)
    protected float $peso;
    protected string $corPredominante;
    protected bool $filhote;

    // métodos abstratos para definir que as classes derivadas implemente-os
    protected abstract function dormir(): string;

    protected abstract function comer(): string;


    // difinindo método para obter valores de atributos não visíveis externamente, conceito de encapsulamento
    public function __get($nome) {
        return $this->{$nome};
    }

    // metodo set para definir valores dos atributos não visíveis
    public function __set($nome, $valor) {
        $this->{$name} = $valor;
    }
}