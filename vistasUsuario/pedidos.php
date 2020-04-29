<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__ . '/../includes/aplicacion.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pedidos</title>
        <meta charset="UTF-8"/>
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
					$tabla="usuarios";
					if ($conexion->connect_error) {
						die("La conexion falló: " . $conexion->connect_error);
					}
					else{
						$user=$_SESSION['username'];
						$query = "SELECT * FROM usuarios WHERE username = '$user'";
						$result = $conexion->query($query);
						$row = mysqli_fetch_assoc($result);
						$entrenamiento=$row["entrenamiento_activo"];
						
						$maquina=$row["maquina_activa"];
						echo "<h2>Usuario: $user</h2><br/>";
						echo "<h3>PEDIDOS:</h3><br/>";
						
						$query = "SELECT * FROM productos_disponibles WHERE id = '$maquina'";
						$result = $conexion->query($query);
						$row = mysqli_fetch_assoc($result);
						$nombre=$row["nombre"];
						$img=$row["imagen"];
						$precio=$row["precio"];
					
						echo "$nombre<br/>";
						echo "<img src=\"/cornersports/img/$img\" width=\"325\" height=\"300\">";
					}
				?>
            </div>
            <?php
                 include __DIR__.'/../includes/estructura/pie.php';
            ?>
        </div>
    </body>
</html>