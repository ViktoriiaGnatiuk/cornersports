<?php
require_once __DIR__.'/includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="estilos/boton.css?v=<?php echo(rand()); ?>" />
    <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
	<link rel="stylesheet" href="estilos/estiloLogin.css?v=<?php echo(rand()); ?>" />
    <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
</head>

<body>	
		<div id="contenedor">
			<?php
				include __DIR__.'/includes/estructura/cabecera.php';
			?>
			<div id="contenido2">
					<div id="formularios">
						<center/>
						<form action="procesarLogin.php" id="form_session" method="post">
							<?php
								if(isset($_SESSION['loged'])){
									header('Location: index.php');
								}
								if(isset($_SESSION['errorLogin'])){
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
								<a href="registro.php" id="registrar">Registra cuenta</a>
							</p>
						</form>	
					</div>
			</div>
			<?php
				include __DIR__.'/includes/estructura/pie.php';
			?>
		</div>
</body>
</html>