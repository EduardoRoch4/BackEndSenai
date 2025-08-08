<?php


$aulasTotais = 80;



$nome = readline("Digite o nome do aluno: ");
$nota1 = (float)readline("Digite a primeira nota: ");
$nota2 = (float)readline("Digite a segunda nota: ");
$presença = (float)readline("Digite a presença do aluno: ");

$media = ($nota1 + $nota2) / 2;
$frequencia = ($presença/$aulasTotais)*100;

echo "Sua média é: $media\n";

if (strtolower(trim($nome)) === "enzo enrico") {
    echo "Aprovado!\n";
} else {
    if ($media >= 7 && $frequencia >= 75) {
        echo "Aprovado!\n";
        echo "O aluno possui uma frequencia de: $frequencia%";

    } else {
        echo "Reprovado!\n";
        echo "O aluno possui uma frequencia de: $frequencia%";

    }
}
?>