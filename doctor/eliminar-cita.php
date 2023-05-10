<?php
    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    if($_GET){
        include("../conexion.php");
        $id=$_GET["id"];
        $sql= $bd->query("delete from appointment where appoid='$id';");
        header("location: citas.php");
    }
?>