<?php
$inteiro = (float)readline("Digite um número: ");
$float = (int)readline("Digite outro número: ");

if (gettype($inteiro) == gettype($float)) {
    echo "Variáveis de tipos iguais! Primeiro valor do tipo " . gettype($inteiro) . " e segundo valor do tipo " . gettype($float);
} else {
    echo "ERRO! Variáveis de tipos diferentes. Primeiro valor do tipo " . gettype($inteiro) . " e segundo valor do tipo " . gettype($float);
}
?>