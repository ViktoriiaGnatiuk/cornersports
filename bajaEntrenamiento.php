<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__ .'/includes/aplicacion.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Baja</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <div id="contenedor">
        <?php
            include __DIR__.'/includes/estructura/cabecera.php';
        ?>
        <div id="contenido2">
            <?php
                $app = aplicacion::getSingleton();
                $conexion = $app->conexionBd();
                $tbl_name = "usuarios";

                $usuario=$_SESSION['username'];
                //Obtener el id del entrenamiento activo
                $query = "SELECT entrenamiento_activo FROM usuarios WHERE username = '$usuario'";
                $result = $conexion->query($query);
                $row = mysqli_fetch_assoc($result);
                $id=$row['entrenamiento_activo'];
                //Establece a NULL el entrenamiento activo del usuario
                $query="UPDATE usuarios SET entrenamiento_activo = NULL WHERE username = '$usuario'";
                $result = $conexion->query($query);
                if ($result == TRUE) {
                    //Borra el entrenamiento dado de baja de la tabla de entrenamientos
                    $query="DELETE FROM entrenamientos WHERE id='$id'";
                    $result = $conexion->query($query);
                    if ($result == TRUE) {
                        echo"<center/>";
                        echo "Se ha dado de baja el entrenamiento correctamente.<br/>";
                        echo "<a href=\"entrenamiento.php\">Volver a entrenamientos</a>";
                    }else{
                        echo "Error al dar de baja el entrenamiento." . $query . "<br>" . $conexion->error;
                    }
                }
                else{
                    echo "Error al dar de baja el entrenamiento." . $query . "<br>" . $conexion->error;
                }
            ?>
        </div>
        <?php
            include __DIR__.'/includes/estructura/pie.php';
        ?>
        </div>
    </body>
</html>