<?php

class Livro {

    private $Título;
    private $Autor;
    private $Ano_publicacao;
    private $Gênero_Literario;
    private $qtde;

    public function __construct($Título, $Autor, $Ano_publicacao, $Gênero_Literario, $qtde) {
        $this->Título = $Título;
        $this->Autor = $Autor;
        $this->Ano_publicacao = $Ano_publicacao;
        $this->Gênero_Literario = $Gênero_Literario;
        $this->qtde = $qtde;
    }

    public function getTítulo() { return $this->Título; }
    public function getAutor() { return $this->Autor; }
    public function getAno_publicacao() { return $this->Ano_publicacao; }
    public function getGênero_Literario() { return $this->Gênero_Literario; }
    public function getQtde() { return $this->qtde; }

    public function setTítulo($v) { $this->Título = $v; }
    public function setAutor($v) { $this->Autor = $v; }
    public function setAno_publicacao($v) { $this->Ano_publicacao = $v; }
    public function setGênero_Literario($v) { $this->Gênero_Literario = $v; }
    public function setQtde($v) { $this->qtde = $v; }
}
