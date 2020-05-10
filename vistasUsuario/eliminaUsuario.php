<?php
    require_once __DIR__.'/../includes/config.php';
    require_once __DIR__.'/../includes/usuario.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Eliminar usuario</title>
    </head>
    <body>
        <div id="contenedor">
        <?php
            include __DIR__.'/../includes/estructura/cabecera.php';
        ?>
        <div id="contenido2">
                <?php
                    $nombreUsuario = $_POST['user'];
                    $eliminado = Usuario::eliminaUsuario($nombreUsuario);
                    if($eliminado){
                        echo"<center/><h2> El usuario $nombreUsuario ha sido eliminado correctamente </h2>";
                    }
                ?>
        </div>
        </div>
    </body>
</html>