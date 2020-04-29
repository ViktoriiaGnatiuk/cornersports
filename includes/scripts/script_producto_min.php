<?php
require_once __DIR__.'/../config.php';
require_once __DIR__.'/../aplicacion.php';
?>
<!DOCTYPE html>
<html>
    <head>
       
    </head>
    <body>
        <div id="producto-min">
            <div id="imagen-producto-min">
                <?php
                    $app = aplicacion::getSingleton();
                    $conexion = $app->conexionBd();
                    $tabla = "productos_disponibles";
                    if ($conexion->connect_error) {
                        die("La conexion falló: " . $conexion->connect_error);
                    }
                    else{
                        $id=$_SESSION['producto'];
                        $query = "SELECT * FROM $tabla WHERE id = '$id'";
                        $result = $conexion->query($query);
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['nombre_producto']=$row['nombre'];
                        $img=$row['imagen'];
                        echo "<img src=\"$img\" width=\"220\" height=\"220\">";
                    }
                ?>
            </div>
            <div id="titulo-producto-min">
                <?php
                    $nombre=$_SESSION['nombre_producto'];
                    $id=$_SESSION['producto'];
                    echo "<center/><a href=\"procesos/addItem.php?id=$id\" class=\"botonProdMin\">$nombre</a>";
               ?>
            </div>
        </div>
    </body>
</html>