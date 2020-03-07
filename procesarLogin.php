<!DOCTYPE html>
<html>
    <head>
        <title>TITULO</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
    <?php
        session_start();
        $username = $_REQUEST["username"];
        //Obtiene el nombre y usuario
        //trim elimina los espacios en blanco del principio y el final
        //htmlspecialchar convierte caracteres especiales a html
        $username = htmlspecialchars(trim(strip_tags($_REQUEST["username"])));
        $password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));
        $_SESSION["username"]=$username;
        $_SESSION["password"]=$password;
        if ($username == "user" && $password == "userpass") {
            $_SESSION["login"] = true;
            $_SESSION["nombre"] = "Usuario";
            echo "Validación correcta\n";
            header('Location: index.php');//Redirecciona al home
        }
        else if ($username == "admin" && $password == "adminpass") {
            $_SESSION["login"] = true;
            $_SESSION["nombre"] = "Administrador";
            $_SESSION["esAdmin"] = true;
            echo "Validación correcta\n";
            header('Location: index.php');//Redirecciona al home
        }
        else {
            echo "<h1>ERROR</h1>";
            echo "<p>El usuario o contraseña no son válidos.</p>";
            echo "<form action=\"login.php\" method=\"POST\"><button type=\"submit\">Reintentar</button></form>";
        }
    ?>
        
    </body>
</html>