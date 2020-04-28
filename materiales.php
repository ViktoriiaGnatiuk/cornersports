<?php
require_once __DIR__.'/includes/config.php';
?>
<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8">
	<title>MATERIALES</title>
	<link rel="stylesheet" href="estilos/estiloMateriales.css?v=<?php echo(rand()); ?>" />
    <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
 </head>

 <body>
    <div id="contenedor">
		<?php
				include __DIR__.'/includes/estructura/cabecera.php';
		?>
		<div id="contenido">
			<div id="interior">
				<div class="material1">
						<?php 
							$app = aplicacion::getSingleton();
							$conexion = $app->conexionBd();
							$tabla = "productos_disponibles";
							if ($conexion->connect_error) {
								die("La conexion falló: " . $conexion->connect_error);
							}
							else{
								$query = "SELECT * FROM $tabla WHERE id = 8";
								$result = $conexion->query($query);
								$row = mysqli_fetch_assoc($result);
								$_SESSION['nombre_producto']=$row['nombre'];
								$_SESSION['imagen']=$row['imagen'];
							}
							$img=$_SESSION['imagen'];
							echo "<img src=\"/cornersports/img/$img\" width=\"325\" height=\"300\">";
						?>
						<br>
						<div class="entrenador">
							<?php
								$nombre=$_SESSION['nombre_producto'];
								echo "$nombre";
							?>
							<button><a href="procesos/procesarMaterial.php?id=8">COMPRAR</a>
							<button><a href="procesos/procesarMaterial.php?id=8">ALQUILA</a></button>
						</div>
			
				</div>
				<br></br>
				<div class="material2">
					<?php 
							$app = aplicacion::getSingleton();
							$conexion = $app->conexionBd();
							$tabla = "productos_disponibles";
							if ($conexion->connect_error) {
								die("La conexion falló: " . $conexion->connect_error);
							}
							else{
								$query = "SELECT * FROM $tabla WHERE id = 9";
								$result = $conexion->query($query);
								$row = mysqli_fetch_assoc($result);
								$_SESSION['nombre_producto']=$row['nombre'];
								$_SESSION['imagen']=$row['imagen'];
							}
							$img=$_SESSION['imagen'];
							echo "<img src=\"/cornersports/img/$img\" width=\"325\" height=\"300\">";
						?>
						<br>
						<div class="entrenador">
							<?php
								$nombre=$_SESSION['nombre_producto'];
								echo "$nombre";
							?>
							<button><a href="procesos/procesarMaterial.php?id=9">COMPRAR</a>
							<button><a href="procesos/procesarMaterial.php?id=9">ALQUILA</a></button>
						</div>
				</div>
				<br></br>
				<div class="material3">
					<?php 
						$app = aplicacion::getSingleton();
						$conexion = $app->conexionBd();
						$tabla = "productos_disponibles";
						if ($conexion->connect_error) {
							die("La conexion falló: " . $conexion->connect_error);
						}
						else{
							$query = "SELECT * FROM $tabla WHERE id = 10";
							$result = $conexion->query($query);
							$row = mysqli_fetch_assoc($result);
							$_SESSION['nombre_producto']=$row['nombre'];
							$_SESSION['imagen']=$row['imagen'];
						}
						$img=$_SESSION['imagen'];
						echo "<img src=\"/cornersports/img/$img\" width=\"325\" height=\"300\">";
					?>
					<br>
					<div class="entrenador">
						<?php
							$nombre=$_SESSION['nombre_producto'];
							echo "$nombre";
						?>
						<button><a href="procesos/procesarMaterial.php?id=10">COMPRAR</a>
						<button><a href="procesos/procesarMaterial.php?id=10">ALQUILA</a></button>
					</div>
				</div>
			</div>
		</div>
		<?php
				include __DIR__.'/includes/scripts/script_material.php';
				include __DIR__.'/includes/estructura/pie.php';
		?>
    </div> 
 </body>
</html>
