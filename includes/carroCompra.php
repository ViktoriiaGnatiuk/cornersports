<?php
    require_once __DIR__.'/config.php';
    require_once __DIR__ . '/carrito.php';
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="http://localhost/cornersports/estilos/estiloCarro.css?v=<?php echo(rand()); ?>" />
    <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
    </head>
    <body>
        <div id="contenedor">
        <?php
            include __DIR__.'/estructura/cabecera.php';
        ?>
        <div id="contenido2">
            <div class="carro">
                <p class="tituloCarro"> Carro de la compra</p>
                <?php
                
                    $carrito = new carrito();
                    $items=$carrito->getItems();
                    $i=0;
                    $size=$carrito->getSize();
                    while($i < $size){
                        $nombre = $items[$i]['nombre'];
                        $precio = $items[$i]['precio'];
                        $precio_alquiler = $items[$i]['precio_alquiler'];
                        $descripcion = $items[$i]['descripcion'];
                        $imagen = $items[$i]['imagen'];
                        $cantidad = $items[$i]['cantidad'];
                        $html = <<<EOF
                        <div class="item">
                            <img src="$imagen" width="60" height="60">
                            <div class="datosItem">
                                <div class="nombreItem"><p>$nombre</p> </div>
                                <div class="descripcionItem"><p>$descripcion</p></div>
                                <div class="precioItem"><p>$precio</p></div>
                            </div> 
                            <div class="botonesCarro">
                                <button class="restarItem">-</button>
                                <p class="cantidadItem">$cantidad</p>
                                <button class="sumaItem">+</button>
                                <button class="eliminaItem">Eliminar</button>
                            </div>
                        </div>
                        EOF;
                        echo "$html";
                        ++$i;
                    }
                ?>
            </div>
            <div class="inferior">
                <div class="total"> <p>Total:</p> <p>35,99$</p></div>
                <button class="tramitar"> Tramitar pedido</button>
            </div>
        </div>
        <?php
            include __DIR__.'/estructura/pie.php';
        ?>
        </div>
    </body>
</html>