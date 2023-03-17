<?php
include('Actions/DB.php');
session_start();

//---------------bace dato de index---------------

$Conexion=connect();
if (isset($_SESSION['rut']) && isset($_SESSION['nombre']))
    { 
      $rut = $_SESSION['rut'];
      $nombre = $_SESSION['nombre'];
    }

//---------------FIN BACE DE DATOS INDEX-----------
  
//---------------bace dato de nosotros-------------

$con=connect();
$sql="SELECT * FROM ceal";
$query=mysqli_query($con,$sql);

$tesorero;
$preci;
$Vice;
$secre;
$Vocal;
$adm;
while($row=mysqli_fetch_array($query)){
  if($row['Cargo']=="Tesorero"){
    $tesorero['Cargo']=$row['Cargo'];
    $tesorero['Nombre']=$row['Nombre'];
    $tesorero['Apellido']=$row['Apellido'];
    $tesorero['Rut']=$row['Rut'];
    $tesorero['Nivel']=$row['Nivel'];
    $tesorero['InicioCargo']=$row['InicioCargo'];
    $tesorero['Correo']=$row['Correo'];
    $tesorero['imagen']=$row['imagen'];
    #php var_dump($tesorero);
  }
  if($row['Cargo']=="Presidente"){
    $preci['Cargo']=$row['Cargo'];
    $preci['Nombre']=$row['Nombre'];
    $preci['Apellido']=$row['Apellido'];
    $preci['Rut']=$row['Rut'];
    $preci['Nivel']=$row['Nivel'];
    $preci['InicioCargo']=$row['InicioCargo'];
    $preci['Correo']=$row['Correo'];
    $preci['imagen']=$row['imagen'];
    #var_dump($preci);
  }
  if($row['Cargo']=="VicePresidente"){
    $Vice['Cargo']=$row['Cargo'];
    $Vice['Nombre']=$row['Nombre'];
    $Vice['Apellido']=$row['Apellido'];
    $Vice['Rut']=$row['Rut'];
    $Vice['Nivel']=$row['Nivel'];
    $Vice['InicioCargo']=$row['InicioCargo'];
    $Vice['Correo']=$row['Correo'];
    $Vice['imagen']=$row['imagen'];
    #var_dump($Vice);
  }
  if($row['Cargo']=="Secretario"){
    $secre['Cargo']=$row['Cargo'];
    $secre['Nombre']=$row['Nombre'];
    $secre['Apellido']=$row['Apellido'];
    $secre['Rut']=$row['Rut'];
    $secre['Nivel']=$row['Nivel'];
    $secre['InicioCargo']=$row['InicioCargo'];
    $secre['Correo']=$row['Correo'];
    $secre['imagen']=$row['imagen'];
    #var_dump($secre);
  }
  if($row['Cargo']=="Vocal"){
    $Vocal['Cargo']=$row['Cargo'];
    $Vocal['Nombre']=$row['Nombre'];
    $Vocal['Apellido']=$row['Apellido'];
    $Vocal['Rut']=$row['Rut'];
    $Vocal['Nivel']=$row['Nivel'];
    $Vocal['InicioCargo']=$row['InicioCargo'];
    $Vocal['Correo']=$row['Correo'];
    $Vocal['imagen']=$row['imagen'];
    #var_dump($Vocal);
  }
}
  $sql="SELECT * FROM adm";
  $query=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($query)){
    $adm['Correo']=$row['Correo'];
    #echo $adm['Correo'];
  }
//-------------------FIN BACE DE DATOS NOSOTROS---------
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
              <a class="navbar-link" href="Index.php">INICIO</a>
            </li>
            <li class="nav-item">
              <a class="navbar-link-active" aria-current="page" href="#">NOSOTROS</a>
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
<!----------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------->

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/carousel1.png" alt="..." style="width: 100%; height: 100%;">
        </div>
      </div>
    </div>

    <!------------------TESORERO-------------------------->
    <?php if(!empty($tesorero)): ?>
    <div class="container-fluid">
      <div class="row justify-content-md-center">
        <div class="col-3">
          <div class="card-prototipe m-3">
            <div class="face front">
              <img src="img/uda.png" alt="...">
              <h2><?php echo $tesorero['Cargo'] ?></h2>
            </div>
            <div class="face back">
              <h3><?php echo $tesorero['Cargo'] ?></h3>
              <img src="data:image/png;base64,<?php echo base64_encode($tesorero['imagen']);?>" alt="no cargo">
              <p><?php echo $tesorero['Nombre'] ?></p>
              <div class="link">
                <a href="#"><?php echo $tesorero['Correo'] ?></a>
              </div>
            </div>
          </div>
        </div>
    <?php else: ?>
      <div>
      <?php
        if($rut=='20111000-k'){
              ?>
        <a style="margin-left: 25%;" class="btn botones" href="administradorceal.php">Registrar CEAL</a>
     <?php
      }
      ?>
    </div>
      <div class="container-fluid">
      <div class="row justify-content-md-center">
        <div class="col-3">
          <div class="card-prototipe m-3">
            <div class="face front">
              <img src="img/uda.png" alt="...">
              <h2>Bacante Tesorero</h2>
            </div>
            <div class="face back">
              <h3>Tesorero</h3>
              <img src="img/OIP.png" alt="...">
              <p>Solicitar cargo a</p>
              <div class="link">
                <a href="#"><?php echo $adm['Correo'] ?></a>
              </div>
            </div>
          </div>
        </div>
    <?php endif ?>
    <!-------------------------------------------->
    <!------------------PRECIDENTE------------------------>
      <?php if(!empty($preci)): ?>
        <div class="col-3">
          <div class="card-prototipe m-3">
            <div class="face front">
              <img src="img/uda.png" alt="...">
              <h2><?php echo $preci['Cargo'] ?></h2>
            </div>
            <div class="face back">
              <h3><?php echo $preci['Cargo'] ?></h3>
              <img src="data:image/png;base64,<?php echo base64_encode($preci['imagen']);?>" alt="no cargo">
              <p><?php echo $preci['Nombre'] ?></p>
              <div class="link">
                <a href="#"><?php echo $preci['Correo'] ?></a>
              </div>
            </div>
          </div>
        </div>
        <?php else: ?>
        <div class="col-3">
          <div class="card-prototipe m-3">
            <div class="face front">
              <img src="img/uda.png" alt="...">
              <h2>Bacante Precidente</h2>
            </div>
            <div class="face back">
              <h3>Precidente</h3>
              <img src="img/OIP.png" alt="...">
              <p>Solitar cargo a</p>
              <div class="link">
              <a href="#"><?php echo $adm['Correo'] ?></a>
              </div>
            </div>
          </div>
        </div>
      <?php endif ?>
    <!-------------------------------------------->

    <!-----------------VICEPRECIDENTE------------------------>
      <?php if(!empty($Vice)): ?> 
        <div class="col-3">
          <div class="card-prototipe m-3">
            <div class="face front">
              <img src="img/uda.png" alt="EROOR al cargar">
              <h2><?php echo $Vice['Cargo'] ?></h2>
            </div>
            <div class="face back">
              <h3><?php echo $Vice['Cargo'] ?></h3>
              <img src="data:image/png;base64,<?php echo base64_encode($Vice['imagen']);?>" alt="no cargo">
              <p><?php echo $Vice['Nombre']?></p>
              <div class="link">
                <a href="#"><?php echo $Vice['Correo']?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php else: ?> 
        <div class="col-3">
          <div class="card-prototipe m-3">
            <div class="face front">
              <img src="img/uda.png" alt="EROOR al cargar">
              <h2>Bacante VicePrecidente</h2>
            </div>
            <div class="face back">
              <h3>VicePrecidente</h3>
              <img src="img/OIP.png" alt="...">
              <p>Solicitar cargo a</p>
              <div class="link">
                <a href="#"><?php echo $adm['Correo'] ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endif ?>
      <!-------------------------------------------->

      <!----------------SECRETARIO------------------------>
      <?php if(!empty($secre)): ?> 
      <div class="row justify-content-md-center">
        <div class="col-3">
          <div class="card-prototipe m-3">
            <div class="face front">
              <img src="img/uda.png" alt="...">
              <h2><?php echo $secre['Cargo'] ?></h2>
            </div>
            <div class="face back">
              <h3><?php echo $secre['Cargo'] ?></h3>
              <img src="data:image/png;base64,<?php echo base64_encode($secre['imagen']);?>" alt="no cargo">
              <p><?php echo $secre['Nombre'] ?></p>
              <div class="link">
                <a href="#"><?php echo $secre['Correo'] ?></a>
              </div>
            </div>
          </div>
        </div>
      <?php else: ?>
        <div class="row justify-content-md-center">
        <div class="col-3">
          <div class="card-prototipe m-3">
            <div class="face front">
              <img src="img/uda.png" alt="...">
              <h2>Bacante Secretario</h2>
            </div>
            <div class="face back">
              <h3>Secretario</h3>
              <img src="img/OIP.png" alt="...">
              <p>Solitar cargo a</p>
              <div class="link">
              <a href="#"><?php echo $adm['Correo'] ?></a>
              </div>
            </div>
          </div>
        </div>
      <?php endif ?>
        <!-------------------------------------------->

        <!----------------VOCAL------------------------>
        <?php if(!empty($Vocal)): ?> 
        <div class="col-3">
          <div class="card-prototipe m-3">
            <div class="face front">
              <img src="img/uda.png" alt="...">
              <h2><?php echo $Vocal['Cargo'] ?></h2>
            </div>
            <div class="face back">
              <h3><?php echo $Vocal['Cargo'] ?></h3>
              <img src="data:image/png;base64,<?php echo base64_encode($Vocal['imagen']);?>" alt="no cargo">
              <p><?php echo $Vocal['Nombre'] ?></p>
              <div class="link">
                <a href="#"><?php echo $Vocal['Correo'] ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php else: ?>
      <div class="col-3">
          <div class="card-prototipe m-3">
            <div class="face front">
              <img src="img/uda.png" alt="...">
              <h2>Bacante Vocal</h2>
            </div>
            <div class="face back">
              <h3>Vocal</h3>
              <img src="img/OIP.png" alt="...">
              <p>Solitar cargo a</p>
              <div class="link">
              <a href="#"><?php echo $adm['Correo'] ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif ?>
  <!-------------------------------------------->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

<footer class="bg-dark text-center text-lg-start">
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