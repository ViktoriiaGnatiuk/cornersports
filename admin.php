<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Consola de administrador</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <?php
            if(isset($_SESSION["esAdmin"])){
                echo "<h1>Todas las variables de sesión: </h1>";
                var_dump($_SESSION);
            }
            else{
                echo "<h1>Lo siento no tiene permiso para acceder a la consola de administrador.\n</h1>";
                echo "<h2>Identifiquese o vuelva  a HOME\n</h2>";
                echo "<br>
                    <form action=\"login.php\" method=\"POST\">
                    <button type=\"submit\">IDENTIFICARSE</button>
                    </form>";
            }
        ?>
        <br>
        <br>
        <form action="index.php" method="POST">
            <button type="submit">HOME</button>
        </form>
    </body>
</html>