<?php 

class Aeropuerto {
    
    //Atributos
    public $denominacion;
    public $direccion;
    public $aerolineas;



//Constructor 

public function __construct($denominacion, $direccion, $aerolineas = []) {
    $this->denominacion = $denominacion;
    $this->direccion = $direccion;
    $this->aerolineas = $aerolineas;
}


//Getters
public function getDenominacion() {
    return $this->denominacion;
}
public function getDireccion() {
    return $this->direccion;
}
public function getAerolineas() {
    return $this->aerolineas;
}

//Setters
public function setDenominacion($denominacion) {
    $this->denominacion = $denominacion;
}
public function setDireccion($direccion) {
    $this->direccion = $direccion;
}
public function setAerolinas($aerolineas) {
    $this->aerolineas = $aerolineas;
}

//toString
public function __toString() {
    $cadena = "Aeropuerto: " . $this->denominacion . "\n";
    $cadena .= "Dirección: " . $this->direccion . "\n";
    $cadena .= "Aerolíneas que arriban:\n";

    foreach ($this->aerolineas as $aerolinea) {
        $cadena .= "- " . $aerolinea->getNombre() . " (ID: " . $aerolinea->getIdentificacion() . ")\n";
    }

    return $cadena;
}



//Metodo retornar vuelos

public function retornarVuelosAerolinea($aerolineaBuscada) {
    $vuelos = [];

    foreach ($this->aerolineas as $aerolinea) {
        if ($aerolinea->getIdentificacion() === $aerolineaBuscada->getIdentificacion()) {
            $vuelos = $aerolinea->getVuelos(); 
        }
    }

    return $vuelos;
}


//Metodo venta automatica 

public function ventaAutomatica($cantAsientos, $fecha, $destino) {
    $vueloAsignado = null;

    foreach ($this->aerolineas as $aerolinea) {
        $vuelo = $aerolinea->venderVueloADestino($cantAsientos, $destino, $fecha);

        if ($vuelo !== null && $vueloAsignado === null) {
            $vueloAsignado = $vuelo;
        }
    }

    return $vueloAsignado;
}

//Metodo promedio recaudado por aerolinea
public function promedioRecaudadoXAerolinea($idAerolinea) {
    $promedio = 0;

    foreach ($this->aerolineas as $aerolinea) {
        if ($aerolinea->getIdentificacion() === $idAerolinea && $promedio === 0) {
            $promedio = $aerolinea->montoPromedioRecaudado();
        }
    }

    return $promedio;
}































}