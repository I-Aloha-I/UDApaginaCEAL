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
              <a class="navbar-link" href="Nosotros.html">NOSOTROS</a>
            </li>
            <li class="nav-item">
              <a class="navbar-link" href="Contacto.html">CONTACTO</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<?php
    include("Actions/DB.php");
    $Conexion=connect();

    $rut=$_POST['Rut'];
    $respuesta=$_POST['respuesta'];

    $sql="SELECT * FROM usuarios WHERE Rut='$rut' and respuesta='$respuesta'";
    $query=mysqli_query($Conexion,$sql);

    $row=mysqli_num_rows($query); // para obtener el numero de filas

    if ($row>0){ // si coincide un dato
        $row2=mysqli_fetch_array($query); // obteniendo un arreglo con todos los datos del usuario
    ?>

        <div class="form-register form-noModal">
            <p class="titulo-form"> <?php echo "Esta es tu contraseña actual: " . $row2['Contra'] ?> </p>

            <!-- Button trigger modal -->
            <p style="font-size: 25px"><a class="navbar-link" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
               ¿Quieres cambiarla?
            </a></p>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content contenido-modal">
                        <div class="modal-header modal-header-registro">
                            <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">Cambiar contraseña</h1>
                            <button style="background-color: red" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body modal-body-registro">
                            <form class="form-register" autocomplete="off" action="Actions/actualizarPass.php" method="POST">
                                <input class="controls" type="hidden" name="rut" id="rut" value="<?php echo $row2['Rut'] ?>" required>
                                <input class="controls" type="password" name="contra" id="contra" placeholder="Ingrese su nueva Contraseña" pattern="[0-9a-zA-Z ]{3,50}" required>
                                <input class="botones" type="submit" value="CAMBIAR CONTRASEÑA">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
    else{
        ?>
        <script src="Alertas/autenticacionLogin.js"></script>
        <?php
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