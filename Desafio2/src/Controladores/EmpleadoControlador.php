<?php
namespace App\Controladores;

use App\Clases\GestorEmpleados;
use App\Clases\Empleado;

class EmpleadoControlador {
    private $gestor;

    public function __construct() {
        $this->gestor = new GestorEmpleados();
    }

    public function agregarEmpleado($nombre, $salarioBase, $horasExtras, $prestamo, $foto) {
        $id = count($this->gestor->obtenerEmpleados()) + 1;
        $empleado = new Empleado($id, $nombre, $salarioBase, $horasExtras, $prestamo, $foto);
        $this->gestor->agregarEmpleado($empleado);
    }

    public function obtenerEmpleados() {
        return $this->gestor->obtenerEmpleados();
    }
}
?>
