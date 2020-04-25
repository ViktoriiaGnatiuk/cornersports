<?php
require_once __DIR__.'/includes/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Máquinas</title>
        <meta charset="UTF-8"/>
		<link rel="stylesheet" href="estilos/estiloProductos.css?v=<?php echo(rand()); ?>" />
        <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
    </head>
    <body>
        <div id="contenedor">
        <?php
            include __DIR__.'/includes/estructura/cabecera.php';
        ?>
        <div id="contenido">
			<div id="interior">
				<div class="producto_1">
					<?php 
                        $app = aplicacion::getSingleton();
                        $conexion = $app->conexionBd();
                        $tabla = "productos_disponibles";
                        if ($conexion->connect_error) {
                            die("La conexion falló: " . $conexion->connect_error);
                        }
                        else{
                            $query = "SELECT * FROM $tabla WHERE id = 1";
                            $result = $conexion->query($query);
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['nombre_producto']=$row['nombre'];
							$_SESSION['precio']=$row['precio'];
                            $_SESSION['imagen']=$row['imagen'];
                        }
						$img=$_SESSION['imagen'];
						echo "<img src=\"/cornersports/img/$img\" width=\"325\" height=\"300\">";
					?>
					<div class="precio_mes">
						<?php
							$precio=$_SESSION['precio'];
							echo "$precio €/Mes";
						?>
					</div>
					<div class="entrenador">
						<?php
							$nombre=$_SESSION['nombre_producto'];
							echo "$nombre";
						?>
						<button><a href="procesos/procesarMaquina.php?id=1">COMPRAR</a>
						<button><a href="procesos/procesarMaquina.php?id=1">ALQUILAR</a></button>
					</div>
				</div>
				
				<div class="producto_2">
					<?php 
                        $app = aplicacion::getSingleton();
                        $conexion = $app->conexionBd();
                        $tabla = "productos_disponibles";
                        if ($conexion->connect_error) {
                            die("La conexion falló: " . $conexion->connect_error);
                        }
                        else{
                            $query = "SELECT * FROM $tabla WHERE id = 2";
                            $result = $conexion->query($query);
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['nombre_producto']=$row['nombre'];
							$_SESSION['precio']=$row['precio'];
                            $_SESSION['imagen']=$row['imagen'];
                        }
						$img=$_SESSION['imagen'];
						echo "<img src=\"/cornersports/img/$img\" width=\"325\" height=\"300\">";
					?>
					<div class="precio_mes_2">
						<?php
							$precio=$_SESSION['precio'];
							echo "$precio €/Mes";
						?>
					</div>
					<div class="entrenador">
						<?php
							$nombre=$_SESSION['nombre_producto'];
							echo "$nombre";
						?>
						<button><a href="procesos/procesarMaquina.php?id=2">COMPRAR</a>
						<button><a href="procesos/procesarMaquina.php?id=2">ALQUILAR</a></button>
					</div>
				</div>
			</div>
        </div>
        <?php
            include __DIR__.'/includes/estructura/barraOfertas2.php';
            include __DIR__.'/includes/estructura/pie.php';
        ?>
        </div>
    </body>
</html>
