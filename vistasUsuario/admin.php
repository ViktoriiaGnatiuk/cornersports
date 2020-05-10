<?php
require_once __DIR__.'/../includes/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Consola de administrador</title>
    </head>
    <body>
        <div id="contenedor">
        <?php
            include __DIR__.'/../includes/estructura/cabecera.php';
        ?>
        <div id="contenido2">
            <div class="consola_admin">
                <?php
                    if( isset($_SESSION['perfil']) &&  $_SESSION['perfil']== 'admin'){
                        $html = <<<EOF
                            </br></br></br><center><h1>Bienvenido administrador</h1></center></br></br>
                            <form action="http://localhost/cornersports/registro.php" id="form_session" method="post">
                            <input type="submit" class="boton_basic" value="Crear usuario">
                            </form>
                            <form action="/cornersports/vistasUsuario/modUsuario.php" id="form_session" method="post">
                            <input type="submit" class="boton_basic" value="Modificar usuario">
                            </form>
                            <form action="/cornersports/vistasUsuario/deleteUsuario.php" id="form_session" method="post">
                            <input type="submit" class="boton_basic" value="Eliminar usuario">
                            </form>
                        EOF;
                        echo "$html";
                    }
                    else{
                        echo "<center><h1>Lo siento no tiene permiso para acceder a la consola de administrador.\n</h1></center></br>";
                        echo "<center><h2>Identifiquese para continuar</h2></center>";
                    }   
                ?>
            </div>
        </div>
        <?php
            include __DIR__.'/../includes/estructura/pie.php';
        ?>
        </div>
    </body>
</html>