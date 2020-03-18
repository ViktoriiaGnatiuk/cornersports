<!DOCTYPE html>
<html>
<meta charset="utf-8">
	<head>
		<link rel="stylesheet" type="text/css" href="estilo.css" />
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
						echo '<a href="logout.php">Logout</a>';
					}else{
						echo '<a href="login.php">Login</a>';
					}	
				?>
			</div>
		</div>
	</body>
	
</html>