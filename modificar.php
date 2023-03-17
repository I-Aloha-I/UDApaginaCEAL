<?php
session_start();
include('Actions/DB.php');
$con= connect();

$Rut= $_GET['Rut'];
$sql= "SELECT * FROM ceal WHERE Rut='$Rut'";
$query= mysqli_query($con,$sql);
$row= mysqli_fetch_array($query);
$cargo= $row['Cargo'];
$nivel= $row['Nivel'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Ceal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form class="form-register form-noModal" action="Actions/rescribir.php" method="POST" enctype="multipart/form-data">
        <h1 style="text-align: center;">Modificar Ceal</h1>
        <input type="hidden" value="<?php echo $_GET['Rut'] ?>" name="rut">
        <input class="controls" type="text" required name="nombre" value=<?php echo $row['Nombre']?> placeholder="Nombre">
        <input class="controls" type="text" required name="apellido" value=<?php echo $row['Apellido']?> placeholder="Apellido">
        <select class="controls" name="cargo" required>
            <?php if($cargo == "Tesorero"): ?> <option selected>Tesorero</option>
            <?php else: ?> <option>Tesorero</option> <?php endif; ?>
            
            <?php if($cargo == "Presidente"): ?> <option selected>Presidente</option>
            <?php else: ?> <option>Presidente</option> <?php endif; ?>

            <?php if($cargo == "VicePresidente"): ?> <option selected>VicePrecidente</option>
            <?php else: ?> <option>VicePresidente</option> <?php endif; ?>

            <?php if($cargo == "Secretario"): ?> <option selected>Secretario</option>
            <?php else: ?> <option>Secretario</option> <?php endif; ?>

            <?php if($cargo == "Vocal"): ?> <option selected>Vocal</option>
            <?php else: ?> <option>Vocal</option> <?php endif; ?>
        </select>
        <select class="controls" name="nivel" required>
            <?php if($nivel == "101"): ?> <option selected>101</option>
            <?php else: ?> <option>101</option> <?php endif; ?>

            <?php if($nivel == "102"): ?> <option selected>102</option>
            <?php else: ?> <option>102</option> <?php endif; ?>

            <?php if($nivel == "201"): ?> <option selected>201</option>
            <?php else: ?> <option>201</option> <?php endif; ?>

            <?php if($nivel == "202"): ?> <option selected>202</option>
            <?php else: ?> <option>202</option> <?php endif; ?>

            <?php if($nivel == "301"): ?> <option selected>301</option>
            <?php else: ?> <option>301</option> <?php endif; ?>

            <?php if($nivel == "302"): ?> <option selected>302</option>
            <?php else: ?> <option>302</option> <?php endif; ?>

            <?php if($nivel == "401"): ?> <option selected>401</option>
            <?php else: ?> <option>401</option> <?php endif; ?>

            <?php if($nivel == "402"): ?> <option selected>402</option>
            <?php else: ?> <option>402</option> <?php endif; ?>

            <?php if($nivel == "501"): ?> <option selected>501</option>
            <?php else: ?> <option>501</option><?php endif; ?>

            <?php if($nivel == "502"): ?> <option selected>502</option>
            <?php else: ?> <option>502</option> <?php endif; ?>

            <?php if($nivel == "601"): ?> <option selected>601</option>
            <?php else: ?> <option>601</option> <?php endif; ?>

            <?php if($nivel == "602"): ?> <option selected>602</option>
            <?php else: ?> <option>602</option> <?php endif; ?>
        </select>
        <input class="controls" type="date" required name="inicio" value=<?php echo $row['InicioCargo']?>><br>
        <input class="controls" type="email" required name="correo" placeholder="Correo" value=<?php echo $row['Correo']?>>
        <input class="controls" type="file" name="img"><br>
        <input class="botones" type="submit" name="actualizar" value="Actualizar">
        <p><a href="administradorCeal.php">Cancelar modificación</a></p>
    </form>
</body>
</html>