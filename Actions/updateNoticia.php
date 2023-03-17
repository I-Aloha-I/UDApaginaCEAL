<?php

include("DB.php");
$Conexion=connect();

$idNoticia=$_POST['Id_Noticia'];
$titulo=$_POST['Titulo'];
$contenido=$_POST['Contenido'];
$url=$_POST['URL_Img'];
$fecha=$_POST['Fecha'];

$sql="UPDATE noticia SET Id_Noticia='$idNoticia',Titulo='$titulo',Contenido='$contenido',URL_Img='$url',Fecha='$fecha' WHERE Id_Noticia='$idNoticia'";
$query=mysqli_query($Conexion,$sql);

if($query){
    Header("Location: ../gestionNoticias.php");
}
else{
    Header("Location: ../gestionNoticias.php");
    /*?> <script src="Alertas/autenticacionLogin.js"></script> <?php*/
}
?>