<?php
namespace App\Clases;

class Empleado {
    public $id;
    public $nombre;
    public $salarioBase;
    public $horasExtras;
    public $prestamo;
    public $foto;

    public function __construct($id, $nombre, $salarioBase, $horasExtras, $prestamo, $foto) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->salarioBase = max(0, $salarioBase);
        $this->horasExtras = max(0, $horasExtras);
        $this->prestamo = max(0, $prestamo);
        $this->foto = $foto;
    }

    public function calcularSalarioTotal() {
        return $this->salarioBase + ($this->horasExtras * 10);
    }
}
?>
