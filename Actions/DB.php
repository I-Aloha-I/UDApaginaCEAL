<?php
function connect(){
    
    $SERVER = "localhost";
    $USER = "root";
    $PASS = "";
    $DB = "ceal";

    $Conexion = mysqli_connect($SERVER,$USER,$PASS);

    mysqli_select_db($Conexion,$DB);

    return $Conexion;
}
?>