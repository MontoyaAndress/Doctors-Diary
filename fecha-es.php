<?php
function fechaEs($fecha) {
  $fecha = substr($fecha, 0, 10);
  $dia = date('l', strtotime($fecha));
  $dias_ES = array("lunes", "martes", "miércoles", "jueves", "viernes", "sábado", "domingo");
  $nombredia = str_replace($dias_ES, $dia);
  return $nombredia;
}
?>
