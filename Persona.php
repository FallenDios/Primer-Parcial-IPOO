<?php 

class Persona{

    //atributos

    private $pnombre;
    private $apellido;
    private $pdireccion;
    private $mail;
    private $telefono;

    //Constructor 
public function __construct($pnombre, $apellido, $pdireccion, $mail, $telefono)
{
    $this->pnombre = $pnombre;
    $this->apellido = $apellido;
    $this->pdireccion = $pdireccion;
    $this->mail = $mail;
    $this->telefono = $telefono;
}

// Getters 
public function getNombre() {
    return $this->pnombre;
}

public function getApellido() {
    return $this->apellido;
}

public function getDireccion() {
    return $this->pdireccion;
}

public function getMail() {
    return $this->mail;
}

public function getTelefono() {
    return $this->telefono;
}

// Setters
public function setNombre($pnombre) {
    $this->pnombre = $pnombre;
}

public function setApellido($apellido) {
    $this->apellido = $apellido;
}

public function setDireccion($pdireccion) {
    $this->pdireccion = $pdireccion;
}

public function setMail($mail) {
    $this->mail = $mail;
}

public function setTelefono($telefono) {
    $this->telefono = $telefono;
}

}