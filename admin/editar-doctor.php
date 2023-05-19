    <?php

    include("../conexion.php");
    

    if($_POST){
        $result= $bd->query("select * from webuser");
        $name=$_POST['name'];
        $nic=$_POST['nic'];
        $oldemail=$_POST["oldemail"];
        $spec=$_POST['spec'];
        $email=$_POST['email'];
        $tele=$_POST['Tele'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $id=$_POST['id00'];
        
        if ($password==$cpassword){
            $error='3';
            $result= $bd->query("select doctor.docid from doctor inner join webuser on doctor.docemail=webuser.email where webuser.email='$email';");
            if($result->num_rows==1){
                $id2=$result->fetch_assoc()["docid"];
            }else{
                $id2=$id;
            }
            
            echo $id2."jdfjdfdh";
            if($id2!=$id){
                $error='1';
            }else{

                $sql1="update doctor set docemail='$email',docname='$name',docpassword='$password',docnic='$nic',doctel='$tele',specialties=$spec where docid=$id ;";
                $bd->query($sql1);
                
                $sql1="update webuser set email='$email' where email='$oldemail' ;";
                $bd->query($sql1);
                $error= '4';
                
            }
            
        }else{
            $error='2';
        }
    
    
        
        
    }else{
        $error='3';
    }
    

    header("location: doctores.php?action=edit&error=".$error."&id=".$id);
    ?>
    
   

</body>
</html>