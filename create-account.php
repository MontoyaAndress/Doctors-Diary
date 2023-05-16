<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animaciones.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
        
    <title>Crear cuenta</title>
    <style>
        .container{
            animation: transitionIn-X 0.5s;
        }
    </style>
</head>
<body>
<?php

session_start();

$_SESSION["user"]="";
$_SESSION["usertype"]="";

date_default_timezone_set('america/mexico_city');
$date = date('d-m-Y');

$_SESSION["date"]=$date;


include("conexion.php");





if($_POST){

    $result= $bd->query("select * from webuser");

    $fname=$_SESSION['personal']['fname'];
    $lname=$_SESSION['personal']['lname'];
    $name=$fname." ".$lname;
    $address=$_SESSION['personal']['address'];
    $nic=$_SESSION['personal']['nic'];
    $dob=$_SESSION['personal']['dob'];
    $email=$_POST['newemail'];
    $tele=$_POST['tele'];
    $newpassword=$_POST['newpassword'];
    $cpassword=$_POST['cpassword'];
    
    if ($newpassword==$cpassword){
        $sqlmain= "select * from webuser where email=?;";
        $stmt = $bd->prepare($sqlmain);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows==1){
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>';
        }else{
            $bd->query("insert into patient(pemail,pname,ppassword, paddress, pnic,pdob,ptel) values('$email','$name','$newpassword','$address','$nic','$dob','$tele');");
            $bd->query("insert into webuser values('$email','p')");

            $_SESSION["user"]=$email;
            $_SESSION["usertype"]="p";
            $_SESSION["username"]=$fname;

            header('Location: paciente/index.php');
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>';
        }
        
    }else{
        $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Vuelve a confirmar tu contraseña</label>';
    }



    
}else{
    $error='<label for="promter" class="form-label"></label>';
}

?>


    <center>
    <div class="container">
        <table border="0" style="width: 69%;">
            <tr>
                <td colspan="2">
                    <p class="header-text">Continuemos</p>
                    <p class="sub-text">Crea tu cuenta</p>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="newemail" class="form-label">Correo electrónico: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="email" name="newemail" class="input-text" placeholder="Correo electrónico" required>
                </td>
                
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="tele" class="form-label">Teléfono: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="tel" name="tele" class="input-text"  placeholder="ex: 9612345678" >
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="newpassword" class="form-label">Contraseña: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="password" name="newpassword" class="input-text" placeholder="Contraseña" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="cpassword" class="form-label">Confirmar contraseña: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="password" name="cpassword" class="input-text" placeholder="Confirmar contraseña" required>
                </td>
            </tr>
     
            <tr>
                
                <td colspan="2">
                    <?php echo $error ?>
                </td>
            </tr>
            
            <tr>
                <td>
                    <input type="reset" value="Cancelar" class="login-btn btn-primary-soft btn" >
                </td>
                <td>
                    <input type="submit" value="Regístrate" class="login-btn btn-primary btn">
                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">¿Ya tienes una cuenta&#63; </label>
                    <a href="login.php" class="hover-link1 non-style-link">Inicia sesión</a>
                    <br><br><br>
                </td>
            </tr>
                    </form>
            </tr>
        </table>

    </div>
</center>
</body>
</html>