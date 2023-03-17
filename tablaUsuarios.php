<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEAL</title>
    <script type="text/javascript">
        function confirmar(){
            return confirm('¿Estás Seguro? Se eliminarán los datos');
        }
    </script>
</head>
<body>
    <!--Tabla de datos-->
    <div class="container-fluid">
        <div class=row>
            <div class="col-12">
                <table class="table">
                    <thead class="table-dark table-striped">
                        <tr>
                            <th>Run</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Contraseña</th>
                            <th>Correo</th>
                            <th>Pregunta</th>
                            <th>Respuesta</th>
                            <th colspan="2">Gestion de Usuarios</th>
                        </tr>
                    </thead>

                    <tbody class="table-success">
                        <?php
                            while($row=mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <th><?php echo $row['Rut']?></th>
                                <th><?php echo $row['Nombre']?></th>
                                <th><?php echo $row['Apellido']?></th>
                                <th><?php echo $row['Contra']?></th>
                                <th><?php echo $row['Correo']?></th>
                                <th><?php echo $row['pregunta']?></th>
                                <th><?php echo $row['respuesta']?></th>
                                <th>
                                    <a href="modificarUsuario.php?Rut=<?php echo $row['Rut'] ?>">Editar</a>
                                </th>
                                <th>
                                    <?php echo "<a href='Actions/eliminarUsuario.php?Rut=".$row['Rut']."' onclick='return confirmar()'>Eliminar</a>"; ?>
                                </th>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>