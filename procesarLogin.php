<!DOCTYPE html>
<html>
    <head>
        <title>Procesa Login</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>
    <body>
    <?php
        session_start();
        $host_db = "localhost";
        $user_db = "root";
        $pass_db = "";
        $db_name = "cornersports";
        $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

        if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
        }
        // Elimina posibles secuencias de escape
        $user = $conexion->real_escape_string($_POST['username']);      
        $pass = $conexion->real_escape_string($_POST['password']);

        //Comprueba si el usuario existe
        $query = "SELECT * FROM usuarios WHERE username = '$user' AND password = '$pass'";
        $result = $conexion->query($query);
        $count = mysqli_num_rows($result); 
        if ($count == 1) 
        {
            $_SESSION['username']=$user;
            header('Location: index.php');//Redirecciona al home
        }
        else{
            $_SESSION['errorLogin']="<b>Usuario o contraseña incorrectos\n</b>";
            header('Location: login.php');
        }
        mysqli_close($conexion);
    ?>
        
    </body>
</html>