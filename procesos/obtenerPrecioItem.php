<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__ .'/../includes/carrito.php';
$id=$_REQUEST['id'];
$carrito=new carrito();
$item = $carrito->getItemCarro($id);
$precio = $item['precio']*$item['cantidad'];
echo "$id"."_"."$precio";
?>