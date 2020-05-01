<?php
require_once __DIR__.'/includes/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Entrenadores</title>
        <meta charset="utf-8">
		<link rel="stylesheet" href="estilos/entrenadores_style.css?v=<?php echo(rand()); ?>" />
		<script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
    </head>
    <body>
        <div id="contenedor">
        <?php
            include __DIR__.'/includes/estructura/cabecera.php';
        ?>
        <div id="contenido2">
			<?php 
				$app = aplicacion::getSingleton();
				$conexion = $app->conexionBd();
				$tabla = "entrenadores";
				if ($conexion->connect_error) {
					die("La conexion falló: " . $conexion->connect_error);
				}
				else{
					$entrenamiento=$conexion->real_escape_string($_GET['id']);
					$query = "SELECT * FROM $tabla WHERE id = '$entrenamiento'";
					$result = $conexion->query($query);
					$row = mysqli_fetch_assoc($result);
					$_SESSION['especialidad']=$row['escpecialidad'];
					$_SESSION['nombre']=$row['nombre'];
					$_SESSION['imagen']=$row['imagen'];
					$img=$_SESSION['imagen'];
				}
			?>
			<div class="container-all">
				<h1 class="title">
					<?php
						$nombre=$_SESSION['nombre'];
						echo "$nombre";						
					?>
				</h1>
				<?php
					echo "<img src=\"/cornersports/img/$img\">";
				?>
				<h1 class="sub-title">
					<?php
						$especialidad=$_SESSION['especialidad'];
						echo "$especialidad";						
					?>
				</h1><br>
				<p>
					<?php
						if($entrenamiento == 2){
							echo "Para la gente que no me conozca lo resumiría en que soy un apasionado del movimiento, el ejercicio físico y la salud. Eso me ha llevado al lugar donde estoy ahora, ser entrenador personal en Madrid, pero también soy entrenador online para llegar a gente en todo el mundo. Mi afán por intentar ayudar a la gente a que consiga resultados es insaciable.";
						}
						else if($entrenamiento == 3){
							echo "Mi especialidad en los entrenamientos es la definición. Eso me ha llevado a lograr grandes resultados, a ser entrenador personal en Barcelona, pero también soy entrenador online para llegar a gente en todo el mundo.";
						}
					?>
				</p><br>
				<p>
					<?php
						if($entrenamiento == 2){
							echo "Mi formación académica empezaría con mi Licenciatura en Ciencias de la Actividad Física y del Deporte; y formaciones específicas en entrenamiento personal como las acreditaciones de Entrenador Personal certificado por la NSCA así como el de especialista en preparación física, denominado CSCS.";
						}
						else if($entrenamiento == 3){
							echo "Mi formación consiste en: Graduado en Ciencias de la Actividad Física y Deporte por la Universidad Autónoma de Madrid; y técnico en Actividad Física y Animación Deportiva.Especialista en Nutrición Deportiva reconocido por la Real Federación Española de Gimnasia (Orthos).";
						}
					?>	
				</p>	
			</div>
			<?php
				include __DIR__.'/includes/estructura/pie.php';
			?>
        </div>
    </body>
</html>