<?php
require_once __DIR__ . '/../Model/BibliotecaDAO.php';
require_once __DIR__ . '/../Model/Livro.php';

class BibliotecaController {

    private $dao;

    public function __construct() {
        $this->dao = new BibliotecaDAO();
    }

    // READ
    public function ler() {
        return $this->dao->lerLivros();
    }

    // CREATE
    public function criar($titulo, $autor, $ano, $genero, $qtde) {
        $livro = new Livro($titulo, $autor, $ano, $genero, $qtde);
        $this->dao->criarLivro($livro);
    }

    // UPDATE
    public function atualizar($tituloAntigo, $tituloNovo, $autor, $ano, $genero, $qtde) {
        $this->dao->atualizarLivro($tituloAntigo, $tituloNovo, $genero, $autor, $ano, $qtde);
    }

    // DELETE
    public function deletar($titulo) {
        $this->dao->excluirLivro($titulo);
    }

    // BUSCAR
    public function buscarPorTitulo($titulo)
{
    return $this->dao->buscarPorTitulo($titulo);
}

}
