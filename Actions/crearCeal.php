<?php 

session_start();
include('DB.php');
$con=connect();

$imagen= addslashes(file_get_contents($_FILES['img']['tmp_name']));
$nombre= $_POST['nombre'];
$apellido= $_POST['apellido'];
$rut= $_POST['rut'];
$cargo= $_POST['cargo'];
$nivel= $_POST['nivel'];
$inicio= $_POST['inicio'];
$correo= $_POST['correo'];

$sql="INSERT INTO ceal VALUES('$rut','$nombre','$apellido','$cargo','$nivel','$inicio','$correo','$imagen')";
$query=mysqli_query($con,$sql);
var_dump($query);

if($query){
    echo "listo";
    Header("Location: ../administradorCeal.php");
}
else{
    echo "hola";
}

?>