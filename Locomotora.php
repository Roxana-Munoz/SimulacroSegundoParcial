<?php

/*/En la clase Locomotora:
 Se registra la información de su peso y velocidad máxima. */

 class Locomotora{

    private $peso;
    private $velocidadMaxima;

    //METODO CONSTRUCTOR
    public function __construct($peso,$velocidadMaxima)
    {
     $this->peso=$peso;
     $this->velocidadMaxima=$velocidadMaxima;  
    }
    //METODOS GETERS
    public function getPeso(){
      return $this->peso;
    }
    public function getVelocidadMaxima(){
      return $this->velocidadMaxima;
    }
 //METODOS SETERS
      public function setPeso($peso){
         $this->peso=$peso;
      }
      public function setVelocidadMaxima($velocidadMaxima){
      $this->velocidadMaxima=$velocidadMaxima;  
      }
//METODO __TO STRING
      public function __toString()
      {
          $cadena =" Peso: ". $this->getPeso().
                 "Velocidad Maxima: ".$this->getVelocidadMaxima();
          return $cadena;
   
   }

 }
?>



