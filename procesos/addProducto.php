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
$carrito->addItem($id, $usuario, $precio_ofertado);
}
else{
$carrito->addItem($id, $usuario, 0);
}
//Meter el item en el carrito visual
$producto=new productos();
$item=$producto->getItem($id);
$nombre = $item['nombre'];
$precio = $item['precio'];
$imagen = $item['imagen'];
if($precio_ofertado > 0){
    $precio = $precio_ofertado;
}
$html = <<<EOF
<div class="item_sof">
<div class="item_sup">
<img src="$imagen" width="60" height="60">
<p class="nombreItem_sof">$nombre</p>
</div>
<div class="datosItem_sof">
<p class="precioItem_sof">$precio €</p>
<div class="botonesCarro_sof">
<button class="restarItem_sof">-</button>
<p class="cantidadItem_sof">1</p>
<button class="sumaItem_sof">+</button>
</div>
</div> 
</div>
EOF;
echo "$html";
}
?>