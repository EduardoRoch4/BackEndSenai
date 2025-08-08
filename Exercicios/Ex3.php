<?php
$dia = readline("Digite o dia da semana em numeros(1, 2, 3...): ");

switch ($dia){
    case 1:
        echo "Segunda-feira";
        break;
        case 2:
    echo "Terça-feira";
        break;
        case 3:
    echo "Quarta-feira";
        break;
        case 4:
    echo "Quinta-feira";
        break;
        case 5:
    echo "Sexta-feira";
    break;
        case 6:
    echo "Sábado";
    break;
        case 7:
    echo "Domingo";
    break;
    default:
        echo "Dia inválido";
        break;    
}

?>