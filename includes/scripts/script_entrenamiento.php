<?php
require_once __DIR__.'/../config.php';
require_once __DIR__.'/../aplicacion.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <div id="entrenamiento-home">
            <div id="portada">
                <?php
                    $app = aplicacion::getSingleton();
                    $conexion = $app->conexionBd();
                    $tabla = "entrenamientos_disponibles";
                    if ($conexion->connect_error) {
                        die("La conexion falló: " . $conexion->connect_error);
                    }
                    else{
                        $id=$_SESSION['entrenamiento'];
                        $query = "SELECT * FROM $tabla WHERE id = '$id'";
                        $result = $conexion->query($query);
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['nombre_entrenamiento']=$row['nombre'];
                        $img=$row['imagen'];
                        echo "<center/><img class=\"img_entr_indx\" src=\"$img\">";
                    }
                    //mysqli_close($conexion);
                ?>
                <div id="titulo-entrenamientos">
                    <?php
                        $nombre=$_SESSION['nombre_entrenamiento'];
                        echo "<center/><a class=\"button2\"href=\"entrenamiento.php\">$nombre</a>";
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>