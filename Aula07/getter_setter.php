<?php

// Criando a Classe Pessoa
class Pessoa {
    private $nome;
    private $cpf;
    private $telefone;
    private $idade;
    private $email;
    private $senha;

    // Criando construtor para a classe Pessoa
    public function __construct($nome, $cpf, $telefone, $idade, $email, $senha) {
        $this->setNome($nome);
        $this->setCpf($cpf);
        $this->setTelefone($telefone);
        $this->setIdade($idade);
        $this->email = $email;
        $this->senha = $senha;
    }

    // Setter e Getter do $nome
    public function setNome($nome) {        
        $this->nome = ucwords(strtolower($nome));
    }
    public function getNome() {        
        return $this->nome;
    }

    // Setter e Getter do $cpf
    public function setCpf($cpf) {        
        $this->cpf = preg_replace('/\D/', '', $cpf); // mantém apenas números
    }
    public function getCpf() {        
        return $this->cpf;
    }

    // Setter e Getter do $telefone
    public function setTelefone($telefone) {
        $this->telefone = preg_replace('/\D/', '', $telefone);
    }
    public function getTelefone() {        
        return $this->telefone;
    }

    // Setter e Getter da $idade
    public function setIdade($idade) {
        $this->idade = abs((int)$idade); // impede idades negativas
    }
    public function getIdade() {        
        return $this->idade;
    }

    // Getter do $email
    public function getEmail() {
        return $this->email;
    }

    // Método para exibir informações
    public function exibirInfo() {
        return "Nome do aluno: " . $this->getNome() . 
               "\nCPF: " . $this->getCpf() . 
               "\nTelefone: " . $this->getTelefone() . 
               "\nIdade: " . $this->getIdade() . 
               "\nEmail: " . $this->getEmail();
    }
}

// Criando um objeto
$aluno1 = new Pessoa("EduARdO rOcHA","061.419.011-82", "(19) 97110-9429", -19, "eduardofake386@gmail.com", "Teste123");

// Exibindo as informações
echo "O aluno:\n" . $aluno1->exibirInfo();
