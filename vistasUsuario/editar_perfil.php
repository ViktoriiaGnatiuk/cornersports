<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__.'/../includes/formularioPerfil.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Editar - Perfil</title>
        <link rel="stylesheet" href="http://localhost/cornersports/estilos/boton.css">
		<link rel="stylesheet" href="http://localhost/cornersports/estilos/estiloRegistro.css?v=<?php echo(rand()); ?>" />
        <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
    </head>
    <body>
        <div id="contenedor">
            <?php
                include __DIR__.'/../includes/estructura/cabecera.php';
            ?>
			<center>
			<div id="contenido2">
                <div id="formularios">
                    <br><h2>EDITAR PERFIL</h2><br>
                    <img alt="Inicio de sesión y seguridad" src="https://images-na.ssl-images-amazon.com/images/G/30/x-locale/cs/ya/images/sign-in-lock._CB485931467_.png">
                    <img alt="Direcciones" src="https://images-na.ssl-images-amazon.com/images/G/30/x-locale/cs/ya/images/address-map-pin._CB485934191_.png">
                    <?php
                        $form = new FormularioPerfil(); 
                        $form->gestiona();
                    ?>
                </div>
			</center>
            <?php
                include __DIR__.'/../includes/estructura/pie.php';
            ?>
            </div>
        </div>
    </body>
</html>