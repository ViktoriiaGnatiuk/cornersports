<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__ . '/../includes/carrito.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tramite compra</title>
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
                $i=0;
                while($i < $size){
                    $id=$items[$i]['id'];
                    $nombre="cantidad".$id;
                    $cantidad=getCantidad($nombre);
                    echo "$cantidad";
                    $carrito->actualizarCantidad($id, $cantidad);
                    ++$i;
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