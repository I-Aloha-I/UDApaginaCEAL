<?php

include("Actions/DB.php");
$Conexion=connect();

session_start();
$rut = $_SESSION['rut'];
$nombre = $_SESSION['nombre'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!--LOGO-->
    <div class="container-fluid banner">
      <img src="img/logouda.png" alt="UDA">
    </div>
    <!--BARRA DE NAVEGACION-->
    <nav class="navbar navbar-dark navbar-expand-lg center bg-green nav-size">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="navbar-item">
              <a class="navbar-link" aria-current="page" href="index.php">INICIO</a>
            </li>
            <li class="nav-item">
              <a class="navbar-link" href="Nosotros.php">NOSOTROS</a>
            </li>
            <li class="nav-item">
              <a class="navbar-link" href="Contacto.php">CONTACTO</a>
            </li>
            <?php
              if(isset($nombre)){
            ?>
                <li class="nav-item">
                  <a class="navbar-link" href="Actions/logout.php"> CERRAR SESIÓN </a>
                </li>
                <li class="nav-item">
                  <a class="navbar-link" href="#"> SESIÓN: <?php echo $nombre; ?> </a>
                </li>
              <?php
                if($rut=='20111000-k'){
              ?>
                  <li class="nav-item">
                    <a class="navbar-link" href="gestionUsuarios.php"> GESTIÓN DE USUARIOS </a>
                  </li>
                  <li class="nav-item">
                    <a class="navbar-link" href="gestionNoticias.php"> GESTIÓN DE NOTICIAS </a>
                  </li>
              <?php
                }
              ?>
            <?php
              }
              else{
                include("registroLogin.html");
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <form class="form-register form-noModal" autocomplete="off" action="" method="POST">
        <h4>BUSQUEDA DE NOTICIAS</h4>
        <input class="controls" type="text" name="busquedaId" placeholder="Ingrese la ID que desea buscar">
        <input class="controls" type="text" name="busquedaTitulo" placeholder="Ingrese el Titulo que desea buscar">
        <!--BOTONES / LINKS-->
        <input class="botones" type="submit" name="buscar" value="BUSCAR">
        <div class="botones" style="height: 45px; text-align: center; font-size: 16px; line-height: 20px; margin-top: 0px"><a style="text-decoration: none" href="gestionNoticias.php">VOLVER</a></div>
    </form>

    <!-------MOSTRANDO LOS DATOS------>
    <?php
        if(isset($_POST['buscar'])){
            $id=$_POST['busquedaId'];
            $titulo=$_POST['busquedaTitulo'];

            // caso 1 - id
            if(!empty($id) and empty($titulo)){
                $sql = "SELECT *, DATE_FORMAT(Fecha,'%d/%m/%Y') as Fecha FROM noticia WHERE Id_Noticia LIKE '%$id%'";
                $query=mysqli_query($Conexion,$sql);
                include("tabla.php");
            }
            // caso 2 - titulo
            else if(!empty($titulo) and empty($id)){
                $sql = "SELECT *, DATE_FORMAT(Fecha,'%d/%m/%Y') as Fecha FROM noticia WHERE Titulo LIKE '%$titulo%'";
                $query=mysqli_query($Conexion,$sql);
                include("tabla.php");
            }
            // caso 3 - id y titulo
            else if(!empty($id) and !empty($titulo)){
                $sql = "SELECT *, DATE_FORMAT(Fecha,'%d/%m/%Y') as Fecha FROM noticia WHERE Id_Noticia LIKE '%$id%' and Titulo LIKE '%$titulo%'";
                $query=mysqli_query($Conexion,$sql);
                include("tabla.php");
            }
            // caso 4 - nada
            else{
                include("tabla.php");
            }
        }
        else{
            include("tabla.php");
        }
        ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

<footer class="bg-dark  text-center text-lg-start">
  <div class="container p-4">
    <div class="row">
      <div col-6>
        <img src="img/logouda-white.png" alt="Uda">
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <p>
          © 2022 Universidad de Atacama
        </p>
      </div>
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <p>
          Universidad de Atacama - Copayapu 485 - Copiapó - Chile
        </p>
      </div>
    </div>
  </div>
</footer>

</html>