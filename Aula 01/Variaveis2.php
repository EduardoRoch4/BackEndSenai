<?php

$nota1 = 0;
$nota2 = 8;
$media = ($nota1 + $nota2)/2;
$presença = 60;
$aulasTotais = 80;
$frequencia = ($presença/$aulasTotais)*100;
$nome = "Enzo Enrico";

if ($media >= 7 && $frequencia >= 75 || $nome == "Enzo Enrico"){
    echo "\nALUNO APROVADO!!!";
    echo "\nAluno aprovado com media: $media";
    echo "\nO aluno possui uma frequencia de: $frequencia%";
}
else {
    echo "\nALUNO REPROVADO!!!";
    echo "\nAluno reprovado com media: $media";
    echo "\nO aluno possui uma frequencia de: $frequencia%";

}
?>