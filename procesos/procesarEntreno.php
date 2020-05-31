<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__ .'/../includes/aplicacion.php';
require_once __DIR__ .'/../includes/entrenadores.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Procesar Entrenamiento</title
    </head>
    <body>
        <div id="contenedor">
        <?php
            include __DIR__.'/../includes/estructura/cabecera.php';
        ?>
        <div id="contenido2">
			<div id="contenido2">
				<?php
					if(!isset($_SESSION['loged'])){
						header('Location: http://localhost/cornersports/index.php');
					}
					$entrenador = new entrenadores();
					$id=$entrenador->procesarEntreno($_GET['id']);
					header("Location: http://localhost/cornersports/includes/tramitarEntrenamiento.php?id=".$id);	
				?>
        	</div>       
        </div>
        <?php
            //include __DIR__.'/../includes/estructura/pie.php';
        ?>
        </div>
    </body>
</html>
