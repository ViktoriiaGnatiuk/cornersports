<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__ .'/../includes/aplicacion.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Devolver</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <div id="contenedor">
        <?php
            include __DIR__.'/../includes/estructura/cabecera.php';
        ?>
        <div id="contenido2">
            <?php
                $app = aplicacion::getSingleton();
                $conexion = $app->conexionBd();
                $tbl_name = "usuarios";

                $usuario=$_SESSION['username'];
                //Obtener el id del entrenamiento activo
                $query = "SELECT pedido FROM productos WHERE usuario = '$usuario'";
                $result = $conexion->query($query);
                $row = mysqli_fetch_assoc($result);
                $id=$row['pedido'];
                //Establece a NULL el entrenamiento activo del usuario
                $query="UPDATE pedidos SET estado = 'DEVUELTO' WHERE id = '$id'";
                $result = $conexion->query($query);
                if ($result == TRUE) {
                    //Borra el entrenamiento dado de baja de la tabla de entrenamientos
                    $query="DELETE FROM productos WHERE pedido='$id'";
                    $result = $conexion->query($query);
                    if ($result == TRUE) {
                        echo"<center/>";
                        echo "El producto se ha devuelto correctamente.<br/>";
                    }else{
                        echo "Error al devolver el producto." . $query . "<br>" . $conexion->error;
                    }
                }
                else{
                    echo "Error al devolver el producto." . $query . "<br>" . $conexion->error;
                }
            ?>
        </div>
        <?php
            include __DIR__.'/../includes/estructura/pie.php';
        ?>
        </div>
    </body>
</html>
