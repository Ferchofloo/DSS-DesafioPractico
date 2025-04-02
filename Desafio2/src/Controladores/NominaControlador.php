<?php
namespace App\Controladores;

use App\Clases\Nomina;
use App\Clases\Empleado;

class NominaControlador {
    public function generarBoleta(Empleado $empleado) {
        // Crear el objeto de la boleta de pago
        $nomina = new Nomina($empleado);
        
        // Obtener los detalles de la boleta
        return $nomina->obtenerBoleta();
    }
}
?>
