<?php

include("DB.php");
$Conexion=connect();

$rut=$_POST['rut'];
$contra=$_POST['contra'];

$sql="UPDATE usuarios SET Contra='$contra' WHERE Rut='$rut'";
$query=mysqli_query($Conexion,$sql);

if($query){
    Header("Location: ../index.php");
}

else{
    echo "error :c"."<br>";
    var_dump($sql);
}

?>