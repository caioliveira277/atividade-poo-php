<?php

abstract class Animal {
    protected float $peso;
    protected string $cor;

    public function __construct(float $peso, string $cor) {
        $this->peso = $peso;
        $this->cor = $cor;
    }

    public function dormir(): string {
        return 'O animal dormiu';
    }

    public function comer(): string {
        return 'O animal comeu';
    } 
}