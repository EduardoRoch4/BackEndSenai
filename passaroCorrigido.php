<?php
namespace Passaros;

class Passaro {
    private $especies;
    private $cor;
    private $habitat;
    private $alimentacao;
    private $estado_conservacao;
    private $som;
    private $genero;

    public function __construct($especies, $cor, $habitat, $alimentacao, $estado_conservacao, $som, $genero) {
        $this->setEspecies($especies);
        $this->setCor($cor);
        $this->setHabitat($habitat);
        $this->setAlimentacao($alimentacao);
        $this->setEstadoConservacao($estado_conservacao);
        $this->setSom($som);
        $this->setGenero($genero);
    }

    public function setEspecies($especies) { $this->especies = $especies; }
    public function getEspecies() { return $this->especies; }

    public function setCor($cor) { $this->cor = $cor; }
    public function getCor() { return $this->cor; }

    public function setHabitat($habitat) { $this->habitat = $habitat; }
    public function getHabitat() { return $this->habitat; }

    public function setAlimentacao($alimentacao) { $this->alimentacao = $alimentacao; }
    public function getAlimentacao() { return $this->alimentacao; }

    public function setEstadoConservacao($estado_conservacao) { $this->estado_conservacao = $estado_conservacao; }
    public function getEstadoConservacao() { return $this->estado_conservacao; }

    public function setSom($som) { $this->som = $som; }
    public function getSom() { return $this->som; }

    public function setGenero($genero) { $this->genero = $genero; }
    public function getGenero() { return $this->genero; }

    public function cantar() {
        return (($this->getGenero() == "masculino") ? "O " : "A ") . $this->getEspecies() . " está cantando: " . $this->getSom() . "\n";
    }

    public function mostrarinfo() {
        return "Espécie: " . $this->getEspecies() .
            "\nCor: " . $this->getCor() .
            "\nHabitat: " . $this->getHabitat() .
            "\nAlimentação: " . $this->getAlimentacao() .
            "\nEstado de Conservação: " . $this->getEstadoConservacao() .
            "\nSom: " . $this->getSom() . "\n";
    }

    public function comer() {
        return (($this->getGenero() == "masculino") ? "O " : "A ") . $this->getEspecies() . " está comendo: " . $this->getAlimentacao() . "\n";
    }
}

class AveExotica extends Passaro {
    private $origem;

    public function __construct($especies, $cor, $habitat, $alimentacao, $estado_conservacao, $som, $genero, $origem) {
        parent::__construct($especies, $cor, $habitat, $alimentacao, $estado_conservacao, $som, $genero);
        $this->origem = $origem;
    }

    public function cantar() {
        return "A ave " . $this->getEspecies() . " canta diferente: " . $this->getSom() . "\n";
    }

    public function comer(): string {
        return "A ave exótica está comendo: " . $this->getAlimentacao() . "\n";
    }

    public function getOrigem() {
        return $this->origem;
    }
}

$papagaio = new AveExotica(
    "Papagaio",
    "Verde com detalhes vermelhos",
    "Floresta tropical",
    "Frutas e sementes",
    "Pouco preocupante",
    "curió-curió",
    "masculino",
    "Amazônia"
);

echo $papagaio->cantar();
echo $papagaio->comer();
echo "Origem: " . $papagaio->getOrigem();
