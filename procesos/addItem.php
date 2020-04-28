<?php   
    require_once __DIR__.'/../includes/config.php';
    require_once __DIR__ . '/../includes/carrito.php';

    $carrito=carrito::getSingleton();
    $id=$_GET['id'];
    $pos=$carrito->addItem($id);
    echo "$pos";
    $var=$carrito->getSize();
    echo "$var";
    $var=$carrito->getCantidad($pos);
    echo "$var";
    $var=$carrito->getTotal();
    echo "$var";
    //header('Location: http://localhost/cornersports/index.php');
?>