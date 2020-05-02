<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__ . '/../includes/carrito.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tramite compra</title>
        <script src="http://localhost/cornersports/js/jquery-3.5.0.js"></script>
        <script>
            function getCantidad(id){
                return document.getElementById(id).innerHTML; 
            }
        </script>
    </head>
    <body>
        <div id="contenedor">
        <?php
            include __DIR__.'/../includes/estructura/cabecera.php';
        ?>
        <div id="contenido2">
            <?php
                
                $carrito = new carrito();
                $items=$carrito->getCarrito();
                $size=$carrito->getSize();
                if($size==0){
                    $_SESSION['errorCarrito']="No puede tramitar un carrito vacio";
                    header('Location: http://localhost/cornersports/includes/carroCompra.php');
                }
                $carrito->tramitar();
                echo"<center/><h2>Su compra se ha realizado con exito, gracias por su pedido</h2>";
            ?>
        </div>
        <?php
            include __DIR__.'/../includes/estructura/pie.php';
        ?>
        </div>
    </body>
</html>