<?php
/*
1. Se registra la siguiente información: año de instalación, largo, ancho, peso del vagón vacío.
Si se trata de un vagón de pasajeros también se almacena la cantidad máxima de pasajeros que puede
transportar, la cantidad de pasajeros que está transportando y el peso promedio de los pasajeros. Es importante
tener en cuenta que la variable de instancia que representa el peso del vagón se calcula de acuerdo a la
cantidad de pasajeros que se está transportando y considerando un peso promedio por pasajero de 50 Kilos.*/

class Vagon{
    private $anioInstalacion;
    private $largoVagon;
    private $anchoVagon;
    private $pesoVagonVacio;
    private $pesoTotal;

    //METODO CONSTRUCTOR
    public function __construct($anioInstalacion,$largoVagon,$anchoVagon,$pesoVagonVacio){
        $this->anioInstalacion=$anioInstalacion;
        $this->largoVagon=$largoVagon;
        $this->anchoVagon=$anchoVagon;
        $this->pesoVagonVacio=$pesoVagonVacio;
        $this->pesoTotal=$pesoVagonVacio;
        }   
    public function getAnioInstalacion(){
        return $this->anioInstalacion;
    } 
    public function getLargoVagon(){
        return $this->largoVagon;
    } 
    
    public function getAnchoVagon(){
        return $this->anchoVagon;
    } 
    public function getPesoVagonVacio(){
        return $this->pesoVagonVacio;

    } 
    public function getPesoTotal(){
        return $this->pesoTotal;

    } 
    //METODOS SETERS 
    public function setAnioInstalacion($anioInstalacion){
        $this->anioInstalacion=$anioInstalacion;   
    }
    public function setLargoVagon($largoVagon){
        $this->largoVagon=$largoVagon;

        }   
    public function setAnchoVagon($anchoVagon){
            $this->anchoVagon=$anchoVagon;
     }
    public function setPesoVagonVacio($pesoVagonVacio){
        $this->pesoVagonVacio=$pesoVagonVacio;

    }
    public function setPesoTotal($pesoTotal){
        $this->pesoTotal=$pesoTotal;

    }
     //METODO __TO STRING
    public function __toString()
    {
        $mensaje=" Año de instalacion del vagon: ". $this->getAnioInstalacion()."\n";
        $mensaje .="Largo del vagon: ". $this->getLargoVagon()."\n";
        $mensaje .="Ancho del vagon: ". $this->getAnchoVagon()."\n";
        $mensaje .= "Peso del vagon vacio: ". $this->getPesoVagonVacio()." kg"."\n";
        $mensaje .= "Peso total del vagon: ". $this->getPesoTotal()." kg"."\n";
                return $mensaje;
    }
    public function calcularPesoVagon() {
    // devuelve solo el peso del vagón vacío*/
        return $this->getPesoVagonVacio();
    }

}
?>
