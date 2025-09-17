<?php
namespace Aula10;
    
// Classe abstrata
abstract class Transporte {
    // Método abstrato (todas as classes filhas devem implementar)
    abstract public function mover();
}

// Classe Carro
class Carro extends Transporte {
    public function mover() {
        return "O carro está andando na estrada";
    }
}

// Classe Barco
class Barco extends Transporte {
    public function mover() {
        return "O barco está navegando no mar";
    }
}

// Classe Avião
class Aviao extends Transporte {
    public function mover() {
        return "O avião está voando no céu";
    }
}

// Classe Elevador
class Elevador extends Transporte {
    public function mover() {
        return "O elevador está correndo pelo prédio";
    }
}

// Testando
$transportes = [
    new Carro(),
    new Barco(),
    new Aviao(),
    new Elevador()
];

foreach ($transportes as $t) {
    echo $t->mover() . "<br>";
}
