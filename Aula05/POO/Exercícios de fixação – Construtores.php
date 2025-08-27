<?php
class Moto {
    public $marca;
    public $modelo;
    public $cilindrada;
    public $cor;
}

$moto1 = new Moto();
$moto1->marca = "Honda";
$moto1->modelo = "CG 160";
$moto1->cilindrada = 160;
$moto1->cor = "Vermelha";

$moto2 = new Moto();
$moto2->marca = "Yamaha";
$moto2->modelo = "Fazer 250";
$moto2->cilindrada = 250;
$moto2->cor = "Azul";

$moto3 = new Moto();
$moto3->marca = "Suzuki";
$moto3->modelo = "GSX-R1000";
$moto3->cilindrada = 1000;
$moto3->cor = "Preta";

echo "Moto 1: {$moto1->marca} {$moto1->modelo}, {$moto1->cilindrada}cc, {$moto1->cor}<br>";
echo "Moto 2: {$moto2->marca} {$moto2->modelo}, {$moto2->cilindrada}cc, {$moto2->cor}<br>";
echo "Moto 3: {$moto3->marca} {$moto3->modelo}, {$moto3->cilindrada}cc, {$moto3->cor}<br>";


/*class Exemplo {

    public $dia, $mes, $ano;
    public $nome, $idade, $cpf, $telefone, $endereco, $estado_civil, $sexo;
    public $marca, $categoria, $data_fabricacao, $data_venda;
}*/

?>
