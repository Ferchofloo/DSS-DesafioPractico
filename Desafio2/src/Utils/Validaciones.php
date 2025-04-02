<?php
namespace App\Utils;

class Validaciones {
    public static function validarNumeroPositivo($numero) {
        return $numero >= 0;
    }
}
?>
