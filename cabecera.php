<!DOCTYPE html>
<html>
<meta charset="utf-8">
	<head>
		<link rel="stylesheet" type="text/css" href="estilos/estilo.css" />
	</head>
	
	<body>
		<div id="cabecera">
			<h1>Mi gran página web</h1>
			<div class="saludo">
				<br>
				<br>
				<br>
				<?php
					include "menu.php";
				?>
				<?php
					if(isset($_SESSION['nombre'])){
						echo "Bienvenido " . $_SESSION['nombre'];
						echo "<br>";
					}
				?>
			</div>
		</div>
	</body>
	
</html>