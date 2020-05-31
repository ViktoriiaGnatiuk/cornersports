<?php
require_once __DIR__.'/config.php';
require_once __DIR__ .'/carrito.php';
include __DIR__.'/question_pop.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>CARRITO</title>
<link rel="stylesheet" href="../estilos/estiloCarro.css"/>
<script src="../js/jquery-3.5.0.js"></script>
<script type="text/javascript" src="../js/carroCompra2.js"></script>
</head>
<body>
<div id="contenedor">
<?php
if(!$_SESSION['loged']){
$_SESSION['error']="Debes iniciar sesión para continuar";
header('Location: http://localhost/cornersports/login.php');
}
include __DIR__.'/estructura/cabecera.php';
?>
<div id="contenido2">
<div class="carro">
<p class="tituloCarro"> Carro de la compra</p>
<?php
if(isset($_SESSION['errorCarrito'])){
$mensaje=$_SESSION['errorCarrito'];
unset($_SESSION['errorCarrito']);
$html = <<<EOF
<p class="errorCarro">$mensaje</p>
EOF;
echo $mensaje;
}
$carrito = new carrito();
$items=$carrito->getCarrito();
$i=0;
$size=$carrito->getSize();
$total=0;
while($i < $size){
$id=$items[$i]['id'];
$nombre = $items[$i]['nombre'];
$precio = $items[$i]['precio'];
$precio_alquiler = $items[$i]['precio_alquiler'];
$descripcion = $items[$i]['descripcion'];
$imagen = $items[$i]['imagen'];
$cantidad = $items[$i]['cantidad'];
$precio = $precio*$cantidad;
$total+=$precio;
$html = <<<EOF
<div class="item" id="$i" producto_n="$id">
<img class="imagenCarro" src="$imagen">
<div class="datosItem">
<div class="nombreItem"><p>$nombre</p> </div>
<div class="descripcionItem"><p>$descripcion</p></div>
<div class="precioItem"><p precio_id="$id">$precio €</p></div>
</div> 
<div class="botonesCarro">
<input type="submit" class="restarItem" resta_id="$id" value="-">
<p class="cantidadItem" cant_id="$id">$cantidad</p>
<input type="submit" class="sumaItem" suma_id="$id" value="+">
<input type="submit" class="open eliminaItem" data-value_n="$id" value="Eliminar">
</div>
</div>
EOF;
echo "$html";
++$i;
}
$html = <<<EOF
</div>
<div class="inferior">
<input type="submit" class="vaciar_carro" value="Vaciar">
<div class="total"> <p>Total:</p> <p class="total_n">$total €</p></div>
<form action="tramitarCompra.php" method="post">
<input type="submit" class="tramitar" value="Tramitar pedido">
</form>
EOF;
echo"$html";

?>
</div>
<?php
include __DIR__.'/estructura/pie.php';
?>
</div>
</div>
</body>
</html>