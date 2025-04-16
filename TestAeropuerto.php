<?php

// clases
require_once 'Aerolineas.php';
require_once 'Vuelo.php';
require_once 'Persona.php';
require_once 'Aeropuerto.php';

$persona1 = new Persona("Franco", "Cabrera", "Avenida Siempreviva 123", "Francon@example.com", "123456789");
$persona2 = new Persona("Azul", "Montiel", "Avenida Siempreviva 456", "Azula@example.com", "987654321");

$vuelo1 = new Vuelo(101, 15000, "2025-04-20", "Buenos Aires", "16:00", "14:00", 200, 150, $persona1);
$vuelo2 = new Vuelo(102, 20000, "2025-04-21", "Córdoba", "18:00", "16:00", 150, 120, $persona2);
$vuelo3 = new Vuelo(103, 18000, "2025-04-22", "Mendoza", "20:00", "18:00", 100, 80, $persona1);
$vuelo4 = new Vuelo(104, 22000, "2025-04-23", "Salta", "22:00", "20:00", 180, 150, $persona2);


$aerolinea1 = new Aerolineas("AR001", "Aerolineas Argentinas", [$vuelo1, $vuelo2]);
$aerolinea2 = new Aerolineas("JM001", "JetSmart", [$vuelo3, $vuelo4]);



$aeropuerto = new Aeropuerto("EZE", "Aeropuerto Internacional Ezeiza", [$aerolinea1, $aerolinea2]);

// venta automática
$destino = "Buenos Aires";
$cantidadAsientos = 3;
$fecha = "2025-04-20"; 
$resultadoVenta = $aeropuerto->ventaAutomatica($cantidadAsientos, $fecha, $destino);

if ($resultadoVenta) {
    echo "La venta automática de $cantidadAsientos asientos hacia $destino se realizó con éxito.\n";
} else {
    echo "No fue posible realizar la venta automática de $cantidadAsientos asientos hacia $destino.\n";
}

// Promedio recaudado por aerolíneas
echo "Promedio recaudado por cada aerolínea:\n";

$promedios = $aeropuerto->promedioRecaudadoXAerolinea();

foreach ($promedios as $nombreAerolinea => $promedio) {
    echo "Aerolínea: $nombreAerolinea - Promedio recaudado: $" . number_format($promedio, 2) . "\n";
}
?>
