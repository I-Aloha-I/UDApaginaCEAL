<?php

include("Actions/DB.php");
$Conexion=connect();

session_start();
$rut = $_SESSION['rut'];
$nombre = $_SESSION['nombre'];

$sql="SELECT * FROM usuarios";
$query=mysqli_query($Conexion,$sql);

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
                  <a class="navbar-link" href="#"><?php echo $nombre; ?> </a>
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

    <form class="form-register form-noModal" autocomplete="off" action="Actions/insertarUsuarioAdmin.php" method="POST">
        <h4>REGISTRO DE USUARIOS</h4>
        <input class="controls" type="text" name="Rut" id="Rut" placeholder="Ingrese su Run" pattern="[0-9]{7,8}-[0-9kK]{1}" Title="Ingrese su run, sin puntos y con guíon" required>
        <input class="controls" type="text" name="Nombre" id="Nombre" placeholder="Ingrese sus Nombres" pattern="[a-zA-ZñÑüÜáéíóúÁÉÍÓÚ ]{1,200}" Title="Solo puede usar letras, tildes y espacios" required>
        <input class="controls" type="text" name="Apellido" id="Apellido" placeholder="Ingrese sus Apellidos" pattern="[a-zA-ZñÑüÜáéíóúÁÉÍÓÚ ]{1,200}" Title="Solo puede usar letras, tildes y espacios" required>
        <input class="controls" type="email" name="Correo" id="Correo" placeholder="Ingrese su Correo" pattern="[a-z]{1,100}.[a-z]{1,100}.[0-9]{1,2}@alumnos.uda.cl" Title="Debe ingresar su correo institucional" required>
        <input class="controls" type="password" name="Contra" id="Contra" placeholder="Ingrese su Contraseña" pattern="[0-9a-zA-Z ]{3,50}" Title="Solo puede usar letras, números y espacios. La contraseña debe contener mínimo 5 caracteres" required>
        <!--Pregunta de seguridad-->
        <select class="controls" id="pregunta" name="pregunta" required>
        <option value="" disabled selected>Seleccione una pregunta de seguridad</option>
        <option value="¿Qué nombre(s) tiene tu padre?">¿Qué nombre(s) tiene tu padre?</option>
        <option value="¿Qué nombre(s) tiene tu madre?">¿Qué nombre(s) tiene tu madre?</option>
        <option value="¿Dónde se conocieron tus padres?">¿Dónde se conocieron tus padres?</option>
        <option value="¿Cuál es el nombre de tu primer mascota?">¿Cuál es el nombre de tu primer mascota?</option>
        <option value="¿Con quién diste tu primer beso?">¿Con quién diste tu primer beso?</option>
        <option value="¿Cuál es tu videojuego favorito?">¿Cuál es tu videojuego favorito?</option>
        <option value="¿Cuál es tu cantante favorito?">¿Cuál es tu cantante favorito?</option>
        <option value="¿Dónde estudiaste?">¿Dónde estudiaste?</option>
        <option value="¿Cómo te llamaban cuando eras niño(a)?">¿Cómo te llamaban cuando eras niño(a)?</option>
        <option value="¿Si tuvieras que pedir un deseo, cual sería?">¿Si tuvieras que pedir un deseo, cual sería?</option>
        <option value="¿Qué lugar del mundo te gustaría visitar?">¿Qué lugar del mundo te gustaría visitar?</option>
        <option value="¿A qué te querías dedicar cuando eras niño(a)?">¿A qué te querías dedicar cuando eras niño(a)?</option>
        </select>
        <!--Respuesta-->
        <input type="text" placeholder="Ingrese una respuesta" id="respuesta" name="respuesta" class="controls" required>
        <input class="botones" type="submit" value="REGISTRAR">
        <div class="botones" style="height: 45px; text-align: center; font-size: 16px; line-height: 20px; margin-top: 0px"><a style="text-decoration: none" href="buscarUsuario.php">BUSCAR USUARIO</a></div>
    </form>

    <?php include('tablaUsuarios.php'); ?>

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