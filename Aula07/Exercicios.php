<?php

// ===================================================================
//                     Exercicio 1. Criação básica
// ===================================================================

// class Carro {
//     private $marca;
//     private $modelo;

//     // Construtor que usa os setters
//     public function __construct($marca, $modelo) {
//         $this->setMarca($marca);
//         $this->setModelo($modelo);
//     }

//     // Setter e Getter da $marca
//     public function setMarca($marca) {        
//         $this->marca = $marca;
//     }

//     public function getMarca() {        
//         return $this->marca;
//     }

//     // Setter e Getter da $modelo
//     public function setModelo($modelo) {        
//         $this->modelo = $modelo;
//     }

//     public function getModelo() {        
//         return $this->modelo;
//     }


//      // Método para exibir informações
//     public function exibirInfo() {
//         return "Marca do carro: " . $this->getMarca() . 
//                "\nModelo do carro: " . $this->getModelo();
//     }


// }

// // Criando um objeto
// $carro1 = new Carro("Le car","Le car 459 ");

// // Exibindo as informações
// echo "O carro:\n" . $carro1->exibirInfo();






// ===================================================================
//                     Exercicio 2. Pessoa com atributos
// ===================================================================

// class Pessoa {
//     private $nome;
//     private $idade;
//     private $email;

//     // Criando construtor para a classe Pessoa
//     public function __construct($nome, $idade, $email) {
//         $this->setNome($nome);
//         $this->setIdade($idade);
//         $this->email = $email;
//     }

//     // Setter e Getter do $nome
//     public function setNome($nome) {        
//         $this->nome = ucwords(strtolower($nome));
//     }
//     public function getNome() {        
//         return $this->nome;
//     }


//     // Setter e Getter da $idade
//     public function setIdade($idade) {        
//         $this->idade = abs((int)$idade); // impede idades negativas
//     }
//     public function getIdade() {        
//         return $this->idade;
//     }


//     // Setter e Getter do $email
//     public function setEmail($email) {        
//         $this->email = abs((int)$email); 
//     }
//     public function getEmail() {
//         return $this->email;
//     }

//     // Método para exibir informações
//     public function exibirInfo() {
//         return "O nome é " . $this->getNome() . 
//                ", tem " . $this->getIdade() . 
//                 " e o email é " . $this->getEmail();

//     }
// }
//   // Criando um objeto
//     $pessoa1 = new Pessoa("Samuel", 22, "samuel@exemplo.com" );

// // Exibindo as informações
// echo "Pessoa 01:\n" . $pessoa1->exibirInfo();



// ===================================================================
//                     Exercicio 3. Validação em setter
// ===================================================================

// class Aluno {
//     private $nome;
//     private $nota;


//  // Criando construtor para a classe Aluno
//     public function __construct($nome, $nota) {
//         $this->setNome($nome);
//         $this->setNota($nota);
//     }



//     // Setter e Getter do $nome
//     public function setNome($nome) {        
//         $this->nome = ucwords(strtolower($nome));
//     }
//     public function getNome() {        
//         return $this->nome;
//     }


// // Setter e Getter do $nota
//     public function setNota($nota) {        

//         if($nota < 0) {
//             $this -> nota = 0;
//         } elseif($nota > 10){
//             $this -> nota = 10;
//         } else {
//             $this ->nota = $nota;
//         }
//     }

//     public function getNota() {        
//         return $this->nota;
//     }

//     // Método para exibir informações
//     public function exibirInfo() {
//         return "Nome aluno: " . $this->getNome() . 
//                "\nNota:" . $this->getNota(); 

//     }
// }
//   // Criando um objeto
//     $Aluno1 = new Aluno("Eduardo", 10);

// // Exibindo as informações
// echo "Aluno -\n" . $Aluno1->exibirInfo();





// ===================================================================
//                        Exercicio 4 - Encapsulamento de Produto
// ===================================================================
// class Produto {
//     // Atributos privados
//     private $nome;
//     private $preco;
//     private $estoque;

//     // ======== SETTERS ========
//     public function setNome($nome) {
//         $this->nome = ucfirst(strtolower($nome)); // Primeira letra maiúscula
//     }

//     public function setPreco($preco) {
//         // Verifica se o preço é positivo
//         if ($preco >= 0) {
//             $this->preco = $preco;
//         } else {
//             $this->preco = 0;
//         }
//     }

//     public function setEstoque($estoque) {
//         // Verifica se o estoque é maior ou igual a zero
//         if ($estoque >= 0) {
//             $this->estoque = $estoque;
//         } else {
//             $this->estoque = 0;
//         }
//     }

//     // ======== GETTERS ========
//     public function getNome() {
//         return $this->nome;
//     }

//     public function getPreco() {
//         return $this->preco;
//     }

//     public function getEstoque() {
//         return $this->estoque;
//     }
// }

// // ======== TESTE DO OBJETO ========

// // Criando um produto
// $produto1 = new Produto();

// // Definindo os valores usando setters
// $produto1->setNome("Notebook");
// $produto1->setPreco(3500.50);
// $produto1->setEstoque(12);

// // Exibindo informações com getters
// echo "O produto " . $produto1->getNome() . " custa R$ " . $produto1->getPreco() .
//      " e possui " . $produto1->getEstoque() . " unidades em estoque.\n";





// ===================================================================
//                        ATV 5 - CLASSE FUNCIONARIO
// ===================================================================
// class Funcionario {
//     // Atributos privados
//     private $nome;
//     private $salario;

//     // ======== SETTERS ========
//     public function setNome($nome) {
//         $this->nome = ucfirst(strtolower($nome)); // Primeira letra maiúscula
//     }

//     public function setSalario($salario) {
//         // Garantir que o salário seja positivo
//         if ($salario >= 0) {
//             $this->salario = $salario;
//         } else {
//             $this->salario = 0;
//         }
//     }

//     // ======== GETTERS ========
//     public function getNome() {
//         return $this->nome;
//     }

//     public function getSalario() {
//         return $this->salario;
//     }
// }

// // ======== TESTE DO OBJETO ========

// // Criando um funcionário
// $func = new Funcionario();

// // Definindo valores iniciais
// $func->setNome("Carlos");
// $func->setSalario(2500);

// // Exibindo os valores iniciais
// echo "Funcionário: " . $func->getNome() . " - Salário: R$ " . $func->getSalario() . "\n";

// // ======== ALTERANDO DADOS ========

// // Modificando nome e salário
// $func->setNome("Roberta");
// $func->setSalario(3200);

// // Exibindo os valores modificados
// echo "Funcionário: " . $func->getNome() . " - Salário: R$ " . $func->getSalario() . "\n";



?>
