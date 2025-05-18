<?php 
/*/ 
Implementar un script TestFormacion en el cual:
1. Se crea un objeto locomotora con un peso de 188 toneladas y una velocidad de 140 km/h.
2. Se crea 3 objetos con la información visualizada en la tabla:
Vagón         pesoVacio  PesoCarga cantidad_maxima_pasajeros cantidad_actual_pasajeros
vagon1           15000      –                  30                       25
vagonCarga       15000     55000                --                       --
vagon             15000      –                 50                        50
3. Se crea un objeto formación que tiene la locomotora y los vagones creados en (1) y (2) usando el método
incorporarVagonFormacion.
4. Invocar al método incorporarPasajeroFormacion con el parámetros cantidad de pasajero = 6 y
visualizar el resultado.
5. Realizar un print de los 3 objetos vagones creados.
6. Invocar al método incorporarPasajeroFormacion con el parámetros cantidad de pasajero = 14 y
visualizar el resultado.
7. Realizar un print del objeto locomotora
8. Invocar al método promedioPasajeroFormacion y visualizar el resultado obtenido.
9. Invocar al método pesoFormacion y visualizar el resultado obtenido.
10. Realizar un print de los 3 objetos vagones creados.*/


include_once "Locomotora.php";
include_once "Vagon.php";
include_once "VagonPasajeros.php";
include_once "VagonCarga.php";
include_once "Formacion.php";
/* 1. Se crea un objeto locomotora con un peso de 188 toneladas y una velocidad de 140 km/h.*/
//$peso,$velocidadMaxima*/

$objLocomotora= new Locomotora(188000,140); // Peso en kg (188 toneladas * 1000)

// 2. Crear vagones según la tabla: Vagón ,pesoVacio , PesoCarga ,cantidad_maxima_pasajeros ,cantidad_actual_pasajeros
// $anioInstalacion,$largoVagon,$anchoVagon,$pesoVagonVacio, $cantMaximaPasajerosTransportando

$vagon1 = new VagonPasajeros("","","",15000, 30, 25); // pesoVacio, cant_max_pasajeros, cant_actual_pasajeros

$vagonCarga = new VagonCarga("","","",15000, 55000,"");  // pesoVacio, pesoCargaTransportado

$vagon2 = new VagonPasajeros("","","",15000, 50, 50);// pesoVacio, cant_max_pasajeros, cant_actual_pasajeros

/*/3. Se crea un objeto formación que tiene la locomotora y los vagones creados en (1) y (2) usando el método
 incorporarVagonFormacion*/
//$objLocomotora, $maximoVagones

$objFormacion= new Formacion($objLocomotora,10);

$objFormacion->incorporarVagonFormacion($vagon1);

$objFormacion->incorporarVagonFormacion($vagonCarga);

$objFormacion->incorporarVagonFormacion($vagon2);

/*/4. Invocar al método incorporarPasajeroFormacion con el parámetros cantidad de pasajero = 6 y
visualizar el resultado.  */


$resultado6 = $objFormacion->incorporarPasajeroFormacion(6);
echo "Incorporar 6 pasajeros: " . ($resultado6 ? "Éxito" : "Fallo") ."\n";

/*/5. Realizar un print de los 3 objetos vagones creados. */
echo "Vagones después de incorporar 6 pasajeros:\n";
echo $vagon1 . "\n";
echo $vagonCarga . "\n";
echo $vagon2 . "\n";

/*/6. Invocar al método incorporarPasajeroFormacion con el parámetros cantidad de pasajero = 14 y
visualizar el resultado.*/

$resultado14 = $objFormacion->incorporarPasajeroFormacion(14);
echo "Incorporar 14 pasajeros: " . ($resultado14 ? "Éxito" : "Fallo")."\n";

//7. Realizar un print del objeto locomotora

echo "Locomotora:\n";
echo $objLocomotora . "\n";
echo $vagon2 . "\n";

//8. Invocar al método promedioPasajeroFormacion y visualizar el resultado obtenido.

$promedio=$objFormacion->promedioPasajeroFormacion();
echo "Promedio pasajeros por vagón: " . $promedio;

// 9. Invocar al método pesoFormacion y visualizar el resultado obtenido.

$peso=$objFormacion->pesoFormacion();
echo "Peso de la formacion es: ". $peso;

//10. Realizar un print de los 3 objetos vagones creados.*/

echo "Vagones finales:\n";
echo $vagon1 . "\n";
echo $vagonCarga . "\n";
echo $vagon2 . "\n";