<?php
// Polimorfismo com Interface:
namespace Aula10;
interface Movel {
    public function mover();
}



interface Abastecivel {
    public function abastecer($quantidade);
}


interface Manutenivel {
    public function fazerManutencao();
}


class Carro implements Movel, Abastecivel  {
    public function mover() {
        return "O carro está andando";
    }
    public function abastecer($quantidade){
        return "O carro está com $quantidade abastecida";
    }  
}

class Bicicleta implements Movel, Manutenivel {
    public function mover() {
        return "O avião está voando";
    }
    public function fazerManutencao(){
        return "A bicicleta foi lubrificada";
    }  
}

class Onibus implements Movel, Abastecivel, Manutenivel{
    public function mover() {
        return "O ônibus está transportando passageiros.";
    }
    public function abastecer($quantidade){
        return "O ônibus está com $quantidade abastecida";
    }
    public function fazerManutencao(){
        return "O ônibus está passando por revisão";
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
