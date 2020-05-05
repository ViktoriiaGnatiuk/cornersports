<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/formularioRegistro.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registro</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="estilos/boton.css">
		<link rel="stylesheet" href="estilos/estiloRegistro.css?v=<?php echo(rand()); ?>" />
    	<script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
    </head>
    <body>
        <div id="contenedor">
        <?php
            include __DIR__.'/includes/estructura/cabecera.php';
        ?>
        <div id="contenido2">
				<div id="formularios">
					<?php
						if(isset($_SESSION['loged']) && !($_SESSION['perfil']=="admin")){
							header('Location: http://localhost/cornersports/index.php');
						}
						$form = new FormularioRegistro(); 
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