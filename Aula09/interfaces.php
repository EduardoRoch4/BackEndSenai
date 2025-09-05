<?php
// namespace Aula09;

// interface pagamento{
//     public function pagar($valor);
// }



// class cartaoDeCredito implements pagamento{
//     public function pagar ($valor){
//         echo "pagamento realizado com cartão de crédito, valor $valor\n";

//     }
// }

// class Pix implements pagamento{
//     public function pagar ($valor){
//         echo "pagamento realizado com o pix, valor $valor\n";
//     }
// }




//================================================
//        Interface com um quadrado e círculo
//================================================

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

class Circulo implements Forma {
    private $raio;

    public function __construct($raio) {
        $this->raio = $raio;
    }

    public function calcularArea() {
        return pi() * ($this->raio ** 2);
    }
}


class Pentagono implements Forma {
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




?>