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
        $query = "SELECT * FROM usuarios WHERE username = '$user'";
        $result = $conexion->query($query);
        $count = mysqli_num_rows($result); 
        if ($count == 1) 
        {
            $registro = $result->fetch_assoc();
            if (password_verify($pass, $registro["password"]))
            {
                $_SESSION['username']=$user;
                $query = "SELECT nombre FROM usuarios WHERE username = '$user'";
                $result = $conexion->query($query);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['nombre']=$row['nombre'];

                $query = "SELECT perfil FROM usuarios WHERE username = '$user'";
                $result = $conexion->query($query);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['perfil']=$row['perfil'];

                $_SESSION['loged']=true;
                header('Location: index.php');
            }
            else{
                $_SESSION['errorLogin']="La contraseña es incorrecta";
                header('Location: login.php');
            }
        }
        else{
            $_SESSION['errorLogin']="No existe ningún usuario registrado con ese nombre de usuario";
            header('Location: login.php');
        }
        mysqli_close($conexion);
    ?>
        
    </body>
</html>