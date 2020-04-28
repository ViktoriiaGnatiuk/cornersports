<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__ .'/../includes/aplicacion.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Procesar Material</title>
        <meta charset="UTF-8"/>
    
    </head>
    <body>
        <div id="contenedor">
        <?php
            include __DIR__.'/../includes/estructura/cabecera.php';
        ?>
        <div id="contenido">
            <?php
                $app = aplicacion::getSingleton();
                $conexion = $app->conexionBd();
                $tbl_name = "productos_disponibles";
                if ($conexion->connect_error) {
                    die("La conexion falló: " . $conexion->connect_error);
                }
				else{
                    if(isset($_SESSION['loged'])){
                        //Copia el nombre del usuario
                        $usuario=$_SESSION['username'];
                        
						//Busca la máquina seleccionada
						$material=$conexion->real_escape_string($_GET['id']);
						$tabla="productos_disponibles";
						$query = "SELECT * FROM $tabla WHERE id = '$material'";
						$result = $conexion->query($query);
						$count = mysqli_num_rows($result); 
						if ($count == 1) 
						{
							$query="UPDATE usuarios SET material = '$material' WHERE username = '$usuario'"; 
                            $result = $conexion->query($query);
                                if ($result == TRUE) {
									echo "<h2>" . "Material registrado correctamente" . "</h2>";
								}
								else {
									echo "Error al registrar el material." . $query . "<br>" . $conexion->error;
								}
						}
						else{
							echo "Se ha producido un error, no existe el material seleccionado en la base de datos<br/>";
						}
                    }
                    else{
                        echo "<center/>Por favor identifiquese antes de contratar o alqilar un material<br/>";
                        echo "<center><a href=\"http://localhost/cornersports/login.php\">Identificarse</a></center>";
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