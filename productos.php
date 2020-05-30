<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/productos.php';
?>
<!DOCTYPE html>
<html>
 <head>
	<title>PRODUCTOS</title>
	<link rel="stylesheet" href="estilos/estiloProductos.css?v=<?php echo(rand()); ?>" />
	<script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
 </head>

 <body>
    <div id="contenedor">
		<?php
			include __DIR__.'/includes/estructura/cabecera.php';
		?>
		<div id="contenido">
			<div class="main">
				<?php
					$prd=new productos();
					$i=0;
					if(isset($_GET['tipo'])){
						$tipo=$_GET['tipo'];
						$_SESSION['tipo']=$tipo;
					}else{
						$tipo=$_SESSION['tipo'];
					}
						
					$size=$prd->getSize($tipo);
					$items=$prd->getItems($tipo);

					while( $i < $size){
						$id = $items[$i]['id'];	
						$nombre = $items[$i]['nombre'];
						$imagen = $items[$i]['imagen'];
						$descripcion = $items[$i]['descripcion'];
						$precio = $items[$i]['precio'];
						$precio_alquiler = $items[$i]['precio_alquiler'];
						//Carro normal
						/*$html = <<<EOF
						<div class="producto">
							<div class="izq">
								<img class="imagen" src="$imagen">
								<div class="nombre"><p>$nombre</p></div>
							</div>
							<div class="drc">
								<p>Descripcion</p>
								<div class="descripcion">
									<p>$descripcion</p>
								</div>
								<p>Precio</p>
								<div class="precio"><p>$precio €</p></div>
								<form action="procesos/addItem.php?id=$id" id="form_session" method="post">
								<input type="submit" class="comprar" value="Añadir al carrito">
								</form>
							</div>
						</div>
						EOF;*/
						$html = <<<EOF
						<div class="producto">
							<div class="izq">
								<img class="imagen" src="$imagen">
								<div class="nombre"><p>$nombre</p></div>
							</div>
							<div class="drc">
								<p>Descripcion</p>
								<div class="descripcion">
									<p>$descripcion</p>
								</div>
								<p>Precio</p>
								<div class="precio"><p>$precio €</p></div>
								<input identificador="$id" type="submit" class="comprar" value="Añadir al carrito">
							</div>
						</div>
						EOF;
						echo"$html";
						++$i;
					}	
				?>
			</div>
		</div>
		<?php	
			include __DIR__.'/includes/scripts/script_barra_ofertas.php';	
			include __DIR__.'/includes/estructura/pie.php';
		?>
	</div>
 </body>
</html>