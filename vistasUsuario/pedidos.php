<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__ . '/../includes/productos.php';
?>
<!DOCTYPE html>
<html>
    <head>
		<title>Pedidos</title>
		<link rel="stylesheet" href="http://localhost/cornersports/estilos/estiloPedidosUsuario.css?v=<?php echo(rand()); ?>" />
    	<script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
    </head>
    <body>
        <div id="contenedor">
            <?php
                include __DIR__.'/../includes/estructura/cabecera.php';
            ?>
            <div id="contenido2">
				<?php 
					$prd=new productos();
					$i=0;
					$size=$prd->getSizeByUser();
					$items=$prd->getItemsByUser();
					$html = <<<EOF
						<center/>
						<table class="tabla">
						<caption><h2>Productos pedidos</h2></caption>
						<tr>
						<th class="casilla">Id del pedido</th>
						<th class="casilla">Id del producto</th>
						<th class="casilla">Nombre</th>
						<th class="casilla">Precio</th>
						<th class="casilla">Estado</th>
						<th class="casilla">Decripcion</th>
						</tr>
					EOF;
					echo"$html";
					while( $i < $size){
						$id = $items[$i]['id'];	
						$nombre = $items[$i]['nombre'];
						$imagen = $items[$i]['imagen'];
						$descripcion = $items[$i]['descripcion'];
						$precio = $items[$i]['precio'];
						$precio_alquiler = $items[$i]['precio_alquiler'];
						$estado = $items[$i]['estado'];
						$pedido = $items[$i]['pedido'];
						
						$html = <<<EOF
							<tr>
							<td class="casilla">$id</td>
							<td class="casilla">$pedido</td>
							<td class="casilla">$nombre</td>
							<td class="casilla">$precio</td>
							<td class="casilla">$estado</td>
							<td class="casilla">$descripcion</td>
							</tr>
						EOF;
						echo"$html";
						++$i;
					}
					echo "</table>";
					$html = <<<EOF
					<div class="info">
						<div class="info_interior">
							<form action="http://localhost/cornersports/procesos/devoluciones.php" id="form_session" method="post">
								<input type="submit" class="b_pedido" value="DEVOLVER">
							</form>
						</div>
					</div>
					EOF;
					echo"$html";
				?>
            </div>
            <?php
                 include __DIR__.'/../includes/estructura/pie.php';
            ?>
        </div>
    </body>
</html>
