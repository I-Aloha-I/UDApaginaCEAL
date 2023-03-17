<?php

include("DB.php");
$Conexion=connect();

$rut=$_GET['Rut'];

if($rut!='20111000-k'){
    $sql="DELETE FROM usuarios WHERE Rut='$rut'";
    $query=mysqli_query($Conexion,$sql);

    if($query){
        Header("Location: ../gestionUsuarios.php");
    }
    else{
        Header("Location: ../gestionUsuarios.php");
        /*?> <script src="Alertas/autenticacionLogin.js"></script> <?php*/
    }
}
else{
    Header("Location: ../gestionUsuarios.php");
    /*?> <script src="Alertas/noEliminarAdmin.js"></script> <?php*/
}

?>