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
        $result001= $bd->query("select * from doctor where docid=$id;");
        $email=($result001->fetch_assoc())["docemail"];
        $sql= $bd->query("delete from webuser where email='$email';");
        $sql= $bd->query("delete from doctor where docemail='$email';");
        header("location: doctores.php");
    }


?>