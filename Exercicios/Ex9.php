<?php
$temp = (float)readline("Digite a temperatura atual em C°: ");

if($temp >15 ){
    echo "Frio";
}
elseif($temp =15 && $temp <25){
    echo "Agradavel";
}
else{   
    echo "Quente";
}

?>