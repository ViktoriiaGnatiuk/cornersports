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
                $id=$_GET['id'];
                $query=sprintf("UPDATE productos SET estado = 'DEVUELTO' WHERE id ='%s'",
                        $conexion->real_escape_string($id));
                $result = $conexion->query($query);
                if ($result == TRUE) {
                    echo"<center/>";
                    echo "<h3> Gracias.</h3><h3>Su producto se ha devuelto correctamente.</h3><h3>En un periodo de 5 días recibira el rembolso en su cuenta bancaria.</h3><br/>";
                    echo"<a href=\"../vistasUsuario/pedidos.php\">Volver a pedidos</a>";
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
