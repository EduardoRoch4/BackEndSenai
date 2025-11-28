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

public function criar($titulo, $autor, $ano, $genero, $qtde) {
    try {
        $livro = new Livro($titulo, $autor, $ano, $genero, $qtde);
        $this->dao->criarLivro($livro);
        return "Livro cadastrado com sucesso!";
    } catch (Exception $e) {
        return "Erro ao cadastrar: " . $e->getMessage();
    }
}


    // UPDATE
    public function atualizar($tituloAntigo, $tituloNovo, $autor, $ano, $genero, $qtde) {
    try {
        $this->dao->atualizarLivro($tituloAntigo, $tituloNovo, $genero, $autor, $ano, $qtde);
        return "Livro atualizado com sucesso!";
    } catch (Exception $e) {
        return "Erro ao atualizar: " . $e->getMessage();
    }
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
