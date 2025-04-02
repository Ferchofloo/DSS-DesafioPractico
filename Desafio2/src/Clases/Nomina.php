<?php
namespace App\Clases;

class Nomina
{
    private $empleado;

    public function __construct($empleado)
    {
        $this->empleado = $empleado;
    }

    public function calcularDescuentos()
    {
        $salarioBase = $this->empleado["salarioBase"];
        $horasExtras = $this->empleado["horasExtras"];
        $prestamo = $this->empleado["prestamo"];

        // Aplicar cada uno de los descuentos mencionados en el desafío 
        $salarioTotal = $salarioBase + ($horasExtras * 10);

        $descuentoIsss = $salarioTotal * 0.03; 
        $descuentoAfp = $salarioTotal * 0.0625; 
        $descuentoRenta = $this->calcularRenta($salarioTotal); 

        $totalDescuentos = $descuentoIsss + $descuentoAfp + $descuentoRenta + $prestamo;

        $sueldoLiquido = $salarioTotal - $totalDescuentos;

        return [
            'salarioTotal' => $salarioTotal,
            'descuentoIsss' => $descuentoIsss,
            'descuentoAfp' => $descuentoAfp,
            'descuentoRenta' => $descuentoRenta,
            'prestamo' => $prestamo,
            'totalDescuentos' => $totalDescuentos,
            'sueldoLiquido' => $sueldoLiquido
        ];
    }

    private function calcularRenta($salarioTotal)
    {
        if ($salarioTotal > 1000) {
            return $salarioTotal * 0.1; 
        }
        return 0;
    }

    public function generarBoleta()
    {
        $descuentos = $this->calcularDescuentos();
        ob_start();
        ?>
        <div style="font-family: Arial, sans-serif; margin: 20px; border: 1px solid #ddd; padding: 20px;">
            <h2>Boleta de Pago</h2>
            <img src="uploads/<?= basename($this->empleado["foto"]) ?>" alt="Foto del empleado"
                 style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
            <p><strong>Empleado:</strong> <?= $this->empleado["nombre"] ?></p>
            <p><strong>ID:</strong> <?= $this->empleado["id"] ?></p>

            <h3>Detalles del Pago</h3>
            <table style="width: 100%; border-collapse: collapse;">
                <tr><td><strong>Salario Base</strong></td><td>$<?= number_format($this->empleado["salarioBase"], 2) ?></td></tr>
                <tr><td><strong>Horas Extras</strong></td><td><?= $this->empleado["horasExtras"] ?> horas a $10.00</td></tr>
                <tr><td><strong>Salario Total</strong></td><td>$<?= number_format($descuentos['salarioTotal'], 2) ?></td></tr>
                <tr><td><strong>Descuento ISSS (3%)</strong></td><td>$<?= number_format($descuentos['descuentoIsss'], 2) ?></td></tr>
                <tr><td><strong>Descuento AFP (6.25%)</strong></td><td>$<?= number_format($descuentos['descuentoAfp'], 2) ?></td></tr>
                <tr><td><strong>Descuento Renta</strong></td><td>$<?= number_format($descuentos['descuentoRenta'], 2) ?></td></tr>
                <tr><td><strong>Préstamo</strong></td><td>$<?= number_format($descuentos['prestamo'], 2) ?></td></tr>
                <tr><td><strong>Total Descuentos</strong></td><td>$<?= number_format($descuentos['totalDescuentos'], 2) ?></td></tr>
                <tr><td><strong>Sueldo Líquido</strong></td><td>$<?= number_format($descuentos['sueldoLiquido'], 2) ?></td></tr>
            </table>
        </div>
        <?php
        $boleta = ob_get_contents();
        ob_end_clean();
        return $boleta;
    }
}
?>
