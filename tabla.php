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
                            <th>ID</th>
                            <th>Fecha</th>
                            <th style="width: 50%">Contenido</th>
                            <th>URL de Imagen</th>
                            <th style="width: 20%">Titulo</th>
                            <th colspan="2">Gestion de Noticias</th>
                        </tr>
                    </thead>

                    <tbody class="table-success">
                        <?php
                            while($row=mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <th><?php  echo $row['Id_Noticia']?></th>
                                <th><?php  echo $row['Fecha']?></th>
                                <th style="text-align: justify"><?php  echo $row['Contenido']?></th>
                                <th><?php  echo $row['URL_Img']?></th>
                                <th style="text-align: justify"><?php  echo $row['Titulo']?></th>
                                <th>
                                    <a href="modificarNoticia.php?Id_Noticia=<?php echo $row['Id_Noticia'] ?>">Editar</a>
                                </th>
                                <th>
                                    <?php echo "<a href='Actions/eliminarNoticia.php?Id_Noticia=".$row['Id_Noticia']."' onclick='return confirmar()'>Eliminar</a>"; ?>
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