<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__ .'/../includes/carrito.php';
require_once __DIR__ .'/../includes/productos.php';
if(!isset($_SESSION['loged'])){
$_SESSION['error']="<p class=\"error\">Debes iniciar sesión para continuar.</p>";
echo "no_logeado";
}else{
$id=$_REQUEST["id"];
$precio_ofertado=0;
//Meter el producto en el carrito de la base de datos
$carrito=new carrito();
$usuario=$_SESSION['username'];
if(isset($_REQUEST['precio'])){
$precio_ofertado=$_REQUEST['precio'];
$id_real = $carrito->addItem($id, $usuario, $precio_ofertado);
}
else{
$id_real = $carrito->addItem($id, $usuario, 0);
}
//Meter el item en el carrito visual
$item = $carrito->getItemCarro($id_real);
$cantidad = $item['cantidad'];
if($cantidad > 1){
echo "$id_real";
}else{
$nombre = $item['nombre'];
$precio = $item['precio'];
$imagen = $item['imagen'];
$precio = $precio*$cantidad;
$html = <<<EOF
<div class="item_sof" producto="$id_real">
<div class="item_sup">
<img src="$imagen" width="60" height="60">
<p class="nombreItem_sof">$nombre</p>
</div>
<div class="datosItem_sof">
<p class="precioItem_sof">$precio €</p>
<div class="botonesCarro_sof">
<button class="restarItem_sof" value="$id_real">-</button>
<p id="$id_real" class="cantidadItem_sof">$cantidad</p>
<button class="sumaItem_sof" value="$id_real">+</button>
</div>
<img class="eliminar_item_sof" src="http://localhost/cornersports/img/remove.png" data-value="$id_real"/>
</div> 
</div>
EOF;
echo "$html";
}
}
?>