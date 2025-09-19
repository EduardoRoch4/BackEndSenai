<?php
   interface Atualizado {
    public function JogoAtualizado();
}




    class jogos{


    interface Instalado {
    public function JogoInstalado();
    }
        private $nome;  
        private $categoria; 
        private $ano;
        private $criador;

    // Criando construtor para a classe Jogos
    public function __construct($nome, $categoria, $ano, $criador) {
        $this->setNome($nome);
        $this->setCategoria($categoria);
        $this->setAno($ano);    
        $this->setCriador($criador);

    // Setter e Getter do $nome
    public function setNome($nome) {        
        $this->nome = ucwords(strtolower($nome));
    }
    public function getNome() {        
        return $this->nome;
    }


    }

    


    // Setter e Getter do $categoria
    public function setCategoria($categoria) {        
        $this->categoria = ucwords(strtolower($categoria));
    }
    public function getCategoria() {        
        return $this->categoria;
    }


     // Setter e Getter do $ano
    public function setAno($ano) {        
        $this->ano = abs((int)$ano); 
    }
    public function getAno() {        
        return $this->ano;
    }


    // Setter e Getter do $criador
    public function setCriador($criador) {        
        $this->criador = ucwords(strtolower($criador));
    }
    public function getCriador() {        
        return $this->criador;
    }

    // Métodos

      public function JogoAtualizado() {
        return "O jogo está atualizado.";
    }
    public function JogoInstalado(){
        return "O jogo está instalado";
    }


    // Método para exibir informações
    public function exibirInfo() {
    return "  Nome do jogo: " . $this->getNome() . 
           "\n  Categoria: " . $this->getCategoria() . 
           "\n  Ano: " . $this->getAno() . 
           "\n  Criador: " . $this->getCriador() . "\n\n";

// Criando um objeto
$jogo1 = new jogos("Fortnite","Battle Royale", "2017", "Epic Games");
$jogo2 = new jogos("Valorant","FPS", "2020", "Riot");
$jogo3 = new jogos("Need For Speed", "Corrida", "2022", "Criterion Games");
}

    
}
// Exemplo de uso:



// Exibindo as informações
echo "Jogo 1:\n" . $jogo1->exibirInfo();
echo "Jogo 2:\n" . $jogo2->exibirInfo();
echo "Jogo 3:\n" . $jogo3->exibirInfo();




// Exemplo de uso métodos:
echo $jogo1->JogoAtualizado() . "\n";
echo $jogo1->JogoInstalado() . "\n";

echo $jogo2->JogoAtualizado() . "\n";
echo $jogo2->JogoInstalado() . "\n";


echo $jogo3->JogoAtualizado() . "\n";
echo $jogo3->JogoInstalado() . "\n";


?>
