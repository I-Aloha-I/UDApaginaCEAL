<?php
  include("Actions/DB.php");
  $Conexion=connect();

  session_start();
  if (isset($_SESSION['rut']) && isset($_SESSION['nombre']))
  { 
    $rut = $_SESSION['rut'];
    $nombre = $_SESSION['nombre'];
  }
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
    <div class="container-fluid banner">
      <img src="img/logouda.png" alt="UDA">
    </div>
    <nav class="navbar navbar-dark navbar-expand-lg center bg-green nav-size">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="navbar-item">
              <a class="navbar-link" href="index.php">INICIO</a>
            </li>
            <li class="nav-item">
              <a class="navbar-link" href="Nosotros.php">NOSOTROS</a>
            </li>
            <li class="nav-item">
              <a class="navbar-link-active" aria-current="page" href="#">CONTACTO</a>
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
    <div class="container p-5 gallery">
        <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-3">
          <div class="col">
              <img src="img/IMGDE1.jpeg" class="gallery-item" alt="gallery">
          </div>
          <div class="col">
              <img src="img/IMGDE2.jpeg" class="gallery-item" alt="gallery">
          </div>
          <div class="col">
              <img src="img/IMGDE3.jpeg" class="gallery-item" alt="gallery">
          </div>
          <div class="col">
              <img src="img/IMGDE4.jpg" class="gallery-item" alt="gallery">
          </div>
          <div class="col">
              <img src="img/IMGDE5.jpg" class="gallery-item" alt="gallery">
          </div>
          <div class="col">
              <img src="img/IMGDE6.jpg" class="gallery-item" alt="gallery">
          </div>
        </div>
    </div>

    <section class="shadow p-3 mb-4 rounded">

      <div class="container">
          <div class="row justify-content-around">
              <div class="col-6">
                  <div class="text-center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3543.60385800105!2d-70.35485435556517!3d-27.356850647405178!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x969803ee988f304f%3A0x5d6a6c8301905dfb!2sUniversidad%20de%20Atacama!5e0!3m2!1ses!2scl!4v1665338561034!5m2!1ses!2scl" width="500px" height="500px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
              </div>
              <div class="col-6">
                  <div class="text-center ">
                    <form action="Actions/Enviar_consultas.php" method="POST">
                      <div class="mb-4">
                          <label for="email" class="form-label">Realizar una consulta.</label>
                          <input type="email" class="form-control" name="email" required placeholder="Ingrese su correo electrónico">
                      </div>
                      <div class="mb-4">
                        <input type="text" class="form-control" name="asunto" required placeholder="Asunto">
                      </div>
                      <div class="form-group mb-5">
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="contenido" rows="3" placeholder="Ingrese su consulta"></textarea>
                      </div>
                      <div class="d-grid">
                          <button style="width:100%;" type="submit" class="botones">Enviar solicitud</button>
                      </div>
                    </form>
                  </div>                   
              </div>
          </div>
      </div>   
  </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

<footer class="bg-dark text-center text-lg-start ">
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