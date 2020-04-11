<?php
require_once __DIR__.'/includes/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ofertas</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <div id="contenedor">
        <?php
            include __DIR__.'/includes/estructura/cabecera.php';
			include __DIR__.'/includes/estructura/menuOfertas.php"';
        ?>
        <div id="contenido">
			<div id="interior">
				<div id="top_oferta">
					<p><br/>OFERTA PRINCIPAL AQUÍ</p>
				</div>
				
				<div id="oferta_1">
					<p><br/>OFERTA AQUÍ</p>
					<div id="texto-encima-oferta">Descuento</div>
					<div id="oferta">Nombre Oferta</div>
				</div>
				<div id="oferta_2">
					<p><br/>OFERTA AQUÍ</p>
					
				</div>
			</div>
        </div>
        <?php
            include __DIR__.'/includes/estructura/pie.php';
        ?>
        </div>
    </body>
</html>