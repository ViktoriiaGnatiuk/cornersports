<?php
require_once __DIR__ .'/carrito.php';
include __DIR__.'/question_pop.php';
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="http://localhost/cornersports/estilos/pushbar.css"/>
<link rel="stylesheet" href="http://localhost/cornersports/estilos/estiloCarroSofisticado.css"/>
<link rel="stylesheet" href="http://localhost/cornersports/estilos/estilo_pop-up.css"/>
<script src="http://localhost/cornersports/js/jquery-3.5.0.js"></script>
<script type="text/javascript" src="http://localhost/cornersports/js/carroCompra.js"></script>
</head>
<body>
<button class="btn-menu" data-pushbar-target="pushbar"><img src="http://localhost/cornersports/img/carro24.png" width="30" height="30"></i></button>
<div data-pushbar-id="pushbar" class="push" data-pushbar-direction="right">
<div class="btn-cerrar_sof">
<button data-pushbar-close class="botonCerrar_sof"><img src="http://localhost/cornersports/img/cerrar.png" class="botonCerrar_img"></button>
<p class="tituloCarro_sof">Carrito</p>
</div>
<div class="carro_sof">
<?php
$total=0;
if(isset($_SESSION['loged'])){
$carrito = new carrito();
$items=$carrito->getCarrito();
$i=0;
$size=$carrito->getSize();
while($i < $size){
$id=$items[$i]['id'];
$nombre = $items[$i]['nombre'];
$precio = $items[$i]['precio'];
$imagen = $items[$i]['imagen'];
$cantidad = $items[$i]['cantidad'];
$precio = $precio*$cantidad;
$total+=$precio;
$html = <<<EOF
<div class="item_sof" producto="$id">
<div class="item_sup">
<img src="$imagen" width="60" height="60">
<p class="nombreItem_sof">$nombre</p>
</div>
<div class="datosItem_sof">
<p class="precioItem_sof" precio_item_sof="$id">$precio €</p>
<div class="botonesCarro_sof">
<button class="restarItem_sof" value="$id">-</button>
<p id="$id" class="cantidadItem_sof">$cantidad</p>
<button class="sumaItem_sof" value="$id">+</button>
</div>
<img class="open eliminar_item_sof" src="http://localhost/cornersports/img/remove.png" data-value="$id"/>
</div>
</div>
EOF;
echo "$html";
++$i;
}
}
$html = <<<EOF
</div><div class="inferior_sof">
<div class="total_sof"><p>Total:</p><p class="total_carro_sof">$total €</p></div>
<button class="tramitar_sof">Tramitar pedido</button>
</div></div>
EOF;
echo "$html";
?>
<script src="http://localhost/cornersports/js/pushbar.js"></script>
<script>
var pushbar=new Pushbar({
blur: true,
overlay: true
});
</script>
</body>
</html>