<?php

// Interface para os eventos do ciclo
interface Evento {
    public function executar(Pessoa $pessoa);
}

// --------- Eventos ---------
class Nascimento implements Evento {
    public function executar(Pessoa $pessoa) {
        echo "\n{$pessoa->getNome()} nasceu e começou sua jornada na Terra.";
    }
}

class Crescimento implements Evento {
    public function executar(Pessoa $pessoa) {
        echo "\n{$pessoa->getNome()} está crescendo e aprendendo novas habilidades.";
    }
}

class Escolha implements Evento {
    private $descricao;

    public function __construct($descricao) {
        $this->descricao = $descricao;
    }

    public function executar(Pessoa $pessoa) {
        echo "\n{$pessoa->getNome()} fez uma escolha importante: {$this->descricao}.";
    }
}

class DoacaoSangue implements Evento {
    public function executar(Pessoa $pessoa) {
        echo "\n{$pessoa->getNome()} doou sangue para ajudar outras pessoas.";
    }
}

// --------- Ciclo da Vida ---------
class Ciclo {
    private $eventos = [];

    public function adicionarEvento(Evento $evento) {
        $this->eventos[] = $evento;
    }

    public function executar(Pessoa $pessoa) {
        echo "\n--- Iniciando ciclo de vida de {$pessoa->getNome()} ---";
        foreach ($this->eventos as $evento) {
            $evento->executar($pessoa);
        }
        echo "\n--- Fim do ciclo de vida de {$pessoa->getNome()} ---\n";
    }
}

// --------- Pessoa ---------
class Pessoa {
    private $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }
}

// ----------------- CENÁRIO 4 -----------------

// Criando os eventos da vida
$nascimento = new Nascimento();
$crescimento = new Crescimento();
$escolha1 = new Escolha("estudar para ser médico");
$escolha2 = new Escolha("ajudar a família");
$doacao = new DoacaoSangue();

// Ciclo da vida
$ciclo = new Ciclo();
$ciclo->adicionarEvento($nascimento);
$ciclo->adicionarEvento($crescimento);
$ciclo->adicionarEvento($escolha1);
$ciclo->adicionarEvento($escolha2);
$ciclo->adicionarEvento($doacao);

// Pessoa
$pessoa = new Pessoa("Ana");

// Executa o ciclo
$ciclo->executar($pessoa);

?>
