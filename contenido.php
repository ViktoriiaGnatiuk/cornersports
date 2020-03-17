<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>TITULO</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <?php
            if(isset($_SESSION['username'])){
                echo "<h1> Contenido exclusivo para usuarios<h1>";
                echo "<form action=\"index.php\" method=\"POST\">
                    <button type=\"submit\">HOME</button>
                    </form>";
            }
            else{
                echo "<h1> Usted no puede acceder al contenido porque no esta identificado</h1>";
                echo "<h2>Por favor identifiques\n</h2>";
                echo "<form action=\"login.php\" method=\"POST\">
                    <button type=\"submit\">Identificarse</button>
                    </form>";
            }
        ?>
        
    </body>
</html>