<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__ .'/../includes/aplicacion.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Procesar Entrenamiento</title
    </head>
    <body>
        <div id="contenedor">
        <?php
            include __DIR__.'/../includes/estructura/cabecera.php';
        ?>
        <div id="contenido2">
            <?php
                $app = aplicacion::getSingleton();
                $conexion = $app->conexionBd();
                $tbl_name = "entrenamientos";
                if ($conexion->connect_error) {
                    die("La conexion falló: " . $conexion->connect_error);
                }
				else{
                    if(isset($_SESSION['loged'])){
                        //Copia el nombre del usuario
                        $usuario=$_SESSION['username'];
                        //Comprobar que el usuario no tiene un entrenamiento asignado
                        $query = "SELECT entrenamiento_activo FROM usuarios WHERE username = '$usuario'";
                        $result = $conexion->query($query);
                        $row = mysqli_fetch_assoc($result);
                        if($row['entrenamiento_activo'] != NULL){
                            echo"<center/>";
                            echo "Lo sentimos, ya tiene un entrenamiento contratado.<br/>";
                            echo"Si desea contratar este entrenamiento primero debe dar de baja el entrenamiento que ya tiene contratado<br/>";
                            echo"<center/><a class=\"baja_entr\" href=\"bajaEntrenamiento.php\">Dar de baja entrenamiento</a>";
                        }else{
                            //Busca el entrenamiento seleccionado
                            $entrenamiento=$conexion->real_escape_string($_GET['id']);
                            $tabla="entrenamientos_disponibles";
                            $query = "SELECT * FROM $tabla WHERE id = '$entrenamiento'";
                            $result = $conexion->query($query);
                            $count = mysqli_num_rows($result); 
                            if ($count == 1) 
                            {
                                //Copia los datos del entrenamiento
                                $row = mysqli_fetch_assoc($result);
                                $nombre=$row['nombre'];
                                $dias=$row['dias'];
                                $dificultad=$row['dificultad'];
                                $precio=$row['precio'];
                                $entrenador=$row['entrenador'];
                                $image=$row['imagen'];
                                $descripcion=$row['descripcion'];
                                //Asignar día actual =0
                                $query="INSERT INTO entrenamientos (nombre, precio, entrenador, dias, dificultad, dia_actual, imagen, descripcion) VALUES 
                                ('$nombre', '$precio', '$entrenador', '$dias', '$dificultad', '0', '$image', '$descripcion')";
                                $result = $conexion->query($query);
                                if ($result == TRUE) {
                                    //Obtener el id del entrenamiento y asignarselo al usuario
                                    $id=$conexion->insert_id;
                                    $query="UPDATE usuarios SET entrenamiento_activo = '$id' WHERE username = '$usuario'";
                                    $result = $conexion->query($query);
                                    if ($result == TRUE) {
                                        echo "<h2>" . "Entrenamiento registrado correctamente" . "</h2>";
                                        
                                    }
                                    else {
                                        echo "Error al registrar el entrenamiento." . $query . "<br>" . $conexion->error;
                                    }
                                }
                                else {
                                    echo "Error al registrar el entrenamiento." . $query . "<br>" . $conexion->error;
                                }
                            }
                            else{
                                echo "Se ha producido un error, no existe el entrenamiento seleccionado en la base de datos<br/>";
                            }
                        }
                    }
                    else{
                        echo "<center/>Por favor identifiquese antes de contratar un entrenamiento<br/>";
                        echo "<center><a href=\"../login.php\">Identificarse</a></center>";
                    }
                }           
            ?>
            
        </div>
        <?php
            include __DIR__.'/../includes/estructura/pie.php';
        ?>
        </div>
    </body>
</html>