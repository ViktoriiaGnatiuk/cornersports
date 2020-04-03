
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="estilos/boton.css">
	<link rel="stylesheet" type="text/css" href="estilos/estilo.css" />
	<link rel="stylesheet" href="estilos/estiloLogin.css">
</head>

<body>	
		<div id="contenedor">
		<?php
			include"cabecera.php";
			include"sidebarleft.php";
		?>
		<div id="contenido">
			<div id="formularios">
				<form action="procesarLogin.php" id="form_session" method="post">
					<?php
						if(isset($_SESSION['loged'])){
							header('Location: index.php');
						}
						if(isset($_SESSION['errorLogin'])){
							session_start(); 
							echo "<div class='error'>";
							echo $_SESSION['errorLogin'];
							unset($_SESSION['errorLogin']);
							echo "</div>";
						}
					?>
					<p>Nombre o correo:</p>
					<div class="center-content">	
						<input name="username" type="text" class="field" placeholder="user@example.com"> <br/>
					</div>

					<p>Contraseña:</p>
					<div class="center-content">
						<input name="password" type="password" class="field" placeholder="*******"> <br/>
					</div>
					</br>
					<p class="center-content">
						<input type="submit" class="btn btn-green" value="Iniciar sesión"> <br/><br/>
						<a href="registro.php">Registra cuenta</a>
					</p>
				</form>	
			</div>
		</div>

		<?php
			include"sidebarright.php";
			include"pie.php";
		?>
		</div>
</body>
</html>