<?php

// Interface Atividade
interface Atividade {
    public function executar();
}

// --------- Atividades específicas ---------
class Chuva implements Atividade {
    public function executar() {
        echo "\nEstá chovendo forte no caminho...";
    }
}

class Amor implements Atividade {
    public function executar() {
        echo "\nOs personagens demonstram amor uns aos outros para superar as dificuldades.";
    }
}

class Celebracao implements Atividade {
    public function executar() {
        echo "\nEles celebram juntos comendo em harmonia após a jornada!";
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
        echo "\nAtividades que acontecem em {$this->nome}:";
        foreach ($this->atividades as $atividade) {
            $atividade->executar();
        }
    }
}

// --------- Personagem ---------
class Personagem {
    private $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function visitar(Localidade $localidade) {
        echo "\n{$this->nome} está na jornada passando por {$localidade->getNome()}";
        $localidade->informarAtividades();
    }
}

// --------- Exemplo do cenário ---------

// Atividades da jornada
$chuva = new Chuva();
$amor = new Amor();
$celebracao = new Celebracao();

// Localidade
$jornada = new Localidade("Jornada Fantástica");
$jornada->adicionarAtividade($chuva);
$jornada->adicionarAtividade($amor);
$jornada->adicionarAtividade($celebracao);

// Personagens
$john = new Personagem("John Snow");
$smurf = new Personagem("Papai Smurf");
$deadpool = new Personagem("Deadpool");
$dexter = new Personagem("Dexter");

// A jornada dos personagens
$john->visitar($jornada);
$smurf->visitar($jornada);
$deadpool->visitar($jornada);
$dexter->visitar($jornada);

echo "\n";
?>
