<?php

include('DB.php');
$con=connect();
session_start();

if(isset($_POST['actualizar'])){

    $rut= $_POST['rut'];
    $nombre= $_POST['nombre'];
    $apellido= $_POST['apellido'];
    $cargo= $_POST['cargo'];
    $nivel= $_POST['nivel'];
    $inicio= $_POST['inicio'];
    $correo= $_POST['correo'];
    if ($_FILES['img']['tmp_name'] !=NULL)
        {$imagen= addslashes(file_get_contents($_FILES['img']['tmp_name']));}
    if (isset($imagen))
        {$sql="UPDATE ceal SET Nombre='$nombre', Apellido='$apellido', Cargo='$cargo', Nivel='$nivel', InicioCargo='$inicio', Correo='$correo', 
        imagen='$imagen' WHERE Rut= '$rut'";
        $query=mysqli_query($con,$sql);}
        else
        {
            $sql="UPDATE ceal SET Nombre='$nombre', Apellido='$apellido', Cargo='$cargo', Nivel='$nivel', InicioCargo='$inicio', Correo='$correo' WHERE Rut= '$rut'";
            $query=mysqli_query($con,$sql);}   

    if($query){
        Header("Location: ../administradorCeal.php");
    }
}