<?php
require_once __DIR__.'/includes/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Máquinas</title>
        <meta charset="UTF-8"/>
		<link rel="stylesheet" href="estilos/estiloProductos.css?v=<?php echo(rand()); ?>" />
        <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
    </head>
    <body>
        <div id="contenedor">
        <?php
            include __DIR__.'/includes/estructura/cabecera.php';
        ?>
        <div id="contenido">
			<div id="interior">
				<div class="producto_1">
					<center><img src="https://www.corpomachine.com/Files/48757/Img/17/maquina-de-gimnasio-multigimnasio-ATX-multiplex-00001-zoom.png" width="325" height="300"></center>
					<div class="precio">622,75€</div>
					<div class="precio_mes">25,95€/Mes</div>
					<div class="entrenador">Máquina musculación
						<button><a href="">COMPRAR</a>
						<button><a href="">ALQUILAR</a></button>
					</div>
				</div>
				
				<div class="producto_2">
					<center><img src="https://maquinasderemo.com/wp-content/uploads/2018/11/movimiento-entrenamiento.jpg" width="350" height="300"></center>
					<div class="precio_2">399,99€</div>
					<div class="precio_mes_2">16,65€/Mes</div>
					<div class="entrenador">Máquina remo
						<button><a href="">COMPRAR</a>
						<button><a href="">ALQUILAR</a></button>
					</div>
				</div>
			</div>
        </div>
        <?php
            include __DIR__.'/includes/estructura/barraOfertas2.php';
            include __DIR__.'/includes/estructura/pie.php';
        ?>
        </div>
    </body>
</html>