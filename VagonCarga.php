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
public function __construct($anioInstalacion, $largoVagon, $anchoVagon, $pesoVagonVacio,$pesoMaximoTransportado){
    parent::__construct($anioInstalacion, $largoVagon, $anchoVagon, $pesoVagonVacio);
        $this->pesoMaximoTransportado=$pesoMaximoTransportado;
        $this->pesoCargaTransportado=0;
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
    $cadena .= "\nPeso máximo transportado: " . $this->getPesoMaximoTransportado() . " kg"."\n" ;
    $cadena .= "\nPeso de carga actual: " . $this->getPesoCargaTransportado() . " kg" ."\n" ;
    $cadena .= "\nÍndice adicional aplicado: " . $this->getIndice ()."\n" ;
    return $cadena;
}
    
    // Método para incorporar carga al vagón
    
    public function incorporarCargaVagon($cantidad) {
        $puedeAgregar = false;
        if ($this->getPesoCargaTransportado() + $cantidad <= $this->getPesoMaximoTransportado()) {
        $this->setPesoCargaTransportado($this->getPesoCargaTransportado() + $cantidad);
        $puedeAgregar = true;
        }
        return $puedeAgregar;
    }
    // Se redefine peso del vagon de carga (retorna peso vacío + peso carga + 20% índice)
  public function calcularPesoVagon() {
    $pesoBase = parent::calcularPesoVagon(); // obtiene el peso vacío desde la clase padre

    $pesoCarga = $this->getPesoCargaTransportado();
    $indice = $this->getIndice();
    $pesoExtra = $pesoCarga * $indice;

    $pesoTotal = $pesoBase + $pesoCarga + $pesoExtra;
    $this->setPesoTotal($pesoTotal); // guardamos el peso total en el atributo heredado

    return $pesoTotal;
    }
    
}

?>
