    <?php
    $carros = [
        [
            "modelo" => "Versa",
            "marca" => "Nissan",
            "ano" => 2020,
            "revisao" => true,
            "ndonos" => 2
        ],
        [
            "modelo" => "M5",
            "marca" => "BMW",
            "ano" => 2018,
            "revisao" => false,
            "ndonos" => 2
        ],
        [
            "modelo" => "911",
            "marca" => "Porsche",
            "ano" => 2026,
            "revisao" => false,
            "ndonos" => 1
        ],
        [
            "modelo" => "Dolphin",
            "marca" => "BYD",
            "ano" => 2023,
            "revisao" => false,
            "ndonos" => 1
        ]
    ];


    // Exercicio 1 – Função para exibir dados do carro
    function exibirCarro($modelo, $marca, $ano, $revisao, $ndonos) {
        $revisaoStr = $revisao ? "Sim" : "Não";
        echo "O carro $marca $modelo, ano $ano, já passou por revisão: $revisaoStr, número de donos: $ndonos\n";
    }

    // Exercício 2 – Função que verifica se o carro é seminovo

    function ehSeminovo($ano) {
        $ano_atual = (int)date("Y");
        $idade = $ano_atual - $ano;
        return $idade <= 3;
    }

    //Exercício 3 – Função que verifica necessidade de revisão

    function precisaRevisao($revisao, $ano){
        if ($revisao == false){
            return "Precisa de revisao";
        } else {
            return "Revisao em dia";
        }
        
    }


    //Exercício 4 – Função que calcula valor estimado
    function calcularValor($marca, $ano, $ndonos){
        if ($marca == "BMW" || $marca == "Porsche"){
            $valor_base = 300000;
        }elseif ($marca == "Nissan"){
            $valor_base = 70000;
    }elseif($marca == "BYD"){
            $valor_base = 150000;
        }

        if($ndonos > 1){
            $valor_base *= pow(0.95, $ndonos - 1);
        }

        $anoUso = (int)date("Y") - $ano;
        $valor_base -= $anoUso * 3000;
        return max($valor_base, 0);
}
        
    
    echo "============== Dados dos Carros ==============\n";
    foreach ($carros as $carro) {
        exibirCarro($carro["modelo"], $carro["marca"], $carro["ano"], $carro["revisao"], $carro["ndonos"]);
        echo "É seminovo? " . (ehSeminovo($carro["ano"]) ? "Sim" : "Não") . "\n";
        echo "Situação da revisão: " . precisaRevisao($carro["revisao"], $carro["ano"]) . "\n";
        echo "Valor estimado: R$ " . number_format(calcularValor($carro["marca"], $carro["ano"], $carro["ndonos"]), 2, ',', '.') . "\n";
        echo "-----------------------------\n";

    }
    
    ?>



