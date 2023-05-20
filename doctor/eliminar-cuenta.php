<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='d'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    

    include("../conexion.php");
    $sqlmain= "select * from doctor where docemail=?";
    $stmt = $bd->prepare($sqlmain);
    $stmt->bind_param("s",$useremail);
    $stmt->execute();
    $userrow = $stmt->get_result();
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["pid"];
    $username=$userfetch["pname"];

    
    if($_GET){
        include("../conexion.php");
        $id=$_GET["id"];
        $sqlmain= "select * from doctor where docid=?";
        $stmt = $bd->prepare($sqlmain);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result001 = $stmt->get_result();
        $email=($result001->fetch_assoc())["pemail"];

        $sqlmain= "delete from webuser where email=?;";
        $stmt = $bd->prepare($sqlmain);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();


        $sqlmain= "delete from doctor where docemail=?";
        $stmt = $bd->prepare($sqlmain);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();

        header("location: ../logout.php");
    }


?>
