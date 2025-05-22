<?php 
/* Si se trata de un vagón de pasajeros también se almacena la cantidad máxima de pasajeros que puede
transportar, la cantidad de pasajeros que está transportando y el peso promedio de los pasajeros. Es importante
tener en cuenta que la variable de instancia que representa el peso del vagón se calcula de acuerdo a la
cantidad de pasajeros que se está transportando y considerando un peso promedio por pasajero de 50 Kilos.
 Implementar el método incorporarPasajeroVagon que recibe por parámetro la cantidad de pasajeros
que ingresan al vagón y tiene la responsabilidad de actualizar las variables instancias que representan el
peso y la cantidad actual de pasajeros.El método debe devolver verdadero o falso según si se pudo o no
agregar los pasajeros al vagón.
 Implementar el método calcularPesoVagon y redefinirlo según sea necesario. No olvidar agregar el
peso que tiene el vagón vacío */
class VagonPasajeros extends Vagon{
    private $cantPasajerosTransportando;
    private $cantMaximaPasajerosTransportando;
    private $pesoPromedioPasajeros;
    //METODO CONSTRUCTOR
        public function __construct($anioInstalacion,$largoVagon,$anchoVagon,$pesoVagonVacio,$cantMaximaPasajerosTransportando) {
            parent::__construct($anioInstalacion,$largoVagon,$anchoVagon,$pesoVagonVacio);
            $this->cantMaximaPasajerosTransportando = $cantMaximaPasajerosTransportando;
            $this->cantPasajerosTransportando=0;
            $this->pesoPromedioPasajeros = 50;
        
        } 
    //METODOS GETERS

        public function getCantPasajerosTransportando() {
            return $this->cantPasajerosTransportando;
        }
        public function getCantMaximaPasajerosTransportando() {
            return $this->cantMaximaPasajerosTransportando;
        }
        public function getPesoPromedioPasajeros() {
            return $this->pesoPromedioPasajeros;
        }

    //METODOS SETERS

        public function setCantPasajerosTransportando($cantPasajerosTransportando) {
            $this->cantPasajerosTransportando=$cantPasajerosTransportando;
        }

        public function setCantMaximaPasajerosTransportando($cantMaximaPasajerosTransportando) {
            $this->cantMaximaPasajerosTransportando=$cantMaximaPasajerosTransportando;
        }
        public function setPesoPromedioPasajeros($pesoPromedioPasajeros) {
            $this->pesoPromedioPasajeros=$pesoPromedioPasajeros;
        }

        public function __toString() {
        $cadena = parent::__toString(); // Llama al __toString() de la clase Vagon
        $cadena .= "\nCantidad máxima de pasajeros: " . $this->getCantMaximaPasajerosTransportando()."\n";
        $cadena .= "\nCantidad actual de pasajeros: " . $this->getCantPasajerosTransportando()."\n";
        $cadena .= "\nPeso promedio por pasajero: " . $this->getPesoPromedioPasajeros() . " kg"."\n" ;
        $cadena .= "\nPeso total del vagón (con pasajeros): " . $this->getPesoTotal() . " kg"."\n" ;
        return $cadena;
        }
    /*/  2. Implementar el método incorporarPasajeroVagon que recibe por parámetro la cantidad de pasajeros
    que ingresan al vagón y tiene la responsabilidad de actualizar las variables instancias que representan el
    peso y la cantidad actual de pasajeros.El método debe devolver verdadero o falso según si se pudo o no
    agregar los pasajeros al vagón. */

    public function incorporarPasajeroVagon($cantidad) {
        $incorporar=false;
            if ($this->getCantPasajerosTransportando() + $cantidad <= $this->getCantMaximaPasajerosTransportando()) {
                    $this->setCantPasajerosTransportando($this->getCantPasajerosTransportando() + $cantidad);
                    $this->calcularPesoVagon();
                    $incorporar=true;
            }
        return $incorporar;
    }

    /*/Se redefine para calcular el peso total con base en los pasajeros:*/ 
	/*/Retorna peso vacío + peso de pasajeros (cantidad * 50kg)*/
        public function calcularPesoVagon() {
            $pesoTotal = parent::getPesoVagonVacio() + ($this->getCantPasajerosTransportando() * $this->getPesoPromedioPasajeros());
            $this->setPesoTotal($pesoTotal);
            return $pesoTotal;
        }
}
?>
   
