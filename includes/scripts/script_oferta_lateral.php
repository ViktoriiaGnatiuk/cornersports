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
        <div id ="oferta-lateral">
            <div id="ol-barra-superir">
                <div id=ol-bs-izq>
                </div>
                <div id=ol-bs-dr>
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
                            $_SESSION['imagen']=$row['imagen'];
                        }
                    ?>
                    <h1>20%</h1>
                </div>
            </div>
            <div id="ol-centro">
                <?php
                    $img=$_SESSION['imagen'];
                    echo "<img src=\"$img\" width=\"250\" height=\"140\">";
                ?>
            </div>
            <div id="ol-titulo">
                <?php 
                    $nombre=$_SESSION['nombre_producto'];
                    echo "<center/><a href=\"ofertas.php\" class=\"button2\">$nombre</a>";
                ?>
            </div>
        </div>
    </body>
</html>