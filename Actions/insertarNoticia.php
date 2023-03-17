<?php

include("DB.php");
$Conexion=connect();

$fecha=$_POST['Fecha'];
$contenido=$_POST['Contenido'];
$url=$_POST['URL_Img'];
$titulo=$_POST['Titulo'];

$sql="INSERT INTO noticia (Fecha, Contenido, URL_Img, Titulo) VALUES ('$fecha','$contenido','$url','$titulo')";
$query=mysqli_query($Conexion,$sql);

if($query){
    Header("Location: ../gestionNoticias.php");
}
else{
    Header("Location: ../gestionNoticias.php");
    /*?> <script src="Alertas/autenticacionLogin.js"></script> <?php*/
}


?>