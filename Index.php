<?php

  include("Actions/DB.php");
  $Conexion=connect();

  session_start();
  if (isset($_SESSION['rut']) && isset($_SESSION['nombre']))
    { 
      $rut = $_SESSION['rut'];
      $nombre = $_SESSION['nombre'];
    }
  $sql="SELECT * FROM noticia";
  $resultado=mysqli_query($Conexion, $sql);
  $numRows=mysqli_num_rows($resultado); // Para obtener el numero de filas (numero de arrays)
  $cont=1; // Contador

  while ($row = mysqli_fetch_array($resultado)){
    $ultID=$row['Id_Noticia']; // En cada ciclo se asigna la id a $ultID (se van sobreescribiendo sobre $ultID). Entonces cuando se termina el ciclo, $ultID contiene la ultima id (noticia mas reciente, con id mayor)
  }
  $resultado=mysqli_query($Conexion, $sql); // Debido a la linea 10, se volvio a escribir esta linea, para poder volver a usar el $row = mysqli_fetch_array($resultado)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEAL UDA</title>
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
              <a class="navbar-link-active" aria-current="page" href="#">INICIO</a>
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

    <!--CONTAINER CAROUSEL-->
    <div class="container-fluid">
      <!--CAROUSEL-->
      <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="false">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/banner-grupo-personas.jpg" class="d-block w-100 imgCarousel" alt="imagen 1">
          </div>
          <div class="carousel-item">
            <img src="img/banner-grupo-personas.jpg" class="d-block w-100 imgCarousel" alt="imagen 2">
          </div>
          <div class="carousel-item">
            <img src="img/banner-grupo-personas.jpg" class="d-block w-100 imgCarousel" alt="imagen 3">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  <!---------------------------------->
  <!----------INICIO CONTENIDO-------->

  <div class="container-fluid">
    <!--ROW 1-->
    <div class="row gap-4 justify-content-center my-4">
      <!--COL 1-->
      <?php
      while ($row = mysqli_fetch_array($resultado)){ // Se recorre todos los array creados | cada array contiene todos los datos respectivos (id, contenido, titulo, etc.)
        if ($row['Id_Noticia'] == $ultID and $cont <= $numRows){?> <!-- $numRows contiene la cantidad de arrays. Esta condición es para obtener solo el ultimo array (noticia mas reciente) -->
          <div class="col-3">
            <div class="card card-noticias" style="width: 100%;">
              <img src="<?php echo $row['URL_Img'];?>" class="card-img-top" alt="Imagen">
              <div class="card-body card-body-index">
                <h5 class="card-title tituloCards"><?php echo $row['Titulo'];?></h5><hr>
                <p class="card-text textoCards"><?php echo $row['Contenido'];?></p>
                <a href="noticias.php?id=<?php echo $row['Id_Noticia']?>">Leer más</a>
              </div>
            </div>
          </div>
      <?php
        $sql2="SELECT * FROM noticia WHERE Id_Noticia < $ultID"; // sql para obtener todos los arrays menos el ultimo
        $resultado2=mysqli_query($Conexion, $sql2);
        while ($row2 = mysqli_fetch_array($resultado2)){ // aqui se recorre cada array, menos el ultimo
          $ultID=$row2['Id_Noticia']; // $ultID ahora contiene la id anterior
        }
        $cont++; // Se aumenta el contador en uno, para que cuando este numero supere a $numRows (cantidad de noticias) en la linea 93, no se ejecute la condición. Esto es para que no se imprima infinitamente el contenido de la noticia con id mas baja, pues el if de la linea 93 sin su segunda condicion provocaría que se imprima infinitamente la primer noticia (id mas baja), ya que al acabar los arrys, $ultID permanece con el valor de la id mas baja.
        $resultado=mysqli_query($Conexion, $sql);
        }
      }
      ?>

    </div> <!--fin div row-->
  </div> <!--fin div container-->

  <!--------FIN CONTENIDO--------->

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