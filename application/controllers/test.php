<?php

$inicio="2014-01-01 00:00:00";
$fin="2014-11-01 23:59:59";
 
$datetime1=new DateTime($inicio);
$datetime2=new DateTime($fin);
 
# obtenemos la diferencia entre las dos fechas
$interval=$datetime2->diff($datetime1);
 
# obtenemos la diferencia en meses
$intervalMeses=$interval->format("%m");
# obtenemos la diferencia en años y la multiplicamos por 12 para tener los meses
$intervalAnos = $interval->format("%y")*12;
 
echo "hay una diferencia de ".($intervalMeses+$intervalAnos)." meses";

?>