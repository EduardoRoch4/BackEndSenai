<?php

// --------- Filme ---------
class Filme {
    private $titulo;
    private $duracao;

    public function __construct($titulo, $duracao) {
        $this->titulo = $titulo;   // ✅ corrigido
        $this->duracao = $duracao;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getDuracao() {
        return $this->duracao;
    }
}

// --------- Sessão ---------
class Sessao {
    private $filme;
    private $horario;
    private $lugaresDisponiveis;

    public function __construct(Filme $filme, $horario, $lugaresDisponiveis) {
        $this->filme = $filme;
        $this->horario = $horario;
        $this->lugaresDisponiveis = $lugaresDisponiveis;
    }

    public function getFilme() {
        return $this->filme;
    }

    public function getHorario() {
        return $this->horario;
    }

    public function disponibilidade() {
        return $this->lugaresDisponiveis > 0;
    }

    public function reservarLugar() {
        if ($this->disponibilidade()) {
            $this->lugaresDisponiveis--;
            return true;
        }
        return false;
    }
}

// --------- Ingresso ---------
class Ingresso {
    private $sessao;
    private $cliente;

    public function __construct(Sessao $sessao, Cliente $cliente) {
        $this->sessao = $sessao;
        $this->cliente = $cliente;
    }

    public function getDetalhes() {
        return "Ingresso para '{$this->sessao->getFilme()->getTitulo()}' às {$this->sessao->getHorario()} - Cliente: {$this->cliente->getNome()}";
    }
}

// --------- Cliente ---------
class Cliente {
    private $nome;
    private $ingressos = [];

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function comprarIngresso(Sessao $sessao) {
        if ($sessao->reservarLugar()) {
            $ingresso = new Ingresso($sessao, $this);
            $this->ingressos[] = $ingresso;
            echo "\n{$this->nome} comprou ingresso para '{$sessao->getFilme()->getTitulo()}' às {$sessao->getHorario()}.";
        } else {
            echo "\nNão há mais lugares disponíveis para '{$sessao->getFilme()->getTitulo()}' às {$sessao->getHorario()}.";
        }
    }

    public function listarIngressos() {
        echo "\nIngressos de {$this->nome}:";
        foreach ($this->ingressos as $ingresso) {
            echo "\n- " . $ingresso->getDetalhes();
        }
    }
}

// --------- Cinema ---------
class Cinema {
    private $sessoes = [];

    public function registrarSessao(Sessao $sessao) {
        $this->sessoes[] = $sessao;
    }

    public function listarSessoes() {
        echo "\nSessões disponíveis:";
        foreach ($this->sessoes as $sessao) {
            echo "\n- Filme: {$sessao->getFilme()->getTitulo()} | Horário: {$sessao->getHorario()}";
        }
    }
}

// ----------------- CENÁRIO 6 -----------------
$filme1 = new Filme("Batman", "2h15");
$filme2 = new Filme("Vingadores", "2h40");

$sessao1 = new Sessao($filme1, "18:00", 2);
$sessao2 = new Sessao($filme2, "20:00", 1);

$cinema = new Cinema();
$cinema->registrarSessao($sessao1);
$cinema->registrarSessao($sessao2);

$cliente1 = new Cliente("João");
$cliente2 = new Cliente("Ana");

$cinema->listarSessoes();

$cliente1->comprarIngresso($sessao1);
$cliente1->comprarIngresso($sessao1); // ainda cabe
$cliente1->comprarIngresso($sessao1); // deve falhar (lotado)

$cliente2->comprarIngresso($sessao2);

$cliente1->listarIngressos();
$cliente2->listarIngressos();

?>
