<!DOCTYPE html>
<html>
    <head>
        <title>Baja</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <div id="contenedor">
        <?php
            include"cabecera.php";
        ?>
        <div id="contenido">
            <?php
                session_start();
                $host_db = "localhost";
                $user_db = "root";
                $pass_db = "";
                $db_name = "cornersports";
                $tbl_name = "usuarios";
                $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
                if ($conexion->connect_error) {
                    die("La conexion falló: " . $conexion->connect_error);
                }
                $usuario=$_SESSION['username'];
                //Obtener el id del entrenamiento activo
                $query = "SELECT entrenamiento_activo FROM usuarios WHERE username = '$usuario'";
                $result = $conexion->query($query);
                $row = mysqli_fetch_assoc($result);
                $id=$row['entrenamiento_activo'];
                //Establece a NULL el entrenamiento activo del usuario
                $query="UPDATE usuarios SET entrenamiento_activo = NULL WHERE username = '$usuario'";
                $result = $conexion->query($query);
                if ($result == TRUE) {
                    //Borra el entrenamiento dado de baja de la tabla de entrenamientos
                    $query="DELETE FROM entrenamientos WHERE id='$id'";
                    $result = $conexion->query($query);
                    if ($result == TRUE) {
                        echo "Se ha dado de baja el entrenamiento correctamente.";
                        echo "<a href=\"entrenamiento.php\">Volver a entrenamientos</a>";
                    }else{
                        echo "Error al dar de baja el entrenamiento." . $query . "<br>" . $conexion->error;
                    }
                }
                else{
                    echo "Error al dar de baja el entrenamiento." . $query . "<br>" . $conexion->error;
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