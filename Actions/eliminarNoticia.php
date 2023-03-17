<?php

include("DB.php");
$Conexion=connect();

$idNoticia=$_GET['Id_Noticia'];

$sql="DELETE FROM noticia WHERE Id_Noticia='$idNoticia'";
$query=mysqli_query($Conexion,$sql);

if($query){
    Header("Location: ../gestionNoticias.php");
}
else{
    /*?> <script src="Alertas/autenticacionLogin.js"></script> <?php*/
    Header("Location: ../gestionNoticias.php");
}

?>