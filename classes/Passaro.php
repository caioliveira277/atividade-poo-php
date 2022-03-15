<?php
require_once('Animal.php');

// classe derivada extendendo uma super classe, aplicando o conteceito de herança e abstração
class Passaro extends Animal {
    // definindo métodos e atributos específicos do passaro
    protected string $nome;
    protected string $corDoBico;
    
    // definindo método específico do passaro
    public function voar(): string {
        return 'Ele voou';
    }

    // implementando métodos da super classe seguindo a ideia de abstração
    public function comer(): string {
        return 'Ele comeu todo o alpiste';
    }
    public function dormir(): string {
        return 'Ele dormiu';
    }
}