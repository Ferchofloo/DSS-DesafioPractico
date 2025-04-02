<?php
namespace App\Clases;

class GestorEmpleados {
    private $archivo = "empleados.json";

    public function obtenerEmpleados() {
        if (!file_exists($this->archivo)) {
            return [];
        }
        $data = json_decode(file_get_contents($this->archivo), true);
        return is_array($data) ? $data : [];
    }

    public function guardarEmpleados($empleados) {
        file_put_contents($this->archivo, json_encode($empleados, JSON_PRETTY_PRINT));
    }

    public function agregarEmpleado(Empleado $empleado) {
        $empleados = $this->obtenerEmpleados();
        $empleados[$empleado->id] = (array) $empleado;
        $this->guardarEmpleados($empleados);
    }
}
?>
