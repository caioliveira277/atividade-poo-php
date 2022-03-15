<?php
require_once('Animal.php');

// classe derivada extendendo uma super classe, aplicando o conteceito de herança e abstração
class Cachorro extends Animal {
    // definindo métodos e atributos específicos do passaro
    protected string $nome;
    protected string $corDoRosto;

    public function rosnar(): string {
        return 'Grrrrr!';
    }

    // implementando métodos da super classe seguindo a ideia de abstração
    public function comer(): string {
        return 'Ele comeu toda a ração';
    }
    public function dormir(): string {
        return 'Ele dormiu';
    }
}