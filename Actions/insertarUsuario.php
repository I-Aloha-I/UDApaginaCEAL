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

$sql="INSERT INTO usuarios (Rut, Nombre, Apellido, Contra, Correo, pregunta, respuesta) VALUES ('$rut','$nombre','$apellido','$pass','$correo','$pregunta','$respuesta')";
$query=mysqli_query($Conexion,$sql);

if($query){
    Header("Location: ../index.php");
}
else{
    Header("Location: ../index.php");
    /*?> <script src="Alertas/errorRegistro.js"></script> <?php*/
}

mysqli_close($Conexion);

?>