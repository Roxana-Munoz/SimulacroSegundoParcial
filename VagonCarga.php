<?php
/*   
 Si se trata de un vagón de carga se almacena el peso máximo que puede transportar y el peso de su carga
transportada. El peso del vagón va a depender del peso de su carga más un índice que coincide con un 20 % del
peso de la carga, dicho índice se guarda en cada vagón de carga.*/   

class VagonCarga extends Vagon{

    private $pesoMaximoTransportado;
    private $pesoCargaTransportado;
    private $indice;

//METOOO CONSTRUCTOR
    public function __construct($anioInstalacion, $largoVagon, $anchoVagon, $pesoVagonVacio,$pesoCargaTransportado,$pesoMaximoTransportado){
      parent::__construct($anioInstalacion, $largoVagon, $anchoVagon, $pesoVagonVacio);
        $this->pesoMaximoTransportado=$pesoMaximoTransportado;
        $this->pesoCargaTransportado=$pesoCargaTransportado;
        $this->indice=0.20;
    }
//METODOS GETERS
    public function getPesoMaximoTransportado(){
        return $this->pesoMaximoTransportado;
    }
        public function getPesoCargaTransportado(){
            return $this->pesoCargaTransportado;

    }

        public function getIndice(){
            return $this->indice;

    }

    //METODOS SETERS
    public function setPesoMaximoTransportado($pesoMaximoTransportado){
        $this->pesoMaximoTransportado=$pesoMaximoTransportado;
    }
        public function setPesoCargaTransportado($pesoCargaTransportado){
            $this->pesoCargaTransportado=$pesoCargaTransportado;
        }

    
        public function setIndice($indice){
            $this->indice=$indice;

    }
    public function __toString() {
    $cadena = parent::__toString(); // Llama al __toString() de la clase Vagon
    $cadena .= "\nPeso máximo transportado: " . $this->getPesoMaximoTransportado() . " kg";
    $cadena .= "\nPeso de carga actual: " . $this->getPesoCargaTransportado() . " kg";
    $cadena .= "\nÍndice adicional aplicado: " . $this->getIndice ();
    return $cadena;
}
    
    // Método para incorporar carga al vagón
    
    public function incorporarCargaVagon($cantidad) {
        $puedeAgregar = false;
    if ($this->getPesoCargaTransportado() + $cantidad <= $this->getPesoMaximoTransportado()) {
        $this->setPesoCargaTransportado($this->getPesoCargaTransportado() + $cantidad);
        $this->calcularPesoVagon();
        $puedeAgregar = true;
        }
    return $puedeAgregar;
    }
    // Se redefine peso del vagon de carga (retorna peso vacío + peso carga + 20% índice)
  public function calcularPesoVagon() {
    $pesoCarga = $this->getPesoCargaTransportado();
    $indice = $pesoCarga * $this->getIndice();
    $pesoTotal = parent::getPesoVagonVacio() + $pesoCarga + $indice;
    $this->setPesoVagonVacio($pesoTotal);
  }
}

?>
