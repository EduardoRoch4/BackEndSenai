<?php
class Cachorro{
    public $nome;
    public $idade;
    public $raça;
    public $castrado;
    public $sexo;

    public function __construct($nome, $idade, $raça, $castrado, $sexo)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->raça = $raça;
        $this->sexo = $sexo;
        $this->castrado = $castrado;
    }
}

$cachorro1 = new Cachorro("Pucca", "12", "shitzu", false, "femea");
$cachorro2 = new Cachorro("Hulk", "4", "Pug", true, "macho");
$cachorro3 = new Cachorro("Toor", "5", "pitbull", "true", "macho");
$cachorro4 = new Cachorro("Luna", "3", "Golden Retriever", true, "femea");
$cachorro5 = new Cachorro("Max", "2", "Bulldog Francês", false, "macho");
$cachorro6 = new Cachorro("Mel", "7", "Labrador", true, "femea");
$cachorro7 = new Cachorro("Rex", "1", "Pastor Alemão", true, "macho");
$cachorro8 = new Cachorro("Amora", "6", "Beagle", false, "femea");
$cachorro9 = new Cachorro("Jorlan", "8", "Rottweiler", true, "macho");
$cachorro10 = new Cachorro("Bela", "5", "Poodle", false, "femea");




?>