<?php session_start(); ?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
	<head>
		<title>Index</title>
		<link rel="stylesheet" type="text/css" href="estilo.css" />
	</head>

	<body>
		<div id="contenedor">
			<?php
				include "cabecera.php";
				include "sidebarleft.php";
			?>
			<div id="contenido">
				<h1>Página principal</h1>
				<p> Aquí está el contenido público, visible para todos los usuarios.</p>
			</div>
			<?php
				include "sidebarright.php";
				include "pie.php";	
			?>

		</div>
	</body>
	
</html>