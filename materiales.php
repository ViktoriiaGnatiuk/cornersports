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
			<div class="material1">
					<img src="img/productos/esquies.jpg"width="500" height="250">
					<table>
					<td>
						<div class="contenido">ESQUÌS</div>
					</td>
					<td>
						<button><a href="">ACERCA DE</a></button>
					</td>
					<td>
						<button><a href="">COMPRAR</a></button>
					</td>
					<td>
						<button><a href="">ALQUILA</a></button>
					</td>
				</table>
			</div>
			<br></br>
			<div class="material2">
				<img src="img/productos/patines.jpg"width="500" height="250">
				<table>
					<td>
						<div class="contenido">PATINES</div>
					</td>
					<td>
						<button><a href="">ACERCA DE</a></button>
					</td>
					<td>
						<button><a href="">COMPRAR</a></button>
					</td>
					<td>
						<button><a href="">ALQUILA</a></button>
					</td>
				</table>
			</div>
			<br></br>
			<div class="material3">
				<img src="img/productos/bate.jpg"width="500" height="250">
				<table>
					<td>
						<div class="contenido">BATES</div>
					</td>
					<td>
						<button><a href="">ACERCA DE</a></button>
					</td>
					<td>
						<button><a href="">COMPRAR</a></button>
					</td>
					<td>
						<button><a href="">ALQUILA</a></button>
					</td>
				</table>
			</div>
		</div>
		<?php
				include __DIR__.'/includes/scripts/script_material.php';
				include __DIR__.'/includes/estructura/pie.php';
		?>
    </div> 
 </body>
</html>