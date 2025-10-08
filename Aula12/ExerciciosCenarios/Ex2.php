<?php

// Interface Atividade
interface Atividade {
    public function executar();
}

// --------- Atividades específicas ---------
class Treinamento implements Atividade {
    private $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function executar() {
        echo "\nRealizando treinamento: {$this->nome}";
    }

    public function getNome() {
        return $this->nome;
    }
}

class Doacao implements Atividade {
    private $descricao;

    public function __construct($descricao) {
        $this->descricao = $descricao;
    }

    public function executar() {
        echo "\nRealizando doação: {$this->descricao}";
    }

    public function getDescricao() {
        return $this->descricao;
    }
}

// --------- Localidade ---------
class Localidade {
    private $nome;
    private $atividades = [];

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function adicionarAtividade(Atividade $atividade) {
        $this->atividades[] = $atividade;
    }

    public function getNome() {
        return $this->nome;
    }

    public function informarAtividades() {
        echo "\nAtividades disponíveis em {$this->nome}:";
        foreach ($this->atividades as $atividade) {
            $atividade->executar();
        }
    }
}

// --------- Herói ---------
class Heroi {
    private $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function visitar(Localidade $localidade) {
        echo "\n{$this->nome} está visitando {$localidade->getNome()}";
        $localidade->informarAtividades();
    }

    public function executarAtividade(Atividade $atividade) {
        echo "\n{$this->nome} está executando atividade:";
        $atividade->executar();
    }
}

// --------- Exemplo do cenário ---------
$treinamentoCotil = new Treinamento("Treinamento especial no Cotil");
$doacaoShopping = new Doacao("Doação de brinquedos às crianças no shopping");

// Localidades
$cotil = new Localidade("Cotil");
$cotil->adicionarAtividade($treinamentoCotil);

$shopping = new Localidade("Shopping");
$shopping->adicionarAtividade($doacaoShopping);

// Heróis
$batman = new Heroi("Batman");
$superman = new Heroi("Superman");
$spiderman = new Heroi("Homem-Aranha");

// Missão
$batman->visitar($cotil);
$superman->visitar($cotil);
$spiderman->visitar($cotil);

echo "\n";

$batman->visitar($shopping);
$superman->visitar($shopping);
$spiderman->visitar($shopping);

echo "\n";
?>
