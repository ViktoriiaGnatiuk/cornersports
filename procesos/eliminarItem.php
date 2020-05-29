<?php
    require_once __DIR__.'/../includes/config.php';
    require_once __DIR__ . '/../includes/carrito.php';

    $id=$_GET['id'];
    $carrito=new carrito();
    $carrito->removeItem($id);
    header('Location: ../includes/carroCompra.php');
?>