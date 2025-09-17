<?php
namespace Aula10;
class Calculadora {
    public function somar($a, $b, $c = null) {
        if ($c !== null) {
            return $a + $b + $c;
        }
        return $a + $b;
    }
}

// Testando
$calc = new Calculadora();

echo $calc->somar(5, 10) . PHP_EOL;      // 15
echo $calc->somar(5, 10, 20) . PHP_EOL;  // 35
?>
