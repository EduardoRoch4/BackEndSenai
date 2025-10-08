<?php

// --------- Itens da Biblioteca ---------
abstract class ItemBiblioteca {
    protected $titulo;

    public function __construct($titulo) {
        $this->titulo = $titulo;
    }

    public function getDescricao() {
        return $this->titulo;
    }
}

class Livro extends ItemBiblioteca {}
class Revista extends ItemBiblioteca {}

// --------- Usuário ---------
abstract class Usuario {
    protected $nome;
    protected $emprestimos = [];

    public function __construct($nome) {
        $this->nome = $nome;
    }

    abstract public function getLimite();

    public function emprestar(ItemBiblioteca $item) {
        if (count($this->emprestimos) < $this->getLimite()) {
            $this->emprestimos[] = $item;
            echo "\n{$this->nome} emprestou: {$item->getDescricao()}";
        } else {
            echo "\n{$this->nome} atingiu o limite de empréstimos!";
        }
    }

    public function listarEmprestimos() {
        echo "\nItens emprestados por {$this->nome}:";
        foreach ($this->emprestimos as $item) {
            echo "\n- " . $item->getDescricao();
        }
    }
}

class Aluno extends Usuario {
    public function getLimite() {
        return 3;
    }
}

class Professor extends Usuario {
    public function getLimite() {
        return 5;
    }
}

// --------- Biblioteca ---------
class Biblioteca {
    private $usuarios = [];

    public function registrarUsuario(Usuario $usuario) {
        $this->usuarios[] = $usuario;
    }

    public function getUsuarios() {
        return $this->usuarios;
    }
}

// ----------------- CENÁRIO 5 -----------------

$livro1 = new Livro("Dom Casmurro");
$livro2 = new Livro("O Pequeno Príncipe");
$revista1 = new Revista("Revista Ciência Hoje");

$aluno = new Aluno("Carlos");
$professor = new Professor("Maria");

$aluno->emprestar($livro1);
$aluno->emprestar($revista1);
$aluno->emprestar($livro2);
$aluno->emprestar(new Livro("Extra - Deve falhar")); // ultrapassa limite

$professor->emprestar($livro1);
$professor->emprestar($revista1);

$aluno->listarEmprestimos();
$professor->listarEmprestimos();

?>
