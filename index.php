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
					<center><p class="tit_nov" >NOVEDADES</p></center>
					<div class="novedades_bloque">
						<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
						<?php
						include __DIR__.'/includes/scripts/script_producto_min.php';
						?>
       					<a class="next" onclick="plusSlides(1)">&#10095;</a>
					</div>
				</div>
			</div>
			<?php
				include __DIR__.'/includes/scripts/script_barra_ofertas.php';	
			?>
			</div>
			<div id="contenido2">
				<div id="entrenamientos_home">
					<center><p class="tit_nov2">ENTRENA CON NOSOTROS</p></center>
					<?php
						$_SESSION['entrenamiento']=10;
						include __DIR__.'/includes/scripts/script_entrenamiento.php';
					?>
					<?php
						$_SESSION['entrenamiento']=2;
						include __DIR__.'/includes/scripts/script_entrenamiento.php';
					?>
				</div>
				<?php 
					include __DIR__.'/includes/estructura/pie.php';
				?>
		</div>
	</body>
	
</html>