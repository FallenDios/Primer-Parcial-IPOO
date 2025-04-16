<?php 

class Aerolineas {

    // Atributos

    private $identificacion;
    private $nombre;
    private $vuelos;

    //constructor

    public function __construct($identificacion, $nombre, $vuelos = []) {
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->vuelos = $vuelos;
    }

    //Getters

    public function getIdentificacion() {
        return $this->identificacion;
    }   

    public function getNombre() {
        return $this->nombre;
    }

    public function getVuelos() {
        return $this->vuelos;
    }

    //Setters

    public function setIdentificacion($identificacion) {
        $this->identificacion = $identificacion;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setVuelos($vuelos) {
        $this->vuelos = $vuelos;
    }


    //Agregar un vuelo a la coleccion 

    public function agregarVuelo(Vuelo $vuelo) {
        $this->vuelos[] = $vuelo;
    }

    //toString
    public function __toString() {
        $cadena = "Aerolínea: " . $this->nombre . " (ID: " . $this->identificacion . ")\n";
        $cadena .= "Vuelos Programados:\n";
    
        foreach ($this->vuelos as $vuelo) {
            $cadena .= "- Número: " . $vuelo->getNumero() . ", Destino: " . $vuelo->getDestino() . ", Fecha: " . $vuelo->getFecha() . "\n";
        }
    
        return $cadena;
    }
    


    public function darVueloADestino($destino, $cant_asientos) {
        $colVuelos = array(); 
        $colVuelosAerolínea = $this->getVuelos(); 
    
        foreach ($colVuelosAerolínea as $unObjVuelo) {
            $elDestino = $unObjVuelo->getDestino(); 
            $cant_Disponible = $unObjVuelo->getAsientosDisponibles(); 
    
            if ($elDestino == $destino && $cant_Disponible >= $cant_asientos) {
                $colVuelos[] = $unObjVuelo; 
            }
        }
    
        return $colVuelos; 
    }

    //incorporamos vuelos

    public function incorporarVuelo(Vuelo $vuelo): bool {
        
        $puedeIncorporar = true;
    
        foreach ($this->vuelos as $vueloExistente) {
            if (
                $vueloExistente->getDestino() === $vuelo->getDestino() &&
                $vueloExistente->getFecha() === $vuelo->getFecha() &&
                $vueloExistente->getHoraPartida() === $vuelo->getHoraPartida()
            ) {
                $puedeIncorporar = false;
            }
        }
    
        if ($puedeIncorporar) {
            $this->vuelos[] = $vuelo;
        }
    
        return $puedeIncorporar;
    }
    
    //Asignacion de vuelos 

    public function venderVueloADestino($cantidadAsientos, $destino, $fecha) {
        $vueloAsignado = null;  
    
    
        foreach ($this->vuelos as $vuelo) {
            if (
                $vuelo->getDestino() === $destino &&
                $vuelo->getFecha() === $fecha &&
                $vuelo->getAsientosDisponibles() >= $cantidadAsientos
            ) {
            
                $vuelo->asignarAsientosDisponibles($cantidadAsientos);
                $vueloAsignado = $vuelo; 
            }
        }
    
        return $vueloAsignado;
    }

    //Calcula el monto promedio recaudado de los vuelos de la aerolinea
    public function montoPromedioRecaudado() {
        $sumaTotal = 0;
        $vuelos = $this->vuelos;
        $cantidadVuelos = count($vuelos);
    
        if ($cantidadVuelos > 0) {
            foreach ($vuelos as $vuelo) {
                $asientosVendidos = $vuelo->getAsientosDisponibles() - $vuelo->getAsientosDisponibles();
                $importeRecaudado = $asientosVendidos * $vuelo->getImporte();
                $sumaTotal += $importeRecaudado;
            }
        }
    
        $promedio = $cantidadVuelos > 0 ? $sumaTotal / $cantidadVuelos : 0;
        return $promedio;
    }
    
}
