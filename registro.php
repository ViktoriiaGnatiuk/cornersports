<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/formularioRegistro.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registro</title>
        <link rel="stylesheet" href="http://localhost/cornersports/estilos/boton.css">
		<link rel="stylesheet" href="estilos/estiloRegistro.css"/>
        <script type="text/javascript" src="js/jquery-3.5.0.js"></script>
	    <script type="text/javascript" src="js/validarRegistro.js"></script>
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