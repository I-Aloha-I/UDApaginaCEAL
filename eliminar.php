<?php
session_start();
include('Actions/DB.php');
$con=connect();

$Rut_id=$_GET['Rut'];
$sql="SELECT * FROM ceal WHERE Rut='$Rut_id'";
$query=mysqli_query($con,$sql);
$row=mysqli_fetch_array($query);
$cargo=$row['Cargo'];
$imgane=$row['imagen'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if ($cargo=="Tesorero") {
        $sql="DELETE FROM ceal  WHERE Rut='$Rut_id'";
        $query=mysqli_query($con,$sql);        
        if($query){
            Header("Location: administradorceal.php");
        }
    }
    ?>
    <?php if ($cargo=="Precidente") {
        $sql="DELETE FROM ceal  WHERE Rut='$Rut_id'";
        $query=mysqli_query($con,$sql);        
        if($query){
            Header("Location: administradorceal.php");
        }
    }
    ?>
    <?php if ($cargo=="VicePrecidente") {
        $sql="DELETE FROM ceal  WHERE Rut='$Rut_id'";
        $query=mysqli_query($con,$sql);        
        if($query){
            Header("Location: administradorceal.php");
        }
    }
    ?>
    <?php if ($cargo=="Secretario") {
        $sql="DELETE FROM ceal  WHERE Rut='$Rut_id'";
        $query=mysqli_query($con,$sql);        
        if($query){
            Header("Location: administradorceal.php");
        }
    }
    ?>
    <?php if ($cargo=="Vocal") {
        $sql="DELETE FROM ceal  WHERE Rut='$Rut_id'";
        $query=mysqli_query($con,$sql);        
        if($query){
            Header("Location: administradorceal.php");
        }
    }
    ?>

    
</body>
</html>