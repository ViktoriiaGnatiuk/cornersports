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
                
                    $carrito = carrito::getSingleton();
                    $i=0;
                    $size=$carrito->getSize();
                    while($i < $size){
                        $html = <<<EOF
                        <div class="item">
                            <img src="img/productos/guantes_boxeo1.jpg" width="60" height="60">
                            <div class="datosItem">
                                <div class="nombreItem"> <p>Nombre</p> </div>
                                <div class="descripcionItem"> <p>Descripcion.........................</p></div>
                                <div class="precioItem"> <p>20$</p></div>
                            </div> 
                            <div class="botonesCarro">
                                <button class="restarItem">-</button>
                                <p class="cantidadItem">4</p>
                                <button class="sumaItem">+</button>
                                <button class="eliminaItem">Eliminar</button>
                            </div>
                        </div>
                        EOF;
                        echo "$html";
                        $i=$i+1;
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