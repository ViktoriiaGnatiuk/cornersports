<?php
require_once __DIR__.'/includes/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Entrenamientos</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <div id="contenedor">
        <?php
            include __DIR__.'/includes/estructura/cabecera.php';
        ?>
        <div id="contenido">
            <div id="interior">
                <div id="entreno_1">
					<?php 
                        $app = aplicacion::getSingleton();
                        $conexion = $app->conexionBd();
                        $tabla = "entrenamientos";
                        if ($conexion->connect_error) {
                            die("La conexion falló: " . $conexion->connect_error);
                        }
                        else{
                            $query = "SELECT * FROM $tabla WHERE id = 20";
                            $result = $conexion->query($query);
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['nombre']=$row['Nombre'];
							$_SESSION['entrenador']=$row['Entrenador'];
                        }
					?>
					<img src="https://www.elnuevoherald.com/vivir-mejor/salud/wnhptb/picture85493327/alternates/FREE_1140/WQD00%20Women%20News%20rk" width="500" height="330">
					<div id="texto-encima">
						<?php
							$nombre=$_SESSION['nombre'];
							echo "$nombre";
						?>
					</div>
					<div id="entrenador">
						<?php
							$entrenador=$_SESSION['entrenador'];
							
							$tabla = "entrenadores";
							$query = "SELECT * FROM $tabla WHERE id = $entrenador";
							$result = $conexion->query($query);
							$row = mysqli_fetch_assoc($result);
							$_SESSION['nombre']=$row['nombre'];
							$nombre=$_SESSION['nombre'];
						
							echo "Entrenador $nombre";
						?>
						<button><a href="procesos/procesarEntreno.php?id=1">CONTRATAR</a>
					</div> 
                </div>
                
                <div id="entreno_2">
					<?php 
                        $app = aplicacion::getSingleton();
                        $conexion = $app->conexionBd();
                        $tabla = "entrenamientos";
                        if ($conexion->connect_error) {
                            die("La conexion falló: " . $conexion->connect_error);
                        }
                        else{
                            $query = "SELECT * FROM $tabla WHERE id = 21";
                            $result = $conexion->query($query);
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['nombre']=$row['Nombre'];
							$_SESSION['entrenador']=$row['Entrenador'];
                        }
					?>
                    <img src="https://uecluster.blob.core.windows.net/images/1506064164_shutterstock-314336384-b-jpg.jpg" width="500" height="330">
                    <div id="texto-encima">
						<?php
							$nombre=$_SESSION['nombre'];
							echo "$nombre";
						?>
					</div>
					<div id="entrenador">
						<?php
							$entrenador=$_SESSION['entrenador'];
							
							$tabla = "entrenadores";
							$query = "SELECT * FROM $tabla WHERE id = $entrenador";
							$result = $conexion->query($query);
							$row = mysqli_fetch_assoc($result);
							$_SESSION['nombre']=$row['nombre'];
							$nombre=$_SESSION['nombre'];
						
							echo "Entrenador $nombre";
						?>
						<button><a href="procesos/procesarEntreno.php?id=2">CONTRATAR</a>
					</div> 
                </div>
            </div>
        </div>
        <?php
            include __DIR__.'/includes/estructura/sidebarTrain.php';
            include __DIR__.'/includes/estructura/pie.php';
        ?>
        </div>
    </body>
</html>
