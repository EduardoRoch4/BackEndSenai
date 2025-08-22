<?php
class usuario{
    public $nome;
    public $CPF;
    public $sexo;
    public $Email;
    public $EstadoCivil;
    public $Cidade;
    public $Estado;
    public $Endereco;
    public $Cep;

    public function __construct($nome, $CPF, $sexo, $Email, $EstadoCivil, $Cidade, $Estado, $Endereco, $Cep)
    {
        $this->nome = $nome;
        $this->CPF = $CPF;
        $this->sexo = $sexo;
        $this->Email = $Email;
        $this->EstadoCivil = $EstadoCivil;
        $this->Cidade = $Cidade;
        $this->Estado = $Estado;
        $this->Endereco = $Endereco;
        $this->Cep = $Cep;

    }
    public function TestandoReservista() {
        if ($this -> sexo == "Masculino"){
            echo "Apresente o seu certificado de reservista\n";
        } else {
            echo "Tudo certo\n";
        }
    }

public function Casamento($anos_casado) {
        if ($this -> EstadoCivil == "Casado"){
            echo "Parabéns pelo seu casamento de $anos_casado anos!\n";
        } else {
            echo "Oloco\n";
        }
}
}

$usuario1 = new usuario("Josenildo Afonso Souza", "100.200.300-40", "Masculino", "josenewdo.souza@gmail.com","Solteiro", "Xique-Xique", "Bahia", "Rua da amizade, 99", "40123-98" );
$usuario2 = new usuario("Valentina Passos Scherrer", "070.070.060-70", "Feminino", "scherrer.valen@outlook.com","Divorciada", "Iracemápolis", "São Paulo", "Avenida da saudade, 1942", "23456-24" );
$usuario3 = new usuario("Claudio Braz Nepumoceno", "575.575.242-32", "Masculino", "Clauclau.nepumoceno@gmail.com","Casado", "Piripiri", "Piauí", "Estrada 3, 33", "12345-99" );

$usuario1 -> TestandoReservista ();
$usuario2 -> TestandoReservista ();
$usuario3 -> Casamento (3);
$usuario2 -> Casamento (2);



?>