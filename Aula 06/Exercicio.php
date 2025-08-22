<?php
class Produtos{
    public $nome;
    public $categoria;
    public $fornecedor;
    public $qtde_estoque;



}
$iogurte1 = new Produtos();
$iogurte1 ->nome = "Danone";
$iogurte1 ->categoria = "Lacteos";
$iogurte1 ->fornecedor = "Nestle";
$iogurte1 ->qtde_estoque = 100;

$Refrigerante1 = new Produtos();
$Refrigerante1 ->nome = "Coca-Cola";
$Refrigerante1 ->categoria = "Bebida";
$Refrigerante1 ->fornecedor = "Coca-Cola Company";
$Refrigerante1 ->qtde_estoque = 100;

$bolacha1 = new Produtos();
$bolacha1 ->nome = "Nikito";
$bolacha1 ->categoria = "Doces";
$bolacha1 ->fornecedor = "Votarella";
$bolacha1 ->qtde_estoque = 220;



?>



