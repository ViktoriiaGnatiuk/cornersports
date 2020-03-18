<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Consola de administrador</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <div id="contenedor">
        <?php
            include"cabecera.php";
            include"sidebarleft.php";
        ?>
        <div id="contenido">
            <?php
                if( isset($_SESSION['perfil']) &&  $_SESSION['perfil']== 'admin'){
                    echo "<h1>Bienvenido administrador</h1></br>";
                    echo "<h2>Todas las variables de sesión: </h2>";
                    var_dump($_SESSION);
                }
                else{
                    echo "<h1>Lo siento no tiene permiso para acceder a la consola de administrador.\n</h1>";
                    echo "<h2>Identifiquese para continuar</h2>";
                }
            ?>
        </div>
        <?php
            include"sidebarright.php";
            include"pie.php";
        ?>
        </div>
    </body>
</html>