<?php
class carro{
    public $marca;
    public $modelo;
    public $ano;
    public $revisao;
    public $N_Donos;

    public function __construct($marca, $modelo, $ano, $revisao, $N_Donos)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->revisao = $revisao;
        $this->N_Donos = $N_Donos;
    }
 
    public function exibirinfo(){
        echo "Marca: $this->marca - Modelo: $this->modelo - Ano: $this->ano\n";
    }

    public function ligar() {
        echo "O carro $this->modelo está ligado.\n";
    }
}

    $carro1 = new Carro("Porsche", "911", 2020, "false", 3);
    $carro2 = new Carro("Mitsubish", "Lancer", 1945, true, 1);
    $carro3 = new Carro("Corolla", "Toyota", 2004, true, 2);
    $carro4 = new Carro("Dodge", "Ram", 2024, true, 1);
    $carro5 = new Carro("BYD", "Dolphin", 1015, false, 1);
    $carro6 = new Carro("Honda", "HB20", 2017, false, 4);

    $carro2 -> ligar ();
    $carro4 -> exibirinfo();

?>