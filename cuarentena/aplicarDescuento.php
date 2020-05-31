<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__ .'/../includes/carrito.php';

    $codigo = $_POST['cod_desc'];
    $codigo_real = "UCM2205";
    if($codigo == $codigo_real){
        $carrito = new carrito();
        $descuento = 20;
        $carrito->cambiarTotal($descuento);
    }
?>