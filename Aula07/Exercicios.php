<?php


// ______________xExercicio 1. Criação básica______________
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







// ______________Exercicio 2. Pessoa com atributos______________
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




// ______________Exercicio 3. Validação em setter______________
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


?>
