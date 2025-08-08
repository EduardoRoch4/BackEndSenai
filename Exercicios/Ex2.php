<?php
$nota1 = (float)readline("Digite a nota 1 do aluno: ");
$nota2 = (float)readline("Digite a nota 2 do aluno: ");

$media = ($nota1 + $nota2) / 2;

if($media >=9 ){
    echo "Excelente";
}
elseif($media >=7){
    echo "Bom";
}
else{   
    echo "Repovado";
}

?>