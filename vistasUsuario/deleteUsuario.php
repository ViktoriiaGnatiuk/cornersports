<?php
  require_once __DIR__.'/../includes/config.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Buscar usuario</title>
	</head>
	<body>
	<div id="contenedor">
		<?php
			include __DIR__.'/../includes/estructura/cabecera.php';
		?>
		<div id="contenido2">
			<center/>
            </br><h1>Inserta el nombre del usuario:</h1></br>
            <form action="eliminaUsuario.php" id="form_session" method="POST">
				<p>Nombre de usuario:</p>
				<div class="center-content">	
					<input name="user" type="text" class="field" required> <br/>
				</div>
				<p class="center-content">
					<input type="submit" class="boton_basic" value="Aceptar"> <br/><br/>
				</p>
			</form>	
		</div>
		<?php 
			include __DIR__.'/../includes/estructura/pie.php';
		?>
	</div>
	</body>