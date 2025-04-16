<?php

class Vuelo {

// Atributos
private string $numero;
private float $importe;
private string $fecha;
private string $destino;
private string $horaArribo;
private string $horaPartida;
private int $asientosTotales;
private int $asientosDisponibles;
private Persona $responsable;

// Constructor
public function __construct($numero, $importe, $fecha, $destino, $horaArribo, $horaPartida, $asientosTotales, $asientosDisponibles, Persona $responsable) {
    $this->numero = $numero;
    $this->importe = $importe;
    $this->fecha = $fecha;
    $this->destino = $destino;
    $this->horaArribo = $horaArribo;
    $this->horaPartida = $horaPartida;
    $this->asientosTotales = $asientosTotales;
    $this->asientosDisponibles = $asientosDisponibles;
    $this->responsable = $responsable;
}

// Getters
public function getNumero() {
    return $this->numero;
}

public function getImporte() {
    return $this->importe;  
}

public function getFecha() {
    return $this->fecha;
}

public function getDestino() {
    return $this->destino;
}

public function getHoraArribo() {
    return $this->horaArribo;
}

public function getHoraPartida() {
    return $this->horaPartida;
}

public function getAsientosTotales() {
    return $this->asientosTotales;
}

public function getAsientosDisponibles() {
    return $this->asientosDisponibles;
}

// Setter para asientos disponibles
public function setAsientosDisponible($asientos) {
    $this->asientosDisponibles = $asientos;
}

// Método para asignar asientos disponibles
public function asignarAsientosDisponibles($cant_pasajeros) {
    $respuesta = false;
    $cant_disp = $this->getAsientosDisponibles();

    if ($cant_pasajeros <= $cant_disp) {
        $this->setAsientosDisponible($cant_disp - $cant_pasajeros);
        $respuesta = true;
    }

    return $respuesta;
}

}