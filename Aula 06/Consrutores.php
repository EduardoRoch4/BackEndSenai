<?php

class Produtos {
    public $nome;
    public $categoria;
    public $fornecedor;
    public $qtde_estoque;
    
    // Constructor with the correct syntax
    public function __construct($nome, $categoria, $fornecedor, $qtde_estoque) {
        $this->nome = $nome;
        $this->categoria = $categoria;
        $this->fornecedor = $fornecedor;
        $this->qtde_estoque = $qtde_estoque;
    }

    // Implement the produto_vendido method
    public function produto_vendido($quantidade) {
        if ($this->qtde_estoque >= $quantidade) {
            $this->qtde_estoque -= $quantidade;
            return "Venda realizada! Estoque restante: " . $this->qtde_estoque;
        } else {
            return "Estoque insuficiente!";
        }
    }
}

// Creating instances of Produtos with parameters
$bolacha1 = new Produtos("Nikito", "Doces", "Votarella", 220);
$feijao1 = new Produtos("Oltran", "Mantimentos", "Reserva nobre", 123);

// Example of using the produto_vendido method
echo $bolacha1->produto_vendido(50); // Output: Venda realizada! Estoque restante: 170

?>
