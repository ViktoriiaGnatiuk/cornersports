<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/formularioLogin.php';
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
					<?php 
						if(isset($_SESSION['loged'])){
							header('Location: index.php');
						}
						$form = new FormularioLogin(); 
						$form->gestiona();
					?>
				</div>
			</div>
			<?php
				include __DIR__.'/includes/estructura/pie.php';
			?>
		</div>
</body>
</html>