<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__ .'/../includes/carrito.php';
$id=$_REQUEST['id'];
$carrito=new carrito();
$carrito->sumarItem($id);
echo "$id";
?>