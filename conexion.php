<?php

    $bd = new mysqli("localhost","root","","doctordiary");
    if ($bd->connect_error){
        die("Error de conexión:  ".$bd->connect_error);
    }

?>