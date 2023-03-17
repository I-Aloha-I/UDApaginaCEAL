<?php
session_start();
include('Actions/DB.php');
$Conexion=connect();
if(isset($_SESSION['rut'])){
  $rut = $_SESSION['rut'];
  $nombre = $_SESSION['nombre'];
}

$con=connect();
$sql="SELECT * FROM ceal";
$query=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina administrador</title>
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
    <!--------------------------   MUESTRA LOS CEALES---->
    <table border="8">
        <tr>
            <th style="width:250px;height:50px;">Nombre</th>
            <th style="width:250px;height:50px;">Apellido</th>
            <th style="width:250px;height:50px;">Nivel</th>
            <th style="width:250px;height:50px;">Cargo</th>
            <th style="width:250px;height:50px;">Correo</th>
            <th style="width:250px;height:50px;">Rut</th>
            <th style="width:250px;height:50px;">Inicio Cargo</th>
            <th style="width:250px;height:50px;">imagen</th>
            <th style="width:250px;height:50px;">FILTRAR</th>
            <th style="width:250px;height:50px;"></th>
        </tr>
        <tr>
            <?php while($row=mysqli_fetch_array($query)){ ?>
            <td ><?php echo $row['Nombre'] ?></td>
            <td ><?php echo $row['Apellido'] ?></td>
            <td ><?php echo $row['Nivel'] ?></td>
            <td ><?php echo $row['Cargo'] ?></td>
            <td ><?php echo $row['Correo'] ?></td>
            <td ><?php echo $row['Rut'] ?></td>
            <td ><?php echo $row['InicioCargo'] ?></td>
            <td ><img src="data:image/png;base64,<?php echo base64_encode($row['imagen']);?>" alt="no cargo" style="width:250px;height:200px;"></td>
            <td><a href="modificar.php?Rut=<?php echo $row['Rut'] ?>" class="btn btn-info">modificar</a></td>
            <td><a href="eliminar.php?Rut=<?php echo $row['Rut'] ?>" class="btn btn-info">eliminar</a></td>
        </tr>
        <?php }?>
    </table>
    <!--------------------------------------------------->

    <!---------------------------------AGREGAR CEAL------>
    <form class="form-register form-noModal" action="Actions/crearCeal.php" method="POST" enctype="multipart/form-data">
        <h1 style="text-align: center;">Ingresar nuevo Ceal</h1>
        <input class="controls" type="text" name="rut" id="Rut" placeholder="Ingrese su Run" pattern="[0-9]{7,8}-[0-9kK]{1}" Title="Ingrese su run, sin puntos y con guíon" required>
        <input class="controls" type="text" name="nombre" id="Nombre" placeholder="Ingrese sus Nombres" pattern="[a-zA-ZñÑüÜáéíóúÁÉÍÓÚ ]{1,200}" Title="Solo puede usar letras, tildes y espacios" required>
        <input class="controls" type="text" name="apellido" id="Apellido" placeholder="Ingrese sus Apellidos" pattern="[a-zA-ZñÑüÜáéíóúÁÉÍÓÚ ]{1,200}" Title="Solo puede usar letras, tildes y espacios" required>
        <select class="controls" name="cargo" required>
            <option>Tesorero</option>
            <option>Presidente</option>
            <option>VicePresidente</option>
            <option>Secretario</option>
            <option>Vocal</option>
        </select>
        <select class="controls" name="nivel" required>
            <option>101</option> <option>102</option>
            <option>201</option> <option>202</option>
            <option>301</option> <option>302</option>
            <option>401</option> <option>402</option>
            <option>501</option> <option>502</option>
            <option>601</option> <option>602</option>
        </select>
        <input class="controls" type="date" required name="inicio">
        <input class="controls" type="email" name="correo" id="Correo" placeholder="Ingrese su Correo" pattern="[a-z]{1,100}.[a-z]{1,100}.[0-9]{1,2}@alumnos.uda.cl" Title="Debe ingresar su correo institucional" required>
        <input class="controls" type="file" required name="img">
        <input class="botones" type="submit" value="Aceptar">
    </form>
    <!----------------------------------------------------->
</body>
</html>