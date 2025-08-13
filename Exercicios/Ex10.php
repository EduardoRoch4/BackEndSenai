<?php
for ($i = 0; $i < 5; $i++) {
    echo "\n\n--- Menu ---";
    echo "\n1 - Olá!";
    echo "\n2 - Data atual";
    echo "\n3 - Sair";


$escolha = (float)readline("\nDigite qual opcao voce quer: ");

switch ($escolha) {
    case 1:
        echo "\nOlá, seja bem-vindo!";
        break;
    case 2:
        echo "\nData atual: " . date("d/m/Y");
        break;
    case 3:
        echo "\nSaindo... Até logo!";
        break;
    default:
        echo "\nOpção inválida. Tente novamente.";
}
}
?>