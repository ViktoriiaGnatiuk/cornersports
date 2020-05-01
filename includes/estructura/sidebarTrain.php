

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" href="estilos/estiloEntrenamiento.css?v=<?php echo(rand()); ?>" />
    <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
</head>
	<body>
		<div id="barra">
			<div id ="contenido-lateral">
				<div id="sidebar-right">
					<div class="entrenador_1">
						<center>
							<?php 
								$app = aplicacion::getSingleton();
								$conexion = $app->conexionBd();
								$tabla = "entrenadores";
								if ($conexion->connect_error) {
									die("La conexion falló: " . $conexion->connect_error);
								}
								else{
									$query = "SELECT * FROM $tabla WHERE id = 2";
									$result = $conexion->query($query);
									$row = mysqli_fetch_assoc($result);
									$_SESSION['nombre']=$row['nombre'];
								}
							?>
							<img src="img/entenadores/sergio.jpeg" width="150" height="150">
							<div id="entrenador">
								<?php
									$nombre=$_SESSION['nombre'];
									echo "$nombre";
								?>
								</br>
								<fieldset class="val-fieldset"><legend>Calificación:</legend><span class="valoracion val-40"></span></fieldset>
							</div>
						</center>
					</div>
					
					<div class="entrenador_2">
						<center>
							<?php 
								$app = aplicacion::getSingleton();
								$conexion = $app->conexionBd();
								$tabla = "entrenadores";
								if ($conexion->connect_error) {
									die("La conexion falló: " . $conexion->connect_error);
								}
								else{
									$query = "SELECT * FROM $tabla WHERE id = 3";
									$result = $conexion->query($query);
									$row = mysqli_fetch_assoc($result);
									$_SESSION['nombre']=$row['nombre'];
								}
							?>
							<img src="img/entrenadores/antonio.jpeg" width="150" height="130">
							<div id="entrenador">
								<?php
									$nombre=$_SESSION['nombre'];
									echo "$nombre";
								?>
								</br>
								<fieldset class="val-fieldset"><legend>Calificación:</legend><span class="valoracion val-45"></span></fieldset>
							</div>
						</center>
					</div>
				</div>
			</div>
		</div>
	</body>

</html>
