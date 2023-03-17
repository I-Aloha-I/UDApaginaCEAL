<?php

include("DB.php");
$Conexion=connect();

$rut=$_POST['Rut'];
$nombre=$_POST['Nombre'];
$apellido=$_POST['Apellido'];
$pass=$_POST['Contra'];
$correo=$_POST['Correo'];
$pregunta=$_POST['pregunta'];
$respuesta=$_POST['respuesta'];

$sql="UPDATE usuarios SET Rut='$rut',Nombre='$nombre',Apellido='$apellido',Contra='$pass',Correo='$correo',pregunta='$pregunta',respuesta='$respuesta' WHERE Rut='$rut'";
$query=mysqli_query($Conexion,$sql);

if($query){
    Header("Location: ../gestionUsuarios.php");
}
else{
    Header("Location: ../gestionUsuarios.php");
    /*?> <script src="Alertas/autenticacionLogin.js"></script> <?php*/
}
?>