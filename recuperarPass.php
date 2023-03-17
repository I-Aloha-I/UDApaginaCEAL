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
          </ul>
        </div>
      </div>
    </nav>

    <form class="form-register form-noModal" autocomplete="off" action="validarRecuperacion.php" method="POST">
        <p class="titulo-form">Recuperación de Contraseña</p>
        <input class="controls" type="text" name="Rut" id="Rut" placeholder="Ingrese su Run" pattern="[0-9]{7,8}-[0-9kK]{1}" Title="Ingrese su run, sin puntos y con guíon" required>
        <input class="controls" type="email" name="Correo" id="Correo" placeholder="Ingrese su Correo" pattern="[a-z]{1,100}.[a-z]{1,100}.[0-9]{1,2}@alumnos.uda.cl" Title="Debe ingresar su correo institucional" required>
        <input class="botones" type="submit" value="ENVIAR">
    </form>

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