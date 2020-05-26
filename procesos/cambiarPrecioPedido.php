<?php
    require_once __DIR__.'/../includes/config.php';
    require_once __DIR__ .'/../includes/carrito.php';
    $precio = $_REQUEST["precio"];
	$carrito = new carrito();
    $result = $carrito->setPrecio($precio);
    if($result){
        echo "correcto";
    }else{
        echo "fallo";
    }
?>