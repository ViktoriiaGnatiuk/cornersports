<?php
require_once __DIR__.'/includes/config.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>HOME</title>
	</head>
	<body>
		<div id="contenedor">
			<?php
				include __DIR__.'/includes/estructura/cabecera.php';
			?>
			<div id="contenido">
				<div id="interior">
						<?php 
							$_SESSION['producto']=6;
							include __DIR__.'/includes/scripts/script_mas_vendido.php';
						?>
					<div id="novedades">
						<center><h2>NUESTROS PRODUCTOS</h2></center>
						<?php
							$_SESSION['producto']=5;
							include __DIR__.'/includes/scripts/script_producto_min.php';
							$_SESSION['producto']=6;
							include __DIR__.'/includes/scripts/script_producto_min.php';
							$_SESSION['producto']=7;
							include __DIR__.'/includes/scripts/script_producto_min.php';
							$_SESSION['producto']=5;
							include __DIR__.'/includes/scripts/script_producto_min.php';
						?>
					</div>
				</div>
			</div>
			<?php
				include __DIR__.'/includes/estructura/barraOfertas.php';	
			?>
			<div id="contenido2">
				<div id="entrenamientos_home">
					<center><h2>ENTRENA CON NOSOTROS</h2></center>
					<?php
						$_SESSION['entrenamiento']=10;
						include __DIR__.'/includes/scripts/script_entrenamiento.php';
					?>
					<?php
						$_SESSION['entrenamiento']=2;
						include __DIR__.'/includes/scripts/script_entrenamiento.php';
					?>
				</div>
			</div>
			<?php 
				include __DIR__.'/includes/estructura/pie.php';
			?>
		</div>
	</body>
	
</html>