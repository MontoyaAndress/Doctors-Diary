<?php
function fechaEs($fecha) {
  $fecha = substr($fecha, 0, 10);
  $dia = date('l', strtotime($fecha));
  $dias_ES = array("lunes", "martes", "miércoles", "jueves", "viernes", "sábado", "domingo");
  $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
  $nombredia = str_replace($dias_EN, $dias_ES, $dia);
  return $nombredia;
}
?>