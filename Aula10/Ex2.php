<?php
namespace Aula10;
// Classe pai
interface Animal {
    public function fazerSom();
}

// Subclasse Cachorro
class Cachorro implements Animal {
    public function fazerSom() {
        return "Au au!";
    }
}

// Subclasse Gato
class Gato implements Animal {
    public function fazerSom() {
        return "Miau!";
    }
}

// Subclasse Vaca
class Vaca implements Animal {
    public function fazerSom() {
        return "Muuu!";
    }
}

// Função para exibir o som do animal
function fazerSom(Animal $animal) {
    echo $animal->fazerSom() . PHP_EOL;
}

fazerSom(new Gato());
fazerSom(new Vaca());

?>
