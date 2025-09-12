<?php
// Polimorfismo com Interface:
namespace Aula10;
interface Mover {
    public function mover();
}

class Carro implements Mover {
    public function mover() {
        return "O carro está andando";
    }
}

class Aviao implements Mover {
    public function mover() {
        return "O avião está voando";
    }
}

class Barco implements Mover {
    public function mover() {
        return "O barco está navegando";
    }
}

class Elevador implements Mover {
    public function mover() {
        return "O elevador está subindo e descendo.";
    }
}

// Exemplo de uso:
$Carro = new Carro();
echo $Carro->mover() . "\n";

$Aviao = new Aviao();
echo $Aviao->mover() . "\n";

$Barco = new Barco();
echo $Barco->mover() . "\n";

$Elevador = new Elevador();
echo $Elevador->mover() . "\n";
?>
