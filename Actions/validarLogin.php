<?php

include("DB.php");
$Conexion=connect();

$correo=$_POST['Correo'];
$pass=$_POST['Contra'];

$sql="SELECT * FROM usuarios WHERE Correo='$correo' and Contra='$pass'";
$query=mysqli_query($Conexion,$sql);

$row=mysqli_fetch_array($query); // para obtener un arreglo con todos los datos del usuario

$row2=mysqli_num_rows($query); // para obtener el numero de filas
if ($row2>0){ // si coincide un dato
    session_start();

    $_SESSION["rut"] = $row["Rut"];
    $_SESSION["nombre"] = $row["Nombre"];
    $_SESSION["pass"] = $row["Contra"];

    header("location: ../index.php");
}
else{
    header("location: ../index.php");
    /*?> <script src="Alertas/autenticacionLogin.js"></script> <?php*/
}
?>