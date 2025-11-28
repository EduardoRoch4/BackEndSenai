<?php
require_once __DIR__ . '/../Model/Livro.php';
require_once __DIR__ . '/../Model/connection.php';

class BibliotecaDAO {

    private $conn;

    public function __construct() {
        $this->conn = Connection::getInstance();
    }

// CREATE
public function criarLivro(Livro $livro) {
    // Primeiro verifica se já existe um livro com esse título
    $sqlCheck = "SELECT COUNT(*) FROM livros WHERE titulo = :titulo";
    $stmtCheck = $this->conn->prepare($sqlCheck);
    $stmtCheck->execute([':titulo' => $livro->getTítulo()]);
    $existe = $stmtCheck->fetchColumn();

    if ($existe > 0) {
        // Aqui você pode lançar uma exceção ou apenas retornar false
        throw new Exception("Já existe um livro com o título '{$livro->getTítulo()}'!");
    }

    // Se não existe, insere normalmente
    $sql = "INSERT INTO livros (titulo, genero_literario, autor, ano_publicacao, qtde)
            VALUES (:titulo, :genero, :autor, :ano, :qtde)";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
        ':titulo' => $livro->getTítulo(),
        ':genero' => $livro->getGênero_Literario(),
        ':autor'  => $livro->getAutor(),
        ':ano'    => $livro->getAno_publicacao(),
        ':qtde'   => $livro->getQtde()
    ]);
}


    // READ
    public function lerLivros() {
        $stmt = $this->conn->query("SELECT * FROM livros ORDER BY titulo");

        $livros = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $livros[] = new Livro(
                $row['titulo'],
                $row['autor'],
                $row['ano_publicacao'],
                $row['genero_literario'],
                $row['qtde']
            );
        }

        return $livros;
    }

    // UPDATE
    public function atualizarLivro($tituloOriginal, $tituloNovo, $genero, $autor, $ano, $qtde) {

        $sql = "UPDATE livros SET 
                    titulo = :novo,
                    genero_literario = :genero,
                    autor = :autor,
                    ano_publicacao = :ano,
                    qtde = :qtde
                WHERE titulo = :original";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':novo'      => $tituloNovo,
            ':genero'    => $genero,
            ':autor'     => $autor,
            ':ano'       => $ano,
            ':qtde'      => $qtde,
            ':original'  => $tituloOriginal
        ]);
    }

    // DELETE
    public function excluirLivro($titulo) {

        $sql = "DELETE FROM livros WHERE titulo = :titulo";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute([':titulo' => $titulo]);
    }

    // BUSCAR POR TÍTULO
    public function buscarPorTitulo($titulo) {

        $stmt = $this->conn->prepare("SELECT * FROM livros WHERE titulo = :titulo LIMIT 1");
        $stmt->execute([':titulo' => $titulo]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Livro(
                $row['titulo'],
                $row['autor'],
                $row['ano_publicacao'],
                $row['genero_literario'],
                $row['qtde']
            );
        }

        return null;
    }
}
