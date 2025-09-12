<?php

interface Forma {
    public function calcularArea();
}

class Quadrado implements Forma {
    private $lado;

    public function __construct($lado) {
        $this->lado = $lado;
    }

    public function calcularArea() {
        return $this->lado * $this->lado;
    }
}

class Retangulo implements Forma {
    private $base, $altura;

    public function __construct($base, $altura){
        $this ->base = $base;
        $this ->altura = $altura;
    }
     public function calcularArea() {
    return $this -> base * $this -> altura;
    
    }

}




class Circulo implements Forma {
    private $raio;

    public function __construct($raio) {
        $this->raio = $raio;
    }

    public function calcularArea() {
        return pi() * ($this->raio ** 2);
    }
}
// Exemplo de uso:
$quadrado = new Quadrado(5);
echo "Área do quadrado: " . $quadrado->calcularArea() . "\n";

$circulo = new Circulo(3);
echo "Área do círculo: ". $circulo->calcularArea() . "\n";

$Retangulo = new Retangulo(6, 5);
echo "Área do Retangulo: " . $Retangulo->calcularArea() . "\n";

?>
