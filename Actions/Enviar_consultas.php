<?php 
session_start();
include("DB.php");
$conexion = connect();
$email = $_POST['email'];
$asunto = $_POST['asunto'];
$contenido = $_POST['contenido'];
$fecha = date("Y-m-d");

if ($conexion->connect_error) {
    die("Conexion fallida: " . $conexion->connect_error);
}

$sql = $conexion->prepare("INSERT INTO consultas (asunto, contenido, fecha, email) VALUES (?, ?, ?, ?)");
$sql->bind_param('ssss',$asunto, $contenido, $fecha, $email);
$sql->execute();

$sql->close();

HEADER("Location: ../Contacto.php");

?>
