<?php
$num1 = (float)readline("Digite o primeiro numero: ");
$num2 = (float)readline("Digite o segundo numero: ");
$operacao = readline("Digite a operacao (+, -, *, /): ");


switch ($operacao){
    case "+":
        $resultado = $num1 + $num2;
        echo "Resultado: $resultado\n";
        break;
    case "-":
    $resultado = $num1 - $num2;
        echo "Resultado: $resultado\n";
        break;
    case "*":
    $resultado = $num1 * $num2;
        echo "Resultado: $resultado\n";
        break;
    case "/":
    $resultado = $num1 / $num2;
        echo "Resultado: $resultado\n";
        break;
}

?>