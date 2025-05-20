<?php 
/*/En la clase Formacion:
1. Se almacena la referencia a un objeto de la clase Locomotora , la colección de objetos de la clase Vagón
y el máximo de vagones que puede contener. Se tiene una única colección de vagones
2. Implementar el método incorporarPasajeroFormacion que recibe la cantidad de pasajeros que se
desea incorporar a la formación y busca dentro de la colección de vagones aquel vagón capaz de
incorporar esa cantidad de pasajeros. Si no hay ningún vagón en la formación que pueda ingresar la
cantidad de pasajeros, el método debe retornar un valor falso y verdadero en caso contrario. Puede
utilizar la función is_a para saber si se trata de un vagón de carga o de pasajeros.
3. Implementar el método incorporarVagonFormacionque recibe por parámetro un objeto vagón y lo
incorpora a la formación. El método retorna verdadero si la incorporación se realizó con éxito y falso en
caso contrario.
4. Implementar el método promedioPasajeroFormacion el cual recorre la colección de vagones y retorna
un valor que represente el promedio de pasajeros por vagón que se encuentran en la formación. Puede
utilizar la función is_a para saber si se trata de un vagón de carga o de pasajeros.
5. Implementar el método pesoFormacion el cual retorna el peso de la formación completa.
6. Implementar el método retornarVagonSinCompletar el cual retorna el primer vagón de la formación que
aún no se encuentra completo */
class Formacion{

    private $objLocomotora;
    private $colecVagones;
    private $maximoVagones;

    //METODO CONSTRUCTOR
    public function __construct($objLocomotora, $maximoVagones) {
        $this->objLocomotora = $objLocomotora;
        $this->colecVagones = [];
        $this->maximoVagones = $maximoVagones;
    }

    //METODOS GETERS
        public function getObjLocomotora() {
            return $this->objLocomotora;
        }
        public function getColecVagones() {
            return $this->colecVagones;
        }

        public function getMaximoVagones() {
        return $this->maximoVagones;
    }
    //METODOS SETERS
        public function setObjLocomotora($objLocomotora) {
               $this->objLocomotora =$objLocomotora;
        }
        public function setColecVagones($colecVagones) {
            $this->colecVagones=$colecVagones;
        }

        public function setMaximoVagones($maximoVagones) {
        $this->maximoVagones = $maximoVagones;
    }
    //METODO __TOSTRING
    public function __toString() {
    $cadena = "Formación:\n";
    $cadena .= "Locomotora:\n" . $this->getObjLocomotora() . "\n";
    $cadena .= "Cantidad de vagones: " . count($this->getColecVagones()) . "\n Máximo: " . $this->getMaximoVagones() ."\n";
    $cadena .= "Vagones:\n";
    foreach ($this->getColecVagones() as $index => $vagon) {
        $cadena .= "Vagón " . ($index + 1) . ":\n" . $vagon . "\n";
        }

        return $cadena;
    }
    /*/ Implementar el método incorporarPasajeroFormacion que recibe la cantidad de pasajeros que se
desea incorporar a la formación y busca dentro de la colección de vagones aquel vagón capaz de
incorporar esa cantidad de pasajeros. Si no hay ningún vagón en la formación que pueda ingresar la
cantidad de pasajeros, el método debe retornar un valor falso y verdadero en caso contrario. Puede
utilizar la función is_a para saber si se trata de un vagón de carga o de pasajeros. */
public function incorporarPasajeroFormacion($cantidad) {
    $incorporarPasajeros = false;
    foreach ($this->getColecVagones() as $vagon) {
        if (is_a($vagon, 'VagonPasajeros')) {
            // Si algún vagón puede incorporar los pasajeros, marcamos como verdadero
            if (!$incorporarPasajeros && $vagon->incorporarPasajeroVagon($cantidad)) {
                $incorporarPasajeros = true;
            }
        }
    }
    return $incorporarPasajeros;
}

/*/ 3. Implementar el método incorporarVagonFormacionque recibe por parámetro un objeto vagón y lo
incorpora a la formación. El método retorna verdadero si la incorporación se realizó con éxito y falso en
caso contrario. */
public function incorporarVagonFormacion($objVagon) {
    $incorporarVagon=false;
    if (count($this->getColecVagones()) < $this->getMaximoVagones()) {
        $this->colecVagones[] = $objVagon;
         $incorporarVagon =true;
    }
    return $incorporarVagon;
}
/*/ 4. Implementar el método promedioPasajeroFormacion el cual recorre la colección de vagones y retorna
un valor que represente el promedio de pasajeros por vagón que se encuentran en la formación. Puede
utilizar la función is_a para saber si se trata de un vagón de carga o de pasajeros. */
public function promedioPasajeroFormacion() {
    $totalPasajeros = 0;
    $cantidadVagonesPasajeros = 0;

    foreach ($this->getColecVagones() as $vagon) {
        if (is_a($vagon, 'VagonPasajeros')) {
            $totalPasajeros += $vagon->getCantPasajerosTransportando();
            $cantidadVagonesPasajeros++;
        }
    }

    $promedio = 0;
    if ($cantidadVagonesPasajeros > 0) {
        $promedio = $totalPasajeros / $cantidadVagonesPasajeros;
    }

    return $promedio;
}

/*/ 5. Implementar el método pesoFormacion el cual retorna el peso de la formación completa. */
public function pesoFormacion() {
    $pesoTotal = $this->getObjLocomotora()->getPeso(); //Locomotora tiene un método getPeso()

    foreach ($this->getColecVagones() as $vagon) {
        $pesoTotal += $vagon->calcularPesoVagon();
    }

    return $pesoTotal;
}
/*/   6. Implementar el método retornarVagonSinCompletar el cual retorna el primer vagón de la formación que
aún no se encuentra completo */ 
public function retornarVagonSinCompletar() {
    $vagonEncontrado = null;

    foreach ($this->getColecVagones() as $vagon) {
        if ($vagonEncontrado === null) {  // Solo asignamos si no encontramos uno antes
            if (is_a($vagon, 'VagonPasajeros')) {
                if ($vagon->getCantPasajerosTransportando() < $vagon->getCantMaximaPasajerosTransportando()) {
                    $vagonEncontrado = $vagon;
                }
            } elseif (is_a($vagon, 'VagonCarga')) {
                if ($vagon->getPesoCargaTransportado() < $vagon->getPesoMaximoTransportado()) {
                    $vagonEncontrado = $vagon;
                }
            }
         }
        }

            return $vagonEncontrado;
        }
}
?>
