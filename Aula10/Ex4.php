<?php
namespace Aula10;
class Email  {
    public function enviar() {
        return "Enviando email...";
    }
}

class Sms {
    public function enviar() {
        return "Enviando SMS...";
    }
}

// Função para exibir o som do animal
function notificar($meio) {
    echo $meio->enviar() . PHP_EOL;
}

notificar(new Email());
notificar(new Sms());

?>