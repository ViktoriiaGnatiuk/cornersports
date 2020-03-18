<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>TITULO</title>
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
                if(isset($_SESSION['loged'])){
                    echo "<h1> Bienvenido ".$_SESSION['nombre']."</h1><br>";
                    echo "<h2> Contenido exclusivo para usuarios<h2>";
                }
                else{
                    echo "<h1> Usted no puede acceder al contenido porque no esta identificado</h1>";
                    echo "<h2>Por favor identifiques\n</h2>";
                    echo "</br><form action=\"login.php\" method=\"POST\">
                        <button type=\"submit\">Login</button>
                        </form>";
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